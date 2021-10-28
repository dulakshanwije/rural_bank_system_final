<?php

require_once("db_conn.php");

// Check whether banker is login or not  
if (!isset($_SESSION["crnt_b_id"])) {
    header("Location: bank_login.php?error=Please Login First!");
}

$current_bank_id = $_SESSION["crnt_b_id"];

$sql = "SELECT * FROM customer_request_table WHERE bank_id = '$current_bank_id' ORDER BY customer_request_id DESC";

// $sql2 = "SELECT customer_nic,customer_first_name,customer_last_name,customer_email,customer_phone_number FROM customer_table
// WHERE customer_bank_id = '$current_bank_id'";

$sql2 = "SELECT customer_table.customer_first_name,
                customer_table.customer_last_name,
                customer_table.customer_email,
                customer_table.customer_phone_number,
                customer_table.customer_nic
        FROM customer_table INNER JOIN customer_request_table ON
                customer_table.customer_nic = customer_request_table.customer_nic
        ";

$resultset = mysqli_query($conn, $sql);
$resultset2 = mysqli_query($conn, $sql2);
$customer_data = array();
$index = 0;
if ($resultset2) {
    while ($row = mysqli_fetch_assoc($resultset2)) {
        $customer_data[$index][0] = $row["customer_nic"];
        $customer_data[$index][1] = $row["customer_first_name"] . " " . $row["customer_last_name"];
        $customer_data[$index][2] = $row["customer_email"];
        $customer_data[$index][3] = $row["customer_phone_number"];
        $index++;
    }
} else {
    echo "Query Failed!!!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awsome library -->
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Styles and scripts for request box -->
    <!-- <link rel="stylesheet" href="request_holder.css"> -->
    <link rel="stylesheet" href="req_new.css">
    <script src="request_holder.js"></script>

    <title>Customers' Requests</title>
</head>

<body>


    <!-- Navigation Bar -->
    <div class="nav-pc-part">
        <div class="topnavbar">
            <div class="nav-col-25">
                <a href="index.html"><img src="images/rbs_logo.png" alt="logo"></a>
            </div>
            <div class="nav-col-75">
                <div class="nav-menu">
                    <a href="bank_home.php" class="menu-item-txt" id="topnav-home"><i class="fas fa-home"></i></a>
                    <a href="bank_manage_customers.php" class="menu-item-txt" id="topnav-home">MANAGE</a>
                    <a href="bank_customer_registration.php" class="menu-item-txt" id="topnav-home">REGISTER</a>
                    <a href="bank_view_customer_details.php" class="menu-item-txt" id="topnav-about">VIEW</a>
                    <!-- <a href="#" class="menu-item-txt">BANKS AVAILABLE</a> -->
                    <button class="menu-item-btn" onclick="myFunction3()" id="pc-signin-btn">Profile</button>
                </div>
            </div>
        </div>
        <div class="pc-signin" id="pc-signin">
            <h3>Logged in as : </h3>
            <?php

            echo ("<p>Bank : " . $_SESSION["crnt_b_address"] . "</p>");
            echo ("<p>District : " . $_SESSION["crnt_b_district"] . "</p>");
            echo ("<p>ID : " . $_SESSION["crnt_b_id"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
        </div>
    </div>

    <div class="nav-responsive-part">
        <div class="topnavbar-res">
            <div onclick="myFunction()">
                <i class="fas fa-bars menu-icon" id="menu-icon"></i>
            </div>
            <div class="menu-logo">
                <a href="index.html"><img src="images/rbs_logo.png" alt=""></a>
            </div>
            <div onclick="myFunction2()">
                <i class="fas fa-user user-icon" id="user-icon"></i>
            </div>
        </div>
        <div class="dropdown-menu" id="dropdown-menu">
            <a href="bank_home.php">BANK HOME</a>
            <a href="bank_manage_customers.php">MANAGE CUSTOMERS</a>
            <a href="bank_customer_registration.php">REGISTER CUSTOMERS</a>
            <a href="bank_view_customer_details.php">VIEW CUSTOMERS</a>
            <!-- <a href="">BANKS AVAILABLE</a> -->
        </div>
        <div class="dropdown-signin" id="dropdown-signin">
            <h3>Logged in as : </h3>
            <?php

            echo ("<p>Bank : " . $_SESSION["crnt_b_address"] . "</p>");
            echo ("<p>District : " . $_SESSION["crnt_b_district"] . "</p>");
            echo ("<p>ID : " . $_SESSION["crnt_b_id"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('bank_logout.php', '_self');">
        </div>
    </div>

    <!-- <div class="request_container"> -->
    <div class="req_container">
        <div class="req_sort_holder" onchange="sortItems()">
            <!-- <div class="req_sort_type">
                <input type="checkbox" name="" id="sort_bank_loan">
                <label for="sort_bank_loan">Loans</label>
                <input type="checkbox" name="" id="sort_bank_mortgages">
                <label for="sort_bank_mortgages">Mortgages</label>
                <input type="checkbox" name="" id="sort_bank_savings">
                <label for="sort_bank_savings">Savings</label>
                <input type="checkbox" name="" id="sort_bank_others">
                <label for="sort_bank_others">Others</label>
            </div> -->
            <div class="req_sort_status">
                <input type="checkbox" name="" id="status_pending" checked>
                <label for="status_pending">Pending</label>
                <input type="checkbox" name="" id="status_accepted" checked>
                <label for="status_accepted">Accepted</label>
                <input type="checkbox" name="" id="status_rejected" checked>
                <label for="status_rejected">Rejected</label>
            </div>
        </div>

        <?php
        if (mysqli_num_rows($resultset)) {
            while ($res = mysqli_fetch_assoc($resultset)) {

                $current_customer_name = "";
                $current_customer_email = "";
                $current_customer_phone = "";

                for ($i = 0; $i < $index; $i++) {
                    if ($res["customer_nic"] == $customer_data[$i][0]) {
                        $current_customer_name = $customer_data[$i][1];
                        $current_customer_email = $customer_data[$i][2];
                        $current_customer_phone = $customer_data[$i][3];
                    }
                }


                echo '
            
            <div class="single_req_container ' . $res["customer_request_status"] . '">
                        <div class="req_header">
                        <div class="status_holder">
                            <p>
            
            ';
                if ($res["customer_request_status"] == "Pending") {
                    echo '
                <i class="fas fa-hourglass-half"></i>
                    <br>
                    <span class = "req_status_txt">
                    Pending
                    </span>
                </p>
                ';
                } else if ($res["customer_request_status"] == "Accepted") {
                    echo '
                <i class="far fa-calendar-check"></i>
                    <br>
                    <span class = "req_status_txt">
                    Accepted
                    </span>
                </p>
                ';
                } else if ($res["customer_request_status"] == "Rejected") {
                    echo '
                <i class="far fa-calendar-times"></i>
                    <br>
                    <span class = "req_status_txt">
                    Rejected
                    </span>
                </p>
                ';
                }
                echo '
            </div>
            <div class="topic_holder">
                <h3>' . $res["customer_request_title"] . '</h3>
                <p>
                    <span>' . $res["customer_nic"] . '</span>
                    <span>|</span>
                    <span>' . $res["customer_request_date"] . '</span>
                </p>
                <p>
                <span class="req_category">' . $res["customer_request_category"] . '</span>
                </p>

                </div>
                <div class = "req_header_right">
                <div class="icon_holder">
                <span>
                ';
                switch ($res["customer_reqeust_range"]) {
                    case 0:
                        $str = '<i class="far fa-sad-tear"></i><br><span class = "req_range_txt">Most<br>Negative</span></span>';
                        break;
                    case 1:
                        $str = '<i class="far fa-frown"></i><br>
                        <span class = "req_range_txt">
                        Negative
                        </span>
                        </span>';
                        break;
                    case 2:
                        $str = '<i class="far fa-meh"></i><br>
                        <span class = "req_range_txt">
                        Average
                        </span>
                        </span>';
                        break;
                    case 3:
                        $str = '<i class="far fa-smile"></i><br>
                        <span class = "req_range_txt">
                        Positive
                        </span>
                        </span>';
                        break;
                    case 4:
                        $str = '<i class="far fa-grin-alt"></i><br><span class = "req_range_txt">Most<br>Positive</span></span>';
                        break;
                }

                echo ($str);
                echo '
                
                </div>
                <div class="btn_holder">
                    <span onclick="req_body_show(req_' . $res["customer_request_id"] . ')"><i class="fas fa-chevron-circle-down"></i><br />
                    <span class = "req_more_txt">
                    More
                    </span>
                    </span>
                </div>
                </div>
            </div>
            <div class="req_reply" id = "req_' . $res["customer_request_id"] . '">
                <div class="req_customer_details">
                        <div class = "req_customer_info">
                            <p><i class="fas fa-user"></i> ' . $current_customer_name . '</p>
                            <p><i class="fas fa-at"></i> ' . $current_customer_email . '</p>
                            <p><i class="fas fa-phone-alt"></i> ' . $current_customer_phone . '</p>
                        </div>
                        <br>
                        <p><i class="far fa-comment-alt"></i> ' . $res["customer_request_info"] . '</p>
                        ';
                $text_area_placeholder;
                if ($res["bank_reply"] != null) {
                    $text_area_placeholder = "Change your previous reply.";
                    echo '<p style = "margin:10px 0;"><i class="fas fa-sign-out-alt"></i> ' . $res["bank_reply"] . '</p>';
                } else {
                    $text_area_placeholder = "Type your message to customer";
                    echo '<p style = "margin:10px 0;"><i class="fas fa-sign-out-alt"></i> You didn\'t reply yet.</p>';
                }
                echo '
                </div>
                <form action = "bank_customer_requests_processor.php?req_id=' . $res['customer_request_id'] . '" method = "POST">
                    <div class="reply_textarea">
                        <textarea placeholder="' . $text_area_placeholder . '" name="reply_message" id="" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="reply_radio_btn">
                        <input type="radio" name="req_status" id="req_accept" value="Accepted">
                        <label for="req_accept">Accept</label>
                        <input type="radio" name="req_status" id="req_reject" value="Rejected">
                        <label for="req_reject">Reject</label>
                    </div>
                    <div class="reply_submit_btn">
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
            </div>
                ';
            }
        }
        ?>

    </div>
    <!-- footer -->

    <div class="footer">
        <h1>R_B_S</h1>
        <div class="footer-icons">
            <p>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-twitter"></i>
            </p>
        </div>
        <p>&copy; Copyright 2021. RBS Created By <a href="./admin/index.php"><span class="blue-colored-text">RBS
                    Creators</span></a>
        </p>
    </div>
</body>

</html>