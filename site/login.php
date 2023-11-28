<body>
    <!-- Start Header Area -->
    <?php
    $us = user_selectall();
    $us = user_selectall();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']); // Mật khẩu không cần băm ở đây

    // Lấy thông tin người dùng từ cơ sở dữ liệu bằng username
    $userInfo = get_user_info_by_username($username);

    if ($userInfo && password_verify($password, $userInfo['password'])) {
        // Mật khẩu hợp lệ
        $_SESSION['user_id'] = $userInfo['user_id'];
        header('location: index.php');
    
    ?>
    <?php } else { ?>
    <?php
            include("./include/nav.php");
            ?>
    <!-- End Header Area -->

    <!-- Start Header Area -->

    <!-- End Header Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="content/img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Bạn có phải là người mới?</h4>
                            <p>Để trải nghiệm một cách tốt những chức năng, nếu bạn là người mới thì hãy nhanh tay đăng
                                ký tài khoản để được những ưu đãi đặt biệt cho những thành viên mới</p>
                            <a class="primary-btn" href="index.php?act=register">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Đăng nhập tài khoản</h3>
                        <form class="row login_form" action="index.php?act=login" method="post" id="contactForm">
                            <div class="col-md-12 form-group">
                                <div class="error-message">
                                    <i class="fa-solid fa-circle-exclamation"></i> Thông tin đăng nhập không chính xác !
                                </div><br>
                            </div>

                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" name="username"
                                    placeholder="Tên đăng nhập">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" name="password"
                                    placeholder="Mật khẩu">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Lưu thông tin</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Đăng nhập</button>
                                <a href="index.php?act=forgot_password">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php } else {  ?>
    <?php
        include("./include/nav.php");
        ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Login/Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php?act=home">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=login">Login/Register</a>
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
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="content/img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Bạn có phải là người mới?</h4>
                            <p>Để trải nghiệm một cách tốt những chức năng, nếu bạn là người mới thì hãy nhanh tay đăng
                                ký tài khoản để được những ưu đãi đặt biệt cho những thành viên mới</p>
                            <a class="primary-btn" href="index.php?act=register">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Đăng nhập tài khoản</h3>
                        <form class="row login_form" action="index.php?act=login" method="post" id="contactForm">

                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" name="username"
                                    placeholder="Tên tài khoản">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" name="password"
                                    placeholder="Mật khẩu">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Lưu thông tin</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Đăng nhập</button>
                                <a href="index.php?act=forgot_password">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php  }  ?>
    <!--================End Login Box Area =================-->
    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->
</body>