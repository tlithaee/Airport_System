<?php
    include("config.php");
    session_start();
    $username = 'user1';
    //$username = $_SESSION['username'];
    $sql = "SELECT * FROM pemesan WHERE Pm_Username = '$username'";
    $query = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($query)){
        $pmid = $row['Pm_ID'];
    } 
    $sql = "SELECT * FROM reservasi r JOIN pemesan p ON (p.Pm_ID = r.Pm_ID) JOIN jadwal_penerbangan jp ON (r.Pn_ID = jp.Pn_ID) WHERE p.Pm_ID = '$pmid'";
    $query = mysqli_query($db, $sql);
    $date = date('m/d/Y h:i:s a', time());
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/pembayaran.css">
</head>
<body>
    <header>
        <nav class="navbar shadow p-3 mb-5 bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo_tulisan.png" alt="logo" class="logo-image">
                </a>
                <a class="navbar-brand" href="manage_acc.php">
                    <img src="images/Male User.png" alt="logo" class="user-image">
                </a>
            </div>
        </nav>
    </header>   
    <div class="container">
        <div class="col-md-6 mx-auto centered-card">
            <?php
            while($row = mysqli_fetch_array($query)){
            ?>
            <div class= "row">
                <div class="card mb-3" style="width: 50rem;">
                    <?php
                    if(time()- strtotime($row['Jp_Tanggal_Waktu_Departure'])>0){
                        echo "<div class='card-header bg-transparent border-danger'> Finished</div>";
                    } else{
                        echo "<div class='card-header bg-transparent border-success'> Ongoing</div>";
                    }
                    ?>
                    <div class="card-body">
                        <h5 class="card-title">Id Booking : <?php echo $row['R_ID']; ?> </h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Berangkat : <?php echo $row['Jp_Bandara_Asal']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Tujuan : <?php echo $row['Jp_Bandara_Tujuan']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">TanggalWaktu : <?php echo $row['Jp_Tanggal_Waktu_Departure']; ?></h6>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div> 
</body>
</html>
