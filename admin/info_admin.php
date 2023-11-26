<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>RuangAdmin - Progress Bars</title>
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
            <div class="row mb-3">
                <div class="col-xl-4 col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            <div class="dropdown no-arrow">
                                
                            </div>
                        </div>

                        <?php
                        $fullname = new users();
                        foreach ($fullname->get_user_id($_SESSION['user_id']['user_id']) as $key) {
                            extract($key);
                            echo '
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
                                            style="color: black; font-style: italic;">' . $fullname . '</span></a></li>
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
                                    <a href="index.php?act=update">
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
                </div>';
                        }
                        ?>
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                                </div>
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

                                            <?php
                                            $bill = new bills();
                                            $select = $bill->get_bill_user_id($user_id);

                                            if ($select !== false) {
                                                foreach ($select as $key) {
                                                    // Xử lý dữ liệu ở đây
                                                    extract($key);
                                                    $bill_detail = 'index.php?act=';
                                                    echo '
                                        <tr>
                                        <td>' . $bill_id . '</td>
                                        <td><a href="#">
                                        <button class="btn btn-primary">Xem</button></a></td>

                                        ';
                                                    if ($status == 1) {
                                                        # code...
                                                        echo '
                                            <td> Chưa duyệt </td>
                                             </tr>
                                    ';
                                                    } else {
                                                        echo '
                                            <td> đang vận chuyển </td>
                                             </tr>
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


                        <!---Container Fluid-->
                    </div>
                </div>
            </div>
        </div>
        <?php
        include '../include/footer_admin.php';
        ?>
    </div>
    </div>
    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>