// password handle

function passwordHandle(){
    let showIcon = document.getElementById("showIcon");
    let hideIcon = document.getElementById("hideIcon");

    let password = document.getElementById("password");

    if(showIcon.classList.contains == 'd-none'){
        hideIcon.classList.toggle('d-none');
        if(password.type == 'password'){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
    }else{
        hideIcon.classList.toggle('d-none')
        showIcon.classList.toggle('d-none');
        
        if(password.type == 'password'){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
    }


}

function cpasswordHandle(){
    let showIcon = document.getElementById("cshowIcon");
    let hideIcon = document.getElementById("chideIcon");

    let cpassword = document.getElementById("cpassword");

    if(showIcon.classList.contains == 'd-none'){
        hideIcon.classList.toggle('d-none');
        if(cpassword.type == 'password'){
            cpassword.type = 'text';
        }else{
            cpassword.type = 'password';
        }
    }else{
        hideIcon.classList.toggle('d-none')
        showIcon.classList.toggle('d-none');
        
        if(cpassword.type == 'password'){
            cpassword.type = 'text';
        }else{
            cpassword.type = 'password';
        }
    }


}


