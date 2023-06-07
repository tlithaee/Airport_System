<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<style>
        body {
            background-color: #ADD8E6;
        }    
        .card {
            border: 1px solid #ccc;
            margin-top: 0px;
        }
        .card-title {
            font-size: 4rem;
            color: #ff0000;
            text-shadow: 2px 2px #ccc;
            margin-bottom: 1rem;
        }
        .card-header {
            background-color: #ADD8E6;
            padding: 1rem;
        }
        .btn {
            font-size: 4rem;
            width: 250px;
            transition: transform 0.2s ease-in-out;
        }
        .btn:hover {
            transform: scale(1.1);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
	<div class="card mx-auto">
	<div class="card-header">
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Logo</span>
            </div>
        </nav>
	</div>

	<div class="card-body">
                <div class="d-flex justify-content-center">
                    <div>
                        <img src="images/Male User.png" alt="profile">
                        
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="username" value="Lita_ilysmv">
                                </div>
                            <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="name" value="yours only">
                                </div>
                            <label class="col-sm-2 col-form-label">No. Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="no_telp" value="0818xxxxxxxx">
                                </div>
                            <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="email" value="lvmepls@gmail.com">
                                </div>
                        </div>
                    </div>
                </div>

        <div class="mx-auto d-flex align-items-end justify-content-center mb-3 mt-auto p-2" style="height: 200px;">
                <a href="pemesanantiket.php">
                <button class="btn btn-primary" type="button">Kelola Pemesanan Tiket</button></a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>

</body>
</html>