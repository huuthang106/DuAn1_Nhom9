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
                <h1 class="h3 mb-0 text-gray-800">Quản lý Khách hàng</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Khách hàng</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng khác hàng</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Xóa</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if(isset($_GET['user_id'])){
                                      staff_delete($_GET['user_id']);
                                    }
                                    $staff = user_selectall();
                                    foreach ($staff as $users){
                                        extract($users);
                                        $edit_link= "index.php?act=update_staffs&user_id=".$user_id;
                                        $del_link = "index.php?act=staffs&user_id=".$user_id;
                                        if($role == 1){
                                            echo '
                                            
                                                <tr>
                                                    <td>'.$user_id.'</a></td>
                                                    <td>'.$fullname.'</td>
                                                    <td>'.$phone.'</td>
                                                    <td>'.$address.'</td>                                                     
                                                    <td><a href="'.$del_link.'" class="btn btn-sm btn-danger">Xóa</a></td>
                                                </tr>
                                            
                                            ';
                                        }else{
                                        echo '                     

                                        ';
                                        }
                                    }
                                  
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DataTable with Hover -->

                <!--Row-->

                <!-- Documentation Link -->
               

            </div>
            <!---Container Fluid-->
        </div>  

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <?php
            include '../include/footer_admin.php';
        ?>
      
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



</body>

</html>