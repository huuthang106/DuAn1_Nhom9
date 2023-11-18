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
                                                                                                            echo '' . $avg_comments . '';
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
                            <h6 class="m-0 font-weight-bold text-light">Message From Customer</h6>
                        </div>
                        <div>
                            <div class="customer-message align-items-center">
                                <a class="font-weight-bold" href="#">
                                    <div class="text-truncate message-title">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                    <div class="small text-gray-500 message-time font-weight-bold">Udin Cilok · 58m</div>
                                </a>
                            </div>
                            <div class="customer-message align-items-center">
                                <a href="#">
                                    <div class="text-truncate message-title">But I must explain to you how all this mistaken idea
                                    </div>
                                    <div class="small text-gray-500 message-time">Nana Haminah · 58m</div>
                                </a>
                            </div>
                            <div class="customer-message align-items-center">
                                <a class="font-weight-bold" href="#">
                                    <div class="text-truncate message-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                    </div>
                                    <div class="small text-gray-500 message-time font-weight-bold">Jajang Cincau · 25m</div>
                                </a>
                            </div>
                            <div class="customer-message align-items-center">
                                <a class="font-weight-bold" href="#">
                                    <div class="text-truncate message-title">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                    </div>
                                    <div class="small text-gray-500 message-time font-weight-bold">Udin Wayang · 54m</div>
                                </a>
                            </div>
                            <div class="card-footer text-center">
                                <a class="m-0 small text-primary card-link" href="#">View More <i class="fas fa-chevron-right"></i></a>
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
                                    foreach ($get_bill->get_newest_bills() as $key) {
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
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Message From Customer-->
              
            </div>
            <!--Row-->

            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin" class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
                </div>
            </div>

            <!-- Modal Logout -->
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

        </div>
        <!---Container Fluid-->
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>copyright &copy; <script>
                        document.write(new Date().getFullYear());
                    </script> - developed by
                    <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
                </span>
            </div>
        </div>

        <div class="container my-auto py-2">
            <div class="copyright text-center my-auto">
                <span>copyright &copy; <script>
                        document.write(new Date().getFullYear());
                    </script> - distributed by
                    <b><a href="https://themewagon.com/" target="_blank">themewagon</a></b>
                </span>
            </div>
        </div>
    </footer>
    <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


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