function viewLoans(){
    var loan_section = document.getElementById("loan_details");
    var mortgage_section = document.getElementById("mortgage_details");
    // var savings_section = document.getElementById("savings_details");
    
    var loan_btn = document.getElementById("tab_btn_loan");
    var mortgage_btn = document.getElementById("tab_btn_mortgages");
    // var savings_btn = document.getElementById("tab_btn_savings");

    loan_section.style.display = "block";
    mortgage_section.style.display = "none";
    // savings_section.style.display = "none";

    loan_btn.classList.add("tab_btn_active");
    // savings_btn.classList.remove("tab_btn_active");
    mortgage_btn.classList.remove("tab_btn_active");
}

function viewMortgages(){
    var loan_section = document.getElementById("loan_details");
    var mortgage_section = document.getElementById("mortgage_details");
    // var savings_section = document.getElementById("savings_details");

    var loan_btn = document.getElementById("tab_btn_loan");
    var mortgage_btn = document.getElementById("tab_btn_mortgages");
    // var savings_btn = document.getElementById("tab_btn_savings");

    loan_section.style.display = "none";
    mortgage_section.style.display = "block";
    // savings_section.style.display = "none";

    loan_btn.classList.remove("tab_btn_active");
    // savings_btn.classList.remove("tab_btn_active");
    mortgage_btn.classList.add("tab_btn_active");

}

// function viewSavings(){
//     var loan_section = document.getElementById("loan_details");
//     var mortgage_section = document.getElementById("mortgage_details");
//     // var savings_section = document.getElementById("savings_details");
    
//     var loan_btn = document.getElementById("tab_btn_loan");
//     var mortgage_btn = document.getElementById("tab_btn_mortgages");
//     // var savings_btn = document.getElementById("tab_btn_savings");

//     loan_section.style.display = "none";
//     mortgage_section.style.display = "none";
//     // savings_section.style.display = "block";

//     loan_btn.classList.remove("tab_btn_active");
//     // savings_btn.classList.add("tab_btn_active");
//     mortgage_btn.classList.remove("tab_btn_active");
// }