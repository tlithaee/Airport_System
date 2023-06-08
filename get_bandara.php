<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fp_mbd";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Mendapatkan kode kota dari permintaan AJAX
$kode_kota = $_GET['kode_kota'];

// Mengeksekusi query untuk mendapatkan data bandara berdasarkan kode kota
$sql = "SELECT * FROM bandara WHERE B_KodeKota = '$kode_kota'";
$result = $conn->query($sql);

// Mengirim data bandara dalam format JSON sebagai respons
if ($result->num_rows > 0) {
    $bandara = array();
    while ($row = $result->fetch_assoc()) {
        $bandara[] = $row;
    }
    echo json_encode($bandara);
} else {
    echo "Data bandara tidak ditemukan";
}

$conn->close();
?>
