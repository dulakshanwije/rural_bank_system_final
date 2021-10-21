<?php

// java script eken validate krnna eha pththen open weddi

require_once("db_conn.php");

if (!isset($_SESSION["crnt_b_id"])) {
    echo "Called";
    // header("Location: bank_login.php");
}

if (isset($_POST['c_fname']) && isset($_POST['c_lname']) && isset($_POST['c_nic']) && isset($_POST['c_email']) && isset($_POST['c_nic']) && isset($_POST['c_address']) && isset($_POST['c_phone']) && isset($_POST['c_gender'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $b_id = $_SESSION["crnt_b_id"];
    $c_fname = validate($_POST['c_fname']);
    $c_lname = validate($_POST['c_lname']);
    $c_nic = validate($_POST['c_nic']);
    $c_email = validate($_POST['c_email']);
    $c_address = validate($_POST['c_address']);
    $c_phone = validate($_POST['c_phone']);
    $c_gender = validate($_POST['c_gender']);

    $sql_duplicate_checker = "SELECT * FROM customer_table WHERE customer_nic = '$c_nic' OR customer_email = '$c_email'";

    $resultset_dup = mysqli_query($conn, $sql_duplicate_checker);

    if (mysqli_num_rows($resultset_dup) == 0) {
        $sql = "INSERT INTO customer_table VALUES ('$c_nic', '$c_fname', '$c_lname', '$c_nic', '$c_email', '$c_gender', '$c_address', '$c_phone', 'Deactive', 'No','$b_id')";

        if (mysqli_query($conn, $sql)) {
            header("Location: bank_view_customer_details.php?reg=1");
        } else {
            echo "Something went wrong!" . mysqli_error($conn);
        }
    } else {

        $res = mysqli_fetch_assoc($resultset_dup);

        if ($res["customer_nic"] == $c_nic && $res["customer_email"] == $c_email) {
            // echo "NIC and Email both are already in use!!!";
            header("Location:bank_customer_registration.php?error=NIC and Email both are already in use!");
        } else if ($res["customer_email"] == $c_email) {
            // echo "Email already in use!!!";
            header("Location:bank_customer_registration.php?error=Email already in use!");
        } else {
            // echo "NIC already in use!!!";
            header("Location:bank_customer_registration.php?error=NIC already in use!");
        }
    }
} else {
    header("Location: bank_login.php");
    exit();
}
