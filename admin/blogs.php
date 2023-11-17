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
                <h1 class="h3 mb-0 text-gray-800">Quản lý bài viết</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                            <h6 class="m-0 font-weight-bold text-primary">Bảng bài viết</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <a href="index.php?act=add_blogs" class="btn btn-sm btn-success">Thêm bài viết</a><br><br>
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiều đề</th>
                                        <th>Ngày đăng</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tiều đề</th>
                                        <th>Ngày đăng</th>
                                        <th>Sửa</th>
                                        <th>Xóa</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if (isset($_GET['blog_id'])) {
                                        blogs_delete($_GET['blog_id']);
                                    }
                                    $blog = blogs_selectall();
                                    foreach ($blog as $blogs) {
                                        extract($blogs);
                                        $edit_link = "index.php?act=update_blogs&blog_id=" . $blog_id;
                                        $del_link = "index.php?act=blogs&blog_id=" . $blog_id;
                                        echo '                     
                                                <tr>
                                                    <td>' . $blog_id . '</a></td>
                                                    <td style="font-weight: bold">' . $title . '</td>
                                                    <td>' . $day . '</td>
                                                    <td><a href="' . $edit_link . '" class="btn btn-sm btn-primary">Sửa</a></td>
                                                    <td><a href="' . $del_link . '" class="btn btn-sm btn-danger">Xóa</a></td>
                                                </tr>    
                                      ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

                <!--Row-->

                <!-- Documentation Link -->
                <div class="row">
                    <div class="col-lg-12">
                        <p>DataTables is a third party plugin that is used to generate the demo table below. For more
                            information
                            about DataTables, please visit the official <a href="https://datatables.net/"
                                target="_blank">DataTables
                                documentation.</a></p>
                    </div>
                </div>

                <!-- Modal Logout -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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
                                <button type="button" class="btn btn-outline-primary"
                                    data-dismiss="modal">Cancel</button>
                                <a href="login.html" class="btn btn-primary">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!---Container Fluid-->
        </div>

        <!-- Footer -->

    </div>
    </div>


    </div>
    </div>
    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php
    include '../include/footer_admin.php';
    ?>



</body>