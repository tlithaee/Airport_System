<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <img src="images/logo_tulisan.png" alt="logo" class="logo-image">
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h1>[+] Tambah penerbangan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a href="singleDestination.php" class="btn btn-dark btn-circle">
                                    <span class="btn-circle-text"><img src="images/flyicon.png" alt="Button 1" width="80" height="80"></span>
                                </a>
                                <p>Single Destination</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="multipleDestination.php" class="btn btn-dark btn-circle">
                                    <span class="btn-circle-text"><img src="images/flyicon.png" alt="Button 2" width="80" height="80"></span>
                                </a>
                                <p>Multiple Destination (Include Transit)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h1>Cek pemesanan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a href="Cek_pemesanan.php" class="btn btn-dark btn-circle">
                                    <span class="btn-circle-text"><img src="images/flyicon.png" alt="Button 3" width="80" height="80"></span>
                                </a>
                                <p>Cek Pemesanan</p>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
