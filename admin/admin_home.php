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
    <script src="../script.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="dashboard_container">
        <div class="dash_tab_container">
            <div class="dash_profile_holder">
                Welcome <?php echo $_SESSION["current_admin"]?>
            </div>
            <div class="dash_tab dash_active" onclick="switchToHome()">
                <span>Home</span>
                <span class="dash_tab_icon"><i class="fas fa-chevron-right"></i></span>
            </div>
            <div class="dash_tab" onclick="showDistricts(this)">
                <span>Bank Management</span>
                <span class="dash_tab_icon"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div class="dash_districts_list" id="dash_districts_list">
                <?php
                
                $dis_sql = "SELECT * FROM district_table";
                $dis_result = mysqli_query($conn,$dis_sql);
                // $bank_list = mysqli_fetch_assoc($bank_result);

                while($dis_list = mysqli_fetch_assoc($dis_result)){
                    $current_loop_bank = $dis_list["district_id"];
                    $bank_sql = "SELECT * FROM bank_table WHERE fk_district_id = '$current_loop_bank'";
                    // echo $bank_sql;
                    $bank_result = mysqli_query($conn,$bank_sql);
                    if(mysqli_num_rows($bank_result) > 0){
                        // $bank_list = mysqli_fetch_assoc($bank_result);
                      
                        $count = 0;
                        while($bank_list = mysqli_fetch_assoc($bank_result)){
                            if($count == 0){
                                echo '
                                <div class="dash_dist_tab" onclick="showBanks(this)">
                                <span>'.$bank_list["bank_district"].'</span>
                                <span class="dash_tab_icon"><i class="fas fa-chevron-down"></i></span>
                                </div>
                                <div class="dash_bank_list">
                            ';
                            $count++;
                            }
                            echo '
                            <div class="dash_bank_tab" onclick="switchToBank()">
                                <span>'.$bank_list["bank_address"].'</span>
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
            <div class="dash_tab dash_active" onclick="showProfile(this)">
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
            <div class="dash_details_page" id = "dash_details_home">
                <div class="dash_details_count">
                    <div class="count_holder"></div>
                    <div class="count_holder"></div>
                    <div class="count_holder"></div>
                </div>
                <div class="admin_bank_req_container">
                    <div class="admin_bank_req_holder">
    
                    </div> 
                </div>
            </div>
            <div class="dash_details_page" id="dash_details_bankm">
                <div class="dash_details_count">
                    <div class="count_holder"># of Customers</div>
                    <div class="count_holder"># of Loans</div>
                    <div class="count_holder"># of Mortgages</div>
                </div>
                <div class="admin_bank_req_container">
                    <div class="admin_bank_req_holder">
    
                    </div> 
                </div>
                <div class="dash_btn_holder">
                    <button>Update</button>
                    <button>Deactivate</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>