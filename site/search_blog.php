<?php
  ob_start();
?>

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
                    <h1>Trang tin tức</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php?act=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.php?act=blog">Tin tức</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Categorie Area =================-->
    <!--  <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="content/img/blog/cat-post/cat-post-3.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="blog-details.html">
                                    <h5>Đời sống xã hội</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Tận hưởng cuộc sống xã hội của bạn cùng nhau</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="content/img/blog/cat-post/cat-post-2.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="blog-details.html">
                                    <h5>Politics</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Hãy là một phần của chính trị</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="content/img/blog/cat-post/cat-post-1.jpg" alt="post">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="blog-details.html">
                                    <h5>Đồ ăn</h5>
                                </a>
                                <div class="border_line"></div>
                                <p>Hãy để thức ăn được hoàn thành</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->

    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        <?php
                          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                          $postsPerPage = 5;
                          $blog = blogs_selectall($currentPage, $postsPerPage);
                          $count = 0;
                          
                        if (isset($_GET["noidung"])) {
                            $key = $_GET["noidung"];
                            $blog = search_blog_selectalls($key,$currentPage,$postsPerPage);
                            if ($blog) {
                            foreach ($blog as $blogs) {
                                extract($blogs);
                                $more_link = "index.php?act=single-blog&blog_id=" . $blog_id;
                                $comment = comments_selectall($blog_id);
                                $excerpt = substr($content, 0, 400);
                                echo '                     
                                <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                       
                                        <ul class="blog_meta list">
                                          
                                            <li><a href="#">' . $day . '<i
                                                        class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#">' . $views_count . ' Lượt xem<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#">'.count($comment).' bình luận<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
                                        <div class="blog_details">
                                            <a href="' . $more_link . '">
                                                <h2>' . $title . '</h2>
                                            </a>
                                            <p>' . $excerpt . '</p>
                                            <a href="' . $more_link . '" class="white_bg_btn">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                                ';
                                $count++;
                            }} else {
                                echo'
                                <div class="blog_details"> 
                                                <h2>Bài viết '.$key.' không tìm thấy!</h2>
                                                </div>';
                            };
                        }
                        echo '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';
                        for ($i = 1; $i <= ceil(count(blogs_selectall()) / $postsPerPage); $i++) {
                            echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '"><a href="index.php?act=search_blog&page=' . $i . '&noidung='.$_GET["noidung"].'" class="page-link">' . $i . '</a></li>';
                        }
                        echo '</ul></nav>';
                        ?>

                        <!-- <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item"><a href="#" class="page-link">01</a></li>
                                <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                <li class="page-item"><a href="#" class="page-link">03</a></li>
                                <li class="page-item"><a href="#" class="page-link">04</a></li>
                                <li class="page-item"><a href="#" class="page-link">05</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="noidung"
                                        placeholder="Tìm kiếm bài viết" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Tìm kiếm bài viết'">
                                    <!--    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm kiếm bài viết'"-->
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="btn"><i
                                                class="lnr lnr-magnifier"></i></button>
                                    </span>
                            </form>
                    </div>
                    <div class="br"></div>

                    <?php
                    if (isset($_POST['btn'])) {
                        $noidung = $_POST['noidung'];
                        $redirect_url = "index.php?act=search_blog&noidung=" . urlencode($noidung);

                        // Sử dụng lệnh header để chuyển hướng
                        header("Location: " . $redirect_url);
                        exit(); // Đảm bảo dừng thực thi script sau lệnh header
                    }

                    ?>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Bài viết phổ biến</h3>

                        <?php
                        $blog = blogs_selectalls();
                        foreach ($blog as $blogs) {
                            extract($blogs);
                            $more_link = "index.php?act=single-blog&blog_id=" . $blog_id;
                            $excerpt = substr($content, 0, 400);
                            echo '
                                    <div class="media post_item">                     
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>' . $title . '</h3>
                                            </a>
                                            <p>' . $day . '</p>
                                        </div>
                                        </div>
                                    ';
                        }
                        ?>
                        <div class="br"></div>
                    </aside>




                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->


</body>
<?php
 ob_end_flush();
?>