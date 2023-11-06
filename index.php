<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="./content/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Karma Shop</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="./content/css/add.css">
	<link rel="stylesheet" href="content/css/linearicons.css">
	<link rel="stylesheet" href="content/css/font-awesome.min.css">
	<link rel="stylesheet" href="content/css/themify-icons.css">
	<link rel="stylesheet" href="content/css/bootstrap.css">
	<link rel="stylesheet" href="content/css/owl.carousel.css">
	<link rel="stylesheet" href="content/css/nice-select.css">
	<link rel="stylesheet" href="content/css/nouislider.min.css">
	<link rel="stylesheet" href="content/css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="content/css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="content/css/magnific-popup.css">
	<link rel="stylesheet" href="content/css/main.css">
	<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body>
	<?php
	include("dao/pdo.php");
	include("dao/bill.php");
	include("dao/products.php");
	include("dao/users.php");
	$action = "home";
	if (isset($_GET['act']))
		$action = $_GET['act'];


	switch ($action) {
		case "home":
			include 'site/index.php';
			break;
		case "user":
			include 'site/user.php';
			break;
		case 'blog':
			include 'site/blog.php';
			break;
		case 'category':
			include 'site/category.php';
			break;
		case 'keyword':
			include 'site/keyword_search.php';
			break;
		case 'single-product':
			include 'site/single-product.php';
			break;
		case 'checkout':
			include 'site/checkout.php';
			break;
		case 'cart':
			include 'site/cart.php';
			break;
		case 'confirmation':
			include 'site/confirmation.php';
			break;
		case 'single-blog':
			include 'site/single-blog.php';
			break;
		case 'login':
			include 'site/login.php';
			break;
		case 'register':
			include 'site/register.php';
			break;
		case 'tracking':
			include 'site/tracking.php';
			break;
		case 'elements':
			include 'site/elements.php';
			break;
		case 'contact':
			include 'site/contact.php';
			break;
		case "logout":
			unset($_SESSION['user_id']);
			header("location: index.php");
			break;
	}
	?>



	<!-- <a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a> -->

</body><script src="./content/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="./content/js/vendor/bootstrap.min.js"></script>
<script src="./content/js/jquery.ajaxchimp.min.js"></script>
<script src="./content/js/jquery.nice-select.min.js"></script>
<script src="./content/js/jquery.sticky.js"></script>
<script src="./content/js/nouislider.min.js"></script>
<script src="./content/js/countdown.js"></script>
<script src="./content/js/jquery.magnific-popup.min.js"></script>
<script src="./content/js/owl.carousel.min.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="./content/js/gmaps.min.js"></script>
<script src="./content/js/main.js"></script>


<!-- 
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="admin/js/ruang-admin.min.js"></script> -->
<!-- Page level plugins -->
<script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
	$(document).ready(function() {
		$('#dataTable').DataTable({
			language: {
				"sEmptyTable": "Không có dữ liệu trong bảng",
				"sInfo": "Hiển thị từ _START_ đến _END_ của _TOTAL_ dòng",
				"sInfoEmpty": "Hiển thị 0 đến 0 của 0 dòng",
				"sInfoFiltered": "(được lọc từ tổng số _MAX_ dòng)",
				"sInfoPostFix": "",
				"sInfoThousands": ",",
				"sLengthMenu": "Hiển thị _MENU_ dòng",
				"sLoadingRecords": "Đang tải...",
				"sProcessing": "Đang xử lý...",
				"sSearch": "Tìm kiếm:",
				"sZeroRecords": "Không tìm thấy dòng nào phù hợp",
				"oPaginate": {
					"sFirst": "«",
					"sLast": "»",
					"sNext": "›",
					"sPrevious": "‹"
				},
				"oAria": {
					"sSortAscending": ": Sắp xếp tăng dần",
					"sSortDescending": ": Sắp xếp giảm dần"
				}
			}
		}); // ID From dataTable 
		$('#dataTableHover').DataTable({
			language: {
				"sEmptyTable": "Không có dữ liệu trong bảng",
				"sInfo": "Hiển thị từ _START_ đến _END_ của _TOTAL_ dòng",
				"sInfoEmpty": "Hiển thị 0 đến 0 của 0 dòng",
				"sInfoFiltered": "(được lọc từ tổng số _MAX_ dòng)",
				"sInfoPostFix": "",
				"sInfoThousands": ",",
				"sLengthMenu": "Hiển thị _MENU_ dòng",
				"sLoadingRecords": "Đang tải...",
				"sProcessing": "Đang xử lý...",
				"sSearch": "Tìm kiếm:",
				"sZeroRecords": "Không tìm thấy dòng nào phù hợp",
				"oPaginate": {
					"sFirst": "«",
					"sLast": "»",
					"sNext": "›",
					"sPrevious": "‹"
				},
				"oAria": {
					"sSortAscending": ": Sắp xếp tăng dần",
					"sSortDescending": ": Sắp xếp giảm dần"
				}
			}
		}); // ID From dataTable with Hover
	});
</script>


</html>