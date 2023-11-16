<div id="wrapper">
    <?php
    include '../include/header_admin.php';
    ?>
    <!-- Sidebar -->
    <!-- Topbar -->
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sửa sản phẩm</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                <li class="breadcrumb-item">Sản phẩm</li>
                <li class="breadcrumb-item active" aria-current="page">Sửa sản phẩm </li>
            </ol>
        </div>

        <div class="container">
            <div class="card px-1 py-4">
                <div class="card-body">

                    <h5 class="information mt-4">Cập nhật sản phẩm</h5>
                    <h6 class="information mt-4">Tên sản phẩm</h6>

                    <form action="index.php?act=edit_product&product_id=<?php echo $_GET['product_id']; ?>" method="post" enctype="multipart/form-data">

                        <?php
                        $edit_product = new products();
                        foreach ($edit_product->get_product_id($_GET['product_id']) as $key) {
                            extract($key);
                            echo '
                            <input type="hidden"value=' . $product_id . ' name= "product_id">
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="product_name" value="' . $name . '" placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Hình ảnh</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="file" name="product_picture" value="' . $picture . '" placeholder=""> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Màu</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="color" value="' . $color . '" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Kích thước</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="size" value="' . $size . '" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Giá tiền</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="number" min="0" name="product_price" value="' . $price . '" placeholder="" required> </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="information mt-4">Mô tả</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group"> <input class="form-control" type="text" name="product_describe" value="' . $content . '" placeholder="" required> </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="information mt-4">Loại sản phẩm</h6>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                    <select class="form-control" id="category_id" name="category_id">
                       
                        ';
                            $categories = new product_categoryes();
                            foreach ($categories->get_category($product_id) as $key) {
                                echo '<option value="' . $key['category_id'] . '">' . $key['category_name'] . '</option>';
                            }
                            echo ' </select>
                        </div>
                    </div>
                </div>
            </div>';


                        ?>


                            <h6 class="information mt-4">Thêm nhiều loại </h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="category_id" name="product_category">
                                                <option value=""></option>
                                                <?php
                                                $categories = new categories();

                                                foreach ($categories->get_all_categories() as $key) {
                                                    extract($key);
                                                    if ($status == '1') {
                                                        echo '
                                                        <option value="' . $category_id . '">' . $name . '</option>
                                                        ';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> </div> <input type="submit" class="btn btn-primary btn-block confirm-button" value="Thêm mới">
                    </form>
                <?php
                        }
                ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Lấy dữ liệu từ form
                    $product_id = $_POST["product_id"];
                    $product_name = $_POST["product_name"];
                    $product_category = $_POST["product_category"];
                    $color = $_POST["color"];
                    $size = $_POST["size"];
                    $product_price = $_POST["product_price"];
                    $product_describe = $_POST["product_describe"];
                    $category_id = $_POST["category_id"];

                    $uploadOk = 1;

                    // Kiểm tra giá tiền không được để trống và phải lớn hơn hoặc bằng 0
                    if (empty($product_name) || empty($color) || empty($size) || empty($product_price) || empty($product_describe) || empty($category_id)) {
                        echo  '</br><div  class="error-message">
                        <i class="fa-solid fa-circle-exclamation"></i>Vui lòng nhập đầy đủ thông tin và chọn hình ảnh!
                    </div>';
                        $uploadOk = 0; // Đặt biến này thành 0 để ngăn chặn việc lưu file nếu có lỗi
                    } else if (empty($product_price) || $product_price < 0) {
                        echo '</br><div style="color:#721c24" class="error-message">
                        <i class="fa-solid fa-circle-exclamation"></i> Giá tiền không được âm !
                    </div>';
                        $uploadOk = 0; // Đặt biến này thành 0 để ngăn chặn việc lưu file nếu có lỗi
                    }

                    // Kiểm tra hình ảnh nếu $uploadOk vẫn là 1
                    if ($uploadOk) {
                        // Kiểm tra xem có tệp tin mới được chọn hay không
                        if (!empty($_FILES["product_picture"]["name"])) {
                            $file_name = $_FILES["product_picture"]["name"];
                            $file_tmp = $_FILES["product_picture"]["tmp_name"];
                            $file_size = $_FILES["product_picture"]["size"];

                            // Kiểm tra đuôi file
                            $allowed_formats = ['png', 'jpg'];
                            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                            if (!in_array($file_extension, $allowed_formats)) {
                                echo '</br><div  class="error-message">
                                <i class="fa-solid fa-circle-exclamation"></i> Chỉ chấp nhận định dạng PNG và JPG.
                            </div>';
                                $uploadOk = 0;
                            } else if ($file_size > 5 * 1024 * 1024) { // Kiểm tra dung lượng file (5MB)
                                echo '</br><div  class="error-message">
                                <i class="fa-solid fa-circle-exclamation"></i> Kích thước file ảnh không được vượt quá 5MB.
                            </div>';
                                $uploadOk = 0;
                            } else {
                                // Lưu file ở đây nếu không có lỗi
                                $product_picture = save_file('product_picture', $UPLOAD_URL);
                            }
                        } else {
                            // Nếu không có tệp tin mới được chọn, sử dụng hình cũ
                            $product_picture = $picture;
                        }

                        // Tiếp tục với việc cập nhật dữ liệu khi không có lỗi
                        $edit_product = new products();
                        $edit_result = $edit_product->update_product($category_id, $product_name, $product_picture, $color, $size, $product_price, $product_describe, $product_category, $product_id);

                        if ($edit_result) {
                            echo '</br><div class="success-message">
                            <i class="fa-solid fa-circle-check"></i>Thêm sản phẩm thành công 
                        </div>';
                        } else {
                            echo '</br><div style="color:#721c24" class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i> Thêm dữ liệu thất bại !
                        </div>';
                        }
                    }
                }





                ?>


                </div>
            </div>
        </div><br>
        <!--Row-->
        <?php

        ?>
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