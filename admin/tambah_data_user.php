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
    document.location.href = 'data_petugas.php';
    </script>";
  } else {
    echo mysqli_error($conn);
  }
}

 ?>

<?php include 'header_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
input[type=text], input[type=password], select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, select:focus {
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
    <h1>Register</h1>
    <hr>

    <label for="username"><b>username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    
    <label for="password2"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password2" required>

    <label for="nama_petugas">nama_petugas :</label>
    <input placeholder="Enter Name" type="text" name="nama_petugas" id="nama_petugas" required="">

    <label for="level">level :</label>
    <select name="level">
      <option value="admin">admin</option>
      <option value="petugas">petugas</option>
    </select>
    <button type="submit" class="registerbtn" name="registrasi">Register</button>
  </div>
  </div>
</form>
</div>
</body>
</html>
