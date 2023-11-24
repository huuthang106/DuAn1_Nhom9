<body>
    <?php
    include("./include/nav.php");
    ?>
    <!-- End Header Area -->
    <?php
    if(isset($_GET['blog_id'])){
        blogs_update_views($_GET['blog_id']);
    }
    ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Trang bài viết</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php?act=home">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Bài viết</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <?php
                            $blog = blogs_detail_selectalls($_GET['blog_id']);
                            foreach ($blog as $blogs) {
                                extract($blogs);
                                $next = ($blog_id + 1);
                                $after =  ($blog_id - 1);
                                $more_link = "index.php?act=single-blog&blog_id=".$blog_id;
                                $next_link = "index.php?act=single-blog&blog_id=" .$next ;
                                $after_link = "index.php?act=single-blog&blog_id=" .$after;
                                
                                echo '                     
                                <div class="single-post row">
                                <div class="col-lg-12">
                                    <div class="feature-img">
                                        <img class="img-fluid" src="/img/blog/feature-img1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-3  col-md-3">
                                    <div class="blog_info text-right">
                                        
                                        <ul class="blog_meta list">
                                            <li><a href="#">'.$day.'<i class="lnr lnr-calendar-full"></i></a>
                                            </li>
                                            <li><a href="#">'.$views_count.' lượt xem<i class="lnr lnr-eye"></i></a></li>
                                            <li><a href="#">06 Bình Luận<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                        <ul class="social-links">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 blog_details">
                                    <h2>'.$title.'</h2>
                                    <p class="excert">'.$content.'</p>
                                </div>
                            </div>
                            ';

                            $existingBlog = array_column(blogs_selectall(), 'blog_id');
							if(!in_array($next, $existingBlog)){
                                    echo '
                                    <div class="navigation-area">
                                    <div class="row">
                                        <div
                                            class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                            <div class="thumb">
                                                <a href=""><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                            </div>
                                            <div class="detials">
                                                <a href="'.$after_link.'">
                                                    <h4>&#8592; Bài viết trước</h4>
                                                </a>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                            <div class="detials">
                                            
                                            </div>
                                            <div class="thumb">
                                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }elseif($after <= 0){
                                echo '
                                <div class="navigation-area">
                                <div class="row">
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href=""><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                        </div>
                                        
                                        <div class="detials">
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <a href="'.$next_link.'">
                                                <h4>Bài viết sau &#8594;</h4>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                ';
                            }else{
                                echo '
                                    <div class="navigation-area">
                                    <div class="row">
                                        <div
                                            class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                            <div class="thumb">
                                                <a href=""><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                                            </div>
                                            
                                            <div class="detials">
                                                <a href="'.$after_link.'">
                                                    <h4>&#8592; Bài viết trước</h4>
                                                </a>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                            <div class="detials">
                                                <a href="'.$next_link.'">
                                                    <h4>Bài viết sau &#8594;</h4>
                                                </a>
                                            </div>
                                            <div class="thumb">
                                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                                }
                            }
                        ?>


                    <div class="comments-area">

                        <?php   
                               
                                $comment = comments_selectall($blog_id);
                            $count=0;
                                foreach ($comment as $comments) {
                                    extract($comments);
                                    $more_link = "index.php?act=single-blog&blog_id=".$blog_id;
                                    $user = users_selectall($user_id);
                                    if($status == 2){
                                    echo '
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <img src="img/blog/c5.jpg" alt="">
                                                </div>
                                                <div class="desc">
                                                    <h5><a href="#">'.$user['fullname'].'</a></h5>
                                                    <p class="date">'.$day.'</p>
                                                    <p class="comment">
                                                        '.$text.'
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="" class="btn-reply text-uppercase">hồi đáp</a>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                    $count++;
                                }
                                
                                }
                                echo '<h4>' . $count . ' Bình Luận</h4>';
                                
                            ?>

                    </div>
                    <?php 
                    if(isset($_SESSION['user_id'])) {
                        if(isset($_POST['send']) && isset($_GET['blog_id'])){
                            $text = $_POST['text'];
                            $blog_id = $_GET['blog_id'];
                            $user_id = $_SESSION['user_id']['user_id'];
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
                            $day = date('Y-m-d H:i:s');
                            $status = 2;
                            if(empty($text)) {

                            }else{
                            comment_insert($user_id, $blog_id, $text, $day, $status);
                            echo '
                            <script>
                            window.location.href = "index.php?act=single-blog&blog_id='.$blog_id.'";
                            </script>
                            ';

                        }
                    }
                    ?>
                    <div class="comment-form">
                        <h4>Để lại một ý kiến của bạn</h4>
                        <form action="index.php?act=single-blog&blog_id=<?php echo $_GET['blog_id']; ?>" method="post">
                            <input type="hidden" name="status" value="<?=$status?>">
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="text" placeholder="Nội dung"
                                    required=""></textarea>
                            </div>
                            <input type="submit" name="send" value="Đăng bình luận" style="border: none"
                                class="primary-btn submit_btn">
                        </form>
                    </div>
                    <?php }else{ ?>

                    <div class="comment-form">
                        <h4>Để lại một ý kiến của bạn</h4>
                        <form action="index.php?act=single-blog" method="post">
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="text" placeholder="Nội dung"
                                    required=""></textarea>
                            </div>
                            <a href="index.php?act=login" class="primary-btn submit_btn">đăng bình luận</a>
                        </form>
                    </div>


                    <?php } ?>

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
                            <img class="author_img rounded-circle" src="content/img/blog/author.png" alt="">
                            <h4>Charlie Barber</h4>
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
                            <h3 class="widget_title">Bài viết mới nhất</h3>
                            <?php
                                $blog = blogs_selectalls();
                                foreach ($blog as $blogs) {
                                    extract($blogs);
                                    $more_link = "index.php?act=single-blog&blog_id=".$blog_id;
                                    $excerpt = substr($content, 0, 400);
                                    echo '
                                    <div class="media post_item">                     
                                        <div class="media-body">
                                            <a href="'.$more_link.'">
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

                        <!--  <aside class="single_sidebar_widget post_category_widget">
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
                                        <p>Art</p>
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
                            <h4 class="widget_title">Newsletter</h4>
                            <p>
                                Here, I focus on a range of items and features that we use in life without
                                giving them a second thought.
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
                                <a href="#" class="bbtns">Subcribe</a>
                            </div>
                            <p class="text-bottom">You can unsubscribe at any time</p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget tag_cloud_widget">
                            <h4 class="widget_title">Tag Clouds</h4>
                            <ul class="list">
                                <li><a href="#">Công nghệ</a></li>
                                <li><a href="#">Thời trang</a></li>
                                <li><a href="#">Ngành kiến ​​​​trúc</a></li>
                                <li><a href="#">Thời trang</a></li>
                                <li><a href="#">Đồ ăn</a></li>
                                <li><a href="#">Công nghệ</a></li>
                                <li><a href="#">Cách sống</a></li>
                                <li><a href="#">Art</a></li>
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