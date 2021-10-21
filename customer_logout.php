<?php

require_once("db_conn.php");

// session_start();
session_destroy();

header('location:customer_login.php');

?>