<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
// mengambil data dari url
$id_spp = $_GET["id_spp"];

if( hapus_spp($id_spp) > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'data_spp.php';
			</script>
			";
	} else {
		echo "gagal";
}
 ?>