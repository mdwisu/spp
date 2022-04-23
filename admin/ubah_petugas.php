<?php
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
include 'header_admin.php';
// ambil data di url
$id = $_GET["id_petugas"];
// query data mahasiswa berdasarkan id
$petugas = query("SELECT * FROM petugas WHERE id_petugas = '$id'");

$id_petugas = ($petugas[0]["id_petugas"]);
$username = ($petugas[0]["username"]);
$password = ($petugas[0]["password"]);
$nama_petugas = ($petugas[0]["nama_petugas"]);
$level = ($petugas[0]["level"]);

// cek apakah tombol sudah ditekan
if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di ubah
	if (ubah_user($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah');
			document.location.href = 'data_petugas.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah');
			document.location.href = 'data_petugas.php';
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ubah user</title>
	<link rel="stylesheet" type="text/css" href="css/style_ubah.css">
</head>
<body>
	<div class="content">
<div class="container">
<form action="" method="post">
	<h1>ubah data user</h1>
	<input type="hidden" name="id_petugas" value="<?= $id_petugas; ?>">
		
			<label for="id_petugas">id_petugas :</label>
			<label class="id" id="id_petugas"><?= $id_petugas; ?></label>
		
			<label for="username">username :</label>
			<input type="text" name="username" id="username" required="" value="<?= $username; ?>">
		
			<label for="password">password :</label>
			<input type="password" name="password" id="password" value="<?= $password; ?>">
		
			<label for="nama_petugas">nama_petugas :</label>
			<input type="text" name="nama_petugas" id="nama_petugas" value="<?= $nama_petugas; ?>">
		
			<label for="level">level :</label>
			<select name="level" id="level">
				<option value="admin">admin</option>
				<option value="petugas">petugas</option>
			</select>
		
			<button class="registerbtn" type="submit" name="submit">ubah data</button>
</form>
</div>
</div>
</body>
</html>