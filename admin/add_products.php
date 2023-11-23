<style>
    #imagePreview {
    width: 100%;
    max-height: 200px;
    margin-top: 10px;
    display: none;
}
</style>
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
                <h1 class="h3 mb-0 text-gray-800">Thêm sản phẩm</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item">Quản lý</li>
                    <li class="breadcrumb-item active" aria-current="page">Thêm sản phẩm </li>
                </ol>
            </div>

            <div class="container">
                <div class="card px-1 py-4">
                    <div class="card-body">

                        <h5 class="information mt-4">Thêm sản phẩm</h5>

                        <h6 class="information mt-4">Tên sản phẩm</h6>
                        <form action="index.php?act=add_products" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="product_name" value="" placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Hình ảnh</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="product_picture" onchange="previewImage(this);" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <img id="imagePreview" src="#" alt="Preview">
                                    </div>
                                </div>
                            </div>


                            <h6 class="information mt-4">Màu</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="color" value="" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Kích thước</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="size" value="" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Giá tiền</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group"> <input class="form-control" type="number" min="0" name="product_price" value="" placeholder="" required> </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Mô tả</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group"> <input class="form-control" type="text" name="product_describe" value="" placeholder="" required> </div>
                                    </div>
                                </div>
                            </div>

                            <h6 class="information mt-4">Loại sản phẩm</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" id="category_id" name="category_id">
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
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Lấy dữ liệu từ form
                            $product_name = $_POST["product_name"];

                            $color = $_POST["color"];
                            $size = $_POST["size"];
                            $product_price = $_POST["product_price"];
                            $product_describe = $_POST["product_describe"];
                            $category_id = $_POST["category_id"];
                            $uploadOk = 1;

                            // Kiểm tra giá tiền không được để trống và phải lớn hơn hoặc bằng 0
                            // Kiểm tra giá tiền không được để trống và phải lớn hơn hoặc bằng 0
                            if (empty($product_name) || empty($_FILES["product_picture"]["name"]) || empty($color) || empty($size) || empty($product_price) || empty($product_describe) || empty($category_id)) {
                                echo  '</br><div  class="error-message">
            <i class="fa-solid fa-circle-exclamation"></i>Vui lòng nhập đầy đủ thông tin và chọn hình ảnh!
            </div>';
                                $uploadOk = 0; // Đặt biến này thành 0 để ngăn chặn việc lưu file nếu có lỗi
                            } else if (empty($product_price) || $product_price < 0) {
                                // Kiểm tra giá tiền không được để trống và phải lớn hơn hoặc bằng 0
                                echo '</br><div style="color:#721c24" class="error-message">
            <i class="fa-solid fa-circle-exclamation"></i> Giá tiền không được âm !
            </div>';
                                $uploadOk = 0; // Đặt biến này thành 0 để ngăn chặn việc lưu file nếu có lỗi
                            }

                            // Kiểm tra hình ảnh nếu $uploadOk vẫn là 1
                            if ($uploadOk) {
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
                                } else if ($file_size > 5 * 1024 * 1024) { // Kiểm tra dung lượng file (5MB)
                                    echo '</br><div  class="error-message">
                                <i class="fa-solid fa-circle-exclamation"></i> Kích thước file ảnh không được vượt quá 5MB.
                                </div>';
                                } else {
                                    // Lưu file ở đây nếu không có lỗi
                                    $product_picture = save_file('product_picture', $UPLOAD_URL);
                                    $add_product = new products();
                                    $add_product->add_product($category_id, $product_name, $product_picture, $color, $size, $product_price, $product_describe);
                                    if ($add_product == true) {
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
                        }




                        ?>


                    </div>
                </div>
            </div><br>
            <!--Row-->
        </div>

        <!-- Footer -->


    </div>
    </div>
    <?php
    include '../include/footer_admin.php';
    ?>
</body>