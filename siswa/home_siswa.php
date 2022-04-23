<!DOCTYPE html>
<html>
<title>Pembayaran SPP</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">

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


<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Informasi Pembayaran SPP</span></h1>
    <p>Web Designer</p>
    
  </header>
<form method="get" action="data_siswa.php">
  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Masukan NISN anda</h2>
    <hr style="width:200px" class="w3-opacity">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="NISN" required name="nisn"></p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> cari
        </button>
      </p>
  <!-- End Contact Section -->
  </div>
</form>
<!-- END PAGE CONTENT -->
</div>

</body>
</html>
