function switchToHome(){
    var bank_home = document.getElementById("dash_details_home");
    var bank_mng = document.getElementById("dash_details_bankm");
        bank_home.style.display = "block";
        bank_mng.style.display = "none";
}
function switchToBank(){
    var bank_home = document.getElementById("dash_details_home");
    var bank_mng = document.getElementById("dash_details_bankm");
        bank_home.style.display = "none";
        bank_mng.style.display = "block";
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