<?php

require_once("db_conn.php");

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$req_category = validate($_POST["req_category"]);
$req_title = validate($_POST["req_title"]);
$req_info = validate($_POST["req_info"]);
$req_range = validate($_POST["req_range"]);

date_default_timezone_set("Asia/Colombo");
$current_date = date('d-m-Y h:i:sa');

$customer_id = $_SESSION["current_acc"];
$customer_bank = $_SESSION["current_customer_bank"];

$sql = "INSERT INTO customer_request_table VALUES ('','$req_category','$req_title','$req_info','$current_date','$req_range','Pending','','$customer_id','$customer_bank')";

if(mysqli_query($conn,$sql)){
    header("location:customer_view_requests.php");
}
else{
    echo "Something Wrong".mysqli_error($conn);
}

?>