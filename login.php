<?php
include("config.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the entered username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database to check if the username and password match
  $query = "SELECT * FROM pemesan WHERE Pm_Username='$username' AND Pm_Password='$password'";
  $result = mysqli_query($db, $query);
  $count = mysqli_num_rows($result);

  // Check if the entered username and password match a record in the database
  if ($count == 1) {
    // Start the session
    session_start();
    
    // Fetch the user ID from the result
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['Pm_ID'];
    
    // Store the username and user ID in session variables
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    
    // Redirect to another page if login is successful
    header("Location: dashboard.php");
    exit(); // Terminate the script to prevent further execution
  } else {
    // Store the error message in a session variable
    $_SESSION['login_error'] = "Incorrect username or password!";
    
    // Redirect back to index.php
    header("Location: index.php");
    exit();
  }
}
?>
