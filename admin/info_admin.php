<style>
    .avarta {
        width: 100%;
        height: 300px;
    }

    .row {
        margin: 0 auto;
    }

    #profile {
        margin: 0 auto;
        font-size: 20px;

    }

    .card-body {
        list-style-type: none;
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
                <h1 class="h3 mb-0 text-gray-800">Thông tin tài khoảng</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoảng</li>
                </ol>
            </div>
            <div class="row mb-3">
                <div class="col-xl-7 col-lg-5" id="profile">
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin</h6>
                            <div class="dropdown no-arrow">

                            </div>
                        </div>

                        <?php
                        $fullname = new users();
                        foreach ($fullname->get_user_id($_SESSION['user_id']['user_id']) as $key) {
                            extract($key);
                            echo '
                           
                            <div class="card-body" >
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct">
                                        <div class="avarta"><img src="../content/img/product/'.$avarta.'" alt=""></div>
                                    </a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Tên: <span class="number"
                                            style="color: black; font-style: italic;">' . $fullname . '</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Địa chỉ: <span class="number"
                                            style="color: black; font-style: italic;">' . $address . '</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Điện thoại: <span class="number"
                                            style="color: black; font-style: italic;">' . $phone . '</span></a></li>
                            </div>
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                        aria-expanded="false" aria-controls="officeProduct"><span
                                            class="lnr lnr-arrow-right"></span>Email: <span class="number"
                                            style="color: black; font-style: italic;">' . $email . '</span></a></li>
                            </div>
                           ';
                           if($role == 0){
                            echo '
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                    aria-expanded="false" aria-controls="officeProduct"><span
                                        class="lnr lnr-arrow-right"></span>Chức vụ: <span class="number"
                                        style="color: black; font-style: italic;">Quản trị viên</span></a></li>
                             </div>
                            ';
                           }
                           elseif($role == 2){
                            echo '
                            <div class="mb-3">
                                <li class="main-nav-list"><a data-toggle="collapse" href="#officeProduct"
                                    aria-expanded="false" aria-controls="officeProduct"><span
                                        class="lnr lnr-arrow-right"></span>Chức vụ: <span class="number"
                                        style="color: black; font-style: italic;">Nhân viên</span></a></li>
                             </div>
                            ';
                           }

                           echo'
                            <div class="mb-3">
                                <li class="main-nav-list" style="margin-bottom: 2%">
                                    <a href="index.php?act=update">
                                        <button class="btn btn-primary btn-block confirm-button">Cập nhật thông tin</button>
                                    </a>
                                </li>
                                <li class="main-nav-list">
                                    <a href="index.php?act=logout">
                                        <button class="btn btn-primary btn-block confirm-button">Đăng xuất</button></a>
                                </li>
                            </div>
                        </div>

                    </div>
                </div>';
                        }
                        ?>
                        <!-- Area Chart -->



                        <!---Container Fluid-->
                    </div>
                </div>
            </div>
        </div>
        <?php
        include '../include/footer_admin.php';
        ?>
    </div>
    </div>
    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>