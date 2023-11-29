<body>
    <!-- Start Header Area -->


    <?php
            include("./include/nav.php");
            ?>
    <!-- Start Header Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Lấy lại mật khẩu</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Lấy lại mật khẩu</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="content/img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Bạn có phải là người mới?</h4>
                            <p>Để trải nghiệm một cách tốt những chức năng, nếu bạn là người mới thì hãy nhanh tay đăng
                                ký tài khoản để được những ưu đãi đặt biệt cho những thành viên mới</p>
                            <a class="primary-btn" href="index.php?act=register">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Lấy lại mật khẩu</h3>
                        <form class="row login_form" action="index.php?act=forgot_password" method="post"
                            id="contactForm">
                            <div class="col-md-12 form-group">

                            </div>
                            <?php
                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\Exception;
                            
                            require 'phpmailer/src/Exception.php';
                            require 'phpmailer/src/PHPMailer.php';
                            require 'phpmailer/src/SMTP.php';
                            
                            if(isset($_POST['repass']) && $_POST['repass']) {
                                $email = $_POST['email'];
                                
                                // Kiểm tra xem email tồn tại trong cơ sở dữ liệu không
                                $check_email = check_email($email);
                                
                            
                                if(is_array($check_email)) {
                                    // Email tồn tại, lấy mật khẩu từ cơ sở dữ liệu

                                   
                                    $new_token = rand(0000, 9999);
                                    insert_token($new_token, $check_email['email']);
                                    $token = select_token($check_email['email']);
                                    
                                    // Gửi email chứa mật khẩu đến địa chỉ email từ form
                                    $mail = new PHPMailer(true);
                            
                                    try {
                                        $mail->isSMTP();                                           
                                        $mail->Host       = 'smtp.gmail.com';                     
                                        $mail->SMTPAuth   = true;                                 
                                        $mail->Username   = 'khuonghapc06329@fpt.edu.vn';                     
                                        $mail->Password   = 'rspctxfwuaypoyuk';                              
                                        
                                        $mail->Port       = 587;      
                                       
                                       
                                        // Thiết lập thông tin người gửi và người nhận
                                        $mail->setFrom('khuonghapc06329@fpt.edu.vn', 'Second Hand');
                                        $mail->addAddress($email);
                            
                                        // Thiết lập nội dung email
                                        $mail->isHTML(true);
                                        $mail->Subject = 'Please click on the link below to confirm to retrieve your new password:';
                                        $mail->Body = 'Link: http://duan1/index.php?act=change_new_password&token=' .$token['token'].'&email='.$check_email['email'];
                            
                                        // Gửi email
                                        $mail->send();
                            
                                        echo "
                                        <script>
                                            alert('Gửi mail thành công');
                                            document.location.href = '../index.php?act=forgot_password';
                                        </script>";
                                    } catch (Exception $e) {
                                        echo "Không thể gửi mail. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                } else {
                                    // Email không tồn tại trong cơ sở dữ liệu
                                    echo '
                                        <div class="error-message">
                                            <i class="fa-solid fa-circle-exclamation"></i> Email không tồn tại !!!
                                        </div>';
                                }
                            }
                            
                                ?>
                            <div class="col-md-12 form-group">
                                <input required type="email" class="form-control" name="email"
                                    placeholder="Nhập email để lấy lại mật khẩu">
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" name="repass" class="primary-btn">Gửi
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================End Login Box Area =================-->
    <!-- start footer Area -->
    <?php
    include("./include/footer.php");
    ?>
    <!-- End footer Area -->
</body>