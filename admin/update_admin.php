<style>
  #imagePreview {
    width: 30%;
    max-height: 200px;
    margin-top: 10px;
    display: none;
  }
</style>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
    include '../include/header_admin.php';
    ?>
    <!-- Sidebar -->


    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin</li>
        </ol>
      </div>

      <?php
      if (isset($_SESSION['user_id'])) {
        $get_admin = new users();
        foreach ($get_admin->get_user_id($_SESSION['user_id']['user_id']) as $key) {
          extract($key);



      ?>
          <form class="row login_form" action="index.php?act=update&user_id=<?= $user_id ?>" method="POST" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">

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
              <button type="submit" value="submit" name="submit" class="btn btn-primary">Cập nhật</button>

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
        $get_phone = new users();
        $item_phone = $get_phone->get_phone();

        $phoneExists = false;
        $uploadOk = 1;
        // foreach ($item_phone as $existing_phone) {
        //   if ($phone == $existing_phone['phone']) {
        //     // Số điện thoại đã tồn tại, đặt biến cờ và dừng vòng lặp
        //     $phoneExists = true;
        //     break;
        //   }
        // }
        if (empty($fullname) || empty($address) || empty($phone)) {
          echo '<div class="col-md-12 form-group">
									<div class="error-message">
										<i class="fa-solid fa-circle-exclamation"></i> Địa chỉ tên và số điện thoại không được trống  !
									</div><br>
								</div>';
          $uploadOk = 0;
        } elseif ($phoneExists) {
          // Số điện thoại đã tồn tại, thông báo lỗi
          echo '<div class="col-md-12 form-group">
									<div class="error-message">
										<i class="fa-solid fa-circle-exclamation"></i> Số điện thoại đã được sử dụng !
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
          if ($uploadOk) {
            $file_name = $_FILES["img"]["name"];
            $file_tmp = $_FILES["img"]["tmp_name"];
            $file_size = $_FILES["img"]["size"];

            // Kiểm tra đuôi file
            $allowed_formats = ['png', 'jpg'];
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if (!in_array($file_extension, $allowed_formats)) {
              echo '</br><div  class="error-message">
          <i class="fa-solid fa-circle-exclamation"></i> Chỉ chấp nhận định dạng PNG và JPG.
          </div>';
            } else if ($file_size > 5 * 1024 * 1024) { // Kiểm tra dung lượng file (5MB)
              echo '</br><div  class="error-message">
          <i class="fa-solid fa-circle-exclamation"></i> Kích thước file ảnh không được vượt quá 5MB.
          </div>';
            } else {
              $avarta_file = save_file('img', $UPLOAD_URL);
              // Số điện thoại không trùng, thực hiện các lệnh tiếp theo
              $updata = new users();
              $insert = $updata->update_users($fullname, $address, $phone, $email, $avarta, $user_id);
            }
          }
        } else {
          $updata = new users();
          $insert = $updata->update_users($fullname, $address, $phone, $email, $avarta, $user_id);
        }
      }

      ?>
      <!---Container Fluid-->
    </div>
  </div>
  </div>
  <!-- Footer -->
  <?php
  include '../include/footer_admin.php';
  ?>

  </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script> -->
</body>