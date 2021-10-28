// window.onclick = function (event) {


//     // var menu = document.getElementById("dropdown-menu");
//     //     var signmenu = document.getElementById("dropdown-signin");

//     if (!event.target.matches('.topnavbar-res')) {
//         // menu.style.display = 'none';
//         // signmenu.style.display = 'none';
//         alert("Called");

//     }
// }

window.onclick = function (event) {
    if (!event.target.matches("#pc-signin-btn")) {
        if (!event.target.matches(".pc-signin") && !event.target.parentNode.matches(".pc-signin") && !event.target.parentNode.matches("#mode_pc")) {
            document.getElementById("pc-signin").style.display = "none";
        }
    }

    if (!event.target.matches("#menu-icon-btn") && !event.target.matches("#menu-icon")) {
        if (!event.target.matches(".dropdown-menu") && !event.target.parentNode.matches(".dropdown-menu")) {
            document.getElementById("dropdown-menu").style.display = "none";
        }
    }
    if (!event.target.matches("#user-icon-btn") && !event.target.matches("#user-icon")) {
        if (!event.target.matches(".dropdown-signin") && !event.target.parentNode.matches(".dropdown-signin") && !event.target.parentNode.matches("#mode_res")) {
            document.getElementById("dropdown-signin").style.display = "none";
        }
    }
}



function login_selector_pc() {
    var sel = document.getElementById("mode_pc");
    var val = sel.options[sel.selectedIndex].value;
    // alert(val);
    switch (val) {
        case '1': window.open("customer_login.php", "_self"); break;
        case '2': window.open("bank_login.php", "_self"); break;
        // case '3': window.open("admin_login.php", "_self"); break;
    }
}

function login_selector_res() {
    var sel = document.getElementById("mode_res");
    var val = sel.options[sel.selectedIndex].value;
    switch (val) {
        case '1': window.open("customer_login.php", "_self"); break;
        case '2': window.open("bank_login.php", "_self"); break;
        // case '3': window.open("admin_login.php", "_self"); break;
    }
}


// function hideSignin() {
//     document.getElementById("dropdown-signin").style.display = "none";
// }

function hideDropdown() {
    document.getElementById("dropdown-menu").style.display = "none";
}


function scrolltoShowcase() {
    var elmnt = document.getElementById("showcase-section");
    elmnt.scrollIntoView({ behavior: "smooth", block: "center" });
    hideDropdown();
}

function scrolltoAbout() {
    var elmnt = document.getElementById("about-section");
    elmnt.scrollIntoView({ behavior: "smooth", block: "center" });
    hideDropdown();
}

function scrolltoServices() {
    var elmnt = document.getElementById("services-section");
    elmnt.scrollIntoView({ behavior: "smooth", block: "center" });
    hideDropdown();
}

function scrolltoContacts() {
    var elmnt = document.getElementById("contacts-section");
    elmnt.scrollIntoView({ behavior: "smooth", block: "center" });
    hideDropdown();
}

// function trigger() {
//     // alert("triggered");
//     var h1 = document.getElementById("about-container");
//     var h3 = document.getElementById("");

//     // Get it's position in the viewport
//     var bounding1 = h1.getBoundingClientRect();
//     var bounding3 = h3.getBoundingClientRect();

//     // Log the results
//     // console.log(bounding);

//     if (
//         bounding1.top >= 0 &&
//         bounding1.left >= 0 &&
//         bounding1.right <= (window.innerWidth || document.documentElement.clientWidth) &&
//         bounding1.bottom <= (window.innerHeight || document.documentElement.clientHeight)
//     ) {
//         // alert("View");
//         document.getElementById("topnav-home").classList.remove("active");
//         document.getElementById("topnav-about").classList.add("active");
//     } else {
//         // alert('Not in the viewport... whomp whomp');
//     }

//     if (
//         bounding3.top >= 0 &&
//         bounding3.left >= 0 &&
//         bounding3.right <= (window.innerWidth || document.documentElement.clientWidth) &&
//         bounding3.bottom <= (window.innerHeight || document.documentElement.clientHeight)
//     ) {
//         // alert("View");
//         document.getElementById("topnav-about").classList.remove("active");
//         document.getElementById("topnav-contact").classList.add("active");
//     } else {
//         // alert('Not in the viewport... whomp whomp');
//     }

// }

function myFunction() {

    var menu = document.getElementById("dropdown-menu");
    var signmenu = document.getElementById("dropdown-signin");
    if (window.getComputedStyle(menu).display === 'flex') {
        menu.style.display = 'none';
        signmenu.style.display = 'none';
    }
    else if (window.getComputedStyle(menu).display === 'none') {
        menu.style.display = 'flex';
        signmenu.style.display = 'none';
    }
}

function myFunction2() {
    var menu = document.getElementById("dropdown-menu");
    var signmenu = document.getElementById("dropdown-signin");
    if (window.getComputedStyle(signmenu).display === 'flex') {
        signmenu.style.display = 'none';
        menu.style.display = 'none';
    }
    else if (window.getComputedStyle(signmenu).display === 'none') {
        signmenu.style.display = 'flex';
        menu.style.display = 'none';
    }
}

function myFunction3() {
    var pcsignmenu = document.getElementById("pc-signin");
    if (window.getComputedStyle(pcsignmenu).display === 'flex') {
        pcsignmenu.style.display = 'none';
    }
    else if (window.getComputedStyle(pcsignmenu).display === 'none') {
        pcsignmenu.style.display = 'flex';
    }
}

//Customer Password Validation

function password_validation(){
    var new_password = document.getElementById("new_password");
    var re_new_password = document.getElementById("re_new_password");
    var error = document.getElementById("error");

    if(new_password.value !== re_new_password.value){
        error.style.display = "block";
        error.innerHTML = "New passwords do not match!";
        return false;
    }
    else{
        if(new_password.value.length < 6){
            error.style.display = "block";
            error.innerHTML = "Password is too short!";
            return false;
        }
        else{
            error.style.display = "none";
            return true;
        }
    }

}

function autoCalculation(){
    var auto_checker = document.getElementById("auto_checker");

    if(auto_checker.checked == true){
        var loan_amount = document.getElementById("loan_amount").value;
        var loan_interest = document.getElementById("loan_interest").value;
        var interest_amount,full_amount;
        if(loan_amount != null && loan_interest != null && loan_amount != 0 && loan_interest != 0){
            interest_amount = Number(loan_amount) * (Number(loan_interest)/100);
            full_amount = Number(loan_amount) + interest_amount;
            document.getElementById("loan_interest_amount").value = interest_amount.toFixed(2);
            document.getElementById("loan_full_amount").value = full_amount.toFixed(2);
        }

    var payment_installment = document.getElementById("payment_installment").value;
    var monthly_payment;
        if(payment_installment != null && payment_installment != " " && payment_installment != 0){
            monthly_payment = full_amount/payment_installment;
            document.getElementById("monthly_payment_amount").value = monthly_payment.toFixed(2);
        }
    }

}

function autoMortgCalculation(){
    var auto_checker = document.getElementById("auto_checker_mort");
    if(auto_checker.checked == true){
        var mortgage_amount = document.getElementById("mortgage_amount").value;
        var mortgage_interest = document.getElementById("mortgage_interest").value;
        var mortgage_interest_amount, mortgage_full_amount;
        
        if(mortgage_amount != null && mortgage_interest != null && mortgage_amount != 0 && mortgage_interest != 0){
            // alert("Called");
            mortgage_interest_amount = Number(mortgage_amount) * (Number(mortgage_interest)/100);
            mortgage_full_amount = Number(mortgage_amount) + mortgage_interest_amount;
            document.getElementById("mortgage_interest_amount").value = mortgage_interest_amount.toFixed(2);
            document.getElementById("mortgage_full_amount").value = mortgage_full_amount.toFixed(2);
        }

        var mortgage_payment_installment = document.getElementById("mortgage_payment_installment").value;
        var monthly_payment;
        if(mortgage_payment_installment != null && mortgage_payment_installment != " " && mortgage_payment_installment != 0){
            monthly_payment = mortgage_full_amount/mortgage_payment_installment;
            document.getElementById("monthly_mortgage_payment_amount").value = monthly_payment.toFixed(2);
        }

    }
}

function dltconfirmPopup(){
    // var deleteBtn = document.getElementById("cus_dlt_btn");
    // var closeBtn = document.getElementById("cus_dlt_icon");
    var dltPopup = document.getElementById("profile_delete_confirm");

    if(window.getComputedStyle(dltPopup).display === 'none'){
        dltPopup.style.display = "flex";
    }
    else if(window.getComputedStyle(dltPopup).display === 'flex'){
        dltPopup.style.display = "none";
    }
    
}

function dltClose(){
    var dltPopup = document.getElementById("profile_delete_confirm");
    dltPopup.style.display = "none";
}

function actconfirmPopup(){
    // var deleteBtn = document.getElementById("cus_dlt_btn");
    // var closeBtn = document.getElementById("cus_dlt_icon");
    var actPopup = document.getElementById("profile_active_confirm");

    if(window.getComputedStyle(actPopup).display === 'none'){
        actPopup.style.display = "flex";
    }
    else if(window.getComputedStyle(actPopup).display === 'flex'){
        actPopup.style.display = "none";
    }
    
}

function actClose(){
    var actPopup = document.getElementById("profile_active_confirm");
    actPopup.style.display = "none";
}