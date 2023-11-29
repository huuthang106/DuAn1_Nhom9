

</style>
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
                        <h3>Đổi mật khẩu </h3>
                        <form class="row login_form" action="index.php?act=change_pasword_user&id=<?= $_GET['id'] ?>" method="post" id="contactForm" novalidate="novalidate">

                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="old_password" name="old_password" placeholder="Nhập mật khẩu cũ">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="new_password" name="new_password" placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="submit" class="primary-btn">Đổi mật khẩu</button>
                                <a href="index.php?act=user">Quay về</a>
                            </div>
                          
                          
                            
                           
                        </form>
                        <?php
                            if (isset($_POST['submit'])) {
                             
                                $old_password = trim($_POST['old_password']);
                                $new_password =trim($_POST['new_password']);
                                $confirm_password = trim($_POST['confirm_password']);
                            
                                if (empty($old_password) || empty($confirm_password)|| empty($new_password)) {
                                    echo '
                                            <div class="col-md-12 form-group">
                                            <div class="error-message">
                                                <i class="fa-solid fa-circle-exclamation"></i> vui lòng nhập mật khẩu  !
                                            </div><br>
                                        </div>
                                            ';
                                } elseif($old_password === $new_password){
                                    echo '
                                    <div class="col-md-12 form-group">
                                    <div class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Mật khẩu đã được sử dụng  !
                                    </div><br>
                                </div>
                                    ';
                                } 
                                elseif ($new_password === $confirm_password) {
                                    // Kiểm tra xem cả hai mật khẩu có giống nhau không
                                    $change_paswoss = new users();
                                    $start = $change_paswoss->change_password($_SESSION['user_id'],$old_password,$new_password);
                                   
                                }
                                else {
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    include("./include/footer.php")
    ?>
</body>