<!DOCTYPE html>

<?php

// session_start();

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])){
    header("Location: bank_login.php");
}

?>


<html lang="en">
    <head>
        <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login_box.css">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    


        <title>Customer Registration</title>

        <script>
        // function text_checker() {

            
        //     var fname = document.getElementById("c_fname").value;
        //     var lname = document.getElementById("c_lname").value;
        //     var nic = document.getElementById("c_nic").value;
        //     var email = document.getElementById("c_email").value;
        //     var address = document.getElementById("c_address").value;
        //     var phone = document.getElementById("c_phone").value;
        //     var password = document.getElementById("c_password").value;

        //     if ((fname != null && fname != "") && (lname != null && lname != "") && (password != null && password != "") && (address != null && address != "") && (phone != null && phone != "") && (nic != null && nic != "") && (email != null && email != "")) {
        //         document.getElementById("pass_submit").disabled=false;

        //     }

        //     else {
        //         document.getElementById("pass_submit").disabled=true;
        //     }
        // }
    </script>

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
                <a href="bank_home.php" class="menu-item-txt"
                    id="topnav-home"><i class="fas fa-home"></i></a>
                <a href="bank_manage_customers.php" class="menu-item-txt"
                    id="topnav-home">MANAGE CUSTOMERS</a>
                <a href="bank_view_customer_details.php" class="menu-item-txt"
                    id="topnav-about">VIEW CUSTOMERS</a>
                <a href="" class="menu-item-txt">BANKS AVAILABLE</a>
                <button class="menu-item-btn" onclick="myFunction3()" id="pc-signin-btn">Profile</button>
            </div>
        </div>
    </div>
    <div class="pc-signin" id="pc-signin">
        <h3>Logged in as : </h3>
        <?php
        echo("<p>Bank : ".$_SESSION["crnt_b_address"]."</p>");
        echo("<p>District : ".$_SESSION["crnt_b_district"]."</p>");
        echo("<p>ID : ".$_SESSION["crnt_b_id"]."</p>");
        ?>
        <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
    </div>
</div>


<div class="nav-responsive-part">
    <div class="topnavbar-res">
        <div onclick="myFunction()">
            <i class="fas fa-bars menu-icon" id="menu-icon"></i>
        </div>
        <div class="menu-logo">
            <a href="index.html"><img src="images/rbs_logo.png" alt=""></a>
        </div>
        <div onclick="myFunction2()">
            <i class="fas fa-user user-icon" id="user-icon"></i>
        </div>
    </div>
    <div class="dropdown-menu" id="dropdown-menu">
        <a href="bank_home.php">BANK HOME</a>
        <a href="bank_manage_customers.php">MANAGE CUSTOMERS</a>
        <a href="bank_view_customer_details.php">VIEW CUSTOMERS</a>
        <a href="">BANKS AVAILABLE</a>
    </div>
    <div class="dropdown-signin" id="dropdown-signin">
        <h3>Logged in as : </h3>

        <?php
        echo("<p>Bank : ".$_SESSION["crnt_b_address"]."</p>");
        echo("<p>District : ".$_SESSION["crnt_b_district"]."</p>");
        echo("<p>ID : ".$_SESSION["crnt_b_id"]."</p>");
        ?>
        
        <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
    </div>
</div>


<!-- User Registration Form  -->

<div  id="customer-reg-section">
    <div class="contact-form-container">
        <div class="contact-form">
            <h3>CUSTOMER REGISTRARTION</h3><br>
            <form action="customer_register.php" method="POST">
                <div class="contact-form-inputs">
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?>
                    </p>
                <?php } ?>
                <input type="text" name="c_fname" id="c_fname" placeholder = "First Name" class="contact-txt" required>
                <input type="text" name="c_lname" id="c_lname" placeholder = "Last Name" class="contact-txt" required>
                <div class="contact-txt" id="contact-selector">
                            <div id="col-25">
                                Gender
                            </div>
                            <div id="col-75">
                                <span>
                                    <input value = "Male" type="radio" name= "c_gender" id="gender_male" required>
                                    <label for="gender_male">Male</label>
                                </span>
                                <span>
                                    <input value = "Female" type="radio" name= "c_gender" id="gender_female" required>
                                    <label for="gender_female">Female</label>
                                </span>
                            </div>
                            
                       
                </div>
                <input type="text" name="c_nic" id="c_nic" placeholder = "NIC" class="contact-txt" required>
                <input type="text" name="c_email" id="c_email" placeholder = "Email" class="contact-txt" required>
                <input type="text" name="c_address" id="c_address" placeholder = "Address" class="contact-txt" required>
                <input type="text" name="c_phone" id="c_phone" placeholder = "Phone" class="contact-txt" required>
                <input type="submit" id="btn_submit" value="Register" class="contact-btn">
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





<!-- <div class = "user-reg-form-holder">
<div class="container">
        <form action="">
            <div class="row">
                <div class="col-25">
                    <label for="c_fname">First Name :</label>
                </div>
                <div class="col-75">
                    <input type="text" name="c_fname" id="c_fname" required>
               
                    <input type="text" name="c_lname" id="c_lname" required>
               
                <input type="radio" name="gender-selector" id="gender_male" required>
                    <label for="gender_male">Male</label>
                    <input type="radio" name="gender-selector" id="gender_female" required>
                    <label for="gender_female">Female</label>
                
                <input type="text" name="c_nic" id="c_nic" required>
                
                <input type="text" name="c_email" id="c_email" required>
                
                <input type="text" name="c_address" id="c_address" required>
                
                <input type="text" name="c_phone" id="c_phone" required>
                </div>
            </div>

            <div class="row">
                <input type="submit" id="btn_submit" value="Register">
            </div>
        </form>
    </div>
    </div> -->





        <!-- Common header starts here -->

    <!-- <header>
        <img class="logo" src="images/rbs_logo.png" alt="logo">
        <nav>
            <ul class="nav__links">
                <li><a href="bank_home.php">BANK HOME</a></li>
                <li><a class="active" href="bank_customer_registration.php">REGISTER CUSTOMERS</a></li>
                <li><a href="bank_view_customer_details.php">VIEW CUSTOMERS</a></li>
                <li><a href="#">AVAILABLE BANKS</a></li>
            </ul>
        </nav>
        <a href="bank_logout.php"><button>LOGOUT</button></a>
    </header> -->

    <!-- Common header ends here -->


        <!-- <div class="container" id="form_box">

        <form action="customer_register.php" method = "POST">

        <table> -->

            <!-- <tr>
                <th>NIC : </th>
                <td><input type="text" name="c_id" id="c_id" value="<?php echo $_SESSION["current_b_id"]; ?>"  onkeyup="text_checker()" readonly></td>
            </tr> -->

            <!-- <tr>
                <th>First Name : </th>
                <td><input type="text" name="c_fname" id="c_fname" required></td>
            </tr>

            <tr>
                <th>Last Name : </th>
                <td><input type="text" name="c_lname" id="c_lname" required></td>
            </tr>
            
            <tr>
                <th>Gender :</th>
                <td><input type="radio" name="gender-selector" id="gender_male" required>
                    <label for="gender_male">Male</label>
                    <input type="radio" name="gender-selector" id="gender_female" required>
                    <label for="gender_female">Female</label>
                </td>
            </tr>

            <tr>
                <th>NIC : </th>
                <td><input type="text" name="c_nic" id="c_nic"   required></td>
            </tr>

            <tr>
                <th>Email : </th>
                <td><input type="text" name="c_email" id="c_email" required></td>
            </tr> -->

            <!-- <tr>
                <th>Password : </th>
                <td><input type="password" name="c_password" id="c_password"  onkeyup="text_checker()"></td>
            </tr> -->

            <!-- <tr>
                <th>Address : </th>
                <td><input type="text" name="c_address" id="c_address" required></td>
            </tr>

            <tr>
                <th>Phone Number : </th>
                <td><input type="text" name="c_phone" id="c_phone" required></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" value="Register" id="pass_submit"></td>
            </tr>

    </table>
        
    </form>

    </div> -->

    </body>

</html>