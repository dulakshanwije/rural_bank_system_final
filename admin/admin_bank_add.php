<?php

require_once("../db_conn.php");

if (!isset($_SESSION["current_admin"])) {
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_bank_req.css">
    <link rel="stylesheet" href="admin_bank_add.css">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="tile_color.css">
</head>
<body>
    <div class="container">
        <h2>Bank Requset</h3>
        <p>Request ID : | Bank ID : </p>

        <div class="form-container card_blue">
            <div class="inside-form-container">
                    <p>Date and Time:</p>
                <form action="admin_bank_adder.php" method = "POST">
                    
                    <label for="bank_address">Bank Address: </label>
                    <input type="text" name="bank_address" id="bank_address" class="form-input" required>

                    <label for="bank_phone_number">Bank Phone Number: </label>
                    <input type="text" name="bank_phone_number" id="bank_phone_number" class="form-input" required>

                    <label for="bank_district">Bank District: </label>
                    <select name="bank_district" id="bank_district" class="form-input" required>
                        <option value="" selected disabled>Select District</option>
                        <option value="Colombo" >Colombo</option>
                        <option value="Gampaha" >Gampaha</option>
                        <option value="Kalutara" >Kalutara</option>
                        <option value="Kandy" >Kandy</option>
                        <option value="Matale" >Matale</option>
                        <option value="Nuwara-Eliya" >Nuwara-Eliya</option>
                        <option value="Galle" >Galle</option>
                        <option value="Matara" >Matara</option>
                        <option value="Hambanthota" >Hambanthota</option>
                        <option value="Jaffna" >Jaffna</option>
                        <option value="Mannar" >Mannar</option>
                        <option value="Vauniya" >Vauniya</option>
                        <option value="Mulathivu" >Mulathivu</option>
                        <option value="Kilinochchi" >Kilinochchi</option>
                        <option value="Batticaloa" >Batticaloa</option>
                        <option value="Ampara" >Ampara</option>
                        <option value="Trincomalee" >Trincomalee</option>
                        <option value="Kurunegala" >Kurunegala</option>
                        <option value="Puttalam" >Puttalam</option>
                        <option value="Anuradhapura" >Anuradhapura</option>
                        <option value="Polonnaruwa" >Polonnaruwa</option>
                        <option value="Badulla" >Badulla</option>
                        <option value="Monaragala" >Monaragala</option>
                        <option value="Rathnapura" >Rathnapura</option>
                        <option value="Kegalle" >Kegalle</option>
                    </select>

                    <label for="bank_password1">Enter a new Password: </label>
                    <input type="password" name="bank_password1" id="bank_password1" class = "form-input">
                    
                    
                    <label for="bank_password2">Re-enter the password: </label>
                    <input type="password" name="bank_password2" id="bank_password2" class="form-input">

                    <div class="btn-container">
                        <input type="submit" value="REGISTER" onsubmit="">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- JS Scripts -->
    <script>
        function validate(){
            var pass1 = document.getElementById("bank_password1").value;
            var pass2 = document.getElementById("bank_password2").value;
            if(pass1 == pass2){
                return true;
            }
            else {
                alert("Password is not matched");
                return fasle;
            }
        }
    </script>
</body>
</html>