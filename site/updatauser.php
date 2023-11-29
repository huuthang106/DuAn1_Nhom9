<style>
	#imagePreview {
		width: 100%;
		max-height: 200px;
		margin-top: 10px;
		display: none;
	}
</style>

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
							<p>Sau khi cập nhật thông tin cá nhân của bạn sẽ thay đổi bạn đưọc quyền thay đổi nhiều lần. Nếu không cập nhật hãy bấm quay về </p>
							<a class="primary-btn" href="index.php?act=user">Quay về</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Cập nhật thông tin</h3>
						<?php
						if (isset($_SESSION['user_id'])) {
							$get_user = new users();
							foreach ($get_user->get_user_id($_SESSION['user_id']) as $key) {
								# code...
								extract($key);



						?>
								<form class="row login_form" action="index.php?act=updata&user_id=<?= $user_id ?>" method="POST" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">

									<div class="col-md-12 form-group">
										<input type="text" class="form-control" id="name" name="fullname" value="<?= $fullname ?>" placeholder="Họ tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ tên' ">
									</div>
									<div class="col-md-12 form-group">
										<input type="text" class="form-control" id="address" name="address" value="<?= $address ?>" placeholder="Địa chỉ" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ'">
									</div>
									<div class="col-md-12 form-group">
										<input type="text" class="form-control" id="phone" name="phone" value="<?= $phone ?>" placeholder="Số điện thoại" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số điện thoại'">
									</div>
									<div class="col-md-12 form-group">
										<input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'">
									</div>
									<div class="col-md-12 form-group">
										<input type="file" class="form-control" id="img" name="img" value="<?= $avarta ?>" placeholder="avatar" onfocus="this.placeholder = ''" onblur="this.placeholder = 'avatar'" onchange="previewImage(this);">
									</div>

									<div class="col-md-8 form-group">

										<img id="imagePreview" src="#" alt="Preview">

									</div>

									<div class="col-md-12 form-group">
										<div class="creat_account">
											<input type="checkbox" id="f-option2" name="selector">
											<label for="f-option2">Đồng ý cập nhật</label>
										</div>
									</div>

									<div class="col-md-12 form-group">
										<button type="submit" value="submit" name="submit" class="primary-btn">Cập nhật</button>

									</div>
								</form>
						<?php
							}
						}


						if (isset($_POST['submit'])) {
							$fullname = trim($_POST['fullname']);
							$address = trim($_POST['address']);
							$phone = trim($_POST['phone']);
							$email = trim($_POST['email']);
							$avarta = $_FILES['img']['name'];
							$user_id = trim($_SESSION['user_id']);
							$get_phone = new users();
							$item_phone = $get_phone->get_phone();

							$phoneExists = false;
							$uploadOk = 1;
							// foreach ($item_phone as $existing_phone) {
							// 	if ($phone == $existing_phone['phone']) {
							// 		// Số điện thoại đã tồn tại, đặt biến cờ và dừng vòng lặp
							// 		$phoneExists = true;
							// 		break;
							// 	}
							// }

							// if ($phoneExists) {
							// 	// Số điện thoại đã tồn tại, thông báo lỗi
							// 	echo '<div class="col-md-12 form-group">
							// 		<div class="error-message">
							// 			<i class="fa-solid fa-circle-exclamation"></i> Số điện thoại đã được sử dụng !
							// 		</div><br>
							// 	</div>';
							// 	$uploadOk = 0;
							// }
							 if (empty($fullname) || empty($address) || empty($phone)) {
								echo '<div class="col-md-12 form-group">
									<div class="error-message">
										<i class="fa-solid fa-circle-exclamation"></i> Địa chỉ tên và số điện thoại không được trống  !
									</div><br>
								</div>';
								$uploadOk = 0;
							} elseif (!preg_match('/^0\d{8,10}$/', $phone)) {
								echo '<div class="col-md-12 form-group">
									<div class="error-message">
										<i class="fa-solid fa-circle-exclamation"></i> Số điện thoại không đúng !
									</div><br>
								</div>';
								$uploadOk = 0;
							} elseif (isset($avarta)) {
								$file_name = $_FILES["img"]["name"];
								$file_tmp = $_FILES["img"]["tmp_name"];
								$file_size = $_FILES["img"]["size"];
								$allowed_formats = ['png', 'jpg'];
								$file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
					
								if (!in_array($file_extension, $allowed_formats)) {
								  echo '</br><div  class="error-message">
							  <i class="fa-solid fa-circle-exclamation"></i> Chỉ chấp nhận định dạng PNG và JPG.
							  </div>';
								}
								 else if ($file_size > 1 * 1024 * 1024) { // Kiểm tra dung lượng file (5MB)
								  echo '</br><div  class="error-message">
							  <i class="fa-solid fa-circle-exclamation"></i> Kích thước file ảnh không được vượt quá 5MB.
							  </div>';
								}
								else {
									$avarta_file = save_file('img', $UPLOAD_URL_USER);
									$updata = new users();
								$insert = $updata->update_user($fullname, $address, $phone, $email, $avarta, $user_id);}
							} else {
								// Số điện thoại không trùng, thực hiện các lệnh tiếp theo
								// $updata = new users();
								// $insert = $updata->update_user($fullname, $address, $phone, $email, $avarta, $user_id);
								echo 'hello';
							}
						}


						?>
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