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
                        <h3>Đăng ký tài khoản</h3>
                        <form class="row login_form" action="index.php?act=register" method="post" id="contactForm" novalidate="novalidate">
                            <?php
                            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
                                $username = trim($_POST['username']);
                                $password = trim($_POST['password']);
                                $email = trim($_POST['email']);
                                $fullname = trim($_POST['username']);
                                $capcha = $_POST['g-recaptcha-response'];
                                if (empty($username) || !preg_match('/^[A-Za-z0-9]+$/', $username)) {
                                    $error = '
                                        <div class="col-md-12 form-group">
                                        <div style="color:#721c24;" class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i>Tài khoản không được trống và không được có ký tự đặc biệt !
                                        </div>
                                        </div>
                                        ';
                                } elseif (empty($password)) {
                                    $error = '
                                        <div class="col-md-12 form-group">
                                        <div style="color:#721c24;" class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập mật khẩu !
                                        </div>
                                        </div>
                                        ';
                                } elseif (empty($email)) {
                                    $error = '
                                        <div class="col-md-12 form-group">
                                        <div style="color:#721c24;" class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập email !
                                        </div>
                                        </div>
                                        ';
                                } elseif (empty($capcha)) {
                                    $error = '
                                    <div class="col-md-12 form-group">
                                    <div style="color:#721c24;" class="error-message">
                                    <i class="fa-solid fa-circle-exclamation"></i> Vui lòng xác nhận bạn không phải người máy !
                                    </div>
                                    </div>
                                    ';
                                }

                                if (isset($error)) {
                                    echo $error;
                                } else {
                                    $existingUsernames = array_column(user_selectall(), 'username');
                                    $existingEmail = array_column(user_selectall(), 'email');
                                    if (in_array($username, $existingUsernames)) {
                                        echo '
											<div class="col-md-12 form-group">
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Tài khoản đã tồn tại !
											</div>
											</div>
											';
                                    } else if (in_array($email, $existingEmail)) {
                                        echo '
											<div class="col-md-12 form-group">
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Email đã được sử dụng !
											</div>
											</div>
										';
                                    } else {
                                        $secret = '6LeS-SMpAAAAADAfq_cjGUYmWaiHYRyxroANyV-r'; //Thay thế bằng mã Secret Key của bạn
                                        $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $capcha);
                                        $response_data = json_decode($verify_response);
                                        if ($response_data->success) {
                                            user_register($username, $password, $email, $fullname);
                                            echo '
											<div class="col-md-12 form-group">
											<div class="success-message">
											<i class="fa-solid fa-circle-check"></i> Đăng ký tài khoản thành công !			
											</div>
											</div>
											';
                                            $_POST['username'] = '';
                                            $_POST['password'] = '';
                                            $_POST['email'] = '';
                                        }else{
                                            echo '
											<div class="col-md-12 form-group">
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i>Vui lòng xác nhận lại !
											</div>
											</div>
										';
                                        }
                                    }
                                }
                            }
                            ?>
                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="name" name="username" placeholder="Tên tài khoản" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" value="<?php echo $_POST['username'] ?? ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="name" name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="<?php echo $_POST['password'] ?? ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="email" class="form-control" id="name" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="<?php echo $_POST['email'] ?? ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Lưu thông tin</label>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="g-recaptcha" data-sitekey="6LeS-SMpAAAAALMBsG0wE-6kX2DLSh2QV3wXS4W_"></div>

                                <br>
                                <button type="submit" value="submit" class="primary-btn">Đăng ký</button>
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->



</body>