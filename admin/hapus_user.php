<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
// mengambil data dari url
$id_petugas = $_GET["id_petugas"];

if( hapus_user($id_petugas) > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'data_petugas.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('data gagal dihapus');
				document.location.href = 'data_petugas.php';
			</script>
			";
		
}
 ?>