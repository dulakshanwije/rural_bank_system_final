<?php

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])){
    header("Location: bank_login.php");
}

$current_nic = $_GET["customer_nic"];

    $sql_deleter="DELETE FROM customer_table WHERE customer_nic = '$current_nic'";
    
        if (mysqli_query($conn, $sql_deleter)) {
            header("Location: bank_view_customer_details.php");

          } else {
            echo "Error updating: " . mysqli_error($conn);
          }

?>