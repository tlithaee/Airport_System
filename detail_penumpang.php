<?php
    include("config.php");
    session_start();
    $reservasi = 3;
    //$reservasi = $_SESSION['r_id'] ;
    $sql = "SELECT * FROM reservasi WHERE R_ID = '$reservasi'";
    $query = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($query)){
        $totalpenumpang = $row['R_Jumlah_Kursi'];
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Detail Penumpang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif;
            }

            body{
                background: linear-gradient(to right, #bde5ff, #ecdff1);
                background-size: cover;
                background-position: center;
            }
            .button-pos {
                position: relative;
                top: 100%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .logo-image {
                width: 150px;
                height: auto;
            }

            .user-image {
                width: 40px;
                height: auto;
            }

            .check-image {
                width: 90px;
                height: auto;
                margin-top: 20px;
                align-items: center;
            }
            .btn{
                margin-top: 40px;
                background: #2196F3;
                padding: 12px;
                text-align: center;
                color: #f8f8f8;
                cursor: pointer;
                width: 100px;
            }
        </style>
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
        <form action="proses-detail-penumpang.php" method="POST" class="mt-5">
            <div class="col-md-6 mx-auto centered-card">
                <?php
                if($totalpenumpang>0){ ?>
                <div class="row">
                    <div class="card mb-3 " style="width: 50rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Detail Penumpang 1</h5>
                            
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnama1" name="pnama1" placeholder="">
                                    <label for="pnama1">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnik1" name="pnik1" placeholder="">
                                    <label for="pnik1">NIK</label>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <?php } 
                ?>
                <?php
                if($totalpenumpang>1){ ?>
                <div class="row">
                    <div class="card mb-3" style="width: 50rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Detail Penumpang 2</h5>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnama2" name="pnama2" placeholder="">
                                    <label for="pnama2">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnik2" name="pnik2" placeholder="">
                                    <label for="pnik2">NIK</label>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if($totalpenumpang>2){ ?>
                <div class="row">
                    <div class="card mb-3" style="width: 50rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Detail Penumpang 3</h5>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnama3" name="pnama3" placeholder="">
                                    <label for="pnama3">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnik3" name="pnik3" placeholder="">
                                    <label for="pnik3">NIK</label>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if($totalpenumpang>3){ ?>
                <div class="row">
                    <div class="card mb-3" style="width: 50rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Detail Penumpang 4</h5>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnama4" name="pnama4" placeholder="">
                                    <label for="pnama4">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnik4" name="pnik4" placeholder="">
                                    <label for="pnik4">NIK</label>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php
                if($totalpenumpang>4){ ?>
                <div class="row">
                    <div class="card mb-3" style="width: 50rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Detail Penumpang 5</h5>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnama5" name="pnama5" placeholder="">
                                    <label for="pnama5">Nama</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="pnik5" name="pnik5" placeholder="">
                                    <label for="pnik5">NIK</label>
                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <input class="btn btn-primary d-flex align-items-center flex-column button-pos" style="height: 50px; font-size: 16px;" type="submit" value="Submit" name="submit">
        </form>
        </div>
    </body>
</html>
