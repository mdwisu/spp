<?php
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
include 'header_admin.php';
// ambil data di url
$id_kelas = $_GET["id_kelas"];
// query data mahasiswa berdasarkan id
$kelas = query("SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");

$id_kelas = ($kelas[0]["id_kelas"]);
$nama_kelas = ($kelas[0]["nama_kelas"]);
$kompetensi_keahlian = ($kelas[0]["kompetensi_keahlian"]);

// cek apakah tombol sudah ditekan
if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di ubah
	if (ubah_kelas($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah');
			document.location.href = 'data_kelas.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah');
			document.location.href = 'data_kelas.php';
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ubah kelas</title>
	<link rel="stylesheet" type="text/css" href="css/style_ubah.css">
</head>
<body>
	<div class="content">
		<div class="container">
<h1>ubah data kelas</h1>

<form action="" method="post">
	<input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
	
			<label for="id_kelas">id_kelas :</label>
			<label class="id" id="id_kelas"><?= $id_kelas; ?></label>
			<label for="nama_kelas">nama_kelas :</label>
			<input type="text" name="nama_kelas" id="nama_kelas" required="" value="<?= $nama_kelas; ?>">
			<label for="kompetensi_keahlian">kompetensi_keahlian :</label>
			<input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" value="<?= $kompetensi_keahlian; ?>">
			<button class="registerbtn" type="submit" name="submit">ubah kelas</button>


</form>
</div>
</div>
</body>
</html>