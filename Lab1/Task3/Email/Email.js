function checkMail(){
    let email=document.getElementById("email").value;
    let errorMail=document.getElementById("errorMail");

    let length= email.length;
    let at=email.indexOf("@");
    let username= email.substring(0,at);
    let domain=email.substring(at+1);
    let dot=domain.indexOf(".");

    if(length==0){
        errorMail.innerHTML="Email cannot be empty";
        return;
    }
    if((username=="") || (dot==-1) || (dot==0) || (dot==domain.length-1) ){
        errorMail.innerHTML="Invalid Email";
        return;
    }
    errorMail="";
}

let btnSubmit=document.getElementById("submit");
btnSubmit.addEventListener('click',checkMail);