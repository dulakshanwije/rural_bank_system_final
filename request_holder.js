function req_body_show(current_id) {
    if (window.getComputedStyle(current_id).display == "none") {
        current_id.style.display = "flex";
    }
    else if (window.getComputedStyle(current_id).display == "flex") {
        current_id.style.display = "none";
    }
}

function sortItems() {
    var loan_check = document.getElementById("sort_bank_loan");
    var mortgages_check = document.getElementById("sort_bank_mortgages");
    var savings_check = document.getElementById("sort_bank_savings");
    var others_check = document.getElementById("sort_bank_others");

    var pending_check = document.getElementById("status_pending");
    var accepted_check = document.getElementById("status_accepted");
    var rejected_check = document.getElementById("status_rejected");

    var pending_reqs = document.getElementsByClassName("Pending");
    var accepted_reqs = document.getElementsByClassName("Accepted");
    var rejected_reqs = document.getElementsByClassName("Rejected");

    var loan_reqs = document.getElementsByClassName("Bank Loan");
    var mortgages_reqs = document.getElementsByClassName("Bank Mortgages");
    var savings_reqs = document.getElementsByClassName("Bank Savings");
    var others_reqs = document.getElementsByClassName("Others");

    // document.getElementById("Pending").style.color = "red";

    //Pending Check
    if (pending_check.checked == true) {
        for (var i = 0; i < pending_reqs.length; i++) {
            pending_reqs[i].style.display = "flex";;
        }
    }
    else {
        for (var i = 0; i < pending_reqs.length; i++) {
            pending_reqs[i].style.display = "none";;
        }
    }

    //Accepted Check
    if (accepted_check.checked == true) {
        for (var i = 0; i < accepted_reqs.length; i++) {
            accepted_reqs[i].style.display = "flex";;
        }
    }
    else {
        for (var i = 0; i < accepted_reqs.length; i++) {
            accepted_reqs[i].style.display = "none";;
        }
    }

    //Rejected Check
    if (rejected_check.checked == true) {
        for (var i = 0; i < rejected_reqs.length; i++) {
            rejected_reqs[i].style.display = "flex";;
        }
    }
    else {
        for (var i = 0; i < rejected_reqs.length; i++) {
            rejected_reqs[i].style.display = "none";;
        }
    }

    //Bank Loan Check
    // if (loan_check.checked == true) {
    //     for (var i = 0; i < loan_reqs.length; i++) {
    //         loan_reqs[i].style.display = "block";;
    //     }
    // }
    // else {
    //     for (var i = 0; i < loan_reqs.length; i++) {
    //         loan_reqs[i].style.display = "none";;
    //     }
    // }
}