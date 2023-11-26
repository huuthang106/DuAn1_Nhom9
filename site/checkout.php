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
                    <h1>Thanh toán</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Thanh toán</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">


            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Hoán đơn</h3>
                        <?php
                        $profile_user = new users();
                        foreach ($profile_user->get_user_id($_SESSION['user_id']) as $key) {
                            extract($key);
                            echo '
                                    <form class="row contact_form" action="index.php?act=checkout" method="post" novalidate="novalidate">
                                        <div class="col-md-6 form-group p_star">
                                            <input type="text"  placeholder="Họ và tên "class="form-control" id="first" name="fullname" value = "' . $fullname . '">
                                          
                                        </div>
            
            
                                        <div class="col-md-6 form-group p_star">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại" value="' . $phone . '">
                                          
                                        </div>
                                        <div class="col-md-6 form-group p_star">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email " value = "' . $email . '">
                                          
                                        </div>
            
                                        <div class="col-md-12 form-group p_star">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" value ="' . $address . '">
                                            
                                        </div>
            
            
            
            
                                        <div class="col-md-12 form-group">
            
                                            <textarea class="form-control" name="note" id="message" rows="1" placeholder="Ghi chú"></textarea>
                                        </div>
                                        
                                      
                                ';
                            echo '
                        
                        <div class="col-md-12 form-group">
                        <select class="form-control" id="vochers" name="vochers">
                        <option value="">Mã giảm giá</option>';
                            $vocher = new vochers();
                            $item_vocher = $vocher->get_vochers();
                            if ($item_vocher) {
                                foreach ($item_vocher as $key) {
                                    extract($key);
                                    echo '    <option value="' . $vocher_id . '">' . $name . '</option>
                                </select>
                                </div>';
                                }
                            }
                        }



                        ?>

                        <?php

                        $user_id = $_SESSION['user_id'];

                        if (isset($_POST['submit'])) {
                            if (empty($_POST['fullname']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['address'])) {
                                echo '
                                    <div class="col-md-12 form-group">
                                        <div class="error-message">
                                            <i class="fa-solid fa-circle-exclamation"></i> Thông tin cá nhân không bỏ trống !
                                        </div><br>
                                    </div>
                                    ';
                            } elseif (!preg_match('/^0\d{8,10}$/', $_POST['phone'])) {
                                echo '
                                <div class="col-md-12 form-group">
                                    <div class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> số điện thoại sai định dạng !
                                    </div><br>
                                </div>
                                ';
                            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                echo '
                                <div class="col-md-12 form-group">
                                    <div class="error-message">
                                        <i class="fa-solid fa-circle-exclamation"></i> Email sai định dạng !
                                    </div><br>
                                </div>
                                ';
                            } else {
                                //lấy phương thức thanh toán 1 là thanh toán khi nhận hàng
                                $selector = $_POST['selector'];
                                $vocher_id = $_POST['vochers'];

                                //lấy thông tin giỏ hàng 
                                $cart_user = new carts();
                                $cart_items = $cart_user->getcart_user_id_inser_bill_details($_SESSION['user_id']);
                                // thêm tất cả data ở bên trên vào bill_details
                                $insert_bill_details = new bill_details();
                                $day = date('Y-m-d H:i:s');
                                if ($selector == 1) {
                                    if ($cart_items) {
                                        // nhập dữ liệu vào bill
                                        $insert_bill = new bills();
                                        $insert_bill->insert_bill($_SESSION['user_id']);
                                        //lấy bill_id vừa được thêm vào
                                        $newbill = new bills();
                                        $bill_id = $newbill->new_bill($user_id);
                                        foreach ($cart_items as $key) {
                                            extract($key);
                                            if ($vocher_id > 0) {
                                                $sale = new vochers();
                                                $item_sale = $sale->get_sale_vocher($vocher_id);
                                                // Chuyển đổi chuỗi thành số
                                                $total_price = (float) $total_price;
                                                $item_sale_amount = (float) $item_sale[0]['sale'];

                                                // Kiểm tra giá trị
                                                // var_dump($total_price, $item_sale_amount);

                                                // Thực hiện phép trừ
                                                $total_sale = $total_price - $item_sale_amount;
                                                // bắt dầu thêm dữ liệu vào chi tiết đơn 
                                                $insert_bill_details->insert_bill_details($bill_id, $selector, $price, $day, $quantity, $product_id, $total_sale, $_POST['address'], $_POST['phone'], $_POST['note'], $_POST['fullname'], $vocher_id);
                                                $dell_cart = new carts();
                                                // // sau khi thêm thành công sẽ xóa cart
                                                $dell = $dell_cart->dell_cart_user_id($user_id);
                                            } else {
                                                $insert_bill_details->insert_bill_details($bill_id, $selector, $price, $day, $quantity, $product_id, $total_price, $_POST['address'], $_POST['phone'], $_POST['note'], $_POST['fullname'], $vocher_id);
                                                $dell_cart = new carts();
                                                // // sau khi thêm thành công sẽ xóa cart
                                                $dell = $dell_cart->dell_cart_user_id($user_id);
                                            }
                                        }
                                    } else {
                                        echo '
                                        <div class="col-md-12 form-group">
                                            <div class="error-message">
                                                <i class="fa-solid fa-circle-exclamation"></i> Không có sản phẩm thanh toán !
                                            </div><br>
                                        </div>
                                        ';
                                    }
                                } else {
                                    if ($cart_items) {
                                        // nhập dữ liệu vào bill
                                        $insert_bill = new bills();
                                        $insert_bill->insert_bill($_SESSION['user_id']);
                                        //lấy bill_id vừa được thêm vào
                                        $newbill = new bills();
                                        $bill_id = $newbill->new_bill($user_id);
                                        foreach ($cart_items as $key) {
                                            extract($key);
                                            if ($vocher_id > 0) {
                                                $sale = new vochers();
                                                $item_sale = $sale->get_sale_vocher($vocher_id);
                                                // Chuyển đổi chuỗi thành số
                                                $total_price = (float) $total_price;
                                                $item_sale_amount = (float) $item_sale[0]['sale'];

                                                // Kiểm tra giá trị
                                                // var_dump($total_price, $item_sale_amount);

                                                // Thực hiện phép trừ
                                                $total_sale = $total_price - $item_sale_amount;

                                                // Hiển thị kết quả
                                                // var_dump($total_sale);


                                                // bắt dầu thêm dữ liệu vào chi tiết đơn 
                                                // bắt dầu thêm dữ liệu vào chi tiết đơn 
                                                $insert_bill_details->insert_bill_details($bill_id, $selector, $price, $day, $quantity, $product_id, $total_sale, $_POST['address'], $_POST['phone'], $_POST['note'], $_POST['fullname'], $vocher_id);
                                                // //sau khi chon thanh toán thẻ thì chuyển trang
                                                // $dell_cart = new carts();
                                                // // sau khi thêm thành công sẽ xóa cart
                                                // $dell = $dell_cart->dell_cart_user_id($user_id);
                                            } else {
                                                $insert_bill_details->insert_bill_details($bill_id, $selector, $price, $day, $quantity, $product_id, $total_price, $_POST['address'], $_POST['phone'], $_POST['note'], $_POST['fullname'], $vocher_id);
                                                // $dell_cart = new carts();
                                                // // // sau khi thêm thành công sẽ xóa cart
                                                // $dell = $dell_cart->dell_cart_user_id($user_id);
                                            }
                                        }
                                    } else {
                                        echo '
                                        <div class="col-md-12 form-group">
                                            <div class="error-message">
                                                <i class="fa-solid fa-circle-exclamation"></i> Không có sản phẩm thanh toán !
                                            </div><br>
                                        </div>
                                        ';
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">

                            <h2>Hoá đơn của bạn</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Tổng</span></a></li>
                                <?php
                                $your_card = new carts();
                                $item = $your_card->cart_user_id($_SESSION['user_id']);
                                if ($item) {
                                    foreach ($item as $key) {

                                        extract($key);
                                        echo '
                                        <li><a href="#">' . $short_product_name . ' <span class="middle">x ' . $quantity . '</span> <span class="last">' . $total_price . '</span></a></li>
                                        ';
                                    }
                                } else {
                                    # code..
                                    echo '
                                        <li><a href="#">Không có sản phẩm </a></li>
                                        ';
                                }


                                ?>

                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Tạm tính <span><?php
                                                                $sum_total_price = new carts();
                                                                $item_sum_total_price = $sum_total_price->total_price($_SESSION['user_id']);
                                                                if ($item_sum_total_price) {
                                                                    foreach ($item_sum_total_price as $key) {

                                                                        extract($key);

                                                                        echo '' . $total_price_all_products . '';
                                                                    }
                                                                } else {
                                                                    echo 'Không có sản phẩm';
                                                                }
                                                                ?></span></a></li>
                                <li><a href="#">Giao hàng <span> 20000 VNĐ</span></a></li>
                                <li><a href="#">tổng <span>
                                            <?php
                                            $sum_total_price = new carts();
                                            $item_sum_total_price = $sum_total_price->sum_total_price($_SESSION['user_id']);

                                            if ($item_sum_total_price) {
                                                foreach ($item_sum_total_price as $key) {
                                                    extract($key);

                                                    echo '' . $total_price_all_products . '';
                                                }
                                            } else {
                                                echo ' Không có sản phẩm ';
                                            }

                                            ?>
                                        </span></a></li>
                            </ul>

                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" value="1" name="selector" checked>
                                    <label for="f-option5">Thanh toán khi nhận hàng</label>
                                    <div class="check"></div>
                                </div>

                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" value="2" name="selector">
                                    <label for="f-option6">Chuyển khoản </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>

                            </div>

                            <button type="submit" value="submit" name="submit" class="btn_bill">Thanh toán</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->



</body>