<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
if (isset($_POST["submit"]) ) {
	// cek apakah data berhasil di tambahkan
	if (tambah_siswa($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'data_siswa.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan');
			document.location.href = 'data_siswa.php';
		</script>
		";
	}

}
$id_kelas = mysqli_query($conn, "SELECT id_kelas FROM kelas");
$id_spp = mysqli_query($conn, "SELECT id_spp FROM spp");
 ?>
<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>tambah siswa</title>
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<div class="content">
<h1>Tambah siswa</h1>
<form action="" method="post">
	<table border="0" cellpadding="20" cellspacing="10">
		<tr>
			<td><label for="nisn">nisn :</label></td>
			<td><input type="number" name="nisn" id="nisn" required maxlength="11"></td>
		</tr>
		<tr>
			<td><label for="nis">nis :</label></td>
			<td><input type="number" name="nis" id="nis" required></td>
		</tr>
		<tr>
			<td><label for="nama">nama :</label></td>
			<td><input type="text" name="nama" id="nama"></td>
		</tr>
		<tr>
			<td><label for="id_kelas">id_kelas :</label></td>
			<td><select name="id_kelas">
			<?php while ($row = mysqli_fetch_assoc($id_kelas) ) : ?>
				<option value="<?= $row["id_kelas"]; ?>"><?= $row["id_kelas"]; ?></option>
			<?php endwhile; ?>
			</select></td>
		</tr>
		<tr>
			<td><label for="alamat">alamat :</label></td>
			<td><input type="text" name="alamat" id="alamat"></td>
		</tr>
		<tr>
			<td><label for="no_telp">no_telp :</label></td>
			<td><input type="number" name="no_telp" id="no_telp"></td>
		</tr>
		<tr>
			<td><label for="id_spp">id_spp :</label></td>
			<td><select name="id_spp">
			<?php while ($row = mysqli_fetch_assoc($id_spp) ) : ?>
				<option value="<?= $row["id_spp"]; ?>"><?= $row["id_spp"]; ?></option>
			<?php endwhile; ?>
			</select></td>
		</tr>
		<tr><td colspan="2"><button type="submit" name="submit">tambah</button></td></tr>
	</table>
</form>
</div>
</body>
</html>