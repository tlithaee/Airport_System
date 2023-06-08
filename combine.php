<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .btn-circle {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-header,
        .card-body {
            flex-grow: 1;
            font-size: 25px;
        }

        .navbar {
            margin-bottom: 0; /* Remove the default margin-bottom */
        }

        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Increase size of the card */
        /* .card {
            width: 560px;
            height: 360px;
        } */
    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="flyicon.png" alt="Bootstrap" width="45" height="45"> Logo
            </a>
        </div>
    </nav>
    <div class="container container-center">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h1>[+] Tambah penerbangan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a href="singleDestination.php" class="btn btn-warning btn-circle">
                                    <span class="btn-circle-text"><img src="flyicon.png" alt="Button 1" width="80" height="80"></span>
                                </a>
                                <p>Single Destination</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <a href="multipleDestination.php" class="btn btn-warning btn-circle">
                                    <span class="btn-circle-text"><img src="flyicon.png" alt="Button 2" width="80" height="80"></span>
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
                        <h1>Kelola pemesanan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <a href="Kelola_Pemesanan.php" class="btn btn-dark btn-circle">
                                    <span class="btn-circle-text"><img src="flyicon.png" alt="Button 3" width="80" height="80"></span>
                                </a>
                                <p>Kelola Pemesanan</p>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
