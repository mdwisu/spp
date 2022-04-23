<?php 
// session_start();

if (!isset($_SESSION["login"]) ) {
    header("Location: ../login");
    exit;
} elseif (isset($_SESSION["login"]) ) {
  if ($_SESSION["nama_level"] != "admin") {
    header("Location: ../login");
    exit;
  }
  
}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src='js/a076d05399.js'></script>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 655px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar" id="myDIV">
  <a class="btn" href="home_admin.php">Dashboard</a>
  <a class="btn" href="data_siswa.php">Data Siswa</a>
  <a class="btn" href="data_petugas.php">Data user</a>
  <a class="btn" href="data_kelas.php">Data Kelas</a>
  <a class="btn" href="data_spp.php">Data spp</a>
  <a class="btn" href="entri_transaksi.php">entri transaksi</a>
  <a class="btn" href="history_pembayaran.php">history pembayaran</a>
  <a class="btn" onclick="return confirm('are you sure?')" href="logout.php">logout</a>
</div>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace("active", "");
  this.className += " active";
  });
}
</script>
</body>
</html>
