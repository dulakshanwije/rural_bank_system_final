
<?php
    require_once("db_conn.php");

    if (!isset($_SESSION["current_acc"])) {
        header("Location: customer_login.php");    
    }



if (isset($_SESSION["current_acc"]) && isset($_POST['new_password']) && isset($_POST['re_new_password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $c_acc = $_SESSION["current_acc"];
    $c_pass_old = validate($_POST['old_password']);
    $c_pass_new1 = validate($_POST['new_password']);
    $c_pass_new2 = validate($_POST['re_new_password']);

    if (empty($c_pass_old)) {
        header("Location: customer_change_password.php?error=Please recheck your password!");
        exit();
    }

    else {
        $sql = "SELECT * FROM customer_table WHERE customer_nic='$c_acc' AND customer_password= '$c_pass_old'";

        $result=mysqli_query($conn, $sql);

        $res = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) || ($c_pass_new1 == $c_pass_new2)) {

            $sql_updater="UPDATE customer_table SET customer_password = '$c_pass_new1' WHERE customer_nic='$c_acc'";
        
            if (mysqli_query($conn, $sql_updater)) {
                session_destroy();
                header("Location: customer_login.php?error=Successfully Changed! Try Your New Password");
                exit();
            } else {
                echo "Error updating password: " . mysqli_error($conn);
              }

        }

        else {
            // echo "Wrong Current Password";
            header("Location: customer_change_password.php?error=Current Password is Incorrect!");
            exit();
        }
    }

}else {
    header("Location: customer_change_password.php?error=Please recheck your password!");
    exit();
}

?>