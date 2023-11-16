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
                    <?php
        if(isset($_POST['category_id'])){
            $category_id = $_POST['category_id'];
            $existingName = array_column(categories_selectall(), 'name');
            $name = $_POST['name'];
            if(in_array($name, $existingName)){
                echo '
                    <div class="error-message">
                    <i class="fa-solid fa-circle-exclamation"></i> Loại đã tồn tại !!!
                    </div>
                ';
                    
            }else{
                categories_update($_POST['category_id'],$_POST['name']);
                echo '
                    <div class="success-message">
                    <i class="fa-solid fa-circle-check"></i> Cập nhật thành công !			
                    </div>
                ';
            } 
        }
        if(isset($_GET['category_id'])){
            $category_id=$_GET['category_id'];
            $categories_info=categories_getinfo($category_id);
            extract($categories_info);
        
        ?>
                    <h5 class="information mt-4">Cập nhật loại sản phẩm</h5>
                    <h6 class="information mt-4">ID</h6>
                    <form action="index.php?act=update_categories&category_id=<?=$category_id?>" method="post">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="category_id"
                                            value="<?=$category_id?>" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Loại sản phẩm</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="name"
                                            value="<?=$name?>" placeholder=""> </div>
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