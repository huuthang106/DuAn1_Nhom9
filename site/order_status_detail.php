<body>
    <?php
include("./include/nav.php");
?>
    <!-- Start Header Area -->

    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Trạng thái đơn hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php?act=tracking">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=order_status">Trạng thái đơn hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Tracking Box Area =================-->
    <section class="tracking_box_area section_gap">
        <div class="container">
            <div class="tracking_box_inner">
                <div class="row">
                    <!-- Datatables -->
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Trạng thái đơn hàng</h6>
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
    </section>
    <!--================End Tracking Box Area =================-->

    <!-- start footer Area -->
    <?php
	include("./include/footer.php");
	?>
    <!-- End footer Area -->



</body>

</html>