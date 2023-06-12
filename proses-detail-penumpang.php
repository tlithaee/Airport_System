<?php

include("config.php");

// cek apakah tombol sudah diklik atau blum?
if(isset($_POST['submit'])){
    if(isset($_POST['pnama1'])){
        $nama1 = $_POST['pnama1'];
        $nik1 = $_POST['pnik1'];
        $sql = "INSERT INTO penumpang (P_Nama, P_NIK) VALUE ('$nama1', '$nik1')";
        $query1 = mysqli_query($db, $sql);
    }

    if(isset($_POST['pnama2'])){
        $nama2 = $_POST['pnama2'];
        $nik2 = $_POST['pnik2'];
        $sql = "INSERT INTO penumpang (P_Nama, P_NIK) VALUE ('$nama2', '$nik2')";
        $query2 =  mysqli_query($db, $sql);
    }

    if(isset($_POST['pnama3'])){
        $nama3 = $_POST['pnama3'];
        $nik3 = $_POST['pnik3'];
        $sql = "INSERT INTO penumpang (P_Nama, P_NIK) VALUE ('$nama3', '$nik3')";
        $query3 = mysqli_query($db, $sql);
    }

    if(isset($_POST['pnama4'])){
        $nama4 = $_POST['pnama4'];
        $nik4 = $_POST['pnik4'];
        $sql = "INSERT INTO penumpang (P_Nama, P_NIK) VALUE ('$nama4', '$nik4')";
        $query4 = mysqli_query($db, $sql);
    }

    if(isset($_POST['pnama5'])){
        $nama5 = $_POST['pnama5'];
        $nik5 = $_POST['pnik5'];
        $sql = "INSERT INTO penumpang (P_Nama, P_NIK) VALUE ('$nama5', '$nik5')";
        $query5 = mysqli_query($db, $sql);
    }
    if( $query1 && $query2 && $query3 && $query4 && $query5) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: pembayaran.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: pembayaran.php?status=gagal');
	}

} else {
	die("Akses dilarang...");
}

?>