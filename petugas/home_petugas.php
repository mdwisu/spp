<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} else if (isset($_SESSION["login"]) ) {
  if ($_SESSION["nama_level"] != "petugas") {
    header("Location: ../login.php");
    exit;
  }
  
}
 ?>
 <?php include 'header_petugas.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
</head>
<body>
	<div class="content">
<h1>haiiiii</h1>
<?= var_dump($_SESSION); ?>
	</div>
</body>
</html>