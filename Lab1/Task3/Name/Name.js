function checkName(){
    let name=document.getElementById("name").value;
    let error=document.getElementById("errorName");

    if(name==""){
        error.innerHTML="Name cannot be empty";
        return;
    }

    let words=name.split(" ");
    if(words.length<2){
            error.innerHTML="Name must contain two words";
            return;

    }

    for(let a=0;a<name.length;a++){
        if( !((name[a]>='a' && name[a]<= 'z') || (name[a]>='A' && name[a]<='Z') || name[a]==' ' || name[a]=='.')){
            error.innerHTML="Name can contain a-z or A-Z or dot(.) or dash(-) ";
            return;
        }
    }

    if( !((name[0]>='a' && name[0]<= 'z') || (name[0]>='A' && name[0]<='Z'))){
         error.innerHTML="Name must start with a letter ";
         return;
    }
    

    
}
var btnSubmit=document.getElementById("btnSubmit");
btnSubmit.addEventListener('click',checkName);