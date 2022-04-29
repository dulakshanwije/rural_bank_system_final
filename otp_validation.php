<?php
require_once("db_conn.php");

$otp_code = $_POST["otp_code"];
$temp_acc = $_SESSION["temp_acc"];

if($otp_code == $_SESSION["otp"]){
    $sql = "UPDATE customer_table SET customer_account_status = 'Active' WHERE customer_nic = '$temp_acc'";
    echo $sql;

    if(mysqli_query($conn, $sql)){
        header("Location: customer_login.php?error=Account ACtivated.Please Login Again!");
    }
    else{
        header("Location: customer_login.php?error=Failed to update.Please Login Again!");
    }
}
else{
    header("Location: customer_login.php?error=OTP verification failed. Invalid OTP. Please Try Again.");
}

?>