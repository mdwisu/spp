<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
    header("Location: ../login");
    exit;
} else if (isset($_SESSION["login"]) ) {
  if ($_SESSION["nama_level"] != "petugas") {
    header("Location: ../login");
    exit;
  }
  
}
require '../functions/functions.php';
$pembayaran = query("SELECT *  FROM `pembayaran` ORDER BY tgl_bayar DESC");
if ( isset($_POST["cari"]) ) {  
	$pembayaran = caripembayaran($_POST["keyword"]);
}
 ?>
<?php if (isset($_POST["cari2"])) {
	$pembayaran = caripembayaran2($_POST["date1"], $_POST["date2"]);
} ?>
<?php include 'header_petugas.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>History pembayaran</title>
</head>
<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
<style type="text/css">
	@media print {
		 .sidebar {
		 	display: none;
		 	margin: 0;
		 }
		 body .content {
		 	margin: 0 0 0 0;
		 }
		 .content .link2, .input1, .date {
		 	display: none;
		 }
	}
</style>
<body>
	<div class="content">
		<h1 class="1">History pembayaran</h1>
		<!-- <a class="link2" href="tambah_data_pembayaran.php">input data pembayaran baru</a> -->
		<br>
<form method="post">
  <input type="text" class="input1" autofocus name="keyword" placeholder="Search nisn, nis, nama, or no_telp" autocomplete="off"id="keyword">
  <button type="submit" hidden="" name="cari" id="tombol-cari">Cari!</button>
</form>
<form method="post">
	<input type="date" name="date1" class="date">
	<input type="date" name="date2" class="date">
	<button type="submit" name="cari2" class="date">tampilkan</button>
</form>
<button class="date" onclick="myFunction()">Print</button>
<script>function myFunction() {
window.print();
}
</script>
		
		<table border="1" cellpadding="10" cellspacing="0  ">
 		<tr>
 			<th>id_pembayaran</th>
 			<th>nama_petugas</th>
 			<th>nisn</th>
 			<th>tgl_bayar</th>
			<th>bulan_dibayar</th>
			<th>tahun_dibayar</th>
			<th>id_spp</th>
			<th>jumlah_bayar</th>


 		</tr>
 		<?php $i = 1; ?>
 		<?php foreach ($pembayaran as $row): ?>
 		<tr>
 			<td><?= $row["id_pembayaran"]; ?></td>
 			<?php
 			$nama = $row["id_petugas"]; 
 			$nama_petugas = query("SELECT nama_petugas FROM petugas WHERE id_petugas = '$nama'");
 			?>
 			<td><?= $nama_petugas[0]["nama_petugas"]; ?></td>
 			<td><?= $row["nisn"]; ?></td>
 			<?php $tgl = $row['tgl_bayar']; ?>
 			<td><?= date("d/m/Y", strtotime($tgl)); ?></td>
			<td><?= $row["bulan_dibayar"]; ?></td>
			<td><?= $row["tahun_dibayar"]; ?></td>
			<td><?= $row["id_spp"]; ?></td>
			<td><?= $row["jumlah_bayar"]; ?></td>
 		</tr>
 		<?php $i++; ?>
 	<?php endforeach; ?>
 	</table>
	</div>
</body>
</html>