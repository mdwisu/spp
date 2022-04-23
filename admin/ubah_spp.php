<?php
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
include 'header_admin.php';
// ambil data di url
$id_spp = $_GET["id_spp"];
// query data mahasiswa berdasarkan id
$spp = query("SELECT * FROM spp WHERE id_spp = '$id_spp'");

$id_spp = ($spp[0]["id_spp"]);
$tahun = ($spp[0]["tahun"]);
$nominal = ($spp[0]["nominal"]);

// cek apakah tombol sudah ditekan
if (isset($_POST["submit"]) ) {
	// cek apakah data berhasil di ubah
	if (ubah_spp($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah');
			document.location.href = 'data_spp.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah');
			document.location.href = 'data_spp.php';
		</script>
		";
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ubah spp</title>
	<link rel="stylesheet" type="text/css" href="css/style_ubah.css">
</head>
<body>
	<div class="content">
	<div class="container">
<form action="" method="post">
	<h1>ubah data spp</h1>
	<input type="hidden" name="id_spp" value="<?= $id_spp; ?>">
	
			<label for="id_spp">id_spp :</label>
			<label class="id" id="id_spp"><?= $id_spp; ?></label>
			<label for="tahun">tahun :</label>
			<input type="number" name="tahun" id="tahun" required="" value="<?= $tahun; ?>">
			<label for="nominal">nominal :</label>
			<input type="number" name="nominal" id="nominal" value="<?= $nominal; ?>">
			<button class="registerbtn button2" type="submit" name="submit">ubah spp</button>

</form>
</div>
</div>
</body>
</html>