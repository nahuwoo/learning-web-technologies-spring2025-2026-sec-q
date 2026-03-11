function clickStart(){
    let start=document.getElementById("start");
    let div1=document.getElementById("div1");

    div1.removeChild(start);

    let usernameField=document.createElement("input");
    div1.appendChild(usernameField);
    usernameField.placeholder="Username";
    usernameField.style.position='absolute';
    usernameField.style.top='45%';
    

    currentUserName=usernameField.style.left;
    currentPassword=passwordField.style.right;
    let count=1;
    let interval= setInterval(function(){
        if(count>88){
            clearInterval(interval);
        }
        else{
            
            if(currentUserName=="")
                currentUserName='10px';
            else{
                currentUserName=parseInt(currentUserName)+10+'px';
            }
            usernameField.style.left=currentUserName;

            if(currentPassword=="")
                currentPassword='10px';
            else{
                currentPassword=parseInt(currentPassword)+10+'px';
            }
            passwordField.style.right=currentPassword;
        }
        count++;


    },100);

    let break1 = document.createElement("br");
    div1.appendChild(break1);

    let passwordField=document.createElement("input");
    div1.appendChild(passwordField);
    passwordField.placeholder="Password";
    passwordField.type="password";
    passwordField.style.position='absolute';
    passwordField.style.right='0%';
    passwordField.style.top='50%';

    // let interval2= setInterval(function(){
    //     if(count>79){
    //         clearInterval(interval2);
    //     }
    //     else{
    //         if(currentPassword=="")
    //             currentPassword='10px';
    //         else{
    //             currentPassword=parseInt(currentPassword)+10+'px';
    //         }
    //         passwordField.style.right=currentPassword;
    //     }
    //     count++;


    // },100);


}

let btnStart=document.getElementById("start");
btnStart.addEventListener('click',clickStart)