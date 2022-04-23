<?php 
session_start();

if (!isset($_SESSION["login"]) ) {
	header("Location: ../login");
	exit;
}
require '../functions/functions.php';
$nisn = $_GET["nisn"];

if( hapus_siswa($nisn) > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'data_siswa.php';
			</script>
			";
	} else { echo "
			<script>
				alert('data gagal dihapus');
				document.location.href = 'data_siswa.php';
			</script>
				";
		
}
 ?>