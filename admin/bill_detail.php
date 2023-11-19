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
                <h1 class="h3 mb-0 text-gray-800">Chi tiết đơn</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý đơn</li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"> Chi tiết đơn hảng</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng thanh toán</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng thanh toán</th>
                                        <th>Số điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $bill_detail = new bill_details();
                                    foreach ($bill_detail->get_bill_id($_GET['bill_id']) as $bill) {
                                        extract($bill);
                                        echo '
                                            <tr>
                                            <td>' . $bill_id . '</td>
                                           
                                            ';
                                        if ($pay == 1) {
                                            echo '
                                                <td>Thanh toán khi nhận hàng</td>
                                                ';
                                        } else {
                                            echo '
                                                    <td>Chuyển khoảng</td>
                                                ';
                                        }
                                        echo '
                                          
                                            <td>' . $name . '</td>
                                            <td>' . $quantity . '</td>
                                            <td>' . $total . '</td>
                                            <td>' . $sdt . '</td>
                                            <td>' . $address . '</td>
                                            <td>' . $day . '</td>
                                        </tr>
                                            ';
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
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php
    include("../include/footer_admin.php")
    ?>



    <!-- Scroll to top -->

</body>