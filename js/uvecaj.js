
 function uvecaj(slika1, slika2) {
   document.getElementById('velikaslika').src = slika1;
    zamijeni();               
    }
 
 

function zamijeni() {
  document.getElementById('VelikaSlika').style.display = 'block';
   }
 document.onkeydown = function(evt) {
 evt = evt || window.event;
 if (evt.keyCode == 27) {
document.getElementById('VelikaSlika').style.display = 'none';
    }
};