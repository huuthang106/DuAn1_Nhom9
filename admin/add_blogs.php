<div id="wrapper">
    <?php
      include '../include/header_admin.php';
    ?>
        <!-- Sidebar -->
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Thêm bài viết</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm bài viết</li>
                </ol>
            </div>

            <div class="container">
                <div class="card px-1 py-4">
                    <div class="card-body">

                        <h5 class="information mt-4">Thêm bài viết</h5>
                        <h6 class="information mt-4">Tiêu đề bài viết</h6>
                        <form action="edit_product.php" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="product_name" value="" placeholder=""> </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Trạng thái</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                  
                            <h6 class="information mt-4">Nội dung bài viết</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group"> <textarea  class="form-control" type="text" name="product_price" value="" placeholder=""> </textarea> </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Ngày đăng bài</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group"> <input class="form-control" type="text" name="product_describe" value="" placeholder="DD/MM/YYYY"> </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> </div> <button type="submit" class="btn btn-primary btn-block confirm-button">Thêm mới</button>
                        </form>

                    </div>
                </div>
            </div><br>
            <!--Row-->

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
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>