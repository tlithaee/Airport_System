<?php include("config.php"); ?>
<?php
session_start();
$username = $_SESSION['username'];
$sql = "SELECT * FROM pemesan WHERE Pm_Username = '$username'";
$query = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($query)){
    $name = $row['Pm_Nama'];
    $notelp = $row['Pm_No_Telp'];
    $email = $row['Pm_Email'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/manage_acc.css">
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar shadow p-3 mb-5 bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">
                <img src="images/logo_tulisan.png" alt="logo" class="logo-image">
            </a>
            <a class="navbar-brand" href="manage_acc.php">
                <img src="images/Male User.png" alt="logo" class="user-image">
            </a>
        </div>
    </nav>

    <main class="container">
        <div class="payment">
            <div class="payment-logo">
                <p><img src="images/Male User.png" alt="logo" class="user_image"></p>
            </div>
            
            <div class="space">
                <div class="d-flex space">
                    <div class="d-flex align-items-center" style="width: 100px;">
                        <label class='p-2 fs-7 fw-bold'>Username</label>
                    </div>
                    <div class="d-flex fs-7 fw-bold">
                        <?php
                        echo "<input type='text' readonly class='form-control-plaintext' id='usn' value=': $username'>";
                        ?>
                    </div>
                </div>
                <div class="d-flex space">
                    <div class="d-flex align-items-center" style="width: 100px;">
                        <label class="p-2 fs-7 fw-bold">Nama</label>
                    </div>
                    <div class="d-flex fs-7 fw-bold">
                        <?php
                        echo "<input type='text' readonly class='form-control-plaintext' id='nama' value=': $name' >";
                        ?>
                    </div>
                </div>
                <div class="d-flex space">
                    <div class="d-flex align-items-center" style="width: 100px;">
                        <label class="p-2 fs-7 fw-bold">No. Telp</label>
                    </div>
                    <div class="d-flex fs-7 fw-bold">
                        <?php
                        echo "<input type='text' readonly class='form-control-plaintext' id='notelp' value=': $notelp' >";
                        ?>
                    </div>
                </div>   
                <div class="d-flex space">
                    <div class="d-flex align-items-center" style="width: 100px;">
                        <label class="p-2 fs-7 fw-bold">Email</label>
                    </div>
                    <div class="d-flex fs-7 fw-bold">
                        <?php
                        echo "<input type='text' readonly class='form-control-plaintext' id='email' value=': $email' >";
                        ?>
                    </div>
                </div>       
            </div>

               
            <div class="d-flex align-items-center flex-column mt-auto">
                <a href="daftar_pemesanan.php">
                <button type="button" class="btn btn-primary">
                    Kelola Pemesanan Tiket
                </button>
                </a>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
