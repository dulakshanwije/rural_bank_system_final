<?php

require_once("../db_conn.php");

if (!isset($_SESSION["current_admin"])) {
    header("Location: index.php");
}
$req_id;

if(isset($_GET["id"])){
    $req_id = $_GET["id"];
}

$sql = "SELECT * FROM bank_request_table WHERE bank_request_id = '$req_id'";

$result = mysqli_query($conn, $sql);

$res = mysqli_fetch_assoc($result);

$_SESSION["req_id"] = $res["bank_request_id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_bank_req.css">
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="tile_color.css">
</head>
<body>
    <div class="container">
        <h2>Bank Requset</h3>
        <p>Request ID : <?php echo $res["bank_request_id"] ;?> | Bank ID : <?php echo $res["bank_id"]; ?> </p>

        <div class="form-container card_blue">
            <div class="inside-form-container">
                <?php
                echo '
                    <p>Date and Time: '.$res["bank_request_date"].'</p>
                    <p>Request Title: '.$res["bank_request_title"].'</p>
                    <p>Request Body: '.$res["bank_request_info"].'</p>
                ';
                ?>
                <form action="admin_bank_req_updater.php" method = "POST">
                    <textarea name="admin_reply" id="" cols="30" rows="10" placeholder="Your Message"  required><?php
                    if(isset($res["admin_reply"])){
                        echo $res["admin_reply"];
                    }
  
                    ?></textarea>
                    <div class="radio_container">
                        <div>
                            <?php
                            if($res["bank_request_status"] == "Accept"){
                                echo '<input type="radio" value="Accept" name="rejectOrAccept" id="accept" checked required>';
                            }else{
                                echo '<input type="radio" value="Accept" name="rejectOrAccept" id="accept" required>';
                            }
                            ?>
                            <label for="accept">Accept</label>
                        </div>
                        <div>

                        <?php
                            if($res["bank_request_status"] == "Reject"){
                                echo '<input type="radio" value="Reject" name="rejectOrAccept" id="reject" checked required>';
                            }else{
                                echo '<input type="radio" value="Reject" name="rejectOrAccept" id="reject" required>';
                            }
                            ?>
                            <label for="reject">Reject</label>
                        </div>
                    </div>
                    <div class="btn-container">
                        <input type="submit" value="SEND">
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>