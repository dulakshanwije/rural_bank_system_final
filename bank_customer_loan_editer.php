<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

// $current_id = $_GET["customer_nic"];
$loan_id = $_GET["loan_id"];

$loan_amount = $_POST["loan_amount"];
$loan_interest_rate = $_POST["loan_interest_rate"];
$loan_interest_amount = $_POST["loan_interest_amount"];
$loan_full_amount = $_POST["loan_full_amount"];
$loan_payment_installments = $_POST["loan_payment_installments"];
$loan_monthly_payment_amount = $_POST["loan_monthly_payment_amount"];
$loan_payment_remained = $_POST["loan_payment_remained"];
$loan_full_payment_due_date = $_POST["loan_full_payment_due_date"];
$loan_days_per_installment = $_POST["loan_days_per_installment"];

$sql_updater = "UPDATE loan_table SET loan_amount = '$loan_amount', loan_interest_rate = '$loan_interest_rate', loan_interest_amount = '$loan_interest_amount', loan_full_amount = '$loan_full_amount', loan_payment_installments = '$loan_payment_installments',loan_monthly_payment_amount = '$loan_monthly_payment_amount', loan_payment_remained = '$loan_payment_remained', loan_full_payment_due_date = '$loan_full_payment_due_date', loan_days_per_installment = '$loan_days_per_installment'  WHERE  loan_id = '$loan_id'";

if (mysqli_query($conn, $sql_updater)) {
    header("Location: bank_customer_profile.php?customer_nic=".$_SESSION["current_id"]);

  } else {
    echo "Error updating: " . mysqli_error($conn);
  }


?>