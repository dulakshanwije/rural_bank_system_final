<?php

require_once("../db_conn.php");

$bank_id = $_REQUEST["q"];

if(isset($bank_id)){
    $sql_cus = "SELECT * FROM customer_table WHERE customer_bank_id = '".$bank_id."'";

    $no_of_cus;$no_loans;$no_mortgages;$no_savings;

    $bank_address;$bank_id;$bank_phone_number;$bank_district;

    if($res1 = mysqli_query($conn,$sql_cus)){
        $no_of_cus = mysqli_num_rows($res1);
    }

    $sql_bank_details = "SELECT * FROM bank_table WHERE bank_id = '".$bank_id."'";

    if($res2 = mysqli_query($conn,$sql_bank_details)){
        $bank_details = mysqli_fetch_assoc($res2);
        $no_loans = $bank_details["bank_total_loans_given"];
        $no_mortgages =  $bank_details["bank_total_mortgages_given"];
        $no_savings = $bank_details["bank_total_savings_held"];

        $bank_address = $bank_details["bank_address"];
        $bank_id = $bank_details["bank_id"];
        $bank_phone_number = $bank_details["bank_phone_number"];
        $bank_district = $bank_details["bank_district"];
    }

    echo $no_of_cus."|".$no_savings."|".$no_loans."|".$no_mortgages."|".$bank_address."|".$bank_id."|". $bank_phone_number . "|" . $bank_district;
}
?>