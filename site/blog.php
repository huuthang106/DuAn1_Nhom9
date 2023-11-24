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
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Tin tức</a>
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
                            
                            $blog = blogs_selectall();
                            foreach ($blog as $blogs) {
                                extract($blogs);
                                $more_link = "index.php?act=single-blog&blog_id=".$blog_id;
                                $excerpt = substr($content, 0, 400);
                                echo '                     
                                <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                       
                                        <ul class="blog_meta list">
                                          
                                            <li><a href="#">'.$day.'<i
                                                        class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a href="#">'.$views_count.' Lượt xem<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#">06 bình luận<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="img/blog/main-blog/m-blog-1.jpg" alt="">
                                        <div class="blog_details">
                                            <a href="'.$more_link.'">
                                                <h2>'.$title.'</h2>
                                            </a>
                                            <p>'.$excerpt.'</p>
                                            <a href="'.$more_link.'" class="white_bg_btn">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                                ';
                            }
                        ?>

                        <nav class="blog-pagination justify-content-center d-flex">
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
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="img/blog/author.png" alt="">
                            <h4>Charlie thợ cắt tóc</h4>
                            <p>Người viết blog cao cấp</p>
                            <div class="social_icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p>Chương trình đào tạo có những người ủng hộ và những người gièm pha. Một số người không
                                hiểu tại sao bạn phải chi tiền cho chương trình đào tạo khi bạn có thể có được. Chương
                                trình đào tạo có những người ủng hộ và những người gièm pha.</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết phổ biến</h3>

                            <?php
                                $blog = blogs_selectalls();
                                foreach ($blog as $blogs) {
                                    extract($blogs);
                                    $more_link = "index.php?act=single-blog&blog_id=".$blog_id;
                                    $excerpt = substr($content, 0, 400);
                                    echo '
                                    <div class="media post_item">                     
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>'.$title.'</h3>
                                            </a>
                                            <p>'.$day.'</p>
                                        </div>
                                        </div>
                                    ';
                                }
                            ?>

                            <div class="br"></div>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh mục bài đăng</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Công nghệ</p>
                                        <p>37</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Cách sống</p>
                                        <p>24</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Thời trang</p>
                                        <p>59</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Nghệ thuật</p>
                                        <p>29</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Đồ ăn</p>
                                        <p>15</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Ngành kiến ​​​​trúc</p>
                                        <p>09</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex justify-content-between">
                                        <p>Cuộc phiêu lưu</p>
                                        <p>44</p>
                                    </a>
                                </li>
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Bản tin</h4>
                            <p>
                                Ở đây, tôi tập trung vào một loạt các vật dụng và tính năng mà chúng ta sử dụng trong
                                cuộc sống mà không cần đắn đo kỹ lưỡng về chúng.
                            </p>
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup"
                                        placeholder="Enter email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'">
                                </div>
                                <a href="#" class="bbtns">Đăng ký</a>
                            </div>
                            <p class="text-bottom">Bạn có thể bỏ theo dõi bất cứ lúc nào</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Gắn thẻ đám mây</h4>
                            <ul class="list">
                                <li><a href="#">Công nghệ</a></li>
                                <li><a href="#">Thời trang</a></li>
                                <li><a href="#">Ngành kiến ​​​​trúc</a></li>
                                <li><a href="#">Thời trang</a></li>
                                <li><a href="#">Đồ ăn</a></li>
                                <li><a href="#">Công nghệ</a></li>
                                <li><a href="#">Cách sống</a></li>
                                <li><a href="#">Nghệ thuật</a></li>
                                <li><a href="#">Cuộc phiêu lưu</a></li>
                                <li><a href="#">Đồ ăn</a></li>
                                <li><a href="#">Cách sống</a></li>
                                <li><a href="#">Cuộc phiêu lưu</a></li>
                            </ul>
                        </aside>-->
                </div>
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