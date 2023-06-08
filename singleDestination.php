<!DOCTYPE html>
<html>
<head>
    <title>SingleDestionation</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h2 class="card-title">Single Destination</h2>
            </div>
            <div class="card-body">
                <div class="row mt-4">
                    <div class="col-lg-4">
                        <label for="from" style="font-size: 20px;">From:</label>
                    </div>
                    <div class="col-lg-3">
                        <select id="from" name="from" onchange="submitForm()" class="form-select">
                            <?php
                                // Koneksi ke database
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "fp_mbd";
                                
                                // Membuat koneksi
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                
                                // Memeriksa koneksi
                                if ($conn->connect_error) {
                                    die("Koneksi gagal: " . $conn->connect_error);
                                }
                                
                                // Mengambil data dari kolom D_Lokasi_Asal dalam tabel destinasi
                                $sql_asal = "SELECT DISTINCT D_Lokasi_Asal FROM destinasi";
                                $result_asal = $conn->query($sql_asal);
                                
                                // Membuat opsi dropdown dari hasil query D_Lokasi_Asal
                                if ($result_asal->num_rows > 0) {
                                    while ($row_asal = $result_asal->fetch_assoc()) {
                                        $selected = "";
                                        if (isset($_GET['from']) && $_GET['from'] == $row_asal['D_Lokasi_Asal']) {
                                            $selected = "selected";
                                        }
                                        echo "<option value='" . $row_asal['D_Lokasi_Asal'] . "' $selected>" . $row_asal['D_Lokasi_Asal'] . "</option>";
                                    }
                                }
                            ?>
                        </select>
                        <script>
                            function submitForm() {
                                var selectedFrom = document.getElementById('from').value;
                                window.location.href = "singleDestination.php?from=" + encodeURIComponent(selectedFrom);
                            }
                        </script>
                    </div>
                    <div class="col-lg-1">
                        <label for="to" style="font-size: 20px;">To:</label>
                    </div>
                    <div class="col-lg-3">
                        <select id="to" name="to" onchange="submitFormTo()" class="form-select">
                            <?php
                                // Mendapatkan nilai dari dropdown 'from'
                                $selected_from = $_GET['from']; // Ganti '$_POST' dengan '$_GET' jika menggunakan metode pengiriman form GET

                                // Mengambil data dari tabel destinasi berdasarkan lokasi asal yang dipilih
                                $sql_tujuan = "SELECT DISTINCT D_Lokasi_Tujuan FROM destinasi WHERE D_Lokasi_Asal = '$selected_from'";
                                $result_tujuan = $conn->query($sql_tujuan);

                                if ($result_tujuan === false) {
                                    echo "Query Error: " . $conn->error; // Debugging: Menampilkan pesan kesalahan query
                                }

                                // Membuat opsi dropdown dari hasil query D_Lokasi_Tujuan
                                if ($result_tujuan->num_rows > 0) {
                                    while ($row_tujuan = $result_tujuan->fetch_assoc()) {
                                        $selected = "";
                                        if (isset($_GET['to']) && $_GET['to'] == $row_tujuan['D_Lokasi_Tujuan']) {
                                            $selected = "selected";
                                        }
                                        echo "<option value='" . $row_tujuan['D_Lokasi_Tujuan'] . "' $selected>" . $row_tujuan['D_Lokasi_Tujuan'] . "</option>";
                                    }
                                } else {
                                    echo "No Results Found"; // Debugging: Menampilkan pesan jika tidak ada hasil dari query
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <button onclick="generateBandara()" class="btn btn-primary">Generate</button>
                    </div>
                </div>

                <script>
                    function submitFormTo() {
                        var selectedTo = document.getElementById('to').value;
                        var selectedFrom = "<?php echo $selected_from; ?>";
                        window.location.href = "singleDestination.php?from=" + encodeURIComponent(selectedFrom) + "&to=" + encodeURIComponent(selectedTo);
                    }
                </script>

                <div id="hasil-bandara-asal"></div>
                <div id="hasil-bandara-tujuan"></div>
                    
                <script>
                    function generateBandara() {
                        var selectedFrom = document.getElementById('from').value;
                        var selectedTo = document.getElementById('to').value;

                        // Mendapatkan elemen untuk menampilkan hasil bandara asal
                        var hasilBandaraAsalElement = document.getElementById('hasil-bandara-asal');

                        // Mengirim permintaan AJAX ke server untuk mendapatkan data bandara asal
                        var xhrFrom = new XMLHttpRequest();
                        xhrFrom.onreadystatechange = function() {
                            if (xhrFrom.readyState === 4 && xhrFrom.status === 200) {
                                var result_bandara_asal = JSON.parse(xhrFrom.responseText);

                                // Menampilkan hasil bandara asal di dalam elemen
                                hasilBandaraAsalElement.innerHTML = "Bandara Asal: <span id='hasil-bandara-asal-value'>" + result_bandara_asal[0]['B_Nama_Bandara'] + "</span>";
                            }
                        };
                        xhrFrom.open('GET', 'get_bandara.php?kode_kota=' + selectedFrom, true);
                        xhrFrom.send();

                        // Mendapatkan elemen untuk menampilkan hasil bandara tujuan
                        var hasilBandaraTujuanElement = document.getElementById('hasil-bandara-tujuan');

                        // Mengirim permintaan AJAX ke server untuk mendapatkan data bandara tujuan
                        var xhrTo = new XMLHttpRequest();
                        xhrTo.onreadystatechange = function() {
                            if (xhrTo.readyState === 4 && xhrTo.status === 200) {
                                var result_bandara_tujuan = JSON.parse(xhrTo.responseText);

                                // Menampilkan hasil bandara tujuan di dalam elemen
                                hasilBandaraTujuanElement.innerText = "Bandara Tujuan: " + result_bandara_tujuan[0]['B_Nama_Bandara'];
                            }
                        };
                        xhrTo.open('GET', 'get_bandara.php?kode_kota=' + selectedTo, true);
                        xhrTo.send();
                    }

                </script>

                <div class="row mt-2">
                    <div class="col-lg-4">
                        <label for="departureDate" style="font-size: 20px;">Departure Date:</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="date" id="departureDate" name="departureDate" required class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <label for="priceEconomy" style="font-size: 20px;">
                            <span class="label-prefix">Economy</span> Price:
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" id="priceEconomy" name="priceEconomy" required class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <label for="priceBusiness" style="font-size: 20px;">
                            <span class="label-prefix">Business</span> Price:
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" id="priceBusiness" name="priceBusiness" required class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <label for="priceFirstClass" style="font-size: 20px;">
                            <span class="label-prefix">FirstClass</span> Price:
                        </label>
                    </div>
                    <div class="col-lg-2">
                        <input type="text" id="priceFirstClass" name="priceFirstClass" required class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <label for="departureTime" style="font-size: 20px;">Departure Time:</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="datetime-local" id="departureTime" name="departureTime" required class="form-control">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-4">
                        <label for="arrivalTime" style="font-size: 20px;">Arrival Time:</label>
                    </div>
                    <div class="col-lg-2">
                        <input type="datetime-local" id="arrivalTime" name="arrivalTime" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button id="add" class="btn btn-primary">Tambah Penerbangan</button>
            </div>
        </div>
    </div>
</body>
</html>
