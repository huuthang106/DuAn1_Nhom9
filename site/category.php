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
                        <a href="index.php?act=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=category">sản phẩm</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Danh mục</div>
                    <ul class="main-categories">

                        <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false"
                                aria-controls="officeProduct">
                                <span class="lnr lnr-arrow-right"></span>Danh mục<span class="number">
                                    <?php
									$count = new categories();
									$start_count = $count->count_categories();
									echo '' . $start_count[0]['count_categories'] . ''
									// var_dump($start_count);
									?></span></a>
                            <ul class="collapse" id="officeProduct" data-toggle="collapse" aria-expanded="false"
                                aria-controls="officeProduct">
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

							// Lấy danh sách sản phẩm cho trang hiện tại
							$product_list = $products->products_pagination($page, $items_per_page);
							foreach ($product_list['products'] as $product) {
								$product_id = $product['product_id'];
								$category_id = $product['category_id'];
								$name = $product['name'];
								$picture = $product['picture'];
								$color = $product['color'];
								$size = $product['size'];
								$price = $product['price'];
								$content = $product['content'];
								$format = number_format($price);
                                $favourite_link = "index.php?act=favourites&product_id=" . $product_id;
								$single_product = "index.php?act=single-product&product_id=" . $product_id;
                                $cart_link = "index.php?act=cart&product_id=".$product_id;
								echo '
								<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="./content/img/product/' . $picture . '" alt="">
									<div class="product-details">
										<h6>' . $name . '</h6>
										<div class="price">
											<h6>' . $format . ' VNĐ</h6>
											
										</div>
										<div class="prd-bottom">

											<a href="'.$cart_link.'" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">Thêm vào giỏ hàng</p>
											</a>
											<a href="'.$favourite_link.'" class="social-info">
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
							$items_per_page = 9;

							// Lấy số trang hiện tại từ tham số truyền vào hoặc mặc định là trang 1
							$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

							// Tạo đối tượng sản phẩm
							$products = new products();

							// Lấy danh sách sản phẩm cho trang hiện tại
							$product_list = $products->products_pagination($page, $items_per_page);
							foreach ($product_list['products'] as $product) {
								$product_id = $product['product_id'];
								$category_id = $product['category_id'];
								$name = $product['name'];
								$picture = $product['picture'];
								$color = $product['color'];
								$size = $product['size'];
								$price = $product['price'];
								$content = $product['content'];
                                $format = number_format($price);
								$single_product = "index.php?act=single-product&product_id=" . $product_id;
								echo '
								<div class="col-lg-4 col-md-6">
								<div class="single-product">
									<img class="img-fluid" src="./content/img/product/' . $picture . '" alt="">
									<div class="product-details">
										<h6>' . $name . '</h6>
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
					echo '<a href="index.php?act=category&page=' . $i . '">' . $i . '</a>';

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
    <section class="related-product-area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Ưu đãi trong tuần</h1>
                        <p>Những ưu đãi này chắc chắn sẽ mang đến trải nghiệm tuyệt vời để cho khách hàng có thể sở hữu
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="./content/img/r1.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">GIÀY CAO GÓT REN ĐEN</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="./content/img/r2.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">GIÀY CAO GÓT REN ĐEN</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="#"><img src="./content/img/r3.jpg" alt=""></a>
                                <div class="desc">
                                    <a href="#" class="title">GIÀY CAO GÓT REN ĐEN</a>
                                    <div class="price">
                                        <h6>$189.00</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->

    <!-- start footer Area -->
    <?php
	include("./include/footer.php");
	?>
    <!-- End footer Area -->

    <!-- Modal Quick Product View -->