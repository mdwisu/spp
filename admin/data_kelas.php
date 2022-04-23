<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$kelas = query("SELECT * FROM kelas");

 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>data kelas</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
<div class="content">
	<h1>Data Kelas</h1>
		<a class="link2" href="tambah_data_kelas.php">tambah kelas</a>
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>id kelas</th>
				<th>nama kelas</th>
				<th>kompetensi keahlian</th>
				<th colspan="2">aksi</th>
			</tr>
			<?php foreach ($kelas as $row) : ?>
			<tr>
				<td><?= $row["id_kelas"]; ?></td>
				<td><?= $row["nama_kelas"]; ?></td>
				<td><?= $row["kompetensi_keahlian"]; ?></td>
				<td><a class="link2" href="ubah_kelas.php?id_kelas=<?= $row["id_kelas"]; ?>">ubah</a></td>
				<td><a class="link2" href="hapus_kelas.php?id_kelas=<?= $row["id_kelas"]; ?>"  onclick="return confirm('yakin ingin hapus?')">hapus</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
</div>
</body>
</html>