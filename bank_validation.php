<?php

require_once("db_conn.php");

if (isset($_POST['bank_id']) && isset($_POST['bank_password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $b_id = validate($_POST['bank_id']);
    $b_pass = validate($_POST['bank_password']);

    if (empty($b_id)) {
        header("Location: bank_login.php?error=Bank ID is required!");
        exit();
    }
    else if (empty($b_pass)) {
        header("Location: bank_login.php?error=Password is required!");
        exit();
    }

    else if(!is_numeric($b_id)){
        header("Location: bank_login.php?error=Incorrect Bank ID or Password!");
        exit();
    }

    else {
        $sql = "SELECT * FROM bank_table WHERE bank_id ='$b_id' AND bank_password= '$b_pass'";

        $result=mysqli_query($conn, $sql);

        // if (!isset($result)) {
        //     // echo "HAAAIiii";
        //     header("Location: bank_login.php?error=Incorrect Bank ID or Password!");
        //     exit();
        // }

        $res = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)) {
            
            // $_SESSION["login_sess"] = "1";
            $_SESSION["crnt_b_id"] = $res["bank_id"];
            $_SESSION["crnt_b_district"] = $res["bank_district"];
            $_SESSION["crnt_b_address"] = $res["bank_address"];
            header("Location: bank_home.php");
        }

        else {
            header("Location: bank_login.php?error=Incorrect Bank ID or Password!");
            exit();
        }
    }

}else {
    header("Location: bank_login.php");
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