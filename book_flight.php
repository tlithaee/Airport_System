<?php
include("config.php");

// Debug: Display the form data
var_dump($_POST);

if (isset($_POST['booknow'])) {
  session_start();
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }

  $pnID = $_POST['pnID'];
  $kelas = $_POST['kelas'];
  $penumpang = $_POST['totalpenumpang'];

  $que = "SELECT K_ID FROM Kelas WHERE K_Nama = '$kelas'";
  $resu = mysqli_query($db, $que);
  $ro = mysqli_fetch_assoc($resu);
  $K_ID = $ro['K_ID'];
  
  $quer = "SELECT Pm_ID FROM Pemesan WHERE Pm_Username = '$username'";
  $resul = mysqli_query($db, $quer);
  $row = mysqli_fetch_assoc($resul);
  $pmID = $row['Pm_ID'];

  // Insert the booking into the database
  $query = "INSERT INTO Reservasi (Pn_ID, Pm_ID, R_Jumlah_Kursi, R_Tanggal) VALUES ('$pnID', '$pmID', '$penumpang', NOW())";
  $result = mysqli_query($db, $query);

  if ($result) {
    $r_id = mysqli_insert_id($db); // Get the reservation ID (r_id)
    echo "Reservation successful! Your reservation ID is: " . $r_id;
    header("Location: detail_penumpang.php?reservation_id=$r_id&k_id=$K_ID");
    exit();
  } else {
    echo "Error executing the booking query: " . mysqli_error($db);
  }
}
?>
