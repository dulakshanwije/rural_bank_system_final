
<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'rural_bank_system');

if (!$conn) {
    echo "Connection Failed";
}

?>