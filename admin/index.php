<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Quản trị</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/ruang-admin.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php
	include("../dao/pdo.php");
	include("../dao/users.php");
	include("../dao/categories.php");
	include("../dao/blogs.php");
	include("../dao/comments.php");
	include("../dao/bill_details.php");
	include("../dao/bill.php");
	include("../dao/product_categoryes.php");
	include("../dao/products.php");
	include("../global.php");
	include("../dao/vochers.php");


	$action = "login";
	if (isset($_GET['act']))
		$action = $_GET['act'];

	switch ($action) {
		case "login":
			include 'login.php';
			break;
		case 'categories':
			if(isset($_SESSION['user_id'])){
				include 'categories.php';
			}else{
				include '404.php';
			}
			break;
		case 'update_categories':
			if(isset($_SESSION['user_id'])){
				include 'update_categories.php';
			}else{
				include '404.php';
			}
			break;
		case 'products':
			if(isset($_SESSION['user_id'])){
				include 'products.php';
			}else{
				include '404.php';
			}
			break;
		case 'clients':
			if(isset($_SESSION['user_id'])){
				include 'clients.php';
			}else{
				include '404.php';
			}
			break;
		case 'staffs':
			if(isset($_SESSION['user_id'])){
				include 'staffs.php';
			}else{
				include '404.php';
			}
			break;
		case 'blogs':
			if(isset($_SESSION['user_id'])){
				include 'blogs.php';
			}else{
				include '404.php';
			}
			break;
		case 'update_blogs':
			if(isset($_SESSION['user_id'])){
				include 'update_blogs.php';
			}else{
				include '404.php';
			}
			break;
		case 'charts':
			if(isset($_SESSION['user_id'])){
				include 'charts.php';
			}else{
				include '404.php';
			}
			break;
		case 'comments':
			if(isset($_SESSION['user_id'])){
				include 'comments.php';
			}else{
				include '404.php';
			}
			break;
		case 'bills':
			if(isset($_SESSION['user_id'])){
				include 'bills.php';
			}else{
				include '404.php';
			}
			break;
		case 'add_products':
			if(isset($_SESSION['user_id'])){
				include 'add_products.php';
			}else{
				include '404.php';
			}
			break;
		case 'home':
			if(isset($_SESSION['user_id'])){
				include 'home.php';
			}else{
				include '404.php';
			}
			break;
		case 'change_password':
			if(isset($_SESSION['user_id'])){
				include 'change_password.php';
			}else{
				include '404.php';
			}
			break;
		case 'add_blogs':
			if(isset($_SESSION['user_id'])){
				include 'add_blogs.php';
			}else{
				include '404.php';
			}
			break;
		case 'edit_product':
			if(isset($_SESSION['user_id'])){
				include 'edit_product.php';
			}else{
				include '404.php';
			}
			break;
		case 'bill_detail':
			if(isset($_SESSION['user_id'])){
				include 'bill_detail.php';
			}else{
				include '404.php';
			}
			break;
			// case '404':
			// 	include '404.php';
			// 	break;
		case 'add_staffs':
			if(isset($_SESSION['user_id'])){
				include 'add_staffs.php';
			}else{
				include '404.php';
			}
			break;
		case 'vochers':
			if(isset($_SESSION['user_id'])){
				include 'vochers.php';
			}else{
				include '404.php';
			}
			break;
		case "logout":
			unset($_SESSION['user_id']);
			header("location: index.php");
			break;
		case 'editvocher':
			if(isset($_SESSION['user_id'])){
				include 'editvocher.php';
			}else{
				include '404.php';
			}
			break;
			// case "update";
			// 	include 'update.php';
		case "info_admin";
			if(isset($_SESSION['user_id'])){
				include 'info_admin.php';
			}else{
				include '404.php';
			}
			break;
		case "modals";
			if(isset($_SESSION['user_id'])){
				include 'modals.php';
			}else{
				include '404.php';
			}
			break;
		case "update";
			if(isset($_SESSION['user_id'])){
				include 'update_admin.php';
			}else{
				include '404.php';
			}
			break;
	}

	?>
    <!-- <a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a> -->
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    //hiển thị hình ảnh khi được up lên 

    //hiển thị hình ảnh khi được up
    function previewImage(input) {
        var preview = document.getElementById('imagePreview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            if (file) {
                preview.src = reader.result;
                preview.style.display = 'block'; // Hiển thị hình ảnh khi đã tải lên
            } else {
                preview.src = "";
                // preview.style.display = 'none'; // Ẩn hình ảnh khi không có file
            }
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.style.display = 'none'; // Ẩn hình ảnh khi không có file
        }
    }
    </script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script src="js/script.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/ruang-admin.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level custom scripts -->
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    </script>
</body>

</html>