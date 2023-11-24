<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php?act=home"><img src="./content/img/logo..png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item "><a class="nav-link" href="index.php?act=home">Trang chủ</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="index.php?act=category" class="nav-link dropdown-toggle">Sản phẩm</a>

                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="index.php?act=blog" class="nav-link dropdown-toggle">Blog</a>

                        </li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">Trang</a>
                            <ul class="dropdown-menu">
                                <?php
								if (!isset($_SESSION['user_id'])) {
									# code...
									echo '
						<li class="nav-item"><a class="nav-link" href="index.php?act=login">Đăng nhập</a></li>
						';
								}else{
									echo '<li class="nav-item"><a class="nav-link" href="index.php?act=favourites">Sản phẩm yêu thích</a></li>';
								}
								?>
                                <li class="nav-item"><a class="nav-link" href="index.php?act=tracking">Theo dõi đơn
                                        hàng</a></li>

                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=contact">Liên hệ</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
						if (isset($_SESSION['user_id'])) {
							echo '<li class="nav-item"><a href="index.php?act=user" class="user"><span class="lnr lnr-user"></span></a></li>';
						}
						?>

                        <li class="nav-item"><a href="index.php?act=cart" class="cart"><span class="ti-bag"></span></a>
                        </li>
                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form action="index.php?act=keyword" method="post" class="d-flex justify-content-between">
                <input type="text" class="form-control" id="search_input" placeholder="Tìm kiếm" name="key">
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>