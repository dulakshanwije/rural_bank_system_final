<?php
    require_once("db_conn.php");

    if (!isset($_SESSION["crnt_b_id"])){
        header("Location: bank_login.php?error=Please Login First!");
    }
    
    if(!isset($_GET["customer_nic"])){
        echo "Invalid Request !!";
    }
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $customer_id = $_GET["customer_nic"];
    $bank_id = $_SESSION["crnt_b_id"];

    $savings_amount = validate($_POST["savings_amount"]);
    $savings_interest = validate($_POST["savings_interest"]);
    $savings_interest_amount = validate($_POST["savings_interest_amount"]);
    $savings_full_amount = validate($_POST["savings_full_amount"]);
    $savings_issued_date = validate($_POST["savings_issued_date"]);

    $sql_update = "INSERT INTO savings_table VALUES('','savings','$savings_amount','$savings_interest','$savings_interest_amount','$savings_full_amount', '$savings_issued_date','$customer_id','$bank_id')";

    if(mysqli_query($conn,$sql_update)){
        header('location:bank_customer_profile.php?customer_nic='.$customer_id.'');
        // echo "Done";
    }
    else{
        echo "Failed".mysqli_error($conn);
    }

?>