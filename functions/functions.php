<?php 
$conn = mysqli_connect("localhost", "root", "", "db_spp"); 



// file makanan
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = array();
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row; 
	}
	return $rows;
}
function querydrop($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = array($result);
	return $rows;
}

  function tambah_siswa($data) {
	global $conn;
	$nisn = htmlspecialchars($data["nisn"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$id_spp = htmlspecialchars($data["id_spp"]);
		// query insert
	$query = "INSERT INTO siswa
	VALUES 
	('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')
	";

	
	mysqli_query($conn, $query);

	 return mysqli_affected_rows($conn);
 }
  function tambah_kelas($data) {
	global $conn;
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$nama_kelas = htmlspecialchars($data["nama_kelas"]);
	$kompetensi_keahlian = htmlspecialchars($data["kompetensi_keahlian"]);
		// query insert
	$query = "INSERT INTO kelas
	VALUES 
	('$id_kelas', '$nama_kelas', '$kompetensi_keahlian')
	";

	
	mysqli_query($conn, $query);

	 return mysqli_affected_rows($conn);
 }
   function tambah_spp($data) {
	global $conn;
	$id_spp = htmlspecialchars($data["id_spp"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$nominal = htmlspecialchars($data["nominal"]);
		// query insert
	$query = "INSERT INTO spp
	VALUES 
	('$id_spp', '$tahun', '$nominal')
	";

	
	mysqli_query($conn, $query);

	 return mysqli_affected_rows($conn);
 }
   function tambah_pembayaran($data) {
	global $conn;
	$id_petugas = htmlspecialchars($data["id_petugas"]);
	$nisn = htmlspecialchars($data["nisn"]);
	$tgl_bayar = htmlspecialchars($data["tgl_bayar"]);
	$bulan_dibayar = htmlspecialchars($data["bulan_dibayar"]);
	$tahun_dibayar = htmlspecialchars($data["tahun_dibayar"]);
	$id_spp = htmlspecialchars($data["id_spp"]);
	$jumlah_bayar = htmlspecialchars($data["jumlah_bayar"]);
		// query insert
	$date = date("Y-m-d");
	$query = "INSERT INTO pembayaran
	VALUES 
	('', '$id_petugas', '$nisn', '$date', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')
	";

	
	mysqli_query($conn, $query);

	 return mysqli_affected_rows($conn);
 }


 function ubah_siswa($data){
 	global $conn;
	$nisn = htmlspecialchars($data["nisn"]);
	$nis = htmlspecialchars($data["nis"]);
	$nama = htmlspecialchars($data["nama"]);
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$no_telp = htmlspecialchars($data["no_telp"]);
	$id_spp = htmlspecialchars($data["id_spp"]);

		// query insert
	$query = "UPDATE siswa SET
			nisn = '$nisn',
			nis = '$nis',
			nama = '$nama',
			id_kelas = '$id_kelas',
			alamat = '$alamat',
			no_telp = '$no_telp',
			id_spp = '$id_spp'
			WHERE nisn = '$nisn'
			";

	mysqli_query($conn, $query);

	 return mysqli_affected_rows($conn);
 }
  function ubah_kelas($data){
 	global $conn;
	$id_kelas = htmlspecialchars($data["id_kelas"]);
	$nama_kelas = htmlspecialchars($data["nama_kelas"]);
	$kompetensi_keahlian = htmlspecialchars($data["kompetensi_keahlian"]);

		// query insert
	$query = "UPDATE kelas SET
			id_kelas = '$id_kelas',
			nama_kelas = '$nama_kelas',
			kompetensi_keahlian = '$kompetensi_keahlian'
			WHERE id_kelas = '$id_kelas'
			";

	mysqli_query($conn, $query);

	 return mysqli_affected_rows($conn);
 }

 

function ubah_user($data){
 	global $conn;
	$id_petugas = htmlspecialchars($data["id_petugas"]);
	$username = htmlspecialchars($data["username"]);
	$password = htmlspecialchars (md5($data["password"]));
	$nama_petugas = htmlspecialchars($data["nama_petugas"]);
	$level = $data["level"];	

		// query insert
	$query = "UPDATE `petugas` SET 
			`id_petugas` = '$id_petugas',
			`username` = '$username',
			`password` = '$password',
			`nama_petugas` = '$nama_petugas',
			`level` = '$level' WHERE `id_petugas` = '$id_petugas';
			";

	mysqli_query($conn, $query);
	 return mysqli_affected_rows($conn);
 }
 function ubah_spp($data){
 	global $conn;
	$id_spp = htmlspecialchars($data["id_spp"]);
	$tahun = htmlspecialchars($data["tahun"]);
	$nominal = htmlspecialchars($data["nominal"]);	

		// query insert
	$query = "UPDATE `spp` SET 
			`id_spp` = '$id_spp',
			`tahun` = '$tahun',
			`nominal` = '$nominal' WHERE `id_spp` = '$id_spp';
			";

	mysqli_query($conn, $query);
	 return mysqli_affected_rows($conn);
 }

  function hapus_kelas($id_kelas) {
 	global $conn;
 	mysqli_query($conn, "DELETE FROM kelas WHERE `id_kelas` = '$id_kelas'");
 	return mysqli_affected_rows($conn);
 }
   function hapus_spp($id_spp) {
 	global $conn;
 	mysqli_query($conn, "DELETE FROM spp WHERE `id_spp` = '$id_spp'");
 	return mysqli_affected_rows($conn);
 }
  function hapus_siswa($nisn) {
 	global $conn;
 	mysqli_query($conn, "DELETE FROM siswa WHERE nisn = '$nisn'");
 	return mysqli_affected_rows($conn);
 }
 function hapus_user($id_petugas) {
 	global $conn;
 	mysqli_query($conn, "DELETE FROM petugas WHERE `id_petugas` = '$id_petugas'");
 	return mysqli_affected_rows($conn);
 }

 function carisiswa($keyword) {
	$query = "SELECT * FROM `siswa` WHERE `nisn` LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
	return query($query);
}
 function caripembayaran($keyword) {
	$query = "SELECT * FROM `pembayaran` WHERE `nisn` LIKE '%$keyword%' ORDER BY tgl_bayar DESC";
	return query($query);
}
function caripembayaran2($date11, $date22) {
	$query = "SELECT * FROM `pembayaran` INNER JOIN `petugas` ON `pembayaran`.`id_petugas` = `petugas`.`id_petugas` INNER JOIN `spp` ON `pembayaran`.`id_spp` = `spp`.`id_spp` WHERE `pembayaran`.`tgl_bayar` BETWEEN '$date11' AND '$date22'";
	return query($query);
}
function caripembayaran3($sf){
	
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama_petugas = strtolower(stripcslashes($data["nama_petugas"]));
	$level = $data["level"];

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM petugas WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('username sudah terdaftar!')
			  </script>";
		return false;
	}
	// cek konfirmasi password
	if ( $password !== $password2) {
		echo "<script>
		alert('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}

	// enkripsi password
	$password = md5($password);
	// seharusnya enkripsinya pake yang bawah, karna md5 uda jadul, php w masi jadul wkwk
	// $password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO petugas VALUES('', '$username', '$password', '$nama_petugas', '$level')");

	return mysqli_affected_rows($conn);
}

 ?>
