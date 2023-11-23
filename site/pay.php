<style>
    .QR {
        max-width: 95%;
        margin: 0 auto;
    }
    .billing_details {
    flex: 0 0 75%;
    max-width: 80%;
    margin: auto; /* Đây là thuộc tính quan trọng để căn giữa */
}

    .row{
        flex: 0 0 75%;
    max-width: 80%;
    margin: 0 auto;
    }
    .order_box{
        margin: 0 auto;
    }
  .col-lg-10{
    margin: 0 auto;
  }
</style>

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

                    <div class="col-lg-10">
                        <div class="order_box">

                            <h2>Hoá đơn của bạn</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm <span>Tổng</span></a></li>
                                <?php
                                $your_card = new carts();
                                $item = $your_card->cart_user_id($_SESSION['user_id']['user_id']);
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
                                                                $item_sum_total_price = $sum_total_price->total_price($_SESSION['user_id']['user_id']);
                                                                if ($item_sum_total_price) {
                                                                    foreach ($item_sum_total_price as $key) {
                                                                        extract($key);
                                                                        echo '' . $total_price_all_products . '';
                                                                    }
                                                                } else {
                                                                    echo 'Không có sản phẩm';
                                                                }
                                                                ?></span></a></li>
                                <li><a href="#">Giao hàng <span> 20000</span></a></li>
                                <li><a href="#">Số tiền cần chuyển <span>
                                            <?php
                                            $sum_total_price = new carts();
                                            $item_sum_total_price = $sum_total_price->sum_total_price($_SESSION['user_id']['user_id']);
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
                                <div class="nav nav-tabs">
                                    <img class="QR" src="../content/img/product/QR_thanh_toan1.jpg" alt="">
                                </div>

                            </ul>
                                        </br>
                            <h2 id="payment-info">Thông tin thanh toán: <span>Thanh toán hóa đơn <?php
                             $newbill = new bills();
                             $bill_id = $newbill->new_bill($user_id);
                            echo $bill_id; ?></span></h2> 
                            <ul class="list">
                            <button class="btn_bill" onclick="copyPaymentInfo()">Sao chép thông tin đơn</button>
                            </ul>
                            <br>
                            
                            <form action="index.php?act=pay" method="post">
                                <button type="submit" value="submit" name="submit" class="btn_bill">Thanh toán</button>
                            </form>
                            <?php
                            $user_id = $_SESSION['user_id']['user_id'];

                            if (isset($_POST['submit'])) {
                                $dell_cart = new carts();
                                $dell = $dell_cart->dell_cart_user_id($user_id);
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