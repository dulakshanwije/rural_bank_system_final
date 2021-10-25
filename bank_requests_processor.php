<?php

require_once("db_conn.php");

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$bank_req_title = validate($_POST["bank_req_title"]);
$bank_req_info = validate($_POST["bank_req_info"]);

date_default_timezone_set("Asia/Colombo");
$current_date = date('d-m-Y h:i:sa');

$bank_id = $_SESSION["crnt_b_id"];

$sql = "INSERT INTO bank_request_table VALUES ('','$bank_req_title','$bank_req_info','$current_date','$bank_id')";

if(mysqli_query($conn,$sql)){
    header("location:bank_home.php");
}
else{
    echo "Something Wrong".mysqli_error($conn);
}
