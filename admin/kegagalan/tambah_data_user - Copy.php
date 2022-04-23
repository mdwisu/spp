<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';

if (isset($_POST["registrasi"])) {
	

	if (registrasi($_POST) > 0 ) {
		echo "<script>
		alert('user baru berhasil ditambahkan!');
		document.location.href = 'data_user.php';
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

 ?>

<?php include 'header_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
</head>
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
<body>
<div class="content">
<h1>Halaman Registrasi</h1>

<form action="" method="post">

	<table border="0" cellpadding="10" cellspacing="0">
		<tr>
			<td><label for="username">username :</label></td>
			<td><input type="text" name="username" id="username"></td>
		</tr>
		<tr>
			<td><label for="password">password :</label></td>
			<td><input type="password" name="password" id="password" required=""></td>
		</tr>
		<tr>
			<td><label for="password2">password2 :</label></td>
			<td><input type="password" name="password2" id="password2" required=""></td>
		</tr>
		<tr>
			<td><label for="nama_petugas">nama_petugas :</label></td>
			<td><input type="text" name="nama_petugas" id="nama_petugas"></td>
		</tr>
		<tr>
			<td><label for="level">level :</label></td>
			<td><select id="level" name="level">
				<option value="admin">admin</option>
				<option value="petugas">petugas</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><button type="submit" name="registrasi">Registrasi</button></td>
		</tr>
	</ul>

	
</form>
</div>
</body>
</html>