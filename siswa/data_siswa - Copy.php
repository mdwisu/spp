<?php 
$nisn = $_GET["nisn"];
require '../functions/functions.php';
$siswa = query("SELECT * FROM `siswa` WHERE `nisn` = '$nisn'");
$jumlah = count($siswa);
// yang bawah betul
// $result = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");
// $jumlah = mysqli_num_rows($result);
if ($jumlah < 1) {
  echo "
  <script>
      alert('data tidak ada');
      document.location.href = 'home_siswa.php';
    </script>
  ";
}

 ?>
<!DOCTYPE html>
<html>
<title>Pembayaran SPP</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/css.php?family=Montserrat">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="../logo.png" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <p>ABOUT</p>
  </a>
  <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <p>PHOTOS</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <p>CONTACT</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">pembayaran spp</span></h1>
    <p>Web Designer</p>
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
      <h2 class="w3-text-light-grey">NISN</h2>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["nisn"]; ?> </label></p>
      <h2 class="w3-text-light-grey">NIS</h2>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["nis"]; ?> </label></p>
      <h2 class="w3-text-light-grey">Nama</h2>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["nama"]; ?> </label></p>
      <h2 class="w3-text-light-grey">kelas</h2>
      <?php 
      $kel = $siswa[0]["id_kelas"];
      $kelas = query("SELECT nama_kelas, kompetensi_keahlian FROM kelas WHERE id_kelas = '$kel' ");
      ?>
        <p><label class="w3-input w3-padding-16"> <?= $kelas[0]["nama_kelas"]; ?>~<?= $kelas[0]["kompetensi_keahlian"]; ?> </label></p>
      <h2 class="w3-text-light-grey">alamat</h2>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["alamat"]; ?> </label></p>
      <h2 class="w3-text-light-grey">no_telp</h2>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["no_telp"]; ?> </label></p>
      <h2 class="w3-text-light-grey">spp~Rp~tahun</h2>
      <?php 
      $sppp = $siswa[0]["id_spp"];
      $sp = query("SELECT * FROM spp WHERE id_spp = '$sppp'");
      ?>
        <p><label class="w3-input w3-padding-16"> <?= $sp[0]["nominal"]; ?>~<?= $sp[0]["tahun"]; ?> </label></p>
      </p>
  <!-- End Contact Section -->
  
<h1 class="w3-jumbo"><span class="w3-hide-small">spp yang sudah dibayar</span></h1>
<table border="1" cellpadding="10" cellspacing="0" style="background-color: white;">
    <tr>
      <th>id_pembayaran</th>
      <th>nama_petugas</th>
      <th>NISN</th>
      <th>tgl_bayar</th>
      <th>bulan_dibayar</th>
      <th>tahun_dibayar</th>
      <th>nominal~tahun</th>
      <th>jumlah_bayar</th>


    </tr>
    <?php 
    $spw = $siswa[0]["nisn"];
    $sppsiswa = query("SELECT * FROM `pembayaran` WHERE `nisn` = '$spw'"); ?>
    <?php foreach ($sppsiswa as $row) : ?>
      <?php 
      $pet = $row["id_petugas"];
      $sp = $row["id_spp"];
      $pet = query("SELECT * FROM petugas WHERE id_petugas = '$pet'");
      $sp = query("SELECT * FROM spp WHERE id_spp = '$sp'");
      ?>
    <tr>
      <td><?= $row["id_pembayaran"]; ?></td>
      <td><?= $pet[0]["nama_petugas"]; ?></td>
      <td><?= $row["nisn"]; ?></td>
      <td><?= $row["tgl_bayar"]; ?></td>
      <td><?= $row["bulan_dibayar"]; ?></td>
      <td><?= $row["tahun_dibayar"]; ?></td>
      <td><?= $sp[0]["nominal"];?>~<?= $sp[0]["tahun"]; ?></td>
      <td><?= $row["jumlah_bayar"]; ?></td>

    
    </tr>
  <?php endforeach; ?>
  </table>
</div>
<!-- END PAGE CONTENT -->
</div>

</body>
</html>

