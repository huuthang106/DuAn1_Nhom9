<!DOCTYPE html>
<html lang="en">

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
    <!-- Sidebar -->
    <?php
    include '../include/header_admin.php';
    ?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
      
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thông tin tài khoảng</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Trang chủ</a></li>
              <li class="breadcrumb-item" aria-current="page">Thông tin tài khoảng</li>
            </ol>
          </div>

        
              <!-- Row-->

              <div class="row mb-3">
                <div class="col-xl-4 col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            <div class="dropdown no-arrow">
                               
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
                                        <button style="width: 200px" class="btn btn-primary">Cập nhật thông tin</button>
                                    </a>
                                </li>
                                <li class="main-nav-list">
                                    <a href="index.php?act=logout">
                                        <button style="width: 200px"  class="btn btn-primary">Đăng xuất</button></a>
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
           
          
          <?php
          include '../include/footer_admin.php';
          ?>
          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
          <script src="js/ruang-admin.min.js"></script>

</body>

</html>