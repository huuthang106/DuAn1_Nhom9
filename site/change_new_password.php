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
                    <h1>Đăng nhập/đăng ký</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=login">Đăng nhập/đăng ký</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="login_form_inner">
                        <h3>Đổi mật khẩu mới</h3>
                        <form class="row login_form" action="index.php?act=change_new_password" method="post"
                            id="contactForm" novalidate="novalidate">

                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="name" name="username"
                                    placeholder="Nhập mật khẩu mới" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Nhập mật khẩu mới'"
                                    value="<?php echo $_POST['username'] ?? ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="name" name="password"
                                    placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Nhập lại mật khẩu'"
                                    value="<?php echo $_POST['password'] ?? ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>