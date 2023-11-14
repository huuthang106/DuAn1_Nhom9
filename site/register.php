<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php?act=home"><img src="./content/img/logo.png"
                            alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php
					include("./include/nav.php");
					?>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
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
										$error = '<div style="color:#721c24;" class="error">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập tên tài khoản !
													</div>';
									}elseif(empty($password)){
										$error = '<div style="color:#721c24" class="error">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập mật khẩu !
													</div>';
									}elseif(empty($email)){
										$error = '<div style="color:#721c24" class="error">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập email !
													</div>';
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
                                    onblur="this.placeholder = 'Username'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="password" class="form-control" id="name" name="password"
                                    placeholder="Mật khẩu" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input required type="email" class="form-control" id="name" name="email"
                                    placeholder="Email" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
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