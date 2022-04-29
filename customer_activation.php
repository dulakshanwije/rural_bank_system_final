<!DOCTYPE html>

<?php
require_once("db_conn.php");
if (isset($_SESSION["current_acc"])) {
    header("Location: customer_home.php");
    exit();
}
if ($_SESSION["current_status"] == 'Active') {
    header("Location: customer_home.php");
    exit(); 
}

$email = $_SESSION["current_customer_email"];

$email_len = strlen($email);

$email_masked = substr($email,0,1);
for($i = 1;$i<$email_len - 10;$i++){
    $email_masked = $email_masked."*";
}
$email_masked .= substr($email,$email_len - 10,$email_len - 1);

$_SESSION["otp"] = rand(10000 ,99999);

$subject = "OTP Verification - RBS";

$content="Your OTP :".$_SESSION["otp"];
$recipient = $email;
$mailheader = "From: RURAL BANK SYSTEM - Digitalized, Rural Banking \r\n";
 
// mail($recipient, $subject, $content, $mailheader) or die("Error!");

?>


<html>

<head>
    <title>Customer Login</title>


    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>

    <!-- Countdown timer JS -->
    <script src="countdown_script.js"></script>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="login_box.css">

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


    <!-- Login Form -->
    <div class="contact-section" id="customer-login-section">
        <div class="contact-form-container">
            <div class="contact-form">
                <h3>Account Activation</h3><br>
                <form action="otp_validation.php" method="POST">
                    <div class="contact-form-inputs">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        <?php
                        if(mail($recipient, $subject, $content, $mailheader)){
                            echo '
                            <p class = "error" style = "background-color :darkgreen;">OTP Code has been send to your email address.'.$email_masked.'</p>
                            <input type="text" name="otp_code" placeholder="OTP Code" class="contact-txt">
                            <p class = "error" style = "background-color :transparent; margin :0;">Time Left : <span id = "display_time"></span> seconds.</p>
                            <input type="submit" value="Submit" class="contact-btn">
                            ';
                        }
                        else{
                            echo '
                            <p class = "error">Something went wrong!</p>
                            <a href = "customer_login.php">
                            <input type="button" value="Try Again" class="contact-btn">
                            </a>
                            ';
                        }
                        
                        ?>
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
</body>

</html>