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
                <h1 class="h3 mb-0 text-gray-800">Quản lý bình luận</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Bình luận</li>
                </ol>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Datatables -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Bảng bình luận</h6>
                        </div>
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush" id="dataTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Sản phẩm</th>
                                        <th>Tài khoản</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sản phẩm</th>
                                        <th>Tài khoản</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Xóa</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    if (isset($_GET['comment_id'])) {
                                        comments_delete($_GET['comment_id']);
                                    }
                                    $comment = comments_selectall();
                                    $users = user_selectall();
                                    $blogs = blogs_selectall();
                                    $product = products_selectall();
                                    foreach ($comment as $comments) {
                                        extract($comments);
                                        $name = get_product_name($product_id);
                                        $fullname = get_user_name($user_id);
                                        $title = get_blog_title($blog_id);
                                        $del_link = "index.php?act=comments&comment_id=" . $comment_id;
                                        if ($status == 1) {
                                            echo '
                                            
                                                <tr>
                                                    <td>' . $comment_id . '</a></td>
                                                    <td>' . $name . '</td>
                                                    <td>' . $fullname . '</td>
                                                    <td>' . $text . '</td>
                                                    <td>' . $day . '</td>                                                   
                                                    <td><a href="' . $del_link . '" class="btn btn-sm btn-danger">Xóa</a></td>
                                                </tr>
                                            
                                            ';
                                        } else {
                                            echo '                     
                                                  <tr>
                                                      <td>' . $comment_id . '</a></td>
                                                      <td>' . $title . '</td>
                                                      <td>' . $fullname . '</td>
                                                      <td>' . $text . '</td>
                                                      <td>' . $day . '</td>                                                   
                                                      <td><a href="' . $del_link . '" class="btn btn-sm btn-danger">Xóa</a></td>
                                                  </tr>
                                            ';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

    </div>

    </div>
    <!-- Footer -->
    <?php
    include '../include/footer_admin.php';
    ?>

    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



</body>

