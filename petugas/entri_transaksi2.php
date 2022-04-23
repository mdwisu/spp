<?php session_start();

if (!isset($_SESSION["login"]) ) {
    header("Location: ../login.php");
    exit;
} else if (isset($_SESSION["login"]) ) {
  if ($_SESSION["nama_level"] != "petugas") {
    header("Location: ../login.php");
    exit;
  }}
  ?>
<?php require '../functions/functions.php'; ?>
<?php 
$nisn = $_GET["nisn"];
$siswa = query("SELECT * FROM siswa WHERE nisn = '$nisn'");
if (isset($_POST["submit"]) ) {
	$bulan = $_POST['bulan_dibayar'];
	$tahun = $_POST['tahun_dibayar'];
	$bayar = query("SELECT nisn FROM `pembayaran` WHERE bulan_dibayar = '$bulan' AND tahun_dibayar = '$tahun'");
	if (@in_array(@$_POST['nisn'], @$bayar[0])) {
		echo "
		<script>
			alert('bulan dan tahun sudah pernah dibayar');
			document.location.href = 'entri_transaksi.php';
		</script>
			";
	} else {
		// cek apakah data berhasil di tambahkan
		if (tambah_pembayaran($_POST) > 0 ) {
		echo "
		<script>
			alert('spp berhasil dibayar');
		
		</script>
			";
		} else {
			echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'entri_transaksi.php';
			</script>
			";
			}

		}
	}


?>



<?php include 'header_petugas.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>entri transaksi</title>
	<link rel="stylesheet" type="text/css" href="../admin/css/style.css">
</head>
<style type="text/css">
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
input[type=text], input[type=password], input[type=number], select, .label {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=number]:focus, select:focus, .label:focus {
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
ul, li {
	text-decoration: none;
}
</style>
</style>
<body>
<div class="content">
	<h1>entri transaksi</h1>
<form action="" method="post">
			<?php $username = $_SESSION['username']; $idpetugas = 
			query("SELECT id_petugas FROM petugas WHERE username =
			'$username'");?>
			<input type="hidden" name="id_petugas" value="<?= $idpetugas[0]['id_petugas']; ?>">
			<label for="nama_petugas" >nama_petugas :</label>
			<label id="nama_petugas" class="label"><?= $_SESSION['ininama']['nama_petugas']; ?></label>
		
			<input type="hidden" name="nisn" value="<?= $nisn; ?>">
			<label for="nisn">nisn :</label>
			<label id="nisn" class="label"><?= $nisn; ?></label>
		
		
			<label for="nis">nis :</label>
			<label id="nis" class="label"><?= $siswa[0]["nis"]; ?></label>
		
		
			<label for="nama">nama :</label>
			<label id="nama" class="label"><?= $siswa[0]["nama"]; ?></label>
			
			<?php $tgl = date("Y-m-d"); ?>
			<input type="hidden" name="tgl_bayar" value="<?= $tgl;?>">
			<label for="tgl_bayar">tgl_bayar :</label>
			<label class="label"><?= date("Y-m-d"); ?></label>
		
		
			<label for="bulan_dibayar">bulan_dibayar :</label>
			<?php $bulan = array('januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember' );  ?>
			<select name="bulan_dibayar">
				<?php for($x=0;$x<count($bulan);$x++):?>
				<option value="<?= $bulan[$x];?>"><?= $bulan[$x]; ?></option>
				<?php endfor; ?>
			</select>

			<label for="tahun_dibayar">tahun_dibayar :</label>
			<input type="number" name="tahun_dibayar" minlength="4" maxlength="4">
		
			<input type="hidden" name="id_spp" value="<?= $siswa[0]["id_spp"]; ?>">
			<label for="id_spp">id_spp :</label>
			<label class="label"><?= $siswa[0]["id_spp"]; ?></label>
		
		
			<label for="jumlah_bayar">jumlah_bayar :</label>
			<input type="text" name="jumlah_bayar" id="jumlah_bayar">
		
		
			<button class="registerbtn" type="submit" name="submit">bayar</button>
      </form>
      <h1>bulan yang sudah di bayar</h1>
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
</body>
</html>