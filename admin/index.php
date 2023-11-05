<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>
<body>
<?php
	include("../dao/pdo.php");
	$action = "home";
	if (isset($_GET['act']))
		$action = $_GET['act'];


	switch ($action) {
		case "home":
			include 'home.php';
			break;
		case 'categories':
			include 'categories.php';
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
		case 'charts':
			include 'charts.php';
			break;
		case 'comments':
			include 'comments.php';
			break;
		case 'bills':
			include 'bills.php';
			break;
		case "logout":
			unset($_SESSION['user_id']);
			header("location: index.php");
			break;
	}
	?>
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>