<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$siswa = query("SELECT * FROM siswa");
if ( isset($_POST["cari"]) ) {  
	$siswa = carisiswa($_POST["keyword"]);
}
 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Siswa</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
	<div class="content">
		<h1>Data Siswa</h1>
		<a class="link2" href="tambah_data_siswa.php">input data siswa baru</a>
		<br><br><br>
<form method="post">
  <input type="text" autofocus name="keyword" placeholder="Search nisn or nama" autocomplete="off" id="keyword">
  <button type="submit" hidden="button" name="cari" id="tombol-cari">Cari!</button>
  <br><br><br>
</form>
		
		<table border="1" cellpadding="10" cellspacing="0  ">
 		<tr>
 			<th>NISN</th>
 			<th>NIS</th>
 			<th>Nama</th>
 			<th>kelas~jurusan</th>
			<th>alamat</th>
			<th>no_telp</th>
			<th>tahun~nominal</th>
			<th>aksi</th>


 		</tr>

 		<?php $i = 1; ?>
 		<?php foreach ($siswa as $row) : ?>
 			<?php 
 			$kel = $row["id_kelas"];
 			$sp = $row["id_spp"];
 			$spp = query("SELECT * FROM spp WHERE id_spp = '$sp'");
 			$kelas = query("SELECT * FROM kelas WHERE id_kelas = '$kel'"); 
 			?>
 		<tr>
 			<td><?= $row["nisn"]; ?></td>
 			<td><?= $row["nis"]; ?></td>
 			<td><?= $row["nama"]; ?></td>
 			<td><?= @$kelas[0]["nama_kelas"]; ?>~<?= @$kelas[0]["kompetensi_keahlian"]; ?></td>
			<td><?= $row["alamat"]; ?></td>
			<td><?= $row["no_telp"]; ?></td>
			<td><?= @$spp[0]["tahun"];?>~<?= @$spp[0]["nominal"]; ?></td>
			<td><a class="link2" href="ubah_siswa.php?nisn=<?= $row["nisn"]; ?>">ubah</a>
 				<a class="link2" href="hapus_siswa.php?nisn=<?= $row["nisn"]; ?>" onclick="return confirm('yakin ingin hapus?')">hapus</a>
 			</td>
 		</tr>
 		<?php $i++; ?>
 	<?php endforeach; ?>
 	</table>
	</div>
</body>
</html>