<?php

require_once("../db_conn.php");

if (!isset($_SESSION["current_admin"])) {
    header("Location: index.php");
}

$bank_address = $_POST["bank_address"];
$bank_phone_number = $_POST["bank_phone_number"];
$bank_district = $_POST["bank_district"];
$bank_password = $_POST["bank_password1"];

$sql_district = "SELECT district_id FROM district_table WHERE district_name = '$bank_district'";

$district_res = mysqli_query($conn,$sql_district);
$district_set = mysqli_fetch_assoc($district_res);

$district_id = $district_set["district_id"]; 

$sql = "INSERT INTO bank_table SET bank_password ='$bank_password', bank_phone_number = '$bank_phone_number', bank_district = '$bank_district',fk_district_id = '$district_id', bank_address = '$bank_address'";

if(mysqli_query($conn,$sql)){
    echo '
    <script>
        alert("Bank added successfully!");
    </script>
    ';
    header("Location:admin_home.php");
}
else{
    echo "Something went wrong!";
}



?>