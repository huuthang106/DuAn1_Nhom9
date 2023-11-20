<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Modals</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php
    include '../include/header_admin.php';
    ?>
    <!-- Sidebar -->


    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin</li>
        </ol>
      </div>

      <!-- Row -->
      <div class="row">
        <div class="col-lg-6">
          <!-- Modal basic -->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Username</h6>
            </div>
            <div class="card-body">
                <input type="text" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                Cập nhật
              </button>
            </div>
          </div>
          <!-- modal vertically centered -->
          <!---->
          <div class="card mb-6">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Password</h6>
            </div>
            <div class="card-body">
             <!-- <p>Toggle a working modal demo by clicking the button below. It will slide down and fade in from the
                top of the page.</p>-->
                <input type="text" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                Cập nhật
              </button>
            </div>
          </div>
        </div>



        <div class="col-lg-6">
          <!---->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Email</h6>
            </div>
            <div class="card-body">
            <!--  <p>Toggle a working modal demo by clicking the button below. It will slide down and fade in from the
                top of the page.</p>-->
                <input type="text" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                Cập nhật
              </button>
            </div>
          </div>
          <!---->
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Phone</h6>
            </div>
            <div class="card-body">
              <!--<p>Toggle a working modal demo by clicking the button below. It will slide down and fade in from the
                top of the page.</p>-->
                <input type="text" class="btn btn-primary" >
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                Cập nhật
              </button>
            </div>
          </div>
        </div>
        <!-- Row -->
         <!-- <div class="col-lg-6">
        
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Modal Basic</h6>
            </div>
            <div class="card-body">
              <p>Toggle a working modal demo by clicking the button below. It will slide down and fade in from the
                top of the page.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                Launch demo modal
              </button>
            </div>
          </div>-->
          <!--
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Modal Basic</h6>
            </div>
            <div class="card-body">
              <p>Toggle a working modal demo by clicking the button below. It will slide down and fade in from the
                top of the page.</p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                Launch demo modal
              </button>
            </div>
          </div>
        </div>-->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Bạn có muốn thay đổi thông tin</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Thay đổi</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Long 
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal Long</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h5 class="font-weight-bold">Title</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ac orci phasellus egestas tellus rutrum tellus. Suspendisse sed nisi lacus
                  sed. Erat pellentesque adipiscing commodo elit at imperdiet dui. Eget dolor morbi non arcu risus
                  quis varius quam. Elit ullamcorper dignissim cras tincidunt. At risus viverra adipiscing at in
                  tellus integer feugiat. Dictum non consectetur a erat nam at lectus urna. Est velit egestas dui id.
                  Sed id semper risus in hendrerit. Malesuada fames ac turpis egestas maecenas pharetra convallis
                  posuere. Pretium vulputate sapien nec sagittis aliquam. In hendrerit gravida rutrum quisque non.
                  Neque ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Lacus luctus accumsan
                  tortor posuere. Urna molestie at elementum eu facilisis. Neque egestas congue quisque egestas diam.
                  Turpis egestas integer eget aliquet nibh praesent. Egestas dui id ornare arcu odio ut.</p>
                <h5 class="font-weight-bold">Title</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Lacinia quis vel eros donec. Nec tincidunt praesent semper feugiat nibh sed
                  pulvinar proin gravida. Urna cursus eget nunc scelerisque viverra mauris in. Risus sed vulputate
                  odio ut enim blandit volutpat maecenas. Etiam sit amet nisl purus in mollis nunc. Aliquet bibendum
                  enim facilisis gravida neque convallis a. Aliquam id diam maecenas ultricies mi eget mauris. Et
                  malesuada fames ac turpis egestas sed. Venenatis cras sed felis eget.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>-->

        <!-- Modal Scrollable
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Modal scrollable title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h5 class="font-weight-bold">Title</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ac orci phasellus egestas tellus rutrum tellus. Suspendisse sed nisi lacus
                  sed. Erat pellentesque adipiscing commodo elit at imperdiet dui. Eget dolor morbi non arcu risus
                  quis varius quam. Elit ullamcorper dignissim cras tincidunt. At risus viverra adipiscing at in
                  tellus integer feugiat. Dictum non consectetur a erat nam at lectus urna. Est velit egestas dui id.
                  Sed id semper risus in hendrerit. Malesuada fames ac turpis egestas maecenas pharetra convallis
                  posuere. Pretium vulputate sapien nec sagittis aliquam. In hendrerit gravida rutrum quisque non.
                  Neque ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Lacus luctus accumsan
                  tortor posuere. Urna molestie at elementum eu facilisis. Neque egestas congue quisque egestas diam.
                  Turpis egestas integer eget aliquet nibh praesent. Egestas dui id ornare arcu odio ut.</p>
                <h5 class="font-weight-bold">Title</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Lacinia quis vel eros donec. Nec tincidunt praesent semper feugiat nibh sed
                  pulvinar proin gravida. Urna cursus eget nunc scelerisque viverra mauris in. Risus sed vulputate
                  odio ut enim blandit volutpat maecenas. Etiam sit amet nisl purus in mollis nunc. Aliquet bibendum
                  enim facilisis gravida neque convallis a. Aliquam id diam maecenas ultricies mi eget mauris. Et
                  malesuada fames ac turpis egestas sed. Venenatis cras sed felis eget.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Modal Center 
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal Vertically Centered</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Your Content
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>-->

        <!-- Modal Logout -->
        <!--  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>-->
        <!---Container Fluid-->
      </div>

      <!-- Footer -->
      <?php
      include '../include/footer_admin.php';
      ?>

    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>