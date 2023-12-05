<body>

    <?php
    include("./include/nav.php");
    ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Sản phẩm</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">sản phẩm</a>

                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Danh mục</div>
                    <ul class="main-categories">
                        <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct">
                                <span class="lnr lnr-arrow-right"></span>Danh mục<span class="number">
                                    <?php
                                    $count = new categories();
                                    $start_count = $count->count_categories();
                                    echo '' . $start_count[0]['count_categories'] . ''
                                    // var_dump($start_count);
                                    ?></span></a>
                            <ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false" aria-controls="officeProduct">
                                <?php
                                $categories = new categories();
                                foreach ($categories->get_all_categories() as $key) {
                                    extract($key);
                                    echo '
										<li class="main-nav-list child"><a href="index.php?act=category_search&category_id=' . $category_id . '">' . $name . '<span class="number"></span></a></li>
										';
                                }
                                ?>
                            </ul>
                        </li>


                    </ul>
                </div>
                <br />
				<br />
				<img class="img-fluid d-block mx-auto" src="./content/img/category/c12.png" alt="">
				<br />
				<br />
				<img class="img-fluid d-block mx-auto" src="./content/img/category/c10.png" alt="">
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <?php

                // Hiển thị phân trang
                echo '<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
					<select>
							<option value="1">10</option>
							
						</select>
					</div>';

                echo '</div>';
                ?>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">

                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $items_per_page = 9;

                            // Lấy số trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
                            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                        // Tạo đối tượng sản phẩm
                        $products = new products();
                        if (isset($_GET['category_id'])) {
                            $category_id = $_GET['category_id'];
                            // Lấy danh sách sản phẩm cho trang hiện tại
                            $product_list = $products->products_pagination_caterory($page, $items_per_page, $category_id);
                            if ($product_list != null && isset($product_list['products']) && !empty($product_list['products'])) {
                            foreach ($product_list['products'] as $product) {
                                $product_id = $product['product_id'];
                                $category_id = $product['category_id'];
                                $name = $product['name'];
                                $picture = $product['picture'];
                                $color = $product['color'];
                                $size = $product['size'];
                                $format = number_format($product['price']);
                                $content = $product['content'];
                                $single_product = "index.php?act=single-product&product_id=" . $product_id;
                                $cart_link = "index.php?act=cart&product_id=".$product_id;
                                $favourite_link = "index.php?act=favourites&product_id=" . $product_id;
                                echo '
								<div class="col-lg-4 col-md-6">
								<div class="single-product">
                                <a href="' . $single_product . '" class="social-info">	<img class="img-fluid" src="./content/img/product/' . $picture . '" alt=""></a>
									<div class="product-details">
                                    <a href="' . $single_product . '" class="social-info"><h6>' . $name . '</h6></a>
										<div class="price">
											<h6>' . $format . 'VNĐ</h6>
											
										</div>
										<div class="prd-bottom">
	
											<a href="' . $cart_link . '" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">Thêm vào giỏ hàng</p>
											</a>
											<a href="' . $favourite_link . '" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Yêu thích</p>
											</a>
											
											<a href="' . $single_product . '" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">Chi tiết</p>
											</a>
										</div>
									</div>
								</div>
							</div>
								';
                                    }
                                } else {
                                    echo '
                            <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                           
                            <div class="product-details">
                                <h6>   Không tìm thấy sản phẩm phù hợp</h6>
                                
                        </div>
                    </div>
                            ';
                                }
                            }
                        } else {
                            $items_per_page = 9;

                            // Lấy số trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
                            $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

                            // Tạo đối tượng sản phẩm
                            $products = new products();
                            if (isset($_GET['category_id'])) {
                                $category_id = $_GET['category_id'];
                                // Lấy danh sách sản phẩm cho trang hiện tại
                                $product_list = $products->products_pagination_caterory($page, $items_per_page, $category_id);
                                if ($product_list != null && isset($product_list['products']) && !empty($product_list['products'])) {
                                    foreach ($product_list['products'] as $product) {
                                        $product_id = $product['product_id'];
                                        $category_id = $product['category_id'];
                                        $name = $product['name'];
                                        $picture = $product['picture'];
                                        $color = $product['color'];
                                        $size = $product['size'];
                                        $format = number_format($product['price']);
                                        $content = $product['content'];
                                        $single_product = "index.php?act=single-product&product_id=" . $product_id;

                                        echo '
								<div class="col-lg-4 col-md-6">
								<div class="single-product">
                                <a href="' . $single_product . '" class="social-info"><img class="img-fluid" src="./content/img/product/' . $picture . '" alt=""></a>
									<div class="product-details">
									<a href="' . $single_product . '" class="social-info">	<h6>' . $name . '</h6></a>
										<div class="price">
											<h6>' . $format . 'VNĐ</h6>
											
										</div>
										<div class="prd-bottom">
	
											<a href="index.php?act=login" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">Thêm vào giỏ hàng</p>
											</a>
											<a href="index.php?act=login" class="social-info">
												<span class="lnr lnr-heart"></span>
												<p class="hover-text">Yêu thích</p>
											</a>
											
											<a href="' . $single_product . '" class="social-info">
												<span class="lnr lnr-move"></span>
												<p class="hover-text">Chi tiết</p>
											</a>
										</div>
									</div>
								</div>
							</div>
								';
                                    }
                                } else {
                                    echo '
                            <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                           
                            <div class="product-details">
                                <h6>   Không tìm thấy sản phẩm phù hợp</h6>
                                
                        </div>
                    </div>
                            ';
                                }
                            }
                        }



                        ?>
                        <!-- single product -->


                    </div>
                </section>
                <?php
                $total_pages = ceil($product_list['total_products'][0]['total'] / $items_per_page);

                // Hiển thị phân trang
                echo '<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
					<select>
							<option value="1">10</option>
							
						</select>
					</div>';
                for ($i = 1; $i <= $total_pages; $i++) {
                    $active_class = ($i == $page) ? 'active' : '';
                    echo '<div class="pagination"' . $active_class . '">';
                    echo '<a href="index.php?act=category_search&page=' . $i . '&category_id=' . $category_id . '">' . $i . '</a>';


                    echo '</div>';
                }
                echo '</div>';
                ?>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <!-- <div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
					<select>
							<option value="1">10</option>
							
						</select>
					</div>
					<div class="pagination">
						<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
						<a href="#">6</a>
						<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
				</div> -->
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>

    <!-- Start related-product Area -->
   <br>
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->

    <!-- Modal Quick Product View -->