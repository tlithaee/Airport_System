<!DOCTYPE html>
<html>
    <head>
        <title> Detail Penumpang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <style>
            .centered-card {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .button-pos {
                position: absolute;
                top: 100%;
                left: 80%;
                transform: translate(-50%, -50%);
            }
            body { min-height: 100vh; }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">Navbar</span>
                </div>
            </nav>
        </header>
        <div clas="container">
            <div class="col-md-6 mx-auto centered-card">
                <div class="row">
                <div class="card" style="width: 50rem;">
                    <div class="card-body ">
                        <h5 class="card-title">Detail Penumpang 1</h5>
                        <form action="proses-detail-penumpang.php" method="POST" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnama" name="pnama" placeholder="">
                                <label for="pnama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnik" name="pnik" placeholder="">
                                <label for="pnik">NIK</label>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="card" style="width: 50rem;">
                <div class="row">
                    <div class="card-body ">
                        <h5 class="card-title">Detail Penumpang 2</h5>
                        <form action="proses-detail-penumpang.php" method="POST" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnama" name="pnama" placeholder="">
                                <label for="pnama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnik" name="pnik" placeholder="">
                                <label for="pnik">NIK</label>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="card" style="width: 50rem;">
                <div class="row">
                    <div class="card-body ">
                        <h5 class="card-title">Detail Penumpang 3</h5>
                        <form action="proses-detail-penumpang.php" method="POST" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnama" name="pnama" placeholder="">
                                <label for="pnama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnik" name="pnik" placeholder="">
                                <label for="pnik">NIK</label>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="card" style="width: 50rem;">
                <div class="row">
                    <div class="card-body ">
                        <h5 class="card-title">Detail Penumpang 4</h5>
                        <form action="proses-detail-penumpang.php" method="POST" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnama" name="pnama" placeholder="">
                                <label for="pnama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="pnik" name="pnik" placeholder="">
                                <label for="pnik">NIK</label>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <input class="btn btn-primary button-pos" type="submit" value="Submit">
    </body>
</html>