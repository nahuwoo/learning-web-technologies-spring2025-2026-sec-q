function checkBloodGroup(){
    let blood = document.getElementById("bloodgroup");
    let errorBlood = document.getElementById("errorBlood");
    let selectedBlood = blood.value;

    if(selectedBlood == ""){
        errorBlood.innerHTML = "Blood Group must be selected";
    }

}
let btnSubmit=document.getElementById("submit");
btnSubmit.addEventListener("click", checkBloodGroup);

