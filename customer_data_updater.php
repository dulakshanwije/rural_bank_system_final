<?php
require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])){
    header("Location: bank_login.php");
}

if (isset($_POST['ch_fname']) && isset($_POST['ch_lname']) && isset($_POST['ch_gender']) && isset($_POST['ch_email']) && isset($_POST['ch_address']) && isset($_POST['ch_phone'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $ch_current_nic = $_GET['crnt_customer_nic'];
    $ch_fname = validate($_POST['ch_fname']);
    $ch_lname = validate($_POST['ch_lname']);
    $ch_gender = validate($_POST['ch_gender']);
    $ch_email = validate($_POST['ch_email']);
    $ch_address = validate($_POST['ch_address']);
    $ch_phone = validate($_POST['ch_phone']);


    $sql_duplicate_checker = "SELECT * FROM customer_table WHERE customer_email = '$ch_email'";

    $resultset_dup = mysqli_query($conn,$sql_duplicate_checker);
    $existing_res = "";
    $sql_updater = "";

    if(mysqli_num_rows($resultset_dup) <= 1){
      $existing_res = mysqli_fetch_assoc($resultset_dup);
      if((mysqli_num_rows($resultset_dup) == 1) && ($existing_res["customer_nic"] == $ch_current_nic)){
        $sql_updater="UPDATE customer_table SET customer_first_name = '$ch_fname', customer_last_name = '$ch_lname', customer_gender = '$ch_gender', customer_email = '$ch_email', customer_address = '$ch_address', customer_phone_number = '$ch_phone' WHERE customer_nic = '$ch_current_nic'";
      }
      else if (mysqli_num_rows($resultset_dup) == 0) {
        $sql_updater="UPDATE customer_table SET customer_first_name = '$ch_fname', customer_last_name = '$ch_lname', customer_gender = '$ch_gender', customer_email = '$ch_email', customer_address = '$ch_address', customer_phone_number = '$ch_phone' WHERE customer_nic = '$ch_current_nic'";
      }
      else {
        header("location:customer_data_update.php?customer_nic=".$ch_current_nic."&error=Email alredy in use!");
      }
    }
    else{
      $sql_updater="UPDATE customer_table SET customer_first_name = '$ch_fname', customer_last_name = '$ch_lname', customer_gender = '$ch_gender', customer_email = '$ch_email', customer_address = '$ch_address', customer_phone_number = '$ch_phone' WHERE customer_nic = '$ch_current_nic'";
    }
    if(isset($sql_updater)){
      if (mysqli_query($conn, $sql_updater)) {
        header("Location: bank_view_customer_details.php?reg=1");

      } else {
        echo "Error updating: " . mysqli_error($conn);
      }
    }
}
else {
        header("Location: bank_login.php");
        exit();
}
