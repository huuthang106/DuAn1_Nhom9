<body id="page-top">
    <div id="wrapper">
        <?php
        include '../include/header_admin.php';
        ?>
        <!-- Sidebar -->
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Quản lý nhân viên</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Nhân viên</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng nhân viên</h6>
                        </div>
                        <?php
                        if ($_SESSION['role'] == 0) {
                            echo '
                                      <div class="table-responsive p-3">
                                            <a href="index.php?act=add_staffs" class="btn btn-sm btn-success">Thêm nhân viên</a><br><br>
                                            <table class="table align-items-center table-flush" id="dataTable">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tài khoản</th>
                                                       
                                                        <th>Họ tên</th>
                                                        <th>Email</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên tài khoản</th>
                                                    
                                                        <th>Họ tên</th>
                                                        <th>Email</th>
                                                        <th>Số điện thoại</th>
                                                        <th>Xóa</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                      ';

                            if (isset($_GET['user_id'])) {
                                staff_delete($_GET['user_id']);
                            }
                            $staff = user_selectall();
                            foreach ($staff as $users) {
                                extract($users);
                                $edit_link = "index.php?act=update_staffs&user_id=" . $user_id;
                                $del_link = "index.php?act=staffs&user_id=" . $user_id;
                                if ($role == 2) {
                                    echo '
                                            
                                                <tr>
                                                    <td>' . $user_id . '</a></td>
                                                    <td>' . $username . '</td>
                                                   
                                                    <td>' . $fullname . '</td>
                                                    <td>' . $email . '</td>
                                                    <td>' . $phone . '</td>                                                   
                                                    <td><a href="' . $del_link . '" class="btn btn-sm btn-danger">Xóa</a></td>
                                                </tr>
                                            
                                            ';
                                } else {
                                    echo '                     

                                        ';
                                }
                            }
                        } else {
                            echo '
                                    <div class="table-responsive p-3">
                                    <table class="table align-items-center table-flush" id="dataTable">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Họ tên</th>
                                                <th>Số điện thoại</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên tài khoản</th>
                                                <th>Số điện thoại</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    ';
                            $staff = user_selectall();
                            foreach ($staff as $users) {
                                extract($users);
                                if ($role == 2) {
                                    if (empty($fullname) && !empty($phone)) {
                                        echo '  
                                          
                                          <tr>
                                              <td>' . $user_id . '</td>
                                              <td>
                                              <i style="color: #721c24" class="fa-solid fa-circle-exclamation"></i> Chưa cung cấp tên !
                                              </td>
                                              <td>' . $phone . '</td>
                                          </tr>
                                      
                                      ';
                                    } else if (empty($phone) && !empty($fullname)) {
                                        echo '  
                                          
                                          <tr>
                                              <td>' . $user_id . '</td>
                                              <td>' . $fullname . '</td>
                                              <td>
                                              <i style="color: #721c24" class="fa-solid fa-circle-exclamation"></i> Chưa cung cấp Số điện thoại !
                                              </td>
                                          </tr>
                                      
                                      ';
                                    } else if (empty($fullname) && empty($phone)) {
                                        echo '  
                                          
                                          <tr>
                                              <td>' . $user_id . '</td>
                                              <td>
                                              <i style="color: #721c24" class="fa-solid fa-circle-exclamation"></i> Chưa cung cấp thông tin !
                                              </td>
                                              <td></td>
                                          </tr>
                                      
                                      ';
                                    } else {
                                        echo '  
                                          
                                          <tr>
                                              <td>' . $user_id . '</a></td>
                                              <td>' . $fullname . '</td>
                                              <td>' . $phone . '</td>
                                          </tr>
                                      
                                      ';
                                    }
                                } else {
                                    echo '                     

                                      ';
                                }
                            }
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- DataTable with Hover -->

        </div>


    </div>
    </div>
    </div>


    <!-- Footer -->


    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php
    include '../include/footer_admin.php';
    ?>


</body>

</html>