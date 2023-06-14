<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/logo.ico">
    <title>SwiftAir | Daftar Penerbangan</title>
    <!-- ==== STYLE.CSS ==== -->
    <link rel="stylesheet" href="./assets/css/daftar-penerbangan.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(800px, 1fr));
            grid-gap: 20px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>

<body>
<header>
    <span class="image-clickable">
      <a href="dashboard.php">
        <img src="./assets/images/logo_tulisan.png" alt="main-logo" class="logo" />
      </a>
    </span>
    <nav>
      <ul class="nav-links">
        <?php
        // Check if the user is logged in
        session_start();
        if (isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          echo "<li><a href='#'>Hello, $username</a></li>";
        } else {
          echo "<li><a href='#'>Hello, Guest</a></li>";
        }
        ?>
      </ul>
    </nav>
    <a href="#">
      <span class="image-clickable">
        <a href="manage_acc.php">
          <img src="./assets/images/Male User.png" alt="main-logo" class="maleuser" />
        </a>
      </span>
    </a>
  </header>
    <?php
    include("config.php");

    // // Debug: Display the form data
    // var_dump($_POST);

    // Get the input values for date and airports
    $inputDate = $_POST['date'];
    $inputDateTime = date('Y-m-d', strtotime($inputDate)) . ' 00:00:00';
    $bandaraAsal = $_POST['dari'];
    $bandaraTujuan = $_POST['ke'];
    $kelas = $_POST['kelas'];
    $totalpenumpang = $_POST['penumpang'];

    // First query to get Pn_ID and H_Harga for direct flights
    $query1_direct = "SELECT p.Pn_ID, h.H_Harga
        FROM Penerbangan p
        JOIN Jadwal_Penerbangan jp ON jp.Pn_ID = p.Pn_ID
        JOIN Harga h ON h.Pn_ID = p.Pn_ID
        JOIN kelas k ON k.K_ID = h.K_ID
        WHERE (jp.Jp_Bandara_Asal = '$bandaraAsal'
        AND jp.Jp_Bandara_Tujuan = '$bandaraTujuan')
        AND k.K_Nama = '$kelas'
        AND DATE(jp.Jp_Tanggal_Waktu_Departure) >= '$inputDateTime'
        AND p.Pn_ID IN (
            SELECT jp2.Pn_ID
            FROM Jadwal_Penerbangan jp2
            GROUP BY jp2.Pn_ID
            HAVING COUNT(jp2.Pn_ID) = 1
        )";
    $result1_direct = mysqli_query($db, $query1_direct);

    // Second query to get Pn_ID and H_Harga for flights with transit
    $query1_transit = "SELECT DISTINCT p.Pn_ID, h.H_Harga
        FROM Penerbangan p
        JOIN Jadwal_Penerbangan jp1 ON jp1.Pn_ID = p.Pn_ID
        JOIN Jadwal_Penerbangan jp2 ON jp2.Pn_ID = p.Pn_ID
        JOIN Harga h ON h.Pn_ID = p.Pn_ID
        JOIN kelas k ON k.K_ID = h.K_ID
        WHERE (jp1.Jp_Bandara_Tujuan = jp2.Jp_Bandara_Asal
        AND jp2.Jp_Bandara_Tujuan = '$bandaraTujuan')
        AND DATE(jp1.Jp_Tanggal_Waktu_Departure) >= '$inputDateTime'
        AND k.K_Nama = '$kelas'";
    $result1_transit = mysqli_query($db, $query1_transit);

    // Check if any flights were found
    if (mysqli_num_rows($result1_direct) == 0 && mysqli_num_rows($result1_transit) == 0) {
        // Display the "No Flights Found" message
        echo '<div id="error-page">';
        echo '   <div class="content">';
        echo '      <h2 class="header" data-text="No Flights Found!">';
        echo '         No Flights Found!';
        echo '      </h2>';
        echo '      <h4 data-text="❌✈❌">';
        echo '         ❌✈❌';
        echo '      </h4>';
        echo '      <p>';
        echo '         Apologies, no matching flights found. Return to dashboard?';
        echo '      </p>';
        echo '      <div class="btns">';
        echo '         <a href="dashboard.php">Back to Dashboard</a>';
        echo '      </div>';
        echo '   </div>';
        echo '</div>';
    }

    // Check if the first query was successful
    if ($result1_direct) {
        // Display the result in a card format
        echo '<div class="container">';
    
        if (mysqli_num_rows($result1_direct) > 0) {
            while ($row1_direct = mysqli_fetch_assoc($result1_direct)) {
                echo '<form action="book_flight.php" method="POST">';
                $pnID = $row1_direct['Pn_ID'];
                $harga = $row1_direct['H_Harga'];
                echo '<input type="hidden" name="pnID" value="' . $pnID . '">';
                echo '<input type="hidden" name="kelas" value="' . $kelas . '">';
                echo '<input type="hidden" name="totalpenumpang" value="' . $totalpenumpang . '">';
    
                // Second query to get the flight details for each Pn_ID
                $query2_direct = "SELECT jp.Jp_Tanggal_Waktu_Departure, jp.Jp_Tanggal_Waktu_Arrival, jp.Jp_Bandara_Asal, jp.Jp_Bandara_Tujuan
                                    FROM Jadwal_Penerbangan jp
                                    WHERE jp.Pn_ID = '$pnID'";
    
                $result2_direct = mysqli_query($db, $query2_direct);
    
                if ($result2_direct) {
                    if (mysqli_num_rows($result2_direct) > 0) {
                        // Display the flight details
                        echo '<div class="card">';
                        echo '<div class="card-header custom-card-header">';
                        echo '<div class="row">';
                        echo '<div class="col-md-4"> <p class="h4 custom-class">Asal</p> </div>';
                        echo '<div class="col-md-4"> <p class="h4 custom-class">Tujuan</p> </div>';
                        echo '<div class="col-md-2"> <p class="h4 custom-class">Kelas</p> </div>';
                        echo '<div class="col-md-2"> <p class="h4 custom-class">Harga</p> </div>';
                        echo '</div>';
                        echo '<div class="row">';
                        echo '<div class="col-md-4"><p class="h7">' . $bandaraAsal . '</p></div>';	
                        echo '<div class="col-md-4"><p class="h7">' . $bandaraTujuan . '</p></div>';
                        echo '<div class="col-md-2"><p class="h7">' . $kelas . '</p></div>';
                        echo '<div class="col-md-2"><p class="h7">' . $harga . '</p></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-body">';
                        while ($row2_direct = mysqli_fetch_assoc($result2_direct)) {
                            echo '<div class="card">';
                            echo '<div class="row">';
                            echo '<div class="col-md-6"> <p class="h4">Asal</p> </div>';
                            echo '<div class="col-md-6"> <p class="h4">Tujuan</p> </div>';
                            echo '</div>';
                            echo '<div class="row">';
                            echo '<div class="col-md-6"><p class="h72">' . $row2_direct['Jp_Bandara_Asal'] . '</p></div>';
                            echo '<div class="col-md-6"><p class="h72">' . $row2_direct['Jp_Bandara_Tujuan'] . '</p></div>';
                            echo '</div>';
                            echo '<div class="row">';
                            echo '<div class="col-md-6"> <p class="h4">Waktu Keberangkatan</p> </div>';
                            echo '<div class="col-md-6"> <p class="h4">Waktu Sampai</p> </div>';
                            echo '</div>';
                            echo '<div class="row">';
                            echo '<div class="col-md-6"><p class="h72">' . $row2_direct['Jp_Tanggal_Waktu_Departure'] . '</p></div>';
                            echo '<div class="col-md-6"><p class="h72">' . $row2_direct['Jp_Tanggal_Waktu_Arrival'] . '</p></div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '<div class="card-footer">';
                        echo '<div class="row">';
                        echo '<div class="button-container"><button type="submit" name="booknow" class="btn btn-primary">Book Now</button></div>';
                        // echo '<button type="submit" name="submit" value="submit" class="btn btn-primary"> Book </button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        // Display the "Tidak ada jadwal" message
                        echo '<div class="card">';
                        echo '<div class="card-header">';
                        echo '<div class="row">';
                        echo '<div class="col-md-12"> <p class="h4">Tidak ada jadwal</p> </div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Error executing the second query: " . mysqli_error($db);
                }
                echo '</form>';
            }
        } 
        echo '</div>'; // Close the container
    } else {
        echo "Error executing the first query: " . mysqli_error($db);
    }

    // Check if the first query was successful
    if ($result1_transit) {
        // Display the result in a card format
        echo '<div class="container">';

        while ($row1_transit = mysqli_fetch_assoc($result1_transit)) {
            echo '<form action="book_flight.php" method="POST">';
            $pnID = $row1_transit['Pn_ID'];
            $harga = $row1_transit['H_Harga'];
            echo '<input type="hidden" name="pnID" value="' . $pnID . '">';
            echo '<input type="hidden" name="kelas" value="' . $kelas . '">';
            echo '<input type="hidden" name="totalpenumpang" value="' . $totalpenumpang . '">';

            // Second query to get the flight details for each Pn_ID
            $query2_transit = "SELECT jp.Jp_Tanggal_Waktu_Departure, jp.Jp_Tanggal_Waktu_Arrival, jp.Jp_Bandara_Asal, jp.Jp_Bandara_Tujuan
                                FROM Jadwal_Penerbangan jp
                                WHERE jp.Pn_ID = '$pnID'";

            $result2_transit = mysqli_query($db, $query2_transit);

            if ($result2_transit) {
                // Display the flight details
                echo '<div class="card">';
                echo '<div class="card-header custom-card-header">';
                echo '<div class="row">';
                echo '<div class="col-md-4"> <p class="h4 custom-class">Asal</p> </div>';
                echo '<div class="col-md-4"> <p class="h4 custom-class">Tujuan</p> </div>';
                echo '<div class="col-md-4"> <p class="h4 custom-class">Harga</p> </div>';
                echo '</div>';
                echo '<div class="row">';
                echo '<div class="col-md-4"><p class="h7">' . $bandaraAsal . '</p></div>';
                echo '<div class="col-md-4"><p class="h7">' . $bandaraTujuan . '</p></div>';
                echo '<div class="col-md-2"><p class="h7">' . $kelas . '</p></div>';
                echo '<div class="col-md-2"><p class="h7">' . $harga . '</p></div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="card-body">';
                while ($row2_transit = mysqli_fetch_assoc($result2_transit)) {
                    echo '<div class="card">';
                    echo '<div class="row">';
                    echo '<div class="col-md-6"> <p class="h4">Asal</p> </div>';
                    echo '<div class="col-md-6"> <p class="h4">Tujuan</p> </div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-6"><p class="h72">' . $row2_transit['Jp_Bandara_Asal'] . '</p></div>';
                    echo '<div class="col-md-6"><p class="h72">' . $row2_transit['Jp_Bandara_Tujuan'] . '</p></div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-6"> <p class="h4">Waktu Keberangkatan</p> </div>';
                    echo '<div class="col-md-6"> <p class="h4">Waktu Sampai</p> </div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-6"><p class="h72">' . $row2_transit['Jp_Tanggal_Waktu_Departure'] . '</p></div>';
                    echo '<div class="col-md-6"><p class="h72">' . $row2_transit['Jp_Tanggal_Waktu_Arrival'] . '</p></div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<div class="row">';
                echo '<div class="button-container"><button type="submit" name="booknow" class="btn btn-primary">Book Now</button></div>';
                // echo '<button type="submit" name="submit" value="submit" class="btn btn-primary"> Book </button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo "Error executing the second query: " . mysqli_error($db);
            }
            echo '</form>';
        }
        echo '</div>'; // Close the container
    } else {
        echo "Error executing the first query: " . mysqli_error($db);
    }

    // Close the database connection
    mysqli_close($db);
    ?>
</body>

</html>