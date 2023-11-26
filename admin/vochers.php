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
                <h1 class="h3 mb-0 text-gray-800">Mã giảm giá</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Mã giảm giá</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Mã giảm giá</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã giảm giá</th>
                                        <th>Tên mã</th>
                                        <th>Giá trị</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>


                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Mã giảm giá</th>
                                        <th>Tên mã</th>
                                        <th>Giá trị</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $vochers = new vochers();
                                    $item_vocher = $vochers->get_vochers_all();
                                    if ($item_vocher) {

                                        foreach ($item_vocher as $key) {
                                            extract($key);
                                            $edit_link = 'index.php?act=editvocher&vocher_id=' . $vocher_id;
                                            $dell_link = 'index.php?act=vochers&vocher_id=' . $vocher_id . '&status=1';
                                            $update_link = 'index.php?act=vochers&vocher_id=' . $vocher_id . '&status=0';
                                            if ($status ==1) {
                                                echo '
                                                <tr>
                                                    <td>' . $vocher_id . '</a></td>
                                                    <td>' . $name . '</td>
                                                    <td>' . $sale . '</td>
                                                    <td><a href="' . $edit_link . '" class="btn btn-sm btn-danger">Sửa</a></td>
                                                    <td><a href="' . $update_link . '" class="btn btn-sm btn-danger">Xóa</a></td>
                                                 </tr>
                                                ';
                                            } else {
                                                echo '
                                                <tr>
                                                    <td>' . $vocher_id . '</a></td>
                                                    <td>' . $name . '</td>
                                                    <td><a href="' . $edit_link . '" class="btn btn-sm btn-danger">Sửa</a></td>
                                                    <td><a href="' . $dell_link . '" class="btn btn-sm btn-success">Hiện</a></td>
                                                 </tr>
                                                ';
                                            }
                                        }
                                    }
                                    if (isset($_GET['vocher_id']) && isset($_GET['status'])) {
                                        $update_vocher = new vochers();
                                       $update_vocher->update_status_vocher($_GET['vocher_id'], $_GET['status']);
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


        </div>

        <!-- Footer -->


    </div>
    </div>
    </div>


    <?php
    include '../include/footer_admin.php';
    ?>

    </div>
    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>