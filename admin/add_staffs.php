
<body>
    
</body>
<div id="wrapper">
    <?php
    include '../include/header_admin.php';
    ?>
    <!-- Sidebar -->
    <!-- Topbar -->
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm nhân viên</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                <li class="breadcrumb-item">Quản lý</li>
                <li class="breadcrumb-item active" aria-current="page">Thêm nhân viên</li>
            </ol>
        </div>

        <div class="container">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <?php
                    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['fullname']) && isset($_POST['phone'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        $role = $_POST['role'];
                        $fullname = $_POST['fullname'];
                        $phone = $_POST['phone'];
                        if (empty($username)) {
                            $error = '<div class="error-message" style="color:#721c24;">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập tên tài khoản !
													</div>';
                        } elseif (empty($password)) {
                            $error = '<div class="error-message" style="color:#721c24">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập mật khẩu !
													</div>';
                        } elseif (empty($email)) {
                            $error = '<div class="error-message" style="color:#721c24">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập email !
													</div>';
                        } elseif (empty($fullname)) {
                            $error = '<div class="error-message" style="color:#721c24">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập đầy đủ họ tên !
													</div>';
                        } elseif ((strlen($phone) > 11) || empty($phone)) {
                            $error = '<div class="error-message" style="color:#721c24">
													<i class="fa-solid fa-circle-exclamation"></i> Số điện thoại không hợp lệ !
													</div>';
                        }

                        if (isset($error)) {
                            echo $error;
                        } else {
                            $existingUsernames = array_column(user_selectall(), 'username');
                            $existingEmail = array_column(user_selectall(), 'email');
                            $existingPhone = array_column(user_selectall(), 'phone');
                            if (in_array($username, $existingUsernames)) {
                                echo '
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Tài khoản đã tồn tại !!!
											</div>
											';
                            } else if (in_array($email, $existingEmail)) {
                                echo '
										
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Email đã được sử dụng !!!
											</div>
											
										';
                            } else if (in_array($phone, $existingPhone)) {
                                echo '
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Số điện thoại đã được sử dụng !!!
											</div>
											
										';
                            } else {
                                staff_insert($username, $password, $email, $role, $fullname, $phone);
                                echo '
											
											<div class="success-message">
											<i class="fa-solid fa-circle-check"></i> Đăng ký tài khoản thành công !			
											</div>
                                            
											';
                                $_POST['username'] = '';
                                $_POST['password'] = '';
                                $_POST['email'] = '';
                                $_POST['role'] = '';
                                $_POST['fullname'] = '';
                                $_POST['phone'] = '';
                            }
                        }
                    }
                    ?>
                    <h5 class="information mt-4">Thêm nhân viên</h5>
                    <h6 class="information mt-4">Ghi chú (<span style="color:red">*</span>) bắc buộc !</h6>
                    <h6 class="information mt-4">Tên tài khoản<span style="color:red">*</span></h6>
                    <form action="index.php?act=add_staffs" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="username" value="<?php echo $_POST['username'] ?? ''; ?>" placeholder="">
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Mật khẩu<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Email<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Họ và tên<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="fullname" value="<?php echo $_POST['fullname'] ?? ''; ?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Số điện thoại<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="phone" value="<?php echo $_POST['phone'] ?? ''; ?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Vai trò</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input readonly class="form-control" type="text" name="role" value="2" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> </div> <button type="submit" class="btn btn-primary btn-block confirm-button">Thêm mới</button>
                    </form>

                </div>
            </div>
        </div><br>
        <!--Row-->

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!---Container Fluid-->
</div>
<!-- Footer -->
<?php
    include("../include/footer_admin.php");
?>
<!-- Footer -->
                </body>