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
                        <form class="row login_form" action="index.php?act=change_new_password&token=<?= $_GET['token'] ?>&email=<?= $_GET['email'] ?>" method="post" id="contactForm" novalidate="novalidate">

                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="name" name="password" placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="name" name="confirm_password" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="submit" class="primary-btn">Đổi mật khẩu</button>
                            </div>
                            <div class="col-md-12 form-group">
                                <a href="index.php?act=login">Đăng nhập</a>
                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $token = $_GET['token'];
                                $email = $_GET['email'];
                                $password = trim($_POST['password']);
                                $confirm_password = trim($_POST['confirm_password']);
                                if (empty($password) || empty($confirm_password)) {
                                    echo '
                                            <div class="col-md-12 form-group">
                                            <div class="error-message">
                                                <i class="fa-solid fa-circle-exclamation"></i> vui lòng nhập mật khẩu  !
                                            </div><br>
                                        </div>
                                            ';
                                } elseif ($password === $confirm_password) {
                                    // Kiểm tra xem cả hai mật khẩu có giống nhau không
                                    $change_paswoss = new users();
                                    $start = $change_paswoss->change_new_password($password, $token, $email);
                                    echo '
                                        </br><div class="success-message">
                                        <i class="fa-solid fa-circle-check"></i> Thay đổi mật khẩu thành công
                                        </div>
                            
                                    ';
                                } else {
                                    echo '
                                            <div class="col-md-12 form-group">
                                            <div class="error-message">
                                                <i class="fa-solid fa-circle-exclamation"></i> Mật khẩu xác nhận không chính xác  !
                                            </div><br>
                                        </div>
                                            ';
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    include("./include/footer.php")
    ?>
</body>