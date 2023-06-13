<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/images/logo.ico">
    <title>SwiftAir</title>

    <!-- ==== STYLE.CSS ==== -->
    <link rel="stylesheet" href="assets/css/index.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>

    <!-- ====  REMIXICON CDN ==== -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- ==== ANIMATE ON SCROLL CSS CDN  ==== -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <!-- ==== HEADER ==== -->
    <header class="container header">
        <!-- ==== NAVBAR ==== -->
        <nav class="nav">
            <div class="logo">
                <h2>SwiftAir</h2>
            </div>

            <div class="nav_menu" id="nav_menu">
                <button class="close_btn" id="close_btn">
                    <i class="ri-close-fill"></i>
                </button>

                <button class="toggle_btn" id="toggle_btn">
                    <i class="ri-menu-line"></i>
                </button>
        </nav>
    </header>

    <section class="wrapper">
        <div class="container">
            <div class="grid-cols-2">
                <div class="grid-item-1">
                    <h1 class="main-heading">
                        Welcome to <span>SwiftAir.</span>
                        <br />
                        Experience Endless Possibilities.
                    </h1>
                    <p class="info-text">
                        Your Ultimate Destination for Seamless and Convenient Flight Bookings.
                    </p>

                    <div class="btn_wrapper">
                        <a href="regist.php" class="btn view_more_btn">
                            Register <i class="ri-arrow-right-line"></i>
                        </a>

                        <button class="btn documentation_btn">Login</button>

                        <div id="loginForm" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <h2>Login</h2>
                                <br>
                             <!-- Error Message -->
                                <?php
                                session_start();
                                if (isset($_SESSION['login_error'])) {
                                echo '<p class="error-message">' . $_SESSION['login_error'] . '</p>';
                                unset($_SESSION['login_error']); // Clear the session variable
                                }
                                ?>
                                <form method="POST" action="login.php">
                                <input type="text" name="username" placeholder="Username" required>
                                <input type="password" name="password" placeholder="Password" required>
                                <button type="submit" class="login-button">submit</button>
                                </form>
                            </div>
                            </div>

   
                    </div>
                </div>
                <div class="grid-item-2">
                    <div class="team_img_wrapper">
                        <style>
                            .zoom-effect {
                                overflow: hidden;
                                position: relative;
                            }
                            .zoom-effect img {
                                transition: transform 0.3s;
                            }
                            .zoom-effect:hover img {
                                transform: scale(1.1);
                            }
                        </style>
                        <div class="zoom-effect">
                            <img src="assets/images/vacation.png" alt="team-img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ==== ANIMATE ON SCROLL JS CDN -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- ==== GSAP CDN ==== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <!-- ==== SCRIPT.JS ==== -->
    <script src="assets/js/index.js" defer></script>
</body>

</html>