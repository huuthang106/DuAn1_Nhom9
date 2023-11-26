<body>

    <!-- Start Header Area -->
    <?php
					include("./include/nav.php");
					?>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Liên hệ với chúng tôi</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=contact">Liên hệ</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="./content/img/features/f-icon1.png" alt="">
                        </div>
                        <h6>Giao hàng miễn phí</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="./content/img/features/f-icon2.png" alt="">
                        </div>
                        <h6>Chính sách hoàn trả</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="./content/img/features/f-icon3.png" alt="">
                        </div>
                        <h6>Hỗ trợ 24/7</h6>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="./content/img/features/f-icon4.png" alt="">
                        </div>
                        <h6>Thanh toán an toàn</h6>
                        <p>Miễn phí vận chuyển cho mọi đơn hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area -->

    <!-- End category Area -->

    <!-- start product Area -->

    <!-- end product Area -->

    <!-- Start exclusive deal Area -->

    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->

    <!-- End brand Area -->

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Yêu thích vừa qua</h1>
                        <p>Điều quan trọng là phải tự chăm sóc nỗi đau,
                            sau đó là sự trưởng thành của bệnh nhân,
                            nhưng đồng thời cũng sẽ có rất nhiều công việc và nỗi đau.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <?php   
                       
                                if (isset($_GET['product_id'])) {
                                    $product_id = $_GET['product_id'];
				                    $user_id = $_SESSION['user_id'];
                                    favourite_insert($user_id, $product_id);
                                }
                                if(isset($_GET['favourite_id'])){
                                    favourite_delete($_GET['favourite_id']);
                                }
                                $favourite = favourite_selectalls();
                                foreach ($favourite as $favourites) {
                                    extract($favourites);
                                   
                                    $single_product = "index.php?act=single-product&favourite_id=".$favourite_id."&product_id=".$product_id;
                                    $del_like = "index.php?act=favourites&favourite_id=".$favourite_id;
                                    $product = favourite_selectall_products($product_id);
                                    $format=number_format($product[0]['price']);
                                    echo '
                                    <div class="col-lg-4 col-md-6">
                                        <div class="single-product">
                                            <img class="img-fluid" src="./content/img/product/'.$product[0]['picture'].'" alt="">
                                            <div class="product-details">
                                                <h6>'.$product[0]['name'].'</h6>
                                                <div class="price">
                                                    <h6>'.$format.'VNĐ</h6>
                                                    
                                                </div>
                                                <div class="prd-bottom">

                                                    <a href="" class="social-info">
                                                        <span class="ti-bag"></span>
                                                        <p class="hover-text">Thêm vào giỏ hàng</p>
                                                    </a>
                                                    <a href="'.$del_like.'" class="social-info">
                                                        <span class="lnr lnr-trash"></span>
                                                        <p class="hover-text">Xóa</p>
                                                    </a>
                                                    
                                                    <a href="'.$single_product.'" class="social-info">
                                                        <span class="lnr lnr-move"></span>
                                                        <p class="hover-text">Chi tiết</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            
						?>


                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="./content/img/category/c5.jpg" alt="">
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

</body>