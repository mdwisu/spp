<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
// mengambil data dari url
$id_kelas = $_GET["id_kelas"];

if( hapus_kelas($id_kelas) > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'data_kelas.php';
			</script>
			";
	} else {
		
}
 ?>