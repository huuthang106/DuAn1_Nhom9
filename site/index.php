<body>

    <!-- Start Header Area -->
    <?php
					include("./include/nav.php");
					?>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">

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
                    <a href="index.php?act=ship"> <div class="f-icon">
                            <img src="./content/img/features/f-icon1.png" alt="">
                        </div>
                        </a>
                        <h6>Giao hàng nhanh </h6>
                        <p>Giao hàng hỏa tốc đến khách hàng</p>
                    </div>
                </div>
            
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">  <a href="index.php?act=lie">
                            <img src="./content/img/features/f-icon2.png" alt=""></a>
                        </div>
                        <h6>Chính sách hoàn trả</h6>
                        <p>Hỗ trợ đổi trả trong 7 ngày</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <a href="index.php?act=support">
                        <div class="f-icon">
                            <img src="./content/img/features/f-icon3.png" alt="">
                        </div>
                        </a>
                        <h6>Hỗ trợ 24/7</h6>
                        <p>Nhân viên hỗ trợ tận tâm</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                    <a href="index.php?act=payment">
                        <div class="f-icon">
                            <img src="./content/img/features/f-icon4.png" alt="">
                        </div></a>
                        <h6>Thanh toán nhanh </h6>
                        <p>Không phức tạp  </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end features Area -->
    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Có thể bạn quan tâm</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                        if(isset($_SESSION['user_id'])){
                            $product = new products();
						
						foreach ($product->get_nine_product_limit() as $key) {
							extract($key);
							$format=number_format($price);
                            $favourite_link = "index.php?act=favourites&product_id=" . $product_id;
							$single_product = "index.php?act=single-product&product_id=".$product_id;
                            $cart_link = "index.php?act=cart&product_id=".$product_id;
							echo '
							<div class="col-lg-4 col-md-6">
							<div class="single-product">
                            <a href="'.$single_product.'" class="social-info"><img class="img-fluid" src="./content/img/product/'.$picture.'" alt=""></a>
								<div class="product-details">
                                <a href="'.$single_product.'" class="social-info"><h6>'.$name.'</h6></a>
									<div class="price">
										<h6>'.$format.' vnđ</h6>
										
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
                        }else{
                            $product = new products();
						
                            foreach ($product->get_nine_product_limit() as $key) {
                                extract($key);
                                $format=number_format($price);
                                $favourite_link = "index.php?act=favourites&product_id=" . $product_id;
                                $single_product = "index.php?act=single-product&product_id=".$product_id;
                                echo '
                                <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                <a href="'.$single_product.'" class="social-info">  <img class="img-fluid" src="./content/img/product/'.$picture.'" alt=""> </a>
                                    <div class="product-details">
                                    <a href="'.$single_product.'" class="social-info">  <h6>'.$name.'</h6> </a>
                                        <div class="price">
                                            <h6>'.$format.' vnđ</h6>
                                            
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
                    }
						?>


                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="./content/img/category/c9.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End related-product Area -->

    <!-- start footer Area -->

    <!-- Start category Area 
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="./content/img/category/c1.jpg" alt="">
								<a href="./content/img/category/c1.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Giày thể thao dành cho thể thao</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="./content/img/category/c2.jpg" alt="">
								<a href="./content/img/category/c2.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Giày thể thao dành cho thể thao</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="./content/img/category/c3.jpg" alt="">
								<a href="./content/img/category/c3.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Giày cho cặp đôi</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100" src="./content/img/category/c4.jpg" alt="">
								<a href="./content/img/category/c4.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">Giày thể thao dành cho thể thao</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100" src="./content/img/category/c5.jpg" alt="">
						<a href="./content/img/category/c5.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">Giày thể thao dành cho thể thao</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>-->
    </section>
    <!-- End category Area -->

    <!-- start product Area -->

    <!-- end product Area -->

    <!-- Start exclusive deal Area -->

    <!-- End exclusive deal Area -->

    <!-- Start brand Area -->
    <section class="brand-area section_gap">
        <div class="container">
            <div class="row">
            <img class="img-fluid d-block mx-auto" src="./content/img/brand/banner.png" alt="">
              
            </div>
        </div>
    </section>
    <!-- End brand Area -->

    <!-- Start related-product Area -->
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Ưu đãi trong tuần</h1>
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
						if(isset($_SESSION['user_id'])){
							$product = new products();

						foreach ($product->get_nine_product() as $key) {
							extract($key);
                            $format=number_format($price);
							$like_link = "index.php?act=favourites&product_id=" . $product_id;
							$single_product = "index.php?act=single-product&product_id=".$product_id;
                            $cart_link = "index.php?act=cart&product_id=".$product_id;
							echo '
							<div class="col-lg-4 col-md-6">
							<div class="single-product">
                            <a href="'.$single_product.'" class="social-info"><img class="img-fluid" src="./content/img/product/'.$picture.'" alt=""></a>
								<div class="product-details">
                                <a href="'.$single_product.'" class="social-info">	<h6>'.$name.'</h6></a>
									<div class="price">
										<h6>'.$format.' VNĐ</h6>
										
									</div>
									<div class="prd-bottom">

										<a href=" '. $cart_link.'" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Thêm vào giỏ hàng</p>
										</a>
										<a href="'.$like_link.'" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">Yêu thích</p>
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
						}else{
							$product = new products();

						foreach ($product->get_nine_product() as $key) {
							extract($key);
                            $format=number_format($price);
							$like_link = "index.php?act=likes&product_id=" . $product_id;
							$single_product = "index.php?act=single-product&product_id=".$product_id;
							echo '
							<div class="col-lg-4 col-md-6">
							<div class="single-product">
                            <a href="'.$single_product.'" class="social-info"><img class="img-fluid" src="./content/img/product/'.$picture.'" alt=""></a>
								<div class="product-details">
                                <a href="'.$single_product.'" class="social-info"><h6>'.$name.'</h6></a>
									<div class="price">
										<h6>'.$format. 'VNĐ</h6>
										
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
						}
						
						?>


                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="./content/img/category/c7.png" alt="">
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