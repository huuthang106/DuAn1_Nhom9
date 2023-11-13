<body>

    <!-- Start Header Area -->
    <?php
include("./include/nav.php");
?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Thanh toán</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Thanh toán</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">


            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Hoán đơn</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name">
                                <span class="placeholder" data-placeholder="Họ và tên"></span>
                            </div>


                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number">
                                <span class="placeholder" data-placeholder="Số điện thoại"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="compemailany">
                                <span class="placeholder" data-placeholder="Email "></span>
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="add1">
                                <span class="placeholder" data-placeholder="Địa chỉ"></span>
                            </div>




                            <div class="col-md-12 form-group">

                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Ghi chú"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Giỏ hàng của bạn</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Tổng</span></a></li>
                                <li><a href="#">Nho <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                <li><a href="#">Cam <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                                <li><a href="#">Táo <span class="middle">x 02</span> <span class="last">$720.00</span></a></li>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Tạm tính <span>$2160.00</span></a></li>
                                <li><a href="#">Giao hàng <span> $50.00</span></a></li>
                                <li><a href="#">tổng <span>$2210.00</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Thanh toán khi nhận hàng</label>
                                    <div class="check"></div>
                                </div>

                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Chuyển khoản </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>

                            </div>
                            <div id="popup" class="popup">
                                <div class="popup-content">
                                    <!-- Nội dung thông tin thanh toán sẽ hiển thị ở đây -->
                                    <h4>Vietcombank</h4>
                                    <h4>06404- NHOMCHIN</h4>
                                    <p>Tin nhắn chuyển khoảng: <br>
                                    <span>Thanh toán mã đơn 01</span>
                                       </p>
                                    
                                    <!-- Đặt thêm các phần tử HTML khác theo nhu cầu của bạn -->
                                   

                                    <h2>Số tiền cần chuyển: $149.99</h2>
                                    
                                </div>
                            </div>

                            <a class="primary-btn" href="#">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->



</body>