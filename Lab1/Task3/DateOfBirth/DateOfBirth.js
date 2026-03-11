
function checkDob(){
    let dob=document.getElementById("dob").value;
    let errorDob=document.getElementById("errorDob");

    if(dob=="")
        errorDob.innerHTML="Gender must be selected";
        return;

}
let btnSubmit=document.getElementById("submit");
btnSubmit.addEventListener('click',checkDob);
