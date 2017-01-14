<html>
<head>
<script>
function showResult(str){
if(str.length==0){
document.getElementById("pretraga").innerHTML="";
document.getElementById("pretraga").style.border="0px";
return;
}
if(window.XMLHttpRequest){

xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXobject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
document.getElementById("pretraga").innerHTML=xmlhttp.responseText;
document.getElementById("pretraga").style.border="1px solid #A5ACB2";
}
}
xmlhttp.open("GET", "pretraga.php?q="+str,true);
xmlhttp.send();
}

</script>
</head>
<body>

</body>
</html>
<?php

if(isset($_POST['searchVal'])){
		$pretraga = htmlEntities($_POST['searchVal'], ENT_QUOTES);
$pretraga = htmlEntities($tekst, ENT_QUOTES);
	 $odgovor='';
		$kontakti=simplexml_load_file('kontakti.xml');
		$brojac=1;
	foreach($kontakti->kontakt as $kontakt){
		if($brojac>10) break;
		
		$fname=$kontakt['name'];
		$lname=$kontakt->email;
		$fullName=$fname.' '.$lname;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$odgovor.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		elseif(strpos(strtolower($fname), strtolower($pretraga))!==false || strpos(strtolower($lname),strtolower($pretraga))!==false || strpos(strtolower($fullName),strtolower($pretraga))!==false)
		{
			$odgovor.='<div>'.$fname.' '.$lname.'<div>';
			$brojac=$brojac+1;
		}
		
	}


 

 

 
if($odgovor==""){
 $ispis = "Nema rezultata!";
}
else
{
 $ispis=$odgovor;
}
 

echo $ispis;
?>