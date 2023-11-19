<?php
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']['role'] == 0) {
        // Thực hiện mã HTML/CSS cho vai trò 0
?>
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?act=home">
                <div class="sidebar-brand-icon">
                    <img src="img/logo/logo2.png">
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Điều hướng
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Quản lý</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý</h6>
                        <a class="collapse-item" href="index.php?act=categories">Quản lý loại sản phẩm</a>
                        <a class="collapse-item" href="index.php?act=products">Quản lý sản phẩm</a>
                        <a class="collapse-item" href="index.php?act=clients">Quản lý khách hàng</a>
                        <a class="collapse-item" href="index.php?act=staffs">Quản lý nhân viên</a>
                        <a class="collapse-item" href="index.php?act=comments">Quản lý bình luận</a>
                        <a class="collapse-item" href="index.php?act=bills">Quản lý đơn hàng</a>
                        <a class="collapse-item" href="index.php?act=blogs">Quản lý bài viết</a>
                        <a class="collapse-item" href="index.php?act=add_products">Thêm sản phẩm</a>
                        <a class="collapse-item" href="index.php?act=add_blogs">Thêm bài viết</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small"><?php
                                    $fullname = new users();
                                    foreach($fullname ->get_user_id($_SESSION['user_id']['user_id']) as $key){
                                        extract($key);
                                        echo ''.$fullname.'';
                                    }
                                ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Thông tin tài khoản
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Cập nhật tài khoản
                                </a>
                                <a class="dropdown-item" href="index.php?act=change_password">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i> Đổi mật khẩu
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
            <?php
        } else {
            // Thực hiện mã HTML/CSS cho vai trò khác 0
            ?>
                <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?act=home">
                        <div class="sidebar-brand-icon">
                            <img src="img/logo/logo2.png">
                        </div>
                        <div class="sidebar-brand-text mx-3">Admin</div>
                    </a>
                    <hr class="sidebar-divider my-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?act=home">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Bảng điều khiển</span></a>
                    </li>
                    <hr class="sidebar-divider">
                    <div class="sidebar-heading">
                        Điều hướng
                    </div>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
                            <i class="far fa-fw fa-window-maximize"></i>
                            <span>Quản lý</span>
                        </a>
                        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Quản lý</h6>
                                 <a class="collapse-item" href="index.php?act=categories">Quản lý loại sản phẩm</a>
                                <a class="collapse-item" href="index.php?act=products">Quản lý sản phẩm</a>
                                <a class="collapse-item" href="index.php?act=clients">Quản lý khách hàng</a>
                                <a class="collapse-item" href="index.php?act=staffs">Quản lý nhân viên</a>
                                <a class="collapse-item" href="index.php?act=comments">Quản lý bình luận</a>
                                <a class="collapse-item" href="index.php?act=bills">Quản lý đơn hàng</a>
                                <a class="collapse-item" href="index.php?act=blogs">Quản lý bài viết</a>
                                <a class="collapse-item" href="index.php?act=add_products">Thêm sản phẩm</a>
                                <a class="collapse-item" href="index.php?act=add_blogs">Thêm bài viết</a>
                            </div>
                        </div>
                    </li>

                    <hr class="sidebar-divider">

                </ul>
                <!-- Sidebar -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <!-- TopBar -->
                        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>
                            <ul class="navbar-nav ml-auto">
                                <div class="topbar-divider d-none d-sm-block"></div>
                                <li class="nav-item dropdown no-arrow">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                                        <span class="ml-2 d-none d-lg-inline text-white small"><?php
                                    $fullname = new users();
                                    foreach($fullname ->get_user_id($_SESSION['user_id']['user_id']) as $key){
                                        extract($key);
                                        echo ''.$fullname.'';
                                    }
                                ?></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Thông tin tài khoản
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Cập nhật tài khoản
                                        </a>
                                        <a class="dropdown-item" href="index.php?act=change_password">
                                            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i> Đổi mật khẩu
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Đăng xuất
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    <?php
                }
            } else {
                include 'index.php?act=404';
                    ?>

                <?php
             }
                ?>