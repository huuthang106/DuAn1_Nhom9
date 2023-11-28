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
                        <a href="index.php?act=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=cart">Giỏ hàng</a>
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
                                <th scope="col">Chọn</th>
                                <th style="width: 20%" scope="col"> Sản phẩm</th>
                                <th style="width: 20%" scope="col">Tên sản phẩm</th>
                                <th style="width: 20%" scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Size</th>
                                <th scope="col">Màu</th>
                                <th scope="col">Tổng</th>
                                <th scope="col">Xóa</th>

                            </tr>
                        </thead>
                        <tbody>
                            <form action="index.php?act=cart" method="post">
                                <?php
                                if (isset($_GET['cart_id'])) {
                                    cart_delete($_GET['cart_id']);
                                }
                                if (isset($_GET['product_id'])) {
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        if (isset($_POST['quantity'])) {
                                            $product_id = $_GET['product_id'];
                                            $quantity = intval($_POST['quantity']);
                                            $user_id = $_SESSION['user_id'];
                                            // Lưu ý: Cần xác định user_id từ session hoặc nguồn khác


                                            // Gọi hàm carts_insert để chèn dữ liệu vào giỏ hàng
                                            carts_insert($_GET['product_id'], $user_id, $quantity);
                                        } else {
                                            echo 'Dữ liệu không hợp lệ.';
                                        }
                                    }
                                }

                                ?>
                                <?php
                                if (isset($_GET['product_id']) && !isset($_POST['quantity'])) {
                                    $product_id = $_GET['product_id'];
                                    $user_id = $_SESSION['user_id'];
                                    carts_insert_into($_GET['product_id'], $user_id);
                                }
                                ?>
                                <?php
                                if (isset($_GET['cart_id']) && isset($_POST['quantity'])) {
                                    carts_update_quantity($_POST['cart_id'], $_POST['quantity']);
                                }
                                ?>


                                <?php

                                $cart = carts_selectall($_SESSION['user_id']);
                                $count = 0;
                                if ($cart) {
                                    foreach ($cart as $carts) {
                                        extract($carts);
                                        $del_cart = "index.php?act=cart&cart_id=" . $cart_id;
                                        $product = favourite_selectall_products($product_id);
                                        $format = number_format($product[0]['price']);
                                        $quantity = $carts['quantity'];
                                        $total = $quantity * $product[0]['price']; // Calculate total

                                        echo '
                                        <tr>
                                            <td>
                                              <input type="hidden" name="status_' . $cart_id . '" value="1">
                                           
                                                <input type="checkbox" name="selected_carts[]" value="' . $cart_id . '">
                                                <input type="hidden" name="cart_ids[]" value="' . $cart_id . '">
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img style="width:30%" src="content/img/' . $product[0]['picture'] . '" alt="">
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
                                                    <input type="number" name="quantity[' . $cart_id . ']" min="1" maxlength="12" value="' . $quantity . '" title="Quantity:" class="input-text qty">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product_count">
                                                    <select class="form-control" name="size[' . $cart_id . ']">
                                                    <option value="'.$size.'">'.$size.'</option>
                                                        <option value="S">S</option>
                                                        <option value="M">M</option>
                                                        <option value="XL">XL</option>
                                                        <option value="XXL">XXL</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product_count">
                                                    <select class="form-control" name="color[' . $cart_id . ']">
                                                    <option value="'.$color.'">'.$color.'</option>
                                                        <option value="Xanh">Xanh</option>
                                                        <option value="ĐỎ">Đỏ</option>
                                                        <option value="Trắng">Trắng</option>
                                                        <option value="Đen">Đen</option>
                                                        <option value="Nâu">Nâu</option>
                                                        <option value="Hồng">Hồng</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>' . number_format($total) . ' VNĐ</h5>
                                            </td>
                                            <td>
                                                <a href="' . $del_cart . '" class="gray_btn">Xóa</a>
                                            </td>
                                        </tr>
                                    ';
                                    }
                                } else {

                                    echo '
                                    <tr>
                                    <td>
                                  
                                        
                                    </td>
                                    <td>
                                   
                                    
                                </td>
                                <td>
                            
                                
                            </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                       
                                    </td>
                                    
                                    <td>
                                        
    
                                    </td>
                                    
    
                                    <td>
                                       
                                    </td>
                                    <td>
                                      
                                    </td>
                                    
                                </tr>
                                    ';
                                }
                                echo '
                                <tr class="bottom_button">
                                <td>
                                      
                                    
                                </td>
                                    <td>
                                    <button type="submit" name="update_cart" class="gray_btn">Cập nhật</button>
                                    
                                    </td>
                                    <td>
                                      
                                    
                                    </td>
                                    
                                    <td>
                                   
                                    </td>
                                    <td>
                                    
                                    </td>
                                    <td>
                                    
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>  <div class="cupon_text d-flex align-items-center">
                                            
                                    <a class="primary-btn" href="index.php?act=category">Tiếp tục mua hàng</a>
                                    
                                </div></td>
                                    <td>
                                    </td>
                                    
                                ';

                                ?>
                                <tr class="shipping_area">
                                    <td></td>
                                    <td>

                                    </td>
                                    <td>


                                    </td>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Tiền ship</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <h6>20.000 VNĐ</h6>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="out_button_area">
                                    <td></td>
                                    <td>


                                    </td>
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
                        </form>
                    </table>
                    <?php
                 if (isset($_POST['update_cart'])) {
                    $selected_carts = isset($_POST['selected_carts']) ? $_POST['selected_carts'] : [];
                
                    $colors = $_POST['color'];
                    $sizes = $_POST['size'];
                    $quantities = $_POST['quantity'];
                
                    // Kiểm tra xem có tất cả sản phẩm được chọn hay không
                    $all_selected = count($selected_carts) == count($_POST['cart_ids']);
                
                    // Cập nhật trạng thái theo từng sản phẩm
                    foreach ($_POST['cart_ids'] as $cart_id) {
                        $color = $colors[$cart_id];
                        $size = $sizes[$cart_id];
                        $quantity = $quantities[$cart_id];
                
                        $add_cart = new carts();
                
                        // Nếu tất cả sản phẩm được chọn hoặc sản phẩm hiện tại được chọn
                        if ($all_selected || in_array($cart_id, $selected_carts)) {
                            // Đặt status = 2
                            $status = 2;
                        } else {
                            // Đặt status = 1
                            $status = 1;
                        }
                
                        $start = $add_cart->update_cart($cart_id, $quantity, $status, $size, $color, $_SESSION['user_id']);
                    }
                }
                
                
                



                    ?>
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