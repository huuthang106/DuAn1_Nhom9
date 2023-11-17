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
                <li class="breadcrumb-item active" aria-current="page">Bài viết</li>
            </ol>
        </div>

        <div class="container">
            <div class="card px-1 py-4">
                <div class="card-body">

                    <?php
								if(isset($_POST['title']) && isset($_POST['content'])){
									$title = $_POST['title'];
									$content = $_POST['content'];
									$day = date('d/m/Y');
									if(empty($title)){
										$error = '<div class="error-message" style="color:#721c24;">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập tiều đề bài viết !
													</div>';
									}elseif(empty($content)){
										$error = '<div class="error-message" style="color:#721c24">
													<i class="fa-solid fa-circle-exclamation"></i> Vui lòng nhập nội dung !
													</div>';
									}
                                
									if(isset($error)){
										echo $error;
									}else{
										$existingTitle = array_column(blogs_selectall(), 'title');
										if(in_array($title, $existingTitle)){
											echo '
											<div class="error-message">
											<i class="fa-solid fa-circle-exclamation"></i> Bài viết đã tồn tại !!!
											</div>
											';
											
										}
										
                                         else {
											blogs_insert($title, $content, $day);
											echo '
											<div class="success-message">
											<i class="fa-solid fa-circle-check"></i> Thêm bài viết thành công !			
											</div>
											';
										}
									}
								}
							?>
                    <h5 class="information mt-4">Thêm bài viết</h5>
                    <h6 class="information mt-4">Ghi chú (<span style="color:red">*</span>) bắc buộc !</h6>
                    <h6 class="information mt-4">Tiều đề bài viết<span style="color:red">*</span></h6>
                    <form action="index.php?act=add_blogs" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="title"
                                        value="<?php echo isset($_POST['title']) ? $_POST['title'] : ''; ?>"
                                        placeholder="">
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Nội dung<span style="color:red">*</span></h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <textarea style="height: 200px" class="form-control"
                                            type="text" name="content"
                                            value="<?php echo isset($_POST['content']) ? $_POST['content'] : ''; ?>"
                                            placeholder=""></textarea> </div>
                                </div>
                            </div>
                        </div>

                        <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> </div> <button type="submit"
                            class="btn btn-primary btn-block confirm-button">Thêm mới</button>
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