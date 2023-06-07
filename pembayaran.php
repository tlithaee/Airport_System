<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<style>
        body {
            background-color: #f2f2f2;
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
            width: 100px;
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
			<div class="row">
				<h5 class="p-2 d-flex justify-content-center">Total Harga = </h5>
                <h6 class="p-2 ">Credit/debit card number </h6>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" data-mask="0000 0000 0000 0000" placeholder="Card Number" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
            </div>
        <div class="row">
            <div class="col">
                <h6 class="p-2">Valid Until </h6>
                    <div class="input-group mb-2">
                            <input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
            </div>
            <div class="col">
                <h6 class="p-2">CVV</h6>
                    <div class="input-group mb-3">
                        <input type="type" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
			</div>
        </div>
            <div class="row">
                <h6 class="p-2">Name on Card</h6>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
            </div>
        <div class="d-flex align-items-end flex-column mb-3 mt-auto p-2" style="height: 200px;">
            <nav>
                <a href="#" ><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#passModal">Bayar</button></a>
            </nav>
        </div>
        <div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h1 class="modal-title fs-5" id="ModalLabel">Pembayaran Berhasil</h1>
                    </div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                    <div class="modal-body d-flex justify-content-center">
                        <h6 class="p-2">Kode Booking</h6>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>