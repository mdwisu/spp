<?php 
session_start();
require '../functions/functions.php';

if (isset($_COOKIE['login']) ) {
	if ($_COOKIE['login'] == 'true') {
		$_SESSION['login'] = true;
		$_SESSION['username'] = $_COOKIE['username'];
		$_SESSION['ininama']['nama_petugas'] = $_COOKIE['nama_petugas'];
		$_SESSION['nama_level'] = $_COOKIE['nama_level'];

	}
}

if (isset($_POST["login"]) ) {
	
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
	// cek username
	$result = mysqli_query($conn, "SELECT * FROM petugas WHERE username='$username' AND password='$password'");
	// mengambil nama_user
	$nama = mysqli_query($conn, "SELECT nama_petugas FROM petugas WHERE username ='$username'");
	$ininama = mysqli_fetch_assoc($nama);
	// mengambil id_level
	$level = mysqli_query($conn, "SELECT level FROM petugas WHERE username='$username'");
	$levels = mysqli_fetch_assoc($level);
	$row = mysqli_fetch_assoc($result);

	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($result);
	 
	if($cek > 0){
		if ($levels["level"] == "admin") {
			$_SESSION["login"] = true;
			$_SESSION['ininama']['nama_petugas'] = $ininama['nama_petugas'];
			$_SESSION['username'] = $username;
			$_SESSION['nama_level'] = "admin";
			$nama_petugas = $ininama['nama_petugas'];

			// cek remember me
			if (isset($_POST['remember']) ) {
				// buat cookie
				// yang sudah benar di bawah
				setcookie('login', 'true', time() + 60);
				setcookie('username', $username, time()+60);
				setcookie('nama_petugas', $nama_petugas, time()+60);
				setcookie('nama_level', 'admin', time()+60);
			}
			header("Location:../admin/home_admin.php");
			exit;
		}elseif ($levels["level"] == "petugas") {
			$_SESSION["login"] = true;
			$_SESSION['ininama']['nama_petugas'] = $ininama['nama_petugas'];
			$_SESSION['username'] = $username;
			$_SESSION['nama_level'] = "petugas";
			$nama_user = $ininama['nama_petugas'];

			// cek remember me
			if (isset($_POST['remember']) ) {
				// buat cookie
				// yang sudah benar di bawah
				setcookie('login', 'true', time() + 60);
				setcookie('username', $username, time()+60);
				setcookie('nama_petugas', $nama_petugas, time()+60);
				setcookie('nama_level', 'admin', time()+60);
			}

			header("Location:../petugas/home_petugas.php");
			exit;
		}
	}
	$error = true;
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body>
<div class="content">
<form action="" method="post">
<div class="formlogin">
	<h1 class="judul" align="center">Halaman Login</h1>
	<ul>
	<?php if (isset($error)) : ?>
	<h1 style="color: red;font-style: italic; margin: 10px;">username atau password salah</h1>
	<?php endif; ?>
		<li>
			<label for="username">username :</label>
			<input type="text" name="username" id="username" class="textfield" placeholder="username">
		</li>
		<li>
			<label for="password">password :</label>
			<input type="password" name="password" id="password" class="textfield" placeholder="password">
		</li>
		<li>
			<input type="checkbox" name="remember" id="remember" class="remember">
			<label for="remember">remember me</label>
		</li>
		<li>
			<button type="submit" name="login">Login</button>
		</li>
	</ul>
	</div>
</form>
</div>
</body>
</html>