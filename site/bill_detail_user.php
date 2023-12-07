<body id="page-top">
    <div id="wrapper">
        <?php
        include './include/nav.php';
        ?>
        <!-- Sidebar -->
        <!-- Topbar -->
        <!-- Container Fluid-->
        <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Chi tiết đơn</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php?act=user">Tài khoảng<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Chi tiết đơn</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
        <div class="container-fluid" id="container-wrapper">
          

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"> Chi tiết đơn hàng</h6>
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
                                            <td>' . number_format($total)    . ' VNĐ</td>
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
    include("./include/footer.php")
    ?>



    <!-- Scroll to top -->

</body>