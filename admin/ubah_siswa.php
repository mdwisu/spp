<?php
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
include 'header_admin.php';
// ambil data di url
$nisn = $_GET["nisn"];
// query data mahasiswa berdasarkan nisn
$siswa = query("SELECT * FROM siswa WHERE nisn = '$nisn'");
// $id_kelas = mysqli_query($conn, "SELECT id_kelas FROM kelas");
// $id_spp = mysqli_query($conn, "SELECT id_spp FROM kelas");

$nisn = ($siswa[0]["nisn"]);
$nis = ($siswa[0]["nis"]);
$nama = ($siswa[0]["nama"]);
$id_kelas = ($siswa[0]["id_kelas"]);
$alamat = ($siswa[0]["alamat"]);
$no_telp = ($siswa[0]["no_telp"]);
$id_spp = ($siswa[0]["id_spp"]);

$kelas = mysqli_query($conn, "SELECT * FROM kelas");
$spp = mysqli_query($conn, "SELECT * FROM spp");

// cek apakah tombol sudah ditekan
if (isset($_POST["submit"]) ) {

	// cek apakah data berhasil di ubah
	if (ubah_siswa($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil diubah');
			document.location.href = 'data_siswa.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah');
			document.location.href = 'data_siswa.php';
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
	<form action="" method="post">
	<div class="container">
		<h1>ubah siswa</h1>
		<input type="hidden" name="nisn" value="<?= $nisn; ?>">
			<label for="nisn">nisn</label>
			<label id="nisn" class="id"><?= $nisn; ?></label>
		
			<label for="nis">nis</label>
			<input type="number" name="nis" id="nis" placeholder="masukan 8 nomor" required="" value="<?= $nis; ?>">
		
			<label for="nama">nama</label>
			<input type="text" name="nama" id="nama" required="" value="<?= $nama; ?>">
		
			<label for="id_kelas">kelas</label>
			<select name="id_kelas">
			<?php while ($row = mysqli_fetch_assoc($kelas) ) : ?>
				<option <?php if ($id_kelas == $row["id_kelas"]) {
					echo "selected";
				} ?> value="<?= $row["id_kelas"]; ?>"><?= $row["nama_kelas"];?>~<?= $row["kompetensi_keahlian"]; ?> </option>
			<?php endwhile; ?>
			</select>
			
		
			<label for="alamat">alamat</label>
			<input type="text" name="alamat" id="alamat" required="" value="<?= $alamat; ?>">
		
			<label for="no_telp">no_telp</label>
			<input type="number" name="no_telp" id="no_telp" required="" value="<?= $no_telp; ?>">
		
			<label for="id_spp">id_spp</label>
			<select name="id_spp">
			<?php while ($row = mysqli_fetch_assoc($spp) ) : ?>
				<option  <?php if ($id_spp == $row["id_spp"]) {
					echo "selected";
				} ?> value="<?= $row["id_spp"]; ?>"><?= $row["tahun"]; ?>~<?= $row["nominal"]; ?></option>
			<?php endwhile; ?>
			</select>
			<hr>
		
		<button class="registerbtn" type="submit" name="submit">ubah</button></div>
</form>
</div>
</body>
</html>