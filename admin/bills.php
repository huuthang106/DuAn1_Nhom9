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
                <h1 class="h3 mb-0 text-gray-800">Quản lý đơn hàng</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Đơn hàng</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
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
                                    foreach ($get_bill->get_bills() as $key) {
                                        extract($key);
                                        $khoi_phuc = 'index.php?act=bills&bill_id='.$bill_id.'&status=1';
                                        $duyet_don = 'index.php?act=bills&bill_id='.$bill_id.'&status=2';
                                        $giao_don = 'index.php?act=bills&bill_id='.$bill_id.'&status=3';
                                        $huy_don = 'index.php?act=bills&bill_id='.$bill_id.'&status=4';
                                        $detai_bill='index.php?act=bill_detail&bill_id='.$bill_id;
                                        
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
                                        } else if( $status == 4) {
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
                                    if (isset($_GET['bill_id'])&& isset($_GET['status'])) {
                                        # code...
                                       
                                        $status = new bills();
                                        $status->update_status_bill($_GET['bill_id'],$_GET['status']);
                                        
                                        exit;
              
                                      }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DataTable with Hover -->

            </div>
            <!--Row-->

            <!-- Documentation Link -->


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
    </footer>
    <!-- Footer -->
    </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

</html>