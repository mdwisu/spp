<!DOCTYPE html>
<html>
<head>
<title>Font Awesome 5 Icons</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='js/a076d05399.js'></script>
<?php require '../functions/functions.php'; ?>
<!--Get your own code at fontawesome.com-->
</head>
<body>
<select name="id_kelas">
		<?php $id_kelas = query("SELECT id_kelas FROM kelas"); ?>
		<?php while ($row = $id_kelas ) : ?>
			<?php 
			$kel = $row["id_kelas"]; 
			$kelas = query("SELECT * FROM kelas WHERE id_kelas='$kel'");
			?>
			<option value="<?= $row["id_kelas"]; ?>"><?= $kelas[0]["nama_kelas"]; ?>~<?= $kelas[0]["kompetensi_keahlian"]; ?></option>
		<?php endwhile; ?>
		</select>











<h1>fas fa-bars</h1>

<i class='fas fa-bars'></i>
<i class='fas fa-bars' style='font-size:24px'></i>
<i class='fas fa-bars' style='font-size:36px'></i>
<i class='fas fa-bars' style='font-size:48px;color:red'></i>
<br>

<p>Used on a button:</p>
<button style='font-size:24px'>Button <i class='fas fa-bars'></i></button>

<p>Unicode:</p>
<i style='font-size:24px' class='fas'>&#xf0c9;</i>

</body>
</html>
