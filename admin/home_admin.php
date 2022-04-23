<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}?>
<?php 
require '../functions/functions.php';
$siswa = query("SELECT COUNT(*) as sis FROM siswa");
$petugas = query("SELECT COUNT(*) AS pet FROM petugas");
$kelas = query("SELECT COUNT(*) AS kel FROM kelas");
 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.adm1 {
			width: 100%;
			height: 20%;
			background-color: black;
		}
		.adm2 {
			width: 100%;
			height: 30%;
			background-color: salmon;
			box-sizing: border-box;
			padding: 30px;
		}
		.adm3 {
			width: 100%;
			height: 50%;
			background-color: blue;
		}
		.kotakadmin {
			width: 20%;
			box-sizing: border-box;
			height: 80%;
			background-color: white;
			display: inline-block;
		}
		.kotakadmin2 {
			background-color: black;
			width: 100%;
			height: 80%;
			color: white;
			font-size: 30px;
			text-align: center;
			line-height: 80px;
		}
	</style>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
	<div class="content">
		<div class="adm1">
			<br>
			<br>
		<h1 style="color: white;">selamat datang di web pembayaran spp</h1>
		</div>
			<div class="adm2">
				<div class="kotakadmin">
						<p style="text-align: center;">Jumlah Siswa</p>
						<div class="kotakadmin2"><?= $siswa[0]["sis"]; ?></div>
								</div>
				<div class="kotakadmin">
						<p style="text-align: center;">Jumlah Petugas</p>
						<div class="kotakadmin2"><?= $petugas[0]["pet"]; ?></div>
								</div>
				<div class="kotakadmin">
						<p style="text-align: center;">Jumlah Kelas</p>
						<div class="kotakadmin2"><?= $kelas[0]["kel"]; ?></div>
								</div>				
		</div>
		<div class="adm3"></div>
	</div>
</body>
</html>