<?php

require_once("db_conn.php");

if (isset($_POST['customer_acc_no']) && isset($_POST['customer_password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $acc_no = validate($_POST['customer_acc_no']);
    $cust_pass = validate($_POST['customer_password']);

    if (empty($acc_no)) {
        header("Location: customer_login.php?error=Account Number is required!");
        exit();
    }
    else if (empty($cust_pass)) {
        header("Location: bank_login.php?error=Password is required!");
        exit();
    }
    else {
        $sql = "SELECT * FROM customer_table WHERE customer_nic ='$acc_no' AND customer_password = '$cust_pass'";

        $result=mysqli_query($conn, $sql);

        $res = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)) {
            if($res["customer_remove_status"] == 'Yes'){
                header("Location: customer_removed_alert.html");
            }
            else {
                if($res["customer_account_status"] == 'Deactive'){
                    header("Location: customer_deactive_alert.html");
                }
                else{
                    $_SESSION["current_acc"] = $res["customer_nic"];
                    $_SESSION["current_customer"] = $res["customer_first_name"]." ".$res["customer_last_name"];
                    $_SESSION["current_customer_email"] = $res["customer_email"];
                    $_SESSION["current_customer_bank"] = $res["customer_bank_id"];
                    
                    header("Location: customer_home.php");
                }
            }
        }
        else {
            header("Location: customer_login.php?error=Incorrect Username or Password!");
            exit();
        }
    }

}else {
    header("Location: customer_login.php");
    exit();
}


?>




<!-- session_start();

$con = mysqli_connect('localhost', 'root', '' );

mysqli_select_db($con, 'db_conn');

$b_name = $_POST['b_name'];
$pass = $_POST['b_password'];

$s = "select * from bank_table where name = '$b_name' && password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['bank_name'] = $b_name;
    header('location: bank_home.php');
}

else {
    header('location:bank_login.php');
} -->