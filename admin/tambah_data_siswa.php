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
input[type=text], input[type=password], input[type=number], select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=number]:focus, select:focus {
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
<form action="" method="post">
  <div class="container">
    <h1>Tambaha Data Siswa</h1>
    <p>Please fill in this form to create an new siswa.</p>
    <hr>

    <label for="nisn">nisn :</label> 
	<input type="number" name="nisn" id="nisn" required maxlength="11"> 

	<label for="nis">nis :</label>
	<input type="number" name="nis" id="nis" required>
    
	<label for="nama">nama :</label>
	<input type="text" name="nama" id="nama">

	<label for="id_kelas">kelas :</label>
	<select name="id_kelas">
		<?php while ($row = mysqli_fetch_assoc($id_kelas) ) : ?>
			<?php 
			$kel = $row["id_kelas"]; 
			$kelas = query("SELECT * FROM kelas WHERE id_kelas='$kel'");
			?>
			<option value="<?= $row["id_kelas"]; ?>"><?= $kelas[0]["nama_kelas"]; ?>~<?= $kelas[0]["kompetensi_keahlian"]; ?></option>
		<?php endwhile; ?>
		</select>

	<label for="alamat">alamat :</label>
	<input type="text" name="alamat" id="alamat">

	<label for="no_telp">no_telp :</label>
	<input type="number" name="no_telp" id="no_telp">

	<label for="id_spp">tahun / nominal</label>
	<select name="id_spp" id="id_spp">
		<?php while ($row = mysqli_fetch_assoc($id_spp) ) : ?>
			<?php 
			$sp = $row["id_spp"];
			$spp = query("SELECT * FROM spp WHERE id_spp='$sp'")
			 ?>
			<option value="<?= $row["id_spp"]; ?>"><?= $spp[0]["tahun"]; ?>~<?= $spp[0]["nominal"]; ?></option>
		<?php endwhile; ?>
		</select>
    <hr>
    <button type="submit" class="registerbtn" name="submit">tambah</button>
  </div>
</form>
</div>

</body>
</html>