<?php

include("config.php");

// cek apakah tombol done sudah diklik atau blum?
if(isset($_POST['username'])){
	// ambil data dari formulir
	$username = $_POST['username'];
	$nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $password = $_POST['password'];

	// buat query
	$sql = "INSERT INTO `pemesan` (Pm_Username, Pm_Nama, Pm_No_Telp, Pm_Email, Pm_Password) VALUE ('$username', '$nama', '$no_telp', '$email', '$password')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: regist.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>