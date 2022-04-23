<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$petugas = query("SELECT * FROM petugas");

 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Data User</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">

<body>
	<div class="content">
		<h1>Data user</h1>
		<a class="link2" href="tambah_data_user.php">tambah user</a>
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>id</th>
				<th>username</th>
				<th>password</th>
				<th>nama</th>
				<th>level</th>
				<th colspan="2">aksi</th>
			</tr>
			<?php foreach ($petugas as $row) : ?>
			<tr>
				<td><?= $row["id_petugas"]; ?></td>
				<td><?= $row["username"]; ?></td>
				<td><?= $row["password"]; ?></td>
				<td><?= $row["nama_petugas"]; ?></td>
				<td><?= $row["level"]; ?></td>
				<td><a class="link2" href="ubah_petugas.php?id_petugas=<?= $row["id_petugas"]; ?>">ubah</a></td>
				<td><a class="link2" href="hapus_user.php?id_petugas=<?= $row["id_petugas"]; ?>"  onclick="return confirm('yakin ingin hapus?')">hapus</a></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</body>
</html>