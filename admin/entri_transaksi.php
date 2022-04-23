<?php session_start();

if (!isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} else if (isset($_SESSION["login"]) ) {
  if ($_SESSION["nama_level"] != "admin") {
    header("Location: ../login.php");
    exit;
  }}
   ?>
<?php require '../functions/functions.php'; ?>
<?php 
if (isset($_GET["submit"])) {
	$si = $_GET["nisn"];
	$sii = query("SELECT count(nisn) as jml FROM siswa WHERE nisn ='$si'");
	if ($sii[0]['jml'] < 1 ) {
		echo "
		<script>
			alert('data tidak ada');
			document.location.href = 'entri_transaksi.php';
		</script>
		";
	}else{
	// $siswa = query("SELECT * FROM siswa WHERE nisn = '$si'");
	$siswa = query("SELECT `siswa`.`nisn`, `siswa`.`nis`, `siswa`.`nama`, `kelas`.`nama_kelas`, `kelas`.`kompetensi_keahlian`, `siswa`.`alamat`, `siswa`.`no_telp`, `spp`.`tahun`, `spp`.`nominal`  FROM siswa 
		INNER JOIN kelas ON `siswa`.id_kelas = `kelas`.`id_kelas` 
		INNER JOIN spp ON `spp`.`id_spp` = `siswa`.`id_spp` WHERE nisn = '$si'");
	}
}


 ?>



<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>entri transaksi</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="content">
	<h1>entri transaksi</h1>
<form action="" method="get">
	<input class="input1" placeholder="masukan nisn" type="text" name="nisn" id="NISN">
	<button type="submit" hidden="button" name="submit">Cari</button>
<?php if (isset($siswa)): ?>
	<table>
		<tr>
			<th>NISN</th>
			<th>NIS</th>
			<th>Nama</th>
			<th>kelas</th>
			<th>alamat</th>
			<th>no_telp</th>
			<th>spp</th>
			<th>aksi</th>
		</tr>
		<tr>
			<td><?= $siswa[0]["nisn"]; ?></td>
			<td><?= $siswa[0]["nis"]; ?></td>
			<td><?= $siswa[0]["nama"]; ?></td>
			<td><?= $siswa[0]["nama_kelas"];?>~<?= $siswa[0]["kompetensi_keahlian"]; ?></td>
			<td><?= $siswa[0]["alamat"]; ?></td>
			<td><?= $siswa[0]["no_telp"]; ?></td>
			<td><?= $siswa[0]["nominal"];?>~<?= $siswa[0]["tahun"]; ?></td>
			<td><a class="link2" href="entri_transaksi2.php?nisn=<?= $siswa[0]["nisn"]; ?>">bayar</a></td>
		</tr>
	</table>
<?php endif ?>
</form>
</div>
</body>
</html>