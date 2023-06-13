<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SwiftAir</title>
  <link rel="icon" type="image/x-icon" href="assets/images/logo.ico">

  <!-- ==== STYLE.CSS ==== -->
  <link rel="stylesheet" href="./assets/css/dashboard.css" />
</head>

<body>
  <header>
    <span class="image-clickable">
      <a href="index.php">
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

  <div class="formbold-main-wrapper">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="formbold-form-wrapper">
      <form action="daftar-penerbangan.php" method="POST">
        <div class="formbold-steps">
          <ul>
            <li class="formbold-step-menu1 active">
              Booking
            </li>
          </ul>
        </div>

        <div class="formbold-form-step-1 active">
          <div class="formbold-input-flex">
            <div>
              <label for="dari" class="formbold-form-label"> Dari </label>
              <select class="formbold-form-input" name="dari" id="dari" onchange="submitForm()">
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
                $sql_asal = "SELECT DISTINCT B_Nama_Bandara FROM bandara";
                $result_asal = $conn->query($sql_asal);

                // Membuat opsi dropdown dari hasil query D_Lokasi_Asal
                if ($result_asal->num_rows > 0) {
                  while ($row_asal = $result_asal->fetch_assoc()) {
                    $selected = "";
                    if (isset($_GET['from']) && $_GET['from'] == $row_asal['B_Nama_Bandara']) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $row_asal['B_Nama_Bandara'] . "' $selected>" . $row_asal['B_Nama_Bandara'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>

            <div>
              <label for="ke" class="formbold-form-label"> Ke </label>
              <select class="formbold-form-input" name="ke" id="ke" onchange="submitForm()">
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

                $sql_tujuan = "SELECT DISTINCT B_Nama_Bandara FROM bandara";
                $result_tujuan = $conn->query($sql_tujuan);

                if ($result_tujuan->num_rows > 0) {
                  while ($row_tujuan = $result_tujuan->fetch_assoc()) {
                    $selected = "";
                    if (isset($_GET['from']) && $_GET['from'] == $row_tujuan['B_Nama_Bandara']) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $row_tujuan['B_Nama_Bandara'] . "' $selected>" . $row_tujuan['B_Nama_Bandara'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
          </div>

          <div class="formbold-input-flex">
            <div>
              <label for="kelas" class="formbold-form-label"> Kelas </label>
              <select class="formbold-form-input" name="kelas" id="kelas">
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

                // Mengambil data dari kolom K_Nama dalam tabel kelas
                $sql_kelas = "SELECT DISTINCT K_Nama FROM kelas";
                $result_kelas = $conn->query($sql_kelas);

                // Membuat opsi dropdown dari hasil query K_Nama
                if ($result_kelas->num_rows > 0) {
                  while ($row_kelas = $result_kelas->fetch_assoc()) {
                    $selected = "";
                    if (isset($_POST['kelas']) && $_POST['kelas'] == $row_kelas['K_Nama']) {
                      $selected = "selected";
                    }
                    echo "<option value='" . $row_kelas['K_Nama'] . "' $selected>" . $row_kelas['K_Nama'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div>
              <label for="penumpang" class="formbold-form-label"> Jumlah Penumpang </label>
              <input type="number" name="penumpang" placeholder="Jumlah Penumpang" id="penumpang" class="formbold-form-input" />
            </div>
          </div>


          <div>
            <label for="date" class="formbold-form-label"> Tanggal </label>
            <input type="date" name="date" id="date" class="formbold-form-input"/>
          </div>

        </div>

        <div class="formbold-form-btn-wrapper">
          <button class="formbold-back-btn">
            Back
          </button>
          
          <button class="formbold-btn" type="submit" style="display: none;">
            Search Flight
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1675_1807)">
                <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white" />
              </g>
              <defs>
                <clipPath id="clip0_1675_1807">
                  <rect width="16" height="16" fill="white" />
                </clipPath>
              </defs>
            </svg>
          </button>
          <button class="formbold-btn" type="submit">
            Search Flight
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1675_1807)">
                <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white" />
              </g>
              <defs>
                <clipPath id="clip0_1675_1807">
                  <rect width="16" height="16" fill="white" />
                </clipPath>
              </defs>
            </svg>
        </button>
        </div>
      </form>
    </div>
    <div>
      <img src="./assets/images/earth.gif" alt="main-logo" class="earth" />
    </div>
  </div>
  <script src="./assets/js/dashboard.js" defer></script>
</body>

</html>