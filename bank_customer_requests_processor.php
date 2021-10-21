<?php

require_once "db_conn.php";

$req_id = $_GET["req_id"];
$reply_msg = $_POST["reply_message"];
$req_status = $_POST["req_status"];

$sql_reply = "UPDATE customer_request_table SET bank_reply = '$reply_msg', customer_request_status = '$req_status' WHERE customer_request_id = '$req_id'";



if(mysqli_query($conn,$sql_reply)){
    header("location:bank_view_customer_requests.php");
    // echo "Success";
}
else{
    echo '
    <h1>ERROR  502 Bad Gateway </h1>
    ';
    echo "Somthing went wrong";
}

?>