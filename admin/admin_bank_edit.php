<?php

require_once("../db_conn.php");

if (!isset($_SESSION["current_admin"])) {
    header("Location: index.php");
}

$crnt_bank_id = $_GET["bank_id"];

$sql = "SELECT * FROM bank_table WHERE bank_id = '$crnt_bank_id'";

$res = mysqli_fetch_assoc(mysqli_query($conn,$sql));

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

        <div class="form-container card_blue">
            <div class="inside-form-container">
                    <p>Bank ID: <?php echo $res["bank_id"];?></p>
                <form action="admin_bank_adder.php" method = "POST" onchange = "formExpand()">
                    
                    <label for="bank_address">Bank Address: (<?php echo $res["bank_address"]?>)</label>
                    <input type="text" name="bank_address" id="bank_address" class="form-input" required>

                    <label for="bank_phone_number">Bank Phone Number: (<?php echo $res["bank_phone_number"]?>) </label>
                    <input type="text" name="bank_phone_number" id="bank_phone_number" class="form-input" required>

                    <label for="bank_district">Bank District: (<?php echo $res["bank_district"]?>)</label>
                    <select name="bank_district" id="bank_district" class="form-input" required>
                        <option value="" selected disabled>Select a district to change</option>
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

                    <div style = "display:flex; flex-direction:row; align-items:center;">
                        <input type="checkbox" id = "password_check">
                        <h3 style =""><label for="password_check">Create a New Password</label></h3>
                    </div>

                    <div id = "password_box" style = "display:none;">
                        <label for="bank_password1">Enter a new Password: </label>
                        <input type="password" name="bank_password1" id="bank_password1" class = "form-input">
                        
                        
                        <label for="bank_password2">Re-enter the password: </label>
                        <input type="password" name="bank_password2" id="bank_password2" class="form-input">
                    </div>

                    <div class="btn-container">
                        <input type="submit" value="SAVE CHANGES" onsubmit="">
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script>
        function formExpand(){
            var box = document.getElementById("password_box");
            var check_box = document.getElementById("password_check");
            if(box.style.display == "none" && check_box.checked == true){
                box.style.display = "block";
            }
            else{
                box.style.display = "none";
            }
        }
    </script>
</body>

</html>