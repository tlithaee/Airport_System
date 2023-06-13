<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> SwiftAir | Register Acc</title>
    <link rel="stylesheet" href="assets/css/regist.css">
    <link rel="icon" type="image/x-icon" href="assets/images/logo.ico">
    <script src="assets/js/regist.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<!-- <header>
    <span class="image-clickable">
      <a href="index.php">
        <img src="./assets/images/logo_tulisan.png" alt="main-logo" class="logo" />
      </a>
    </span>
    <a href="#">
      <span class="image-clickable">
        <a href="manage_acc.php">
          <img src="./assets/images/Male User.png" alt="main-logo" class="maleuser" />
        </a>
      </span>
    </a>
  </header> -->

  <a href="index.php" class="back-button">Back</a>
  
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
    <form method="POST" action="proses-tambah-acc.php">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Name</span>
            <input type="text" placeholder="Enter your username" id="nama" name="nama" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your phone number" id="no_telp" name="no_telp" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" id="email" name="email" required>
          </div>
          <div class="input-box">
        <span class="details">Password</span>
        <input type="password" placeholder="Enter your password" id="password" name="password" required>
        </div>
        <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" placeholder="Confirm your password" id="confirm-password" name="confirm_password" required>
            <span id="password-match-error" class="error" style="display: none;">Passwords do not match</span>
            </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>