<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title></title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

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
                <h1 class="h3 mb-0 text-gray-800">Thông tin tài khoảng</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoảng</li>
                </ol>
            </div>

           
                <!-- Earnings (Monthly) Card Example 
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                        <span>Since last month</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- Earnings (Annual) Card Example 
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                        <span>Since last years</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- New User Card Example 
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                        <span>Since last month</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- Pending Requests Card Example
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                        <span>Since yesterday</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Pie Chart -->
                <div class="row mb-3">
                <div class="col-xl-4 col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            <div class="dropdown no-arrow">
                                <!--<a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Month <i class="fas fa-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Select Periode</div>
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Week</a>
                                    <a class="dropdown-item active" href="#">Month</a>
                                    <a class="dropdown-item" href="#">This Year</a>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct">
                                        <div class="avarta"><img src="../content/img/' . $avarta . '" alt=""></div>
                                    </a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Tên:<span class="number"
                                            style="color: black; font-style: italic;">Admin</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Địa chỉ<span class="number"
                                            style="color: black; font-style: italic;">' . $address . '</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Điện thoại<span class="number"
                                            style="color: black; font-style: italic;">0' . $phone . '</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Gmail<span class="number"
                                            style="color: black; font-style: italic;">' . $email . '</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list" style="margin-bottom: 2%">
                                    <a href="' . $updata . '">
                                        <button class="btn btn-primary">Cập nhật thông tin</button>
                                    </a>
                                </li>
                                <li class="main-nav-list">
                                    <a href="index.php?act=logout">
                                        <button class="btn btn-primary">Đăng xuất</button></a>
                                </li>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                            </div>
                        <div class="dropdown no-arrow">
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush" id="dataTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Mã đơn </th>
                                            <th>Chi tiết</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mã đơn </th>
                                            <th>Chi tiết</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Chưa duyệt</td>
                                            <td><a href="#">
                                                    <button class="btn btn-primary">Xem</button></a></td>
                                            <td> Chưa duyệt </td>
                                        </tr>
                                        <td> đang vận chuyển </td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <!--Row-->

        <!-- <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin" class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
                        </div>
                    </div>

                  Modal Logout 
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

                </div>-->
        <!---Container Fluid-->
    </div>
    </div>
    </div>
    <?php
    include '../include/footer_admin.php';
    ?>

    <!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
                    </div>
                </div>
             
                <div class="container my-auto py-2">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - distributed by
              <b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
            </span>
                    </div>
                </div>
            </footer>-->
    <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>