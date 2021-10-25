<?php

require_once("../db_conn.php");

if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $admin_email = validate($_POST['admin_email']);
    $admin_pass = validate($_POST['admin_password']);

    if (empty($admin_email)) {
        header("Location: index.php?error=Account Number is required!");
        exit();
    }
    else if (empty($admin_pass)) {
        header("Location: index.php?error=Password is required!");
        exit();
    }
    else {
        $sql = "SELECT * FROM admin_table WHERE admin_email ='$admin_email' AND admin_password = '$admin_pass'";

        $result=mysqli_query($conn, $sql);

        $res = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)) {
                    $_SESSION["current_admin"] = $res["admin_email"];
                    header("Location: admin_home.php");
        }
        else {
            header("Location: customer_login.php?error=Incorrect Username or Password!");
            exit();
        }
    }

}else {
    header("Location: index.php");
    exit();
}


?>