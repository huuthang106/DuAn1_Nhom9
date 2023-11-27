<body>

    <!-- Start Header Area -->
    <?php
    include("./include/nav.php");
    ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Giỏ hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Giỏ hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 20%" scope="col"> Sản phẩm</th>
                                <th scope="col"></th>
                                <th style="width: 20%" scope="col">Giá
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if(isset($_GET['cart_id'])){
                                cart_delete($_GET['cart_id']);
                            }
                              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                if (isset($_POST['quantity'])) {
                                    $product_id = $_GET['product_id'];
                                    $quantity = intval($_POST['quantity']);
                                    $user_id = $_SESSION['user_id']; 
                                   // Lưu ý: Cần xác định user_id từ session hoặc nguồn khác
                                    $status = 2;
                            
                                            // Gọi hàm carts_insert để chèn dữ liệu vào giỏ hàng
                                    carts_insert($_GET['product_id'], $user_id, $quantity, $status);
                                } else {
                                    echo 'Dữ liệu không hợp lệ.';
                                }
                            }    
                            ?>
                            <?php
                                 if (isset($_GET['product_id']) && !isset($_POST['quantity'])) {
                                    $product_id = $_GET['product_id'];
                                    $user_id = $_SESSION['user_id']; 
                                    $status = 2;

                                    carts_insert_into($_GET['product_id'],$user_id,$status);
                                }
                            ?>
                            <?php
                                 if (isset($_GET['cart_id']) && isset($_POST['quantity'])) {
                                    carts_update_quantity($_POST['cart_id'], $_POST['quantity']);
                                    }
                            ?>


                            <?php
                                
                                $cart = carts_selectall();
                                $count = 0;
                                foreach ($cart as $carts) {
                                extract($carts);
                                $del_cart = "index.php?act=cart&cart_id=" .$cart_id;
                                $product = favourite_selectall_products($product_id);
                                $format = number_format($product[0]['price'], 3, ',', '');
                                $quantity = $carts['quantity'];
                                // Thêm dòng này để lấy giá trị của quantity
                                $total = $quantity * $product[0]['price']; // Tính giá trị tổng
                                $count += $total;
                                echo '
                                <tr>
                                    <td>
                                        
                                        <div class="media">
                                            <div class="d-flex">
                                                <img style="width:30%" src="content/img/' . $product[0]['picture'] . '"
                                                    alt="">
                                            </div>
                                           
                                        </div>
                                    </td>
                                    <td>
                                        <div class="media">
                                            <div style="text-align:center" class="media-body">
                                                <p>' . $product[0]['name'] . '</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>' . $format . ' VNĐ</h5>
                                    </td>
                                    
                                    <td>
                                        <div class="product_count">
                                            <input type="text" name="cart_id" value="'.$cart_id.'"
                                                style="display: none;">
                                            <input type="text" name="quantity" maxlength="12" value="' . $quantity . '"
                                                title="Quantity:" class="input-text qty">
                                        </div>

                                    </td>

                                    <td>
                                        <h5>' . number_format($total, 3, ',', '') . ' VNĐ</h5>
                                    </td>
                                    <td>
                                        <a href="'.$del_cart.'" class="gray_btn">Xóa</a>
                                    </td>
                                    
                                </tr>
                                ';
                                }
                                echo '
                                <tr class="bottom_button">
                                    <td>
                                        <button type="submit" class="gray_btn">Cập nhật</button>
                                    </td>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" placeholder="Mã giảm giá">
                                            <a class="primary-btn" href="#">Áp dụng</a>
                                            <a class="gray_btn" href="#">Đóng</a>
                                        </div>
                                    </td>
                                </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Tổng</h5>
                                </td>
                                <td>
                                    <h5>' . number_format($count, 3, ',', '') . ' VNĐ</h5>
                                </td>
                            </tr> ';

                            ?>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Tiền ship</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <h6>20.000 </h6>
                                    </div>
                                </td>
                            </tr>

                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="index.php?act=category">Tiếp tục mua</a>
                                        <a class="primary-btn" href="index.php?act=checkout">Thanh toán</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->


</body>