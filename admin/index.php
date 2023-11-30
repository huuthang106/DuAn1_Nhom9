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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
			include 'categories.php';
			break;
		case 'update_categories':
			include 'update_categories.php';
			break;
		case 'products':
			include 'products.php';
			break;
		case 'clients':
			include 'clients.php';
			break;
		case 'staffs':
			include 'staffs.php';
			break;
		case 'blogs':
			include 'blogs.php';
			break;
		case 'update_blogs':
			include 'update_blogs.php';
			break;
		case 'charts':
			include 'charts.php';
			break;
		case 'comments':
			include 'comments.php';
			break;
		case 'bills':
			include 'bills.php';
			break;
		case 'add_products':
			include 'add_products.php';
			break;
		case 'home':
			include 'home.php';
			break;
		case 'change_password':
			include 'change_password.php';
			break;
		case 'add_blogs':
			include 'add_blogs.php';
			break;
		case 'edit_product':
			include 'edit_product.php';
			break;
		case 'bill_detail':
			include 'bill_detail.php';
			break;
			// case '404':
			// 	include '404.php';
			// 	break;
		case 'add_staffs':
			include 'add_staffs.php';
			break;
		case 'vochers':
			include 'vochers.php';
			break;
		case "logout":
			unset($_SESSION['user_id']);
			header("location: index.php");
			break;
		case 'editvocher':
			include 'edit_vocher.php';
			break;
			// case "update";
			// 	include 'update.php';
		case "info_admin";
			include 'info_admin.php';
			break;
		case "modals";
			include 'modals.php';
			break;
		case "update";
			include 'update_admin.php';
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