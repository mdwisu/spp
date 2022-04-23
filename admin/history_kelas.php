<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$kelas = $_GET['idkelas'];
$siswa = query("SELECT * FROM siswa WHERE id_kelas = '$kelas'");

 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>History pembayaran kelas </title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
<body>
	<div class="content">
		<h1 class="1">History pembayaran</h1>
<form method="post" action="history_kelas_bulan.php" class="hiddenprint">
	Tampilkan pada bulan dan tahun <br>
			<input type="month" name="tahun">
	<button class="link2">tampilkan</button>
</form>
<button class="link2 hiddenprint" onclick="myFunction()">Print</button>
<script>function myFunction() {
window.print();
}
</script>
		<div class="overflow">
		<table border="1" cellpadding="10" cellspacing="0  ">
 		<tr>
 			<th>nisn</th>
 			<th>nis</th>
 			<th>nama</th>
			<th>jumlah_yang_sudah_dibayar</th>


 		</tr>
 		<?php foreach ($siswa as $row): ?>
 		<tr>
 			<td><?= $row["nisn"]; ?></td>
 			<td><?= $row["nis"]; ?></td>
 			<?php
 			$nisn = $row["nisn"];
 			$nama_siswa = query("SELECT nama FROM siswa WHERE nisn = $nisn");?>
 			<td><?= $nama_siswa[0]["nama"]; ?></td>
			<?php 
			$jumlah = query("SELECT COUNT(bulan_dibayar) FROM pembayaran WHERE nisn = '$nisn'") ?>
			<td><?= $jumlah[0]['COUNT(bulan_dibayar)']; ?></td>
 		</tr>
 		<?php endforeach ?>
 	</table>
 	</div>
	</div>
</body>
</html>