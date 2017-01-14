
var regex=/^[a-zA-Z0-9]{5,}$/;
window.onload = function()
{

	
	document.getElementById("potvrdi").onclick=ProvjeriNaslovnu;
		
	
	
	};
	




function ProvjeriUsername () {

	
	
    var x = document.getElementById("username").value;
  
	
    if (x == "" || x==null ) {
        text=" Polje je obavezno! ";
		
		document.getElementById("UsernameGreska").innerHTML = text;
		return false;
    }
	else {
		
	 document.getElementById("UsernameGreska").innerHTML = "";
	 return true;
		
}}

function ProvjeriPassword(){
	
	
	  var y= document.getElementById("password").value;
	if(y=="")
	{
   text=" Polje je obavezno! ";
		
       document.getElementById("PasswordGreska").innerHTML = text;
	   return false;
    }
	 
	 
	else if(!y.match(regex))
		 
		 {
			 text=" Polje ne sadrži specijalne znakove! Dužina polja je bar 5 znakova! ";
		
          document.getElementById("PasswordGreska").innerHTML = text;
           return false;		  
		  }
    else {
		
	      document.getElementById("PasswordGreska").innerHTML = "";	
		  return true;
     }

}

function ProvjeriNaslovnu(){
	
	
	
	ProvjeriUsername();
	ProvjeriPassword();

if (!ProvjeriUsername() || !ProvjeriPassword() ) {
    
	document.getElementById("FormaGreska").innerHTML="Unesite ispravno podatke!!";
	
return false;
  }
  else {
	 
	  document.getElementById("FormaGreska").innerHTML="";
	  
return true;

  }}



