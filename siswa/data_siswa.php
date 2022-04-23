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

<style>
body, h1,h2,h3,h4,h5,h6 {
  font-family: "Montserrat", sans-serif;
  font-size: 20px;
  color: black;
  font-weight: 50px;
  text-decoration: bold;
}

.overvlow {
  overflow: auto;
}
.h {
  width: 100%;
  margin: auto;
}
tr:nth-child(even){background-color: #f2f2f2}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body class="w3-black">

<!-- Page Content -->
<!-- <div class="w3-padding-large" id="main"> -->
  <!-- Header/Home -->
<!--   <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Informasi Pembayaran SPP</span></h1> -->
  <!-- </header> -->

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
      <h5 class="w3-text-light-grey">NISN</h5>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["nisn"]; ?> </label></p>
      <h5 class="w3-text-light-grey">NIS</h5>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["nis"]; ?> </label></p>
      <h5 class="w3-text-light-grey">Nama</h5>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["nama"]; ?> </label></p>
      <h5 class="w3-text-light-grey">kelas</h5>
      <?php 
      $kel = $siswa[0]["id_kelas"];
      $kelas = query("SELECT nama_kelas, kompetensi_keahlian FROM kelas WHERE id_kelas = '$kel' ");
      ?>
        <p><label class="w3-input w3-padding-16"> <?= $kelas[0]["nama_kelas"]; ?>~<?= $kelas[0]["kompetensi_keahlian"]; ?> </label></p>
      <h5 class="w3-text-light-grey">alamat</h5>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["alamat"]; ?> </label></p>
      <h5 class="w3-text-light-grey">no_telp</h5>
        <p><label class="w3-input w3-padding-16"> <?= $siswa[0]["no_telp"]; ?> </label></p>
      <h5 class="w3-text-light-grey">spp~Rp~tahun</h5>
      <?php 
      $sppp = $siswa[0]["id_spp"];
      $sp = query("SELECT * FROM spp WHERE id_spp = '$sppp'");
      ?>
        <p><label class="w3-input w3-padding-16"> <?= $sp[0]["nominal"]; ?>~<?= $sp[0]["tahun"]; ?> </label></p>
      </p>
  <!-- End Contact Section -->
  <div class="w3-center h">
<h1 class="w3-jumbo"><span class="w3-hide-small">spp yang sudah dibayar</span></h1>
<div class="overvlow">
<table style="margin: auto;background-color: white; border-collapse: collapse;background-color: white;" border="1" cellpadding="10" cellspacing="0">
    <tr>
      <!-- <th>id_pembayaran</th> -->
      <th>nama_petugas</th>
      <!-- <th>NISN</th> -->
      <th>tgl_bayar</th>
      <th>bulan dan tahun dibayar</th>
      <!-- <th>nominal~tahun</th> -->
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
      <!-- <td><?= $row["id_pembayaran"]; ?></td> -->
      <td><?= $pet[0]["nama_petugas"]; ?></td>
      <!-- <td><?= $row["nisn"]; ?></td> -->
      <td><?= date("d-m-Y",strtotime($row["tgl_bayar"])); ?></td>
      <td><?= $row["bulan_dibayar"]; ?>~<?= $row["tahun_dibayar"]; ?></td>
      <!-- <td><?= $sp[0]["nominal"];?>~<?= $sp[0]["tahun"]; ?></td> -->
      <td><?= $row["jumlah_bayar"]; ?></td>

    
    </tr>
  <?php endforeach; ?>
  </table>
  </div>
  </div>
</div>
<!-- END PAGE CONTENT -->
</div>

</body>
</html>

