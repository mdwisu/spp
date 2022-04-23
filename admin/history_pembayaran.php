<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$pembayaran = query("SELECT *  FROM `pembayaran` ORDER BY tgl_bayar DESC");
if ( isset($_POST["cari"]) ) {  
	$pembayaran = caripembayaran($_POST["keyword"]);
} else if (isset($_POST["cari2"])) {
	// pecah date 1
	$date1 = explode("/", $_POST["date1"]);
	$date1a = array( $date1[2], $date1[0], $date1[1] );
	$date11 = implode("-", $date1a);
	// pecah date 2
	$date2 = explode("/", $_POST["date2"]);
	$date2a = array( $date2[2], $date2[0], $date2[1] );
	$date22 = implode("-", $date2a);
	// insert
	$pembayaran = caripembayaran2($date11, $date22);
}
 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>History pembayaran</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
<style type="text/css">
	@media print {
		 .sidebar {
		 	display: none;
		 	margin: 0;
		 }
		 body .content {
		 	margin: 0 0 0 0;
		 }
		 .hiddenprint, hr {
		 	display: none;
		 }
	}
</style>
<body>
	<div class="content">
		<h1 class="1">History pembayaran</h1>
		<!-- <a class="link2" href="tambah_data_pembayaran.php">input data pembayaran baru</a> -->
		
<form method="post" class="hiddenprint">
	cari nisn
  <input type="text" class="input1" autofocus name="keyword" placeholder="Search nisn" autocomplete="off"id="keyword">
  <button type="submit" hidden="" name="cari" id="tombol-cari">Cari!</button>
</form>
<hr>
<form method="post" class="hiddenprint">
	cari tanggal
	 <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
	<input class="i" autocomplete="off" type="text" name="date1" id="datepicker">
	S.D
	 <script>
  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script>
	<input class="i" autocomplete="off" type="text" name="date2" id="datepicker2">
	
	<button class="link2" type="submit" name="cari2" class="date">tampilkan</button>
</form>
<hr>
<?php $kelas = query("SELECT * from kelas"); ?>
<form method="get" action="history_kelas.php" class="hiddenprint">
	<select class="i" name="idkelas">
		<?php foreach ($kelas as $row): ?>
		<option value="<?= $row['id_kelas']; ?>"><?= $row['nama_kelas']; ?>~<?= $row['kompetensi_keahlian']; ?></option>
		<?php endforeach; ?>
	</select>
	<button class="link2" name="submit2">tampilkan</button>
</form>
<button class="link2 hiddenprint" onclick="myFunction()">Print</button>
<script>function myFunction() {
window.print();
}
</script>
		<div class="overflow">
		<table border="1" cellpadding="10" cellspacing="0  ">
 		<tr>
 			<!-- <th>id_pembayaran</th> -->
 			<!-- <th>nama_petugas</th> -->
 			<th>nisn</th>
 			<th>nama</th>
 			<th>tgl_bayar</th>
			<th>bulan & tahun</th>
			<!-- <th>tahun_dibayar</th> -->
			<!-- <th>id_spp</th> -->
			<th>jumlah_bayar</th>


 		</tr>
 		<?php $i = 1; ?>
 		<?php foreach ($pembayaran as $row): ?>
 		<tr>
 			<!-- <td><?= $row["id_pembayaran"]; ?></td> -->
 			<!-- <?php
 			$nama = $row["id_petugas"]; 
 			$nama_petugas = query("SELECT nama_petugas FROM petugas WHERE id_petugas = '$nama'");
 			?>
 			<td><?= $nama_petugas[0]["nama_petugas"]; ?></td> -->
 			<td><?= $row["nisn"]; ?></td>
 			<?php
 			$nisn = $row["nisn"];
 			$nama_siswa = query("SELECT nama FROM siswa WHERE nisn = $nisn");?>
 			<td><?= $nama_siswa[0]["nama"]; ?></td>
 			<?php $tgl = $row['tgl_bayar']; ?>
 			<td><?= date("d/m/Y", strtotime($tgl)); ?></td>
			<td><?= $row["bulan_dibayar"]; ?> <?= $row["tahun_dibayar"]; ?></td>
			<!-- <td><?= $row["tahun_dibayar"]; ?></td> -->
			<!-- <td><?= $row["id_spp"]; ?></td> -->
			<td><?= $row["jumlah_bayar"]; ?></td>
 		</tr>
 		<?php $i++; ?>
 	<?php endforeach; ?>
 	</table>
 	</div>
	</div>
</body>
</html>