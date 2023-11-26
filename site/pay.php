<?php
ob_start();
?>
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
                                <li><a href="#">Giao hàng <span> 20000</span></a></li>
                                <li><a href="#">Số tiền cần chuyển <span>
                                            <?php
                                            $newbill = new bills();
                                            $bill_id = $newbill->new_bill($_SESSION['user_id']);
                                            $total = new bill_details();
                                            $item_sale =  $total->get_new_bill_detai($bill_id);      
                                            // var_dump($item_sale); 
                                            echo $item_sale[0]['total'];                
                                            // var_dump($item_sale);
                                            if ($item_sale) {
                                                foreach ($item_sale as $key) {
                                                    extract($key);
                                                    echo '' . $total . '';
                                                }
                                            } else {
                                                echo ' Không có sản phẩm ';
                                            }
                                            ?>
                                        </span></a></li>
                                

                            </ul>
                                        </br>
                           
                            
                            <form action="index.php?act=pay" method="post">
                                <button type="submit" value="submit" name="redirect" class="btn_bill">Thanh toán</button>
                            </form>
                            <?php
                            $user_id = $_SESSION['user_id'];

                            if (isset($_POST['redirect'])) {
                                $dell_cart = new carts();
                                $dell = $dell_cart->dell_cart_user_id($user_id);
                                thanh_toan();

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
    ob_end_flush();
    ?>
    <!-- End footer Area -->



</body>