<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
if (isset($_POST["submit"]) ) {
	// cek apakah data berhasil di tambahkan
	if (tambah_kelas($_POST) > 0 ) {
		echo "
		<script>
			alert('data berhasil ditambahkan');
			document.location.href = 'data_kelas.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal ditambahkan');
			document.location.href = 'data_kelas.php';
		</script>
		";
	}

}
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
    <h1>tambah Data kelas</h1>
    <p>Please fill in this form to create an new kelas.</p>
    <hr>
    <input type="hidden" name="id_kelas">
   	<label for="nama_kelas">nama_kelas :</label>
   	<input type="text" name="nama_kelas" id="nama_kelas" required="">
    
	<label for="kompetensi_keahlian">kompetensi_keahlian :</label>
	<input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" required="">
    <hr>
    <button type="submit" class="registerbtn" name="submit">tambah</button>
  </div>
</form>
</div>

</body>
</html>