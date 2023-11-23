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
                        foreach ($profile_user->get_user_id($_SESSION['user_id']['user_id']) as $key) {
                            extract($key);
                            echo '
                                    <form class="row contact_form" action="index.php?act=checkout" method="post" novalidate="novalidate">
                                        <div class="col-md-6 form-group p_star">
                                            <input type="text"  placeholder="Họ và tên "class="form-control" id="first" name="name" value = "' . $fullname . '">
                                          
                                        </div>
            
            
                                        <div class="col-md-6 form-group p_star">
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Số điện thoại" value="' . $phone . '">
                                          
                                        </div>
                                        <div class="col-md-6 form-group p_star">
                                            <input type="text" class="form-control" id="email" name="compemailany" placeholder="Email " value = "' . $email . '">
                                          
                                        </div>
            
                                        <div class="col-md-12 form-group p_star">
                                            <input type="text" class="form-control" id="add1" name="add1" placeholder="Địa chỉ" value ="' . $address . '">
                                            
                                        </div>
            
            
            
            
                                        <div class="col-md-12 form-group">
            
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Ghi chú"></textarea>
                                        </div>
                                        </form>
                                ';
                        }
                        ?>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">

                            <h2>Giỏ hàng của bạn</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Tổng</span></a></li>
                                <?php
                                $your_card = new carts();
                                $item =$your_card->cart_user_id($_SESSION['user_id']['user_id']);
                                if($item){
                                foreach ($item as $key) {
                                   
                                    extract($key);
                                    echo '
                                        <li><a href="#">' . $short_product_name . ' <span class="middle">x ' . $quantity . '</span> <span class="last">' . $total_price . '</span></a></li>
                                        ';
                                }}
                                else {
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
                                                                $item_sum_total_price =$sum_total_price->total_price($_SESSION['user_id']['user_id']);
                                                                if($item_sum_total_price){
                                                                foreach ($item_sum_total_price as $key) {
                                                                    extract($key);  
                                                                    echo '' . $total_price_all_products . '';
                                                                }}else{
                                                                    echo 'Không có sản phẩm';
                                                                }
                                                                ?></span></a></li>
                                <li><a href="#">Giao hàng <span> 20000</span></a></li>
                                <li><a href="#">tổng <span>
                                            <?php
                                            $sum_total_price = new carts();
                                            $item_sum_total_price=$sum_total_price->sum_total_price($_SESSION['user_id']['user_id']) ;
                                            if($item_sum_total_price){
                                            foreach ($item_sum_total_price as $key) {
                                                extract($key);
                                                echo '' . $total_price_all_products . '';
                                            }}
                                            else{
                                                echo ' Không có sản phẩm ';
                                            }
                                            ?>
                                        </span></a></li>
                            </ul>
                            <form action="index.php?act=checkout" method="post">
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
                                <div id="popup" class="popup">
                                    <div class="popup-content">
                                        <!-- Nội dung thông tin thanh toán sẽ hiển thị ở đây -->
                                        <h4>Vietcombank</h4>
                                        <h4>06404- NHOMCHIN</h4>
                                        <p>Tin nhắn chuyển khoảng: <br>
                                            <span>Thanh toán mã đơn 01</span>
                                        </p>

                                        <!-- Đặt thêm các phần tử HTML khác theo nhu cầu của bạn -->


                                        <h2><?php
                                            $sum_total_price = new carts();
                                            $item_sum=$sum_total_price->sum_total_price($_SESSION['user_id']['user_id']) ;
                                            if($item_sum){
                                            foreach ($item_sum as $key) {
                                                extract($key);
                                                echo '' . $total_price_all_products . '';
                                            }}else{
                                                echo 'chưa có sản phẩm  ';
                                            }
                                            ?></h2>

                                    </div>
                                </div>

                                <button type="submit" value="submit" name="submit" class="btn_bill">Thanh toán</button>
                            </form>
                            <?php
                            $user_id=$_SESSION['user_id']['user_id'];
                            if (isset($_POST['submit'])) {
                                //lấy phương thức thanh toán 1 là thanh toán khi nhận hàng
                                $selector = $_POST['selector'];
                                //lấy thông tin giỏ hàng 
                                $cart_user = new carts();
                                $cart_items = $cart_user->getcart_user_id_inser_bill_details($_SESSION['user_id']['user_id']);
                         

                                // nhập dữ liệu vào bill
                                $insert_bill = new bills();
                                $insert_bill->insert_bill($_SESSION['user_id']['user_id']);
                                //lấy bill_id vừa được thêm vào
                                $newbill = new bills();
                                $bill_id= $newbill->new_bill($user_id);
                              
                                // thêm tất cả data ở bên trên vào bill_details
                                $insert_bill_details = new bill_details();
                                $day = date('Y-m-d H:i:s');
                                if($cart_items){
                                foreach ($cart_items as $key) {
                                    extract($key);
                                    // bắt dầu thêm dữ liệu vào chi tiết đơn 
                                    $insert_bill_details->insert_bill_details($bill_id, $selector, $price, $day, $quantity, $product_id, $total_price);
                                    $dell_cart = new carts();
                                    // sau khi thêm thành công sẽ xóa cart
                                    $dell = $dell_cart->dell_cart_user_id($user_id);
                                }}else{
                                    echo 'Không có sản phẩm thanh toán';
                                }
                              
                            }
                            ?>
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