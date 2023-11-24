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
                                            <th>Mã đơn hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Chi tiết đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Tên khách hàng</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Chi tiết đơn hàng</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if(isset($_GET['bill_id'])){
                                                $bill = bills_selectalls($_GET['bill_id']);
                                            foreach ($bill as $bills) {
                                                extract($bills);
                                                $user = users_selectall($user_id);
                                                $detail_link = "index.php?act=order_status_detail&bill_id=".$bill_id;
                                                if($status == 1){
                                                    echo '                     
                                                        <tr>
                                                            <td>' . $bill_id . '</a></td>
                                                            <td style="font-weight: bold">' .$user['fullname']. '</td>
                                                            <td>Chưa duyệt</td>
                                                            <td><a href="' . $detail_link . '" class="btn btn-sm btn-primary">Chi tiết</a></td>
                                                        </tr>    
                                                    ';
                                                }elseif($status == 2){
                                                    echo '                     
                                                        <tr>
                                                            <td>' . $bill_id . '</a></td>
                                                            <td style="font-weight: bold">' .$user['fullname']. '</td>
                                                            <td>Đã duyệt</td>
                                                            <td><a href="' . $detail_link . '" class="btn btn-sm btn-primary">Chi tiết</a></td>
                                                        </tr>    
                                                    ';
                                                }elseif($status == 3){
                                                    echo '                     
                                                        <tr>
                                                            <td>' . $bill_id . '</a></td>
                                                            <td style="font-weight: bold">' .$user['fullname']. '</td>
                                                            <td>Đã giao</td>
                                                            <td><a href="' . $detail_link . '" class="btn btn-sm btn-primary">Chi tiết</a></td>
                                                        </tr>    
                                                    ';
                                                }elseif($status == 4){
                                                    echo '                     
                                                        <tr>
                                                            <td>' . $bill_id . '</a></td>
                                                            <td style="font-weight: bold">' .$user['fullname']. '</td>
                                                            <td>Đã Hủy</td>
                                                            <td><a href="' . $detail_link . '" class="btn btn-sm btn-primary">Chi tiết</a></td>
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