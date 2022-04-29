<?php

require_once("../db_conn.php");

if (!isset($_SESSION["current_admin"])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
    <script src="dashboard.js"></script>
    <script src="https://kit.fontawesome.com/d50e96d6ab.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet.css">
    <link rel="stylesheet" href="../login_box.css">
    <link rel="stylesheet" href="../req_new.css">
    <link rel="stylesheet" href="tile_color.css">
    <script src="../script.js"></script>

    <title>Admin Home</title>

    <style>
        .req_header {
            width : 97%;
            margin: 20px auto 0px auto;
            /* margin-right: auto; */
            /* margin-left: auto; */
        }

        .admin_bank_req_holder:last-child .req_header {
            margin-bottom: 20px;
        }

        .btn_holder, .status_holder {
            display :flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
         /* {
            background-color:red;
            display :flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        } */
    </style>

</head>

<body>
    <div class="dashboard_container">
        <div class="dash_tab_container">
            <div class="dash_profile_holder">
                <h1><span style = "color:#F59C49;">A</span>DMIN PANEL</h1>
                <p>Rural Banking System</p>
                <p><?php echo $_SESSION["current_admin"] ?></p>
            </div>
            <div class="dash_tab dash_active" id = "bank_home_tab" onclick="switchToHome()">
                <span>Home</span>
                <span class="dash_tab_icon"><i class="fas fa-chevron-right"></i></span>
            </div>
            <div class="dash_tab" id = "bank_manage_tab" onclick="showDistricts(this)">
                <span>Bank Management</span>
                <span class="dash_tab_icon"><i class="fas fa-chevron-down"></i></span>
            </div>

            <div class="dash_districts_list" id="dash_districts_list">
                <?php

                $dis_sql = "SELECT * FROM district_table";
                $dis_result = mysqli_query($conn, $dis_sql);
                // $bank_list = mysqli_fetch_assoc($bank_result);

                while ($dis_list = mysqli_fetch_assoc($dis_result)) {
                    $current_loop_bank = $dis_list["district_id"];
                    $bank_sql = "SELECT * FROM bank_table WHERE fk_district_id = '$current_loop_bank'";
                    // echo $bank_sql;
                    $bank_result = mysqli_query($conn, $bank_sql);
                    if (mysqli_num_rows($bank_result) > 0) {
                        // $bank_list = mysqli_fetch_assoc($bank_result);

                        $count = 0;
                        while ($bank_list = mysqli_fetch_assoc($bank_result)) {
                            if ($count == 0) {
                                echo '
                                <div class="dash_dist_tab" onclick="showBanks(this)">
                                <span>' . $bank_list["bank_district"] . '</span>
                                <span class="dash_tab_icon"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="dash_bank_list">
                            ';
                                $count++;
                            }
                            echo '
                            <div class="dash_bank_tab" id = "'.$bank_list["bank_id"].'" onclick="switchToBank(this)">
                                <span>' . $bank_list["bank_address"] . '</span>
                                <span class="dash_tab_icon"><i class="fas fa-chevron-right"></i></span>
                            </div>
                            ';
                        }
                        echo '
                            </div>
                            ';
                    }
                }
                ?>
            </div>
            <div class="dash_tab" onclick="showProfile(this)">
                <span>Profile Management</span>
                <span class="dash_tab_icon"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div id="dash_profile_list" class="dash_profile_list">
                <div class="dash_dist_tab" onclick="window.open('admin_logout.php','_self');">
                    <span>logout</span>
                    <span class="dash_tab_icon"><i class="fas fa-sign-out-alt"></i></span>
                </div>
            </div>
        </div>
        <div class="dash_details_container">
            <div class="dash_details_page" id="dash_details_home">
                <div class="dash_details_count">
                    <?php
                    //Number of banks
                    $no_bank_sql = "SELECT * FROM bank_table";
                    $no_bank_res = mysqli_query($conn,$no_bank_sql);

                    $no_bank = mysqli_num_rows($no_bank_res);
                    echo '
                    <div class="count_holder bg_blue">
                        <div class="count_icon_holder">
                        <i class="fas fa-university"></i>
                        </div>
                        <div class="count_text_holder">
                    <p class = "count_text">'.$no_bank.'</p>
                    <span class = "count_line"></span>
                    <p>Banks</p>
                    </div>
                    </div>';
                    
                    //Number of customers
                    $no_customer_sql = "SELECT * FROM customer_table";
                    $no_customer_res = mysqli_query($conn,$no_customer_sql);

                    $no_customer = mysqli_num_rows($no_customer_res);
                    echo '
                    <div class="count_holder bg_orange">
                        <div class="count_icon_holder">
                        <i class="fas fa-users"></i>
                        </div>
                        <div class="count_text_holder">
                    <p class = "count_text">'.$no_customer.'</p>
                    <span class = "count_line"></span>
                    <p>Customers</p>
                    </div>
                    </div>';


                    ?>
                    <!-- <div class="count_holder"></div> -->
                    <!-- <div class="count_holder">
                        <a href="bank_register.php"><p class = "count_text"><i class="fas fa-university"></i></p></a>
                            <p>Add new Bank</p>
                    </div> -->
                    <div class="count_holder bg_red">
                        <div class="count_icon_holder">
                        <i class="fas fa-map-marked-alt"></i>
                        </div>
                            <div class="count_text_holder">
                            <a style ="color:white;" href="admin_bank_add.php">
                                <p class = "count_text"><i class="fas fa-plus"></i></p>
                            </a>
                            <span class = "count_line"></span>
                                    <p>Add New Bank</p>
                            </div>
                    </div>
                </div>
                <div class="admin_bank_req_container">
                    <div class="admin_bank_req_holder">
                    <!-- Home Page Main Request Holder -->
                    <!-- PHP Script  -->
                    <?php
                        $req_gen_sql = "SELECT * FROM bank_request_table";

                        $resultset = mysqli_query($conn,$req_gen_sql);

                        if (mysqli_num_rows($resultset)) {
                            while ($res = mysqli_fetch_assoc($resultset)) {
                                echo '
                                <div class="single_req_container">
                                    <div class="req_header card_red gradient_red_25">
                                        <div class="status_holder">
                                            <span>
                                                <i class="fas fa-hourglass-half"></i>
                                            </span>
                                            <span class = "req_status_txt">
                                                Pending
                                            </span>
                                        </div>
                                        <div class="topic_holder">
                                            <h3>'.$res["bank_request_title"].'</h3>
                                            <p>
                                                <span>Bank ID : '.$res["bank_id"].'</span>
                                                <span> | </span>
                                                <span>'.$res["bank_request_date"].'</span>
                                            </p>
                                        </div>
                                            <div class="btn_holder">
                                                <a href="admin_bank_req.php?id='.$res["bank_request_id"].'">
                                                    <span>
                                                        <i class="fas fa-chevron-circle-right"></i>
                                                    </span>
                                                </a>
                                                <a href="admin_bank_req.php?id='.$res["bank_request_id"].'">
                                                    <span class = "req_more_txt">
                                                        More
                                                    </span>
                                                </a>
                                            </div>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    ?>
                    <!-- Testing start -->
                        <!-- <div class="single_req_container">
                            <div class="req_header">
                                <div class="status_holder">
                                    <span>
                                        <i class="fas fa-hourglass-half"></i>
                                    </span>
                                    <span class = "req_status_txt">
                                        Pending
                                    </span>
                                </div>
                                <div class="topic_holder">
                                    <h3>Req, title goes here</h3>
                                    <p>
                                        <span>Bank id goes here</span>
                                        <span> | </span>
                                        <span>Bank req. date</span>
                                    </p>
                                </div>
                                <div class="btn_holder" onclick = "">
                                    <span>
                                        <i class="fas fa-chevron-circle-down"></i>
                                    </span>
                                    <span class = "req_more_txt">
                                        More
                                    </span>
                                </div>
                            </div>
                        </div> -->
                        <!-- Testing end -->
                    </div>
                </div>
            </div>
            <div class="dash_details_page" id="dash_details_bankm">
                <div class="dash_details_count">
                    <div class="col3">
                        <!-- Bank Details  -->
                        <div class = "col3-item card_blue">
                            <h4>Address</h4>
                            <h2 id = "bank_address"></h2>
                            <!-- <p id = "bank_address"></p> -->
                        </div>
                        <div class = "col3-item card_red">
                            <h4>Bank ID</h4>
                            <h2 id = "bank_id"></h2>
                        </div>
                        <div class = "col3-item card_orange">
                            <h4>Phone Number</h4>
                            <h2 id = "bank_phone_number"></h2>
                        </div>
                        <div class = "col3-item card_purple">
                            <h4>District</h4>
                            <h2 id = "bank_district"></h2>
                        </div>
                    </div>
                    <div class="count_holder col1 bg_orange">
                        <div class = "count_icon_holder">
                            <i class="fas fa-users count_text_"></i>
                        </div>
                        <div class = "count_text_holder">
                            <p id = "no_customers" class = "count_text"></p>
                            <div class = "count_line"></div>
                            <p>Customers</p>
                        </div>
                    </div>
                </div>
                <div class="dash_details_count">

                    <div class="count_holder bg_red">
                        <div class="count_icon_holder">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="count_text_holder">
                            <p id = "no_loans" class = "count_text"></p>
                            <span class = "count_line"></span>
                            <p>Loans</p>
                        </div>
                    </div>

                    <div class="count_holder bg_purple">

                        <div class="count_icon_holder">
                            <i class="fas fa-coins"></i>
                        </div>

                        <div class="count_text_holder">
                            <p id = "no_mortgages" class = "count_text"></p>
                            <span class = "count_line"></span>
                            <p>Mortgages</p>
                        </div>
                    </div>


                    <div class="count_holder bg_blue">
                        <div class="count_icon_holder">
                            <i class="fas fa-piggy-bank"></i>
                        </div>
                        <div class="count_text_holder">
                            <p id = "no_savings" class = "count_text"></p>
                            <span class = "count_line"></span>
                            <p>Savings</p>
                        </div>
                    </div>
                </div>

                
                <div class="admin_bank_req_container">
                    <h2 style = "
                    margin:10px 30px;
                    color:darkblue;
                    ">REQUESTS</h2>
                    <div class="admin_bank_req_holder">
                        <!-- Testing start -->
                        <div class="single_req_container">
                            <div class="req_header card_purple gradient_purple_25">
                                <div class="status_holder">
                                    <span>
                                        <i class="fas fa-hourglass-half"></i>
                                    </span>
                                    <span class = "req_status_txt">
                                        Pending
                                    </span>
                                </div>
                                <div class="topic_holder">
                                    <h3>Req, title goes here</h3>
                                    <p>
                                        <span>Bank id goes here</span>
                                        <span> | </span>
                                        <span>Bank req. date</span>
                                    </p>
                                </div>
                                <div class="btn_holder" onclick = "">
                                    <span>
                                        <i class="fas fa-chevron-circle-right"></i>
                                    </span>
                                    <span class = "req_more_txt">
                                        More
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- Testing end -->
                        </div>
                    </div>

                    <h2 style = "
                    margin:10px 30px;
                    color:darkblue;
                    ">PREFERENCES</h2>

                    <div class="dash_btn_holder">
                        <button id = "bank_edit_btn">EDIT</button>
                    </div>
                </div>
            </div>
        </div>
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
        <p>&copy; Copyright 2021. RBS Created By <a href="index.php"><span class="blue-colored-text">RBS
                    Creators</span></a>
        </p>
    </div>


</body>

</html>