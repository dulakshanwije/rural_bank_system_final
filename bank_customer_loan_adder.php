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

    $loan_amount = validate($_POST["loan_amount"]);
    $loan_interest = validate($_POST["loan_interest"]);
    $loan_interest_amount = validate($_POST["loan_interest_amount"]);
    $loan_full_amount = validate($_POST["loan_full_amount"]);
    $payment_installments = validate($_POST["payment_installment"]);
    $monthly_payment_amount = validate($_POST["monthly_payment_amount"]);
    $loan_issued_date = validate($_POST["loan_issued_date"]);
    $loan_due_date = validate($_POST["loan_due_date"]);
    $single_installment_days = validate($_POST["single_installment_days"]);

    $sql_update = "INSERT INTO loan_table VALUES('','$loan_amount','$loan_interest','$loan_interest_amount','$loan_full_amount','$payment_installments','$monthly_payment_amount','$loan_full_amount','$loan_issued_date','$loan_due_date','$single_installment_days','$customer_id','$bank_id')";

    if(mysqli_query($conn,$sql_update)){
        header('location:bank_customer_profile.php?customer_nic='.$customer_id.'');
        // echo "Done";
    }
    else{
        echo "Failed".mysqli_error($conn);
    }

?>