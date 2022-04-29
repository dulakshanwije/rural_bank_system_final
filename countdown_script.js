var count = 120;
var timer = setInterval(function(){
    document.getElementById("display_time").innerHTML = count;
    if(count == 0){
        displayNull();
    }
    if(count < 0){
        clearInterval(timer);
        document.getElementById("display_time").innerHTML = 0;
    }
    count--;
},1000);

function displayNull(){
    window.open("customer_login.php?error=OTP verification failed. Time Exceeded. Please Try Again.", "_self");
}
