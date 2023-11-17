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
                        <form class="row login_form" action="index.php?act=register" method="post" id="contactForm"
                            novalidate="novalidate">
                            <?php
								if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
									$username = $_POST['username'];
									$password = $_POST['password'];
									$email = $_POST['email'];
									if(empty($username)){
										$error = '
                                        <div class="col-md-12 form-group">
                                        <div style="color:#721c24;" class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập tên tài khoản !
                                        </div>
                                        </div>
                                        ';
                                                    
									}elseif(empty($password)){
										$error = '
                                        <div class="col-md-12 form-group">
                                        <div style="color:#721c24;" class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập mật khẩu !
                                        </div>
                                        </div>
                                        ';
									}elseif(empty($email)){
										$error = '
                                        <div class="col-md-12 form-group">
                                        <div style="color:#721c24;" class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập email !
                                        </div>
                                        </div>
                                        ';
									}

									if(isset($error)){
										echo $error;
									}else{
										$existingUsernames = array_column(user_selectall(), 'username');
										$existingEmail = array_column(user_selectall(), 'email');
										if(in_array($username, $existingUsernames)){
											echo '
											<div class="col-md-12 form-group">
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Tài khoản đã tồn tại !!!
											</div>
											</div>
											';
											
										}
										else if(in_array($email, $existingEmail)){
											echo '
											<div class="col-md-12 form-group">
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Email đã được sử dụng !!!
											</div>
											</div>
										';
										} else {
											user_register($username, $password, $email);
											echo '
											<div class="col-md-12 form-group">
											<div class="success-message">
											<i class="fa-solid fa-circle-check"></i> Đăng ký tài khoản thành công !			
											</div>
											</div>
											';
										}
									}
								}
							?>
                            <div class="col-md-12 form-group">
                                <input required type="text" class="form-control" id="name" name="username"
                                    placeholder="Tên tài khoản" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Username'"
                                    value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="name" name="password"
                                    placeholder="Mật khẩu" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'"
                                    value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="email" class="form-control" id="name" name="email"
                                    placeholder="Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'"
                                    value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Lưu thông tin</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
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