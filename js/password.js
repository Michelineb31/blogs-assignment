    "use strict";

    function checkPassword()
    {
    
        var password1 = document.getElementById('password');
        var password2 = document.getElementById('verify');
        
        var message = document.getElementById('confirmMessage');
        
        var alertGo = "#66cc66";
        var alertStop = "#FF0000";
        
        if(password1.value == password2.value){
            password2.style.backgroundColor = alertGo
            message.style.color = alertGo;
            message.innerHTML = "Passwords Match!";
        } else {
            password2.style.backgroundColor = alertStop;
            message.style.color = alertStop;
            message.innerHTML = "Passwords Must Match!";
        }
        
    }