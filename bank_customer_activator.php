<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])){
    header("Location: bank_login.php?error=Please Login First!");
}

$current_nic = $_GET["customer_nic"];
$current_bank = $_SESSION["crnt_b_id"];

$sql_activator_checker = "SELECT customer_account_status FROM customer_table WHERE customer_nic = '$current_nic' AND customer_bank_id = '$current_bank'";

$result_check = mysqli_query($conn,$sql_activator_checker);

$row_check = mysqli_fetch_assoc($result_check);
$sql_updater;
if($row_check["customer_account_status"] == 'Active'){
    $sql_updater = "UPDATE customer_table SET customer_account_status = 'Deactive' WHERE customer_nic = '$current_nic' AND customer_bank_id = '$current_bank'";
}
else if($row_check["customer_account_status"] == 'Deactive'){
    $sql_updater = "UPDATE customer_table SET customer_account_status = 'Active' WHERE customer_nic = '$current_nic' AND customer_bank_id = '$current_bank'";
}

if(mysqli_query($conn,$sql_updater)){
    header("location:bank_customer_profile.php?customer_nic=$current_nic");
}
else{
    echo "Something Went Wrong ".mysqli_error($conn);
}
?>