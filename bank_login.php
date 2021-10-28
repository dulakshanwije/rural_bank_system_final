<!DOCTYPE html>

<?php
require_once("db_conn.php");
if (isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_home.php");
}
?>

<html>

<head>
    <title>Bank Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="login_box.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>

    <!-- Navigation Bar -->
    <div class="nav-pc-part">
        <div class="topnavbar">
            <div class="nav-col-25">
                <a href="index.html"><img src="images/rbs_logo.png" alt="logo"></a>
            </div>
            <div class="nav-col-75">
                <div class="nav-menu">
                    <a href="index.html" class="menu-item-txt" id="topnav-home">Home</a>
                    <a href="index.html#about-section" class="menu-item-txt" id="topnav-about">About</a>
                    <a href="index.html#services-section" class="menu-item-txt">Services</a>
                    <a href="index.html#contacts-section" class="menu-item-txt" id="topnav-contact">Contacts</a>
                    <button class="menu-item-btn" id="pc-signin-btn" onclick="myFunction3()">Login as</button>
                </div>
            </div>
        </div>
        <div class="pc-signin" id="pc-signin">
            <h3>Sign in as :</h3>
            <select name="mode" id="mode_pc">
                <option value="1">Customer</option>
                <option value="2">Banker</option>
                <!-- <option value="3">Administrator</option> -->
            </select>
            <input type="button" value="Sign In" onclick="login_selector_pc()">
        </div>
    </div>

    <div class="nav-responsive-part">
        <div class="topnavbar-res">
            <div onclick="myFunction()" id="menu-icon-btn">
                <i class="fas fa-bars menu-icon" id="menu-icon"></i>
            </div>
            <div class="menu-logo">
                <a href="index.html"><img src="images/rbs_logo.png" alt=""></a>
            </div>
            <div onclick="myFunction2()" id="user-icon-btn">
                <i class="fas fa-user user-icon" id="user-icon"></i>
            </div>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="index.html">Home</a>
            <a href="index.html#about-section">About</a>
            <a href="index.html#services-section">Services</a>
            <a href="index.html#contacts-section">Contacts</a>
        </div>
        <div class="dropdown-signin" id="dropdown-signin">
            <h3>Sign in as :</h3>
            <select name="mode" id="mode_res">
                <option value="1">Customer</option>
                <option value="2">Banker</option>
                <!-- <option value="3">Administrator</option> -->
            </select>
            <input type="button" value="Sign In" onclick="login_selector_res()">
        </div>
    </div>

    <!-- Bank Login  -->

    <div class="contact-section" id="bank-login-section">
        <div class="contact-form-container">
            <div class="contact-form">
                <h3>BANK LOGIN HERE</h3><br>
                <form action="bank_validation.php" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        <input type="text" name="bank_id" placeholder="Bank ID" class="contact-txt">
                        <input type="password" name="bank_password" placeholder="Password" class="contact-txt">
                        <input type="submit" value="Login" class="contact-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->

    <div class="footer">
        <h1>R_B_S</h1>
        <div class="footer-icons">
            <p>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-twitter"></i>
            </p>
        </div>
        <p>&copy; Copyright 2021. RBS Created By <a href="./admin/index.php"><span class="blue-colored-text">RBS
                    Creators</span></a>
        </p>
    </div>

    <!-- <div class="login-box">

            <div class="row">

                <div class="login-left">
                    <h2> Login Here </h2>
                    <form action="bank_validation.php" method="post">

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    
                        <div class="form-group">
                            <label>Bank ID</label>
                            <input type="text" name="bank_id" placeholder="Bank ID" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="bank_password" placeholder="Password" class="form-control">
                            required -->
    <!-- </div>
                        <div class="btn-center">
                            <button type="submit" class="btn btn-primary"> Login </button>
                        </div>

                        <p class="login-para"> <a href = "bank_registration_first.php"> Do not have an Account? Register here </p>
                    </form>
                </div>
            </div>
        </div> -->

</body>

</html>