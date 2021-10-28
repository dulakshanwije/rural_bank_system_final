<?php
require_once("db_conn.php");

if (!isset($_SESSION["current_acc"])) {
    header("Location: customer_login.php");
}

$current_nic = $_SESSION["current_acc"];

$sql = "SELECT * FROM customer_request_table WHERE customer_nic = '$current_nic' ORDER BY customer_request_id DESC";

// $sql2 = "SELECT customer_nic,customer_first_name,customer_last_name,customer_email,customer_phone_number FROM customer_table
// WHERE customer_bank_id = '$current_bank_id'";

// $sql2 = "SELECT customer_table.customer_first_name,
//                 customer_table.customer_last_name,
//                 customer_table.customer_email,
//                 customer_table.customer_phone_number,
//                 customer_table.customer_nic
//         FROM customer_table INNER JOIN customer_request_table ON
//                 customer_table.customer_nic = customer_request_table.customer_nic
//         ";

$resultset = mysqli_query($conn, $sql);
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
                    <a href="customer_home.php" class="menu-item-txt" id="topnav-home">Customer Home</a>

                    <!-- <a href="javascript:void(0);" onclick="scrolltoAbout()" class="menu-item-txt" id="topnav-about">About</a>
                    <a href="javascript:void(0);" onclick="scrolltoServices()" class="menu-item-txt">Services</a>
                    <a href="javascript:void(0);" onclick="scrolltoContacts()" class="menu-item-txt" id="topnav-contact">Contacts</a> -->

                    <button class="menu-item-btn" onclick="myFunction3()" id="pc-signin-btn">Profile</button>
                </div>
            </div>
        </div>
        <div class="pc-signin" id="pc-signin">
            <h3>Logged in as : </h3>
            <?php

            echo ("<p> NIC : " . $_SESSION["current_acc"] . "</p>");
            echo ("<p> Name : " . $_SESSION["current_customer"] . "</p>");
            echo ("<p> Email : " . $_SESSION["current_customer_email"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('customer_logout.php', '_self');">
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
            <a href="customer_home.php">Customer Home</a>

            <!-- <a href="javascript:void(0);" onclick="scrolltoAbout()">About</a>
            <a href="javascript:void(0);" onclick="scrolltoServices()">Services</a>
            <a href="javascript:void(0);" onclick="scrolltoContacts()">Contacts</a>
            <a href="#">Login as</a> -->
        </div>
        <div class="dropdown-signin" id="dropdown-signin">
            <h3>Logged in as : </h3>
            <?php
            echo ("<p> NIC : " . $_SESSION["current_acc"] . "</p>");
            echo ("<p> Name : " . $_SESSION["current_customer"] . "</p>");
            echo ("<p> Email : " . $_SESSION["current_customer_email"] . "</p>");

            ?>
            <input type="button" value="Sign Out" onclick="window.open('customer_logout.php', '_self');">
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
            <button class="add_new_req_btn" onclick="window.open('customer_requests.php','_self')">Add New Requests</button>
        </div>

        <?php
        while ($res = mysqli_fetch_assoc($resultset)) {
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
                    <div class="reply_text_display">
                        <h4>Your Request :</h4>
                        <p>' . $res["customer_request_info"] . '</p>
                        <h4>Bank\'s Reply :</h4>
                        ';
            if ($res["bank_reply"] != null) {
                echo '<p>' . $res["bank_reply"] . '</p>';
            } else {
                echo '<p>No replies yet.</p>';
            }
            echo '
                        </div>
            </div>
            </div>
                ';
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