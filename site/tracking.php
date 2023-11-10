

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
                    <h1>Theo dõi đơn hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php?act=tracking">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=category">Danh mục</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <p>Để theo dõi đơn hàng của bạn, vui lòng nhập ID đơn hàng của bạn vào ô bên dưới và nhấn nút "Theo dõi".</p>
                <form class="row tracking_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="order" name="order" placeholder="Mã đơn hàng" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mã đơn hàng'">
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">Theo dõi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Tracking Box Area =================-->

    <!-- start footer Area -->
    <?php
	include("./include/footer.php");
	?>
    <!-- End footer Area -->



</body>

</html>