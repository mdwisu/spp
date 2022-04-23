<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$spp = query("SELECT * FROM spp");

 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>data spp</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
<div class="content">
	<h1>Data spp</h1>
		<a class="link2" href="tambah_data_spp.php">tambah spp</a>
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>id spp</th>
				<th>tahun</th>
				<th>nominal</th>
				<th colspan="2">aksi</th>
			</tr>
			<?php foreach ($spp as $row) : ?>
			<tr>
				<td><?= $row["id_spp"]; ?></td>
				<td><?= $row["tahun"]; ?></td>
				<td><?= $row["nominal"]; ?></td>
				<td><a class="link2" href="ubah_spp.php?id_spp=<?= $row["id_spp"]; ?>">ubah</a></td>
				<td><a class="link2" href="hapus_spp.php?id_spp=<?= $row["id_spp"]; ?>"  onclick="return confirm('yakin ingin hapus?')">hapus</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
</div>
</body>
</html>