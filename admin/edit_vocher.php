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
                <h1 class="h3 mb-0 text-gray-800">Cập mã giảm giá</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
                    <li class="breadcrumb-item"> Mã giảm giá</li>
                    <li class="breadcrumb-item active" aria-current="page">Cập nhật mã giảm giá </li>
                </ol>
            </div>

            <div class="container">
                <div class="card px-1 py-4">
                    <div class="card-body">

                        <h5 class="information mt-4">Cập nhật mã giảm giá</h5>
                        <h6 class="information mt-4">Tên mã</h6>

                        <form action="index.php?act=editvocher&vocher_id=<?php echo $_GET['vocher_id']; ?>" method="post" enctype="multipart/form-data">
                            <?php
                            $select_vochers = new vochers();
                            $start = $select_vochers->get_vocher_id($_GET['vocher_id']);
                            if ($start) {
                                foreach ($start as $key) {
                                    extract($key);
                                    echo '
                            <input type="hidden" value=' . $vocher_id . ' name="vocher_id">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" value="' . $name . '" placeholder="" required>
                                    </div>
                                </div>
                            </div>
                            <h6 class="information mt-4">Giá trị</h6>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="sale" value="' . $sale . '" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" d-flex flex-column text-center px-5 mt-3 mb-3"> </div> <input type="submit" name="submit" class="btn btn-primary btn-block confirm-button" value="Cập nhật">
                            </form>
                            ';
                                }
                            }
                            else {
                                # code..
                                echo ' <h5 class="information mt-4">Không có dữ liệu</h5>';
                                
                            }

                                if(isset($_POST['submit'])){
                                    $name = $_POST['name'];
                                    $sale = $_POST['sale'];
                                    $vocher_id = $_POST['vocher_id'];
                                    $updata = new vochers();
                                    $updata ->update_vocher_id($vocher_id,$name,$sale);
                                    // var_dump($name,$sale,$vocher_id);
                                }
                            ?>

                      


                    </div>
                </div>
            </div><br>

        </div>
    </div>
    </div>
    <?php
    include("../include/footer_admin.php")
    ?>
</body>