function signupValidate(){

	var password=document.getElementById("password").value;

	var pass=/^[0-9a-zA-Z]{8,15}$/;
  
  if(!password.trim().match(pass)){
    alert("Password Format is not right");
    return false;
   }

  var strings=password.toString();
  var numeric=0;
  var upper=0;
  var character='';
  character=strings.charAt(0);
  
    
  
  for(var i=0; i<strings.length; i++){
     character=strings.charAt(i);
       if(!isNaN(character)){
         numeric=1;
       }
       if(character==character.toUpperCase()){
         upper=1;
        }
        
  }
  if(numeric==0  || upper==0){
   alert("Password must contain one numeric number and one upper case");
   return false;
  }
   
  else 
   return true;
}
