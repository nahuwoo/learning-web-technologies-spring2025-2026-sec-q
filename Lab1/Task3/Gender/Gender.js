
function checkGender(){
    let gender=document.getElementsByName("gender");
    let errorGender=document.getElementById("errorGender");
    let selectedGender=null;
    for(let i=0; i<gender.length;i++){
        if(gender[i].checked){
            selectedGender=gender[i].value;
            break;
        }
    }
    if(selectedGender==null){
        errorGender.innerHTML="Gender must be selected";
        return;
    }
}
let btnSubmit=document.getElementById("submit");
btnSubmit.addEventListener('click',checkGender);
