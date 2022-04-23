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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>home admin</title>
  <!-- <meta name="description" content="Tutorial cara membuat sliding menu dengan CSS dan HTML | Drawer menu atau biasa dikenal dengan menu tersembunyi dengan hamburger menu"/>
  <meta name="keywords" content="jurnalweb. jurnal web indonesia, sliding menu, css, sliding menu, slide menu, hamburger menu, css menu"/> -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
<header>
  <input type="checkbox" id="tag-menu"/>
  <label class="fa fa-bars menu-bar" for="tag-menu">menu</label>
  <div class="logout"><a onclick="return confirm('are you sure?')" href="logout.php">logout</a></div>
  <div class="jw-drawer">
    <nav>
      <ul>
        <li><a href="home_admin.php">Dashboard</a></li>
        <li><a href="data_siswa.php">Data Siswa</a></li>
        <li><a href="data_user.php">Data User</a></li>
        <li><a href="data_kelas.php"></a></li>
      </ul>
    </nav>
  </div>
</header>



 
</body>
</html>
