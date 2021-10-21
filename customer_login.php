<!DOCTYPE html>

<?php
    require_once("db_conn.php");
    if (isset($_SESSION["current_acc"])) {
        header("Location: customer_home.php");    
    }
?>

<html>

<head>
    <title>Customer Login Page</title>


    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>
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
                <a href="index.html" class="menu-item-txt"
                    id="topnav-home">Home</a>
                <a href="index.html#about-section" class="menu-item-txt"
                    id="topnav-about">About</a>
                <a href="index.html#services-section" class="menu-item-txt">Services</a>
                <a href="index.html#contacts-section" class="menu-item-txt"
                    id="topnav-contact">Contacts</a>
                <button class="menu-item-btn" id="pc-signin-btn" onclick="myFunction3()">Login as</button>
            </div>
        </div>
    </div>
    <div class="pc-signin" id="pc-signin">
        <h3>Sign in as :</h3>
        <select name="mode" id="mode_pc">
            <option value="1">Customer</option>
            <option value="2">Banker</option>
            <option value="3">Administrator</option>
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
            <option value="3">Administrator</option>
        </select>
        <input type="button" value="Sign In" onclick="login_selector_res()">
    </div>
</div>


<!-- Login Form -->
<div class="contact-section" id="customer-login-section">
    <div class="contact-form-container">
        <div class="contact-form">
            <h3>CUSTOMER LOGIN HERE</h3><br>
            <form action="customer_validation.php" method="POST">
                <div class="contact-form-inputs">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>
                    <input type="text" name="customer_acc_no" placeholder="NIC Number" class="contact-txt">
                    <input type="password" name="customer_password" placeholder="Password" class="contact-txt">
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
    <p>&copy; Copyright 2021. RBS Created By <a href="#about"><span class="blue-colored-text">RBS
                Creators</span></a>
    </p>
</div>








<!-- Static navbar -->
<!-- <nav class="navbar navbar-default navbar-fixed-top before-color">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-controls="navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand alo" href="index.html"><img src="images/rbs_logo.png" width="150" alt=""></a>
            </div>

            <div id="navbar">
                <ul class="nav navbar-nav navbar-right scroll-to">
                    <li class="navbar-collapse collapse"><a href="index.html">Home</a></li>

                    <li class="droppdown" style="float: left;">
                    <li class="active"><a class="dropdown-toggle" data-toggle="dropdown" role="button">Login <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" style="left: 0;" role="menu">
                            <li><a href="bank_login.php">
                                    <h4>Bank</h4>
                                </a></li>
                            <li class="active"><a href="customer_login.php">
                                    <h4>Customer</h4>
                                </a></li>
                            <li><a href="admin_login.php">
                                    <h4>Administrator</h4>
                                </a></li>
                        </ul>
                    </li>
                    </li>

                    <li class="navbar-collapse collapse"><a href="#about">About</a></li>
                    <li class="navbar-collapse collapse"><a href="#contact">Contacts</a></li>
                </ul>
            </div>

        </div>

    </nav> -->


    <!-- <div class="container">
        <div class="login-box">

            <div class="row">

                <div class="login-left">
                    <h2> Login Here </h2>
                    <form action="customer_validation.php" method="post">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" name="customer_acc_no" placeholder="Account Number" class="form-control"> 
                        
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="customer_password" placeholder="Password" class="form-control">
                            
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn btn-primary"> Login </button>
                        </div>

                        <p class="login-para"> <a href = "bank_registration_first.php"> Do not have an Account? Register here </p>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

</body>

</html>