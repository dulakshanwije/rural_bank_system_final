function switchToHome(){
    var bank_home = document.getElementById("dash_details_home");
    var bank_mng = document.getElementById("dash_details_bankm");
        bank_home.style.display = "block";
        bank_mng.style.display = "none";

    document.getElementById("bank_home_tab").classList.add("dash_active");
    document.getElementById("bank_manage_tab").classList.remove("dash_active");

    var bank_tabs = document.getElementsByClassName("dash_bank_tab");

    var bank_size = bank_tabs.length;

    for(var i = 0;i<bank_size;i++){
        if (bank_tabs[i].classList.contains("dash_active_bank")) {
            bank_tabs[i].classList.remove("dash_active_bank");
        }
    }


}
function switchToBank(str){
    var bank_home = document.getElementById("dash_details_home");
    var bank_mng = document.getElementById("dash_details_bankm");
    bank_home.style.display = "none";
    bank_mng.style.display = "block";
    
    var bank_tabs = document.getElementsByClassName("dash_bank_tab");

    var bank_size = bank_tabs.length;

    for(var i = 0;i<bank_size;i++){
        if (bank_tabs[i].classList.contains("dash_active_bank")) {
            bank_tabs[i].classList.remove("dash_active_bank");
        }
    }

    str.classList.add("dash_active_bank");

    document.getElementById("bank_home_tab").classList.remove("dash_active");
    document.getElementById("bank_manage_tab").classList.add("dash_active");


        // AJAX Http requests
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if(this.readyState == 4 && this.status == 200){
            var parts =  this.responseText.split("|");
            document.getElementById("no_customers").innerHTML = parts[0];
            document.getElementById("no_savings").innerHTML =  parts[1];
            document.getElementById("no_loans").innerHTML =  parts[2];
            document.getElementById("no_mortgages").innerHTML = parts[3];

            document.getElementById("bank_address").innerHTML = parts[4];
            document.getElementById("bank_id").innerHTML = parts[5];
            document.getElementById("bank_phone_number").innerHTML = parts[6];
            document.getElementById("bank_district").innerHTML = parts[7];

            document.getElementById("bank_edit_btn").setAttribute("onclick","window.open('admin_bank_edit.php?bank_id="+parts[5] + "');");
            } 
        };
        xmlhttp.open("GET","bank_details_finder.php?q=" + str.id, true);
        xmlhttp.send();
}


function showDistricts(this_div){
    var disc_list = document.getElementById("dash_districts_list");
        
    if(window.getComputedStyle(disc_list).display == "none"){
        disc_list.style.display = "block";
        this_div.childNodes[3].style.transform = "rotate(180deg)";
        this_div.childNodes[3].style.padding = "0 0 0 10px";
    }
    else {
        disc_list.style.display = "none";
        this_div.childNodes[3].style.transform = "rotate(0deg)";
        this_div.childNodes[3].style.padding = "0 10px 0 0";
    }

    document.getElementById("bank_home_tab").classList.remove("dash_active");
    this_div.classList.add("dash_active");

}

function showProfile(this_div){
    var profile_list = document.getElementById("dash_profile_list");

    if(window.getComputedStyle(profile_list).display == "none"){
        profile_list.style.display = "block";
        this_div.childNodes[3].style.transform = "rotate(180deg)";
        this_div.childNodes[3].style.padding = "0 0 0 10px";
    }
    else{
        profile_list.style.display = "none";
        this_div.childNodes[3].style.transform = "rotate(0deg)";
        this_div.childNodes[3].style.padding = "0 10px 0 0";
    }
}

function showBanks(elm){
    var district_list = document.getElementsByClassName("dash_dist_tab");
    var bank_list = document.getElementsByClassName("dash_bank_list");
    var arrow_down = elm.childNodes[3];
    // var arrow_down = elm.lastChild;
    // var arrow_up = document.createElement('span');
    // arrow_up.innerHTML = '<i class="fas fa-chevron-up"></i>';
    for(var i =0;i<district_list.length;i++){
        if(district_list[i] == elm){
            if(window.getComputedStyle(bank_list[i]).display == 'none'){
                bank_list[i].style.display = "block";
                arrow_down.style.transform = "rotate(180deg)";
                arrow_down.style.padding = "0 0 0 10px";
                // arrow_down[3].style.color = "white";
                // elm.replaceChild(arrow_up,arrow_down);
            }
            else{
                bank_list[i].style.display = "none";
                arrow_down.style.transform = "rotate(0deg)";
                arrow_down.style.padding = "0 10px 0 0";
            }
            break;
        }
    }
}