<?php

require_once("../db_conn.php");

if (!isset($_SESSION["current_admin"])) {
    header("Location: index.php");
}

$req_id = $_SESSION["req_id"];
$req_status = $_POST["rejectOrAccept"];
$admin_reply = $_POST["admin_reply"];

$sql = "UPDATE bank_request_table SET bank_request_status = '$req_status', admin_reply = '$admin_reply' WHERE bank_request_id = '$req_id'";

if(mysqli_query($conn, $sql)){
    header("Location:admin_home.php");
}
else{
    echo "Something Went Wrong!";
}

?>