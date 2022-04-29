<?php

    require_once("db_conn.php");

    if (!isset($_SESSION["crnt_b_id"])) {
        header("Location: bank_login.php?error=Please Login First!");
    }

    $subject = $_POST["email_subject"];
    // $content= $_POST["email_message"];

    $email_type;

    if($_POST["email_type_selector"] == "other"){
        $email_type = $_POST["email_type"];
    }
    else{
        $email_type = $_POST["email_type_selector"];
    }

    $content =

    "Dear Loyal Customer,\nThis message is regarding your ".$email_type.".\n".$_POST["email_message"]."\nThank You,\nRBS ".$_SESSION["crnt_b_address"]." Branch\n".$_SESSION["crnt_b_telephone"]."";

    $recipient = $_SESSION["customer_email"];
    $mailheader = "From: RURAL BANK SYSTEM - Digitalized, Rural Banking \r\n";

    if(mail($recipient, $subject, $content, $mailheader)){
        header("Location: bank_customer_profile.php?customer_nic=".$_SESSION["customer_nic"]."&&email=success");
    }
    else{
        echo "Something went wrong!!!";
    }
?>