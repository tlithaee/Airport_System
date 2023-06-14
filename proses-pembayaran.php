<?php

include("config.php");

// cek apakah tombol done sudah diklik atau belum?
if(isset($_POST['submit'])){
    // ambil data dari formulir
    $cardname = $_POST['cardname'];
    $cardnum = $_POST['cardnum'];
    $cardval = $_POST['validdate'];
    $cvv = $_POST['cvv'];
    $rid = $_POST['rid'];

    // buat query untuk menyimpan data pembayaran
    $sql = "INSERT INTO pembayaran (Pb_Tanggal_Waktu_Bayar, Pb_Nomor_Kartu, Pb_Tanggal_Valid, Pb_Nama_Di_Kartu, Pb_CVV, Sp_ID) 
            VALUE (CURRENT_TIMESTAMP(), '$cardnum', '$cardval', '$cardname', '$cvv', 1)";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // ambil Pm_Id yang baru saja ditambahkan
        $pmId = mysqli_insert_id($db);

        // buat query untuk memperbarui Pm_Id di tabel reservasi
        $updateSql = "UPDATE reservasi SET Pm_Id = '$pmId' WHERE R_ID = '$rid'";
        $updateQuery = mysqli_query($db, $updateSql);

        // apakah query update berhasil?
        if( $updateQuery ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: dashboard.php?status=sukses');
        } else {
            // kalau gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: dashboard.php?status=gagal');
        }
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: dashboard.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}

?>
