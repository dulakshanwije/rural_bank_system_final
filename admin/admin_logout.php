<?php
    require_once("../db_conn.php");
    session_destroy();
    header("location:index.php");
?>