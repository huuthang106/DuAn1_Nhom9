<body>
    <!-- Start Header Area -->
    <?php
    include("./include/nav.php");

    ?>

    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Tài khoản</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Tài khoảng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <div class="container-1">
        <div class="row" style="margin-left: 2%;">
            <div class="col-xl-13 ">
                <?php
                $user = new users();
                $user_id = $_SESSION['user_id'];

                foreach ($user->get_user_id($user_id) as $key) {
                    extract($key);
                    $updata = "index.php?act=updata&user_id=" . $user_id;
                    echo '
                        <div class="sidebar-categories">
                        <div class="head">Thông tin</div>
                        <ul class="main-categories">
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct">';
                    if ($avarta == null) {
                        # code...
                        echo ' <div class="avarta"><img src="../content/img/product/review-1.png" alt=""></div>';
                    } else {
                        echo '<div class="avarta"><img src="../content/img/product/' . $avarta . '" alt=""></div>';
                    }
                    echo '
                            </a></li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>ID<span class="number" style="color: black; font-style: italic;">' . $user_id . '</span></a></li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Tên<span class="number" style="color: black; font-style: italic;">' . $username . '</span></a></li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Địa chỉ<span class="number" style="color: black; font-style: italic;">' . $address . '</span></a></li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Điện thoại<span class="number" style="color: black; font-style: italic;">0' . $phone . '</span></a></li>
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct"><span class="lnr lnr-arrow-right"></span>Gmail<span class="number" style="color: black; font-style: italic;">' . $email . '</span></a></li>
                            <!-- Nút Cập nhật sử dụng Bootstrap -->
                            <li class="main-nav-list" style="margin-bottom: 2%">
                            <a href="' . $updata . '">
                                <button class="btn btn-primary">Cập nhật thông tin</button>
                                </a>
                            </li>
                            <li class="main-nav-list">
                                <a href="index.php?act=logout">
                                <button class="btn btn-primary">Đăng xuất</button></a>
                            </li>
    
    
                        </ul>
                    </div>
                                ';
                }

                ?>


            </div>

        </div>
        <div class="row-2">
            <!-- Datatables -->

            <div class="col-lg-18">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã đơn </th>
                                    <th>Chi tiết</th>
                                    <th>Trạng thái</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Mã đơn </th>
                                    <th>Chi tiết</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                $bill = new bills();
                                $select = $bill->get_bill_user_id($user_id);

                                if ($select !== false) {
                                    foreach ($select as $key) {
                                        // Xử lý dữ liệu ở đây
                                        extract($key);
                                        $bill_detail = 'index.php?act=';
                                        echo '
                                        <tr>
                                        <td>' . $bill_id . '</td>
                                        <td><a href="#">
                                        <button class="btn btn-primary">Xem</button></a></td>

                                        ';
                                        if ($status == 1) {
                                            # code...
                                            echo '
                                            <td> Chưa duyệt </td>
                                             </tr>
                                    ';
                                        } elseif ($status == 2) {
                                            echo '
                                            <td> Đã duyệt </td>
                                             </tr>
                                             
                                    ';
                                        }
                                        elseif ($status == 3) {
                                            echo '
                                            <td> Đã dao </td>
                                             </tr>
                                             
                                    ';
                                        }
                                        elseif ($status == 4) {
                                            echo '
                                            <td> Đã hủy </td>
                                             </tr>
                                             
                                    ';
                                        }
                                        
                                    }
                                }

                                ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- DataTable with Hover -->

        </div>
    </div>


    <?php
    include("./include/footer.php");
    if (isset($_GET['vnp_BankCode'])) {
        $dell_cart = new carts();
        $dell = $dell_cart->dell_cart_user_id_no_next_page($user_id);
        $new_bill = new bills();
        $item_new_bill = $new_bill->new_bill($_SESSION['user_id']);
        $new_bill = new bills();
        $approve_the_transfer_application = new bills();
        $key = $approve_the_transfer_application->approve_the_transfer_application($item_new_bill);
    }
    ?>



</body>