<body class="bg-gradient-login">
    <!-- Login Content -->
    <div id="wrapper">
        <?php
        include("../include/header_admin.php");
        ?>
        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Đổi mật khẩu</h1>
                                        </div>
                                        <form action="index.php?act=change_password" method="post" class="user">
                                            <div class="err"></div>
                                            <div class="form-group">
                                                <input required type="password" class="form-control" name="password" id="exampleInputPassword" placeholder="Mật khẩu cũ">
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" class="form-control" name="new_password" id="exampleInputPassword" placeholder="Mật khẩu mới">
                                            </div>
                                            <div class="form-group">
                                                <input required type="password" class="form-control" name="confirm_password" id="exampleInputPassword" placeholder="Nhập lại mật khẩu mới">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block confirm-button">Đồng ý</button>
                                            </div>
                                            <br>
                                            <?php

                                            if (isset($_POST["submit"])) {
                                                $user_id = trim($_SESSION["user_id"]['user_id']);
                                                $old_password = trim($_POST["password"]);
                                                $new_password = trim($_POST["new_password"]);
                                                $confirm_password = trim($_POST["confirm_password"]);
                                                if (empty($_POST["password"] || $_POST["new_password"] || $_POST["confirm_password"])) {
                                                    # code...
                                                    echo '
                                                        <div class="error-message">
                                                        <i class="fa-solid fa-circle-exclamation"></i> Không được bỏ trống !
                                                        </div><br>
                                                    ';
                                                } else if ($new_password != $confirm_password) {
                                                    echo '
                                                    <div class="error-message">
                                                    <i class="fa-solid fa-circle-exclamation"></i> Mật khẩu xác nhận không chính xác !
                                                    </div><br>
                                                    ';
                                                } else {
                                                    $change_paswoss = new users();
                                                    $change_paswoss->change_password($user_id, $old_password, $new_password);
                                                    if ($change_paswoss === true) {
                                                    }
                                                }
                                            }
                                            ?>
                                            <hr>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <?php
    include '../include/footer_admin.php';
    ?>

    <!-- Login Content -->

</body>
