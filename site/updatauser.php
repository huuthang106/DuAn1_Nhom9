

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php?act=home"><img src="./content/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
					<h1>Cập nhật thông tin </h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Tài khoảng<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Cập nhật thông tin </a>
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
						<img class="img-fluid" src="./content/img/login.jpg" alt="">
						<div class="hover">
							<h4>Lưu ý trước khi cập nhật</h4>
							<p>Sau khi cập nhật thông tin cá nhân của bạn sẽ thay đổi bạn đưọc quyền thay đổi  nhiều lần. Nếu không cập nhật hãy bấm quay về </p>
							<a class="primary-btn" href="index.php?act=user">Quay về</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Cập nhật thông tin</h3>
						<form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" value="Nguyễn Hữu Thắng" placeholder="Họ tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ tên' ">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="address" name="address" value="An Giang" placeholder="Địa chỉ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="phone" name="phone" value="0384975832" placeholder="Số điện thoại" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số điện thoại'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" value="thangnhpc06404@fpt.edu.vn" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="file" class="form-control" id="img" name="img" value="" placeholder="avatar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'avatar'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Đồng ý cập nhật</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Cập nhật</button>
							
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

