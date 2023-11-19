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
        <h1 class="h3 mb-0 text-gray-800">Quản lý hàng hóa</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?act=home">Trang chủ</a></li>
          <li class="breadcrumb-item">Quản lý</li>
          <li class="breadcrumb-item active" aria-current="page">Hàng hóa</li>
        </ol>
      </div>

      <!-- Row -->
      <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Bảng hàng hóa</h6>
            </div>
            <div class="table-responsive p-3">
              <table class="table align-items-center table-flush" id="dataTable">
                <thead class="thead-light">
                  <tr>
                    <th>Mã </th>
                    <th>Tên sản phẩm</th>
                    <th>Loại</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Giá </th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Mã </th>
                    <th>Tên sản phẩm</th>
                    <th>Loại</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Giá </th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $products = new products();
                  foreach ($products->getProduct() as $key) {
                    extract($key);
                    $edit_link = 'index.php?act=edit_product&product_id=' . $product_id;
                    $dell_link = 'index.php?act=products&product_id=' . $product_id . '&status=0';
                    $updata_link = 'index.php?act=products&product_id=' . $product_id . '&status=1';
                    if ($status == 1) {
                      echo '
                            <tr>
                              <td>' . $product_id . '</td>
                              <td>' . $name . '</td>
                              <td>' . $category_name . '</td>
                              <td>' . $color . '</td>
                              <td>' . $size . '</td>
                              <td>' . $price . '</td>
                              <td><a href="' . $edit_link . '" class="btn btn-sm btn-primary">Sửa</a></td>
                              <td><a href="' . $dell_link . '" class="btn btn-sm btn-danger">xóa</a></td>
                             </tr>
                          ';
                    } else {
                      echo '
                            <tr>
                              <td>' . $product_id . '</td>
                              <td>' . $name . '</td>
                              <td>' . $category_name . '</td>
                              <td>' . $color . '</td>
                              <td>' . $size . '</td>
                              <td>' . $price . '</td>
                              <td><a href="' . $edit_link . '" class="btn btn-sm btn-primary">Sửa</a></td>
                              <td><a href="' . $updata_link . '" class="btn btn-sm btn-success">Hiện</a></td>
                             </tr>
                          ';
                    }
                  }
                  if (isset($_GET['product_id']) && isset($_GET['status'])) {
                    # code...

                    $status = new products();
                    $status->update_status($_GET['product_id'], $_GET['status']);

                    exit;
                  }
                  ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- DataTable with Hover -->

      </div>

    </div>


  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
  include '../include/footer_admin.php';
  ?>

</body>