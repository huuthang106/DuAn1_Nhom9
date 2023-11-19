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