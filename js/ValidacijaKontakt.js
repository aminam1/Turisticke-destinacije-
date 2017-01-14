 
var regIme= /^[A-Za-z]+\s+['A-Za-z]+/;
var regE=   /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


window.onload = function()
{

	
	document.getElementById("posalji").onclick=ProvjeriKontakt;
		
	
	
	};

	function ProvjeriIme (){
		
		
	
	var x = document.getElementById("imee").value;

	  
	if (x == "") {
        text=" Polje je obavezno! ";
		
		document.getElementById("ImeGreska").innerHTML = text;
		return false;
    }
	else if ( !regIme.test(x))
      {
		  text="Greška!('Neko Nekic', 'neko nekic')";
   document.getElementById("ImeGreska").innerHTML=text;
   return false;
  
     }

	
	else {
		
	      document.getElementById("ImeGreska").innerHTML = "";	
		  return true;
     }
	 
	}
	
	function ProvjeriEmail()
	{
		var y= document.getElementById("emaill");

	 
	if (y.value.match(regE) || y=="" ) {
		
		
		
		    document.getElementById("EmailGreska").innerHTML = "";	
		  return true;
		
	
    }
	
	
		
	else {
			document.getElementById("EmailGreska").innerHTML =" Neispravan email! ";;
		return false;
	  
	}
	}
	
	function ProvjeriPoruku()
	{
	var z= document.getElementById("porukaa").value;
	
	
	if (z.trim().length < 1) {
        text=" Molimo Vas unesite text poruke! ";
		
		document.getElementById("PorukaGreska").innerHTML = text;
		return false;
    }
	
	
	else {
		
	      document.getElementById("PorukaGreska").innerHTML = "";	
		  return true;
     }
	
	
	
	}
	function ProvjeriKontakt() {
			
			
			
	ProvjeriIme();
	ProvjeriEmail();
	ProvjeriPoruku();
if (!ProvjeriIme() || !ProvjeriPoruku() || !ProvjeriEmail()) {
    
	document.getElementById("KontaktGreska").innerHTML="Unesite ispravno podatke!!";
	
return false;
  }
  else {
	 
	  document.getElementById("KontaktGreska").innerHTML="";
	  
return true;

	}}
  




