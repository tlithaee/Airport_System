<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])){

	// ambil data dari formulir
	$asal = $_POST['from'];
    $transit = $_POST['transit'];
	$tujuan = $_POST['to'];
	$waktuPergi1 = $_POST['departureTime1'];
	$waktuSampai1 = $_POST['arrivalTime1'];
    $waktuPergi2 = $_POST['departureTime2'];
	$waktuSampai2 = $_POST['arrivalTime2'];
	$pesawat = $_POST['pesawat'];
	$ekonomis = intval($_POST['economy_price']);
	$businnes = intval($_POST['businnes_price']);
	$first = intval($_POST['first_price']);

	// query
	$sql = "INSERT INTO destinasi (D_Lokasi_Asal, D_Lokasi_Tujuan) 
            VALUE ('$asal', '$transit')";
	$query = mysqli_query($db, $sql);

	// query 1
	$sql1 = "SELECT D_ID FROM destinasi WHERE D_Lokasi_Asal='$asal' AND D_Lokasi_Tujuan='$transit'";
	$query1 = mysqli_query($db, $sql1);
	$row1 = mysqli_fetch_assoc($query1);
	$D_ID = $row1['D_ID'];

    // query 2
	$sql2 = "INSERT INTO destinasi (D_Lokasi_Asal, D_Lokasi_Tujuan) 
            VALUE ('$transit', '$tujuan')";
    $query2 = mysqli_query($db, $sql2);

    // query 3
    $sql3 = "SELECT D_ID FROM destinasi WHERE D_Lokasi_Asal='$transit' AND D_Lokasi_Tujuan='$tujuan'";
    $query3 = mysqli_query($db, $sql3);
    $row3 = mysqli_fetch_assoc($query3);
    $D_ID2 = $row3['D_ID'];

    // query 4
	$sql4 = "INSERT INTO penerbangan (D_ID) VALUE ($D_ID)";
	$query4 = mysqli_query($db, $sql4);

    // query 5
	$sql5 = "SELECT Pn_ID FROM penerbangan WHERE D_ID=$D_ID";
	$query5 = mysqli_query($db, $sql5);
	$row5 = mysqli_fetch_assoc($query5);
	$Pn_ID = $row5['Pn_ID'];

    // query 6
	$sql6 = "INSERT INTO Harga (H_Harga, K_ID, Pn_ID) VALUES ($ekonomis, 'E', $Pn_ID)";
	$query6 = mysqli_query($db, $sql6);

	// query 7
	$sql7 = "INSERT INTO Harga (H_Harga, K_ID, Pn_ID) VALUES ($businnes, 'B', $Pn_ID)";
	$query7 = mysqli_query($db, $sql7);

	// query 8
	$sql8 = "INSERT INTO Harga (H_Harga, K_ID, Pn_ID) VALUES ($first, 'F', $Pn_ID)";
	$query8 = mysqli_query($db, $sql8);

    // query 9
	$sql9 = "SELECT B_Nama_Bandara FROM bandara WHERE B_ID='$asal'";
	$query9 = mysqli_query($db, $sql9);
	$row9 = mysqli_fetch_assoc($query9);
	$Jp_Bandara_Asal = $row9['B_Nama_Bandara'];

	// query 10
	$sql10 = "SELECT B_Nama_Bandara FROM bandara WHERE B_ID='$tujuan'";
	$query10 = mysqli_query($db, $sql10);
	$row10 = mysqli_fetch_assoc($query10);
	$Jp_Bandara_Tujuan = $row10['B_Nama_Bandara'];
	
    // query 11
	$sql11 = "SELECT B_Nama_Bandara FROM bandara WHERE B_ID='$transit'";
	$query11 = mysqli_query($db, $sql11);
	$row11 = mysqli_fetch_assoc($query11);
	$Jp_Bandara_Transit = $row11['B_Nama_Bandara'];

	// query 12
	$sql12 = "SELECT Mp_ID FROM model_pesawat WHERE Mp_Nama='$pesawat'";
	$query12 = mysqli_query($db, $sql12);
	$row12 = mysqli_fetch_assoc($query12);
	$Mp_ID = $row12['Mp_ID'];

	// query 13
	$sql13 = "INSERT INTO pesawat (Mp_ID) VALUE ($Mp_ID)";
	$query13 = mysqli_query($db, $sql13);

	// query 14
	$sql14 = "SELECT Pe_ID FROM pesawat WHERE Mp_ID=$Mp_ID";
	$query14 = mysqli_query($db, $sql14);
	$row14 = mysqli_fetch_assoc($query14);
	$Pe_ID = $row14['Pe_ID'];

	// query n1
	$sqln1 = "INSERT INTO jadwal_penerbangan (Jp_Tanggal_Waktu_Departure, Jp_Tanggal_Waktu_Arrival, Jp_Bandara_Asal, Jp_Bandara_Tujuan, B_ID, Pe_ID, Pn_ID) 
	VALUES ('$waktuPergi1', '$waktuSampai1', '$Jp_Bandara_Asal', '$Jp_Bandara_Transit', '$asal', $Pe_ID, $Pn_ID)";
	$queryn1 = mysqli_query($db, $sqln1);

    // query n2
	$sqln2 = "INSERT INTO jadwal_penerbangan (Jp_Tanggal_Waktu_Departure, Jp_Tanggal_Waktu_Arrival, Jp_Bandara_Asal, Jp_Bandara_Tujuan, B_ID, Pe_ID, Pn_ID) 
	VALUES ('$waktuPergi2', '$waktuSampai2', '$Jp_Bandara_Transit', '$Jp_Bandara_Tujuan', '$transit', $Pe_ID, $Pn_ID)";
	$queryn2 = mysqli_query($db, $sqln2);

	// apakah query simpan berhasil?
	if( $query && $query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $query7 && $query8 &&  $query9 &&  $query10 &&  $query11 &&  $query12 && $query13 && $query14 && $queryn1 && $queryn2) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: combine.php?status=sukses');
	} else {
		 // kalau gagal alihkan ke halaman indek.php dengan status=gagal
		header('Location: combine.php?status=gagal');
	}

} else {
	die("Akses dilarang...");
}

?>
