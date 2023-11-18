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
                <!-- DataTable with Hover -->

                <!--Row-->

                <!-- Documentation Link -->
                <div class="row">
                    <div class="col-lg-12">
                        <p>DataTables is a third party plugin that is used to generate the demo table below. For more
                            information
                            about DataTables, please visit the official <a href="https://datatables.net/" target="_blank">DataTables
                                documentation.</a></p>
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

    </div>-->
    <!---Container Fluid-->
    </div>
    <!-- Footer -->
    <?php
    include '../include/footer_admin.php';
    ?>
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>-->
    <!-- Footer -->
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



</body>

</html>