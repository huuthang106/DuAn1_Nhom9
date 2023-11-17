<div id="wrapper">
    <?php
      include '../include/header_admin.php';
    ?>
    <!-- Sidebar -->
    <!-- Topbar -->
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cập nhật bài viết</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                <li class="breadcrumb-item">Quản lý</li>
                <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
            </ol>
        </div>

        <div class="container">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <?php
        if(isset($_POST['blog_id'])){
            $blog_id = $_POST['blog_id'];
            $existingTitle = array_column(blogs_selectall(), 'title');
            $title = $_POST['title'];
            $content = $_POST['content'];
            $day = $_POST['day'];
            $pattern = "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/";
        
            $error = ''; // Biến để lưu thông báo lỗi
        
            // Kiểm tra xem có ít nhất một trường đã được điền không
            if(empty($title) && empty($content) && empty($day)){
                $error = '
                    <div class="error-message">
                        <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập thông tin !!!
                    </div>';
            } else {
                // Kiểm tra từng trường riêng lẻ nếu có nhập
                if(empty($title)){
                    $error = '
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập tiêu đề !!!
                        </div>';
                } elseif(empty($content)){
                    $error = '
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập nội dung !!!
                        </div>';
                } elseif(empty($day)){
                    $error = '
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập ngày đăng !!!
                        </div>';
                } elseif(!preg_match($pattern, $day)){
                    $error = '
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Ngày đăng không hợp lệ !!!
                        </div>';
                } elseif(in_array($title, $existingTitle)){
                    $error = '
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Bài viết đã tồn tại !!!
                        </div>';
                }
            }
        
            // Hiển thị thông báo lỗi nếu có
            if (!empty($error)) {
                echo $error;
            } else {
                // Nếu không có lỗi, thực hiện cập nhật
                blogs_update($_POST['blog_id'],$_POST['day'],$_POST['content'],$_POST['title']);
                echo '
                    <div class="success-message">
                        <i class="fa-solid fa-circle-check"></i> Cập nhật thành công !			
                    </div>';
            } 
        }
        
        if(isset($_GET['blog_id'])){
            $blog_id=$_GET['blog_id'];
            $blogs_info=blogs_getinfo($blog_id);
            extract($blogs_info);
        
        ?>
                    <h5 class="information mt-4">Cập nhật bài viết</h5>
                    <h6 class="information mt-4">Ghi chú (<span style="color:red">*</span>) bắc buộc !</h6>
                    <h6 class="information mt-4">ID</h6>
                    <form action="index.php?act=update_blogs&blog_id=<?=$blog_id?>" method="post">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input readonly class="form-control" type="text"
                                            name="blog_id" value="<?=$blog_id?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Tiêu đề<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="title"
                                            value="<?=$title?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Nội dung<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <textarea style="height: 200px" class="form-control"
                                            type="text" name="content" value="<?=$content?>" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Ngày đăng<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="day"
                                            value="<?=$day?>" placeholder="DD/MM/YYYY"> </div>
                                </div>
                            </div>
                        </div>

                        <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> </div> <button type="submit"
                            class="btn btn-primary btn-block confirm-button">Cập nhật</button>
                    </form>

                </div>
            </div>
        </div><br>
        <!--Row-->

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
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
<? }else{
    echo "mã loại không tồn tại";
} ?>
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