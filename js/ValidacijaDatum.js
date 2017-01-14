	


var reg= /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;

window.onload = function()
{

	
	document.getElementById("rezervisi").onclick=ProvjeriDatum;
		
	
	
	};




function  ProvjeriDatum () {
	
	
	
	

	
var datumRezervacije= document.getElementById("datum").value;

 if(!reg.test(datumRezervacije) )
 {
	 
	 text="Pogresan datum!";
  document.getElementById("DatumGreska").innerHTML=text;
	 
	 return false;
 }







 else
 {
	 text="Rezervacija uspješna!";
	  document.getElementById("greskaDatuma").innerHTML=text;
	  return true;
 }
  
  }