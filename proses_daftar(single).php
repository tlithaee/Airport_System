<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['daftar'])){

	// ambil data dari formulir
	$asal = $_POST['from'];
	$tujuan = $_POST['to'];
	$waktuPergi = $_POST['departureDateTime'];
	$waktuSampai = $_POST['ArrivalDateTime'];
	$pesawat = $_POST['pesawat'];
	$ekonomis = intval($_POST['economy_price']);
	$businnes = intval($_POST['businnes_price']);
	$first = intval($_POST['first_price']);

	// query
	$sql = "INSERT INTO destinasi (D_Lokasi_Asal, D_Lokasi_Tujuan) 
            VALUE ('$asal', '$tujuan')";
	$query = mysqli_query($db, $sql);

	// query 1
	$sql1 = "SELECT D_ID FROM destinasi WHERE D_Lokasi_Asal='$asal' AND D_Lokasi_Tujuan='$tujuan'";
	$query1 = mysqli_query($db, $sql1);
	$row1 = mysqli_fetch_assoc($query1);
	$D_ID = $row1['D_ID'];

    // query 2
	$sql2 = "INSERT INTO penerbangan (D_ID) VALUE ($D_ID)";
	$query2 = mysqli_query($db, $sql2);

    // query 3
	$sql3 = "SELECT Pn_ID FROM penerbangan WHERE D_ID=$D_ID";
	$query3 = mysqli_query($db, $sql3);
	$row3 = mysqli_fetch_assoc($query3);
	$Pn_ID = $row3['Pn_ID'];

    // query 4
	$sql4 = "INSERT INTO Harga (H_Harga, K_ID, Pn_ID) VALUES ($ekonomis, 'E', $Pn_ID)";
	$query4 = mysqli_query($db, $sql4);

	// query 5
	$sql5 = "INSERT INTO Harga (H_Harga, K_ID, Pn_ID) VALUES ($businnes, 'B', $Pn_ID)";
	$query5 = mysqli_query($db, $sql5);

	// query 6
	$sql6 = "INSERT INTO Harga (H_Harga, K_ID, Pn_ID) VALUES ($first, 'F', $Pn_ID)";
	$query6 = mysqli_query($db, $sql6);

    // query 7
	$sql7 = "SELECT B_Nama_Bandara FROM bandara WHERE B_ID='$asal'";
	$query7 = mysqli_query($db, $sql7);
	$row7 = mysqli_fetch_assoc($query7);
	$Jp_Bandara_Asal = $row7['B_Nama_Bandara'];

	// query 8
	$sql8 = "SELECT B_Nama_Bandara FROM bandara WHERE B_ID='$tujuan'";
	$query8 = mysqli_query($db, $sql8);
	$row8 = mysqli_fetch_assoc($query8);
	$Jp_Bandara_Tujuan = $row8['B_Nama_Bandara'];
	
	// query 9
	$sql9 = "SELECT Mp_ID FROM model_pesawat WHERE Mp_Nama='$pesawat'";
	$query9 = mysqli_query($db, $sql9);
	$row9 = mysqli_fetch_assoc($query9);
	$Mp_ID = $row9['Mp_ID'];

	// query 10
	$sql10 = "INSERT INTO pesawat (Mp_ID) VALUE ($Mp_ID)";
	$query10 = mysqli_query($db, $sql10);

	// query 11
	$sql11 = "SELECT Pe_ID FROM pesawat WHERE Mp_ID=$query10";
	$query11 = mysqli_query($db, $sql11);
	$row11 = mysqli_fetch_assoc($query11);
	$Pe_ID = $row11['Pe_ID'];

	// query n
	$sqln = "INSERT INTO jadwal_penerbangan (Jp_Tanggal_Waktu_Departure, Jp_Tanggal_Waktu_Arrival, Jp_Bandara_Asal, Jp_Bandara_Tujuan, B_ID, Pe_ID, Pn_ID) 
	VALUES ('$waktuPergi', '$waktuSampai', '$Jp_Bandara_Asal', '$Jp_Bandara_Tujuan', '$asal', $Pe_ID, $Pn_ID)";
	$queryn = mysqli_query($db, $sqln);

	// apakah query simpan berhasil?
	if( $query && $query1 && $query2 && $query3 && $query4 && $query5 && $query6 && $query7 && $query8 &&  $query9 &&  $query10 &&  $query11 && $queryn) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: admin.php?status=sukses');
	} else {
		 // kalau gagal alihkan ke halaman indek.php dengan status=gagal
		header('Location: admin.php?status=gagal');
	}

} else {
	die("Akses dilarang...");
}

?>
