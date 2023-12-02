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
                <h1 class="h3 mb-0 text-gray-800">Bảng điều khiển</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Bảng điều khiển</li>
                </ol>
            </div>

            <div class="row mb-3">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Doanh thu</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                        $monthly_revenue = new bill_details;
                                                                                        $item = $monthly_revenue->monthly_revenue();
                                                                                        $format = number_format($item[0]['total_sum']);
                                                                                        if ($item) {
                                                                                            if($item[0]['total_sum']>0){
                                                                                            echo '' .$format  . '';
                                                                                            }
                                                                                            else{
                                                                                                echo '0';
                                                                                            }
                                                                                        }
                                                                                        ?></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php
                                                                                                        $growth = new bill_details();
                                                                                                        $key = $growth->growth();
                                                                                                        if ($key) {

                                                                                                            echo '' . $key . '%';
                                                                                                        } else {
                                                                                                            echo 'Đang xử lý';
                                                                                                        }
                                                                                                        ?></span>
                                        <span>Tháng vừa qua</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Đơn hàng</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php $count_bill = new bills();

                                        foreach ($count_bill->count_bill() as $key) {
                                            extract($key);
                                            echo '' . $bill_count . '';
                                        }

                                        ?></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> <?php
                                                                                                        $avs = new bill_details();
                                                                                                        foreach ($avs->avs_bill() as $key) {
                                                                                                            extract($key);
                                                                                                            $rounding = number_format($avg_bills_percentage, 2);
                                                                                                            echo '' . $rounding . '%';
                                                                                                        }
                                                                                                        ?></span>
                                        <span>Tháng vừa qua</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New User Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Người dùng</div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php
                                                                                                $count_user = new users();
                                                                                                $key = $count_user->count_user();
                                                                                                if ($key) {
                                                                                                    echo '' . $key[0]['total_users'] . '';
                                                                                                }
                                                                                                ?></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                        <span>Tháng vừa qua</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Bình luận</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                        $count = new comments();
                                                                                        foreach ($count->count_comments() as $key) {
                                                                                            extract($key);
                                                                                            echo '' . $count_comment_id . '';
                                                                                        }
                                                                                        ?></div>
                                    <div class="mt-2 mb-0 text-muted text-xs">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> <?php
                                                                                                        $AVG = new comments();
                                                                                                        foreach ($AVG->AVG_comment() as $key) {
                                                                                                            extract($key);
                                                                                                            echo '' . $avg_comments . '%';
                                                                                                        }
                                                                                                        ?></span>
                                        <span>Tháng vừa qua</span>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Báo cáo hàng tháng</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myChart" width="400" height="200"></canvas>

                                <?php
                                // Lấy dữ liệu thống kê từ PHP và lưu vào biến $data
                                $top_products = new bill_details;
                                $data = $top_products->top_product();

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card">
                        <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-light">Bài viết mới nhất</h6>
                        </div>
                        <div>
                            <?php
                            $blog = blogs_selectalls();
                            foreach ($blog as $blogs) {
                                extract($blogs);
                                echo '                     
                                        <div class="customer-message align-items-center">
                                            <a class="font-weight-bold" href="index.php?act=blogs">
                                                <div class="text-truncate message-title">' . $title . '</div>
                                                <div class="small text-gray-500 message-time font-weight-bold">Ngày đăng: ' . $day . '
                                                </div>
                                            </a>
                                        </div>
                                      ';
                            }
                            ?>
                            <div class="card-footer text-center">
                                <a class="m-0 small text-primary card-link" href="index.php?act=blogs">Xem thêm <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Example -->
                <div class="col-xl-12 col-lg-7 mb-4">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng đơn hàng</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Tên khách hàng</th>
                                        <th>Duyệt đơn</th>
                                        <th>Trạng thái</th>
                                        <th>Hủy đơn</th>
                                        <th>Chi tiết</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Tên khách hàng</th>
                                        <th>Duyệt đơn</th>
                                        <th>Trạng thái</th>
                                        <th>Hủy đơn</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $get_bill = new bills();
                                    $item = $get_bill->get_newest_bills();
                                    if ($item) {
                                        foreach ($item as $key) {
                                            extract($key);
                                            $khoi_phuc = 'index.php?act=home&bill_id=' . $bill_id . '&status=1';
                                            $duyet_don = 'index.php?act=home&bill_id=' . $bill_id . '&status=2';
                                            $giao_don = 'index.php?act=home&bill_id=' . $bill_id . '&status=3';
                                            $huy_don = 'index.php?act=home&bill_id=' . $bill_id . '&status=4';
                                            $detai_bill = 'index.php?act=bill_detail&bill_id=' . $bill_id;

                                            if ($status == 1) {

                                                # code...
                                                echo '
                                                <tr>
                                                <th>' . $bill_id . '</th>
                                                <th>' . $customer_name . '</th>
                                                
                                                <th><a href="' . $duyet_don . '" class="btn btn-sm btn-danger">Chưa duyệt</a></th>
                                                <th><a href="" class="btn btn-sm btn-danger">Chưa giao</a></th>
                                                <th><a href="' . $huy_don . '" class="btn btn-sm btn-danger">Hủy đơn</a></th>
                                                <th><a href="' . $detai_bill . '" class="btn btn-sm btn-primary">Chi tiết</a></th>
                                                </tr>
                                                ';
                                            } elseif ($status == 2) {
                                                echo '
                                                <tr>
                                                <tr>
                                                <th>' . $bill_id . '</th>
                                                <th>' . $customer_name . '</th>
                                                
                                                <th><a href="' . $duyet_don . '" class="btn btn-sm btn-success"> Đã duyệt</a></th>
                                                <th><a href="' . $giao_don . '" class="btn btn-sm btn-danger">Chưa giao</a></th>
                                                <th><a href="' . $huy_don . '" class="btn btn-sm btn-danger">Hủy đơn</a></th>
                                                <th><a href="' . $detai_bill . '" class="btn btn-sm btn-primary">Chi tiết</a></th>
                                            </tr>
                                                ';
                                            } elseif ($status == 3) {
                                                echo '
                                            <tr>
                                            <tr>
                                                <th>' . $bill_id . '</th>
                                                <th>' . $customer_name . '</th>
                                                
                                            <th><a href="#" class="btn btn-sm btn-success">Đã duyệt</a></th>
                                            <th><a href="' . $giao_don . '" class="btn btn-sm btn-success">Đã giao</a></th>
                                            <th><a href="' . $huy_don . '" class="btn btn-sm btn-danger">Hủy đơn</a></th>
                                            <th><a href="' . $detai_bill . '" class="btn btn-sm btn-primary">Chi tiết</a></th>
                                             </tr>
                                            ';
                                            } else if ($status == 4) {
                                                echo '
                                            <tr>
                                            <tr>
                                                <th>' . $bill_id . '</th>
                                                <th>' . $customer_name . '</th>
                                                
                                            <th><a href="#" class="btn btn-sm btn-danger">Đã Hủy</a></th>
                                            <th><a href="#" class="btn btn-sm btn-danger">Đã hủy</a></th>
                                            <th><a href="' . $khoi_phuc . '" class="btn btn-sm btn-danger">Khôi phục</a></th>
                                            <th><a href="#" class="btn btn-sm btn-danger">Đã Hủy</a></th>
                                             </tr>
                                            ';
                                            }
                                        }
                                        if (isset($_GET['bill_id']) && isset($_GET['status'])) {
                                            # code...

                                            $status = new bills();
                                            $status->update_status_bill_pagehome($_GET['bill_id'], $_GET['status']);

                                            exit;
                                        }
                                    }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Message From Customer-->

            </div>
            <!--Row-->



            <!-- Modal Logout -->

            <!-- Footer -->
        </div>
        <!---Container Fluid-->
    </div>
    <!-- Footer -->

    <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    </div>
    <?php
    include("../include/footer_admin.php");
    ?>
</body>
<script>
    // Đối tượng canvas để vẽ biểu đồ
    var ctx = document.getElementById('myChart').getContext('2d');

    // Lấy dữ liệu từ hàm getTopCommentedProducts
    var topProduct = <?php echo json_encode($data); ?>;

    // Tạo mảng dữ liệu cho biểu đồ
    var labels = [];
    var dataValues = [];

    // Lấy tên sản phẩm và số lượng bình luận
    for (var i = 0; i < topProduct.length; i++) {
        labels.push(topProduct[i].TenSP);
        dataValues.push(topProduct[i].SoLuongMua);
    }

    // Tạo biểu đồ cột
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sản phẩm được mua nhiều nhất',
                data: dataValues,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1,
                    precision: 0,
                    callback: function(value) {
                        return Number.isInteger(value) ? value : '';
                    }
                }
            }
        }
    });
</script>