<body>
    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php?act=home"><img src="./content/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php
                    include("./include/nav.php");
                    ?>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Tài khoảng</h1>
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
                            <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct" aria-expanded="false" aria-controls="officeProduct">
                                    <div class="avarta"><img src="../content/img/' . $avarta . '" alt=""></div>
                                </a></li>
    
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

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Mã đơn </th>
                                    <th>Chi tiết</th>
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
                                        
                                    </tr>
                                        ';
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
    ?>



</body>