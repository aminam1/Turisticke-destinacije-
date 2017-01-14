
<?php
$ispis='';
	
	if(isset($_POST['submit'])){
	
	
		$pretraga = htmlEntities($_POST['search'], ENT_QUOTES);
		//ovdje nešto
		//ovo dodaje u autput u vajl
		//ovo vadi sve registrovane
		$kontakti=simplexml_load_file('kontakti.xml');
	foreach($kontakti->kontakt as $kontakt){
		
		$imee=$kontakt['ime'];
	
		
		$emaill=$kontakt->email;
		//ovdje if se nalazi u imenu ili prezimenu
		//dodaj u autput
		if($pretraga=='')
		{
			$ispis.='<div>'.$imee.' '.$emaill.'<div>';
		}
		elseif(strpos(strtolower($imee), strtolower($pretraga))!==false || strpos(strtolower($emaill),strtolower($pretraga))!==false)
		{
			
			$ispis.='<div>'.$imee.' '.$emaill.'<div>';
		}
	}
}
?>
<!DOCTYPE html>

<html>  
<head>
<title> TuristickeDestinacije-Kontakt </title>
<link rel="stylesheet" href="stil.css">
</head>

<body>
<?php

if(isset($_POST ['posalji'])){
	
	
	$servername = "localhost";
$username = "amina";
$password = "password";
$dbname = "turisticke-destinacije";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


			


	
				$ime= $_POST['ime'];
				$email= $_POST['email'];
				$poruka= $_POST['poruka'];
		
				
				
				
			$sql= "INSERT INTO kontakt(  ime, email, poruka)
			VALUES (  '$ime', '$email', '$poruka')";
				
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

					
				$conn->close();	
					




}
	
	



?>
<div class="naslovna">
<div class=" slika" >

<img src="slike/Naslovna-1.jpg" alt = "Slika naslovnice">
</div>
</div>
<div class="meni">
  <button class="dropbtn">Dropdown meni</button>
  <div class="opcije">
  

<a href ="index.php" > Naslovna </a> 
<br>


<a href ="Destinacije.php"> Destinacije</a> 


<br>
<a href="Zanimljivosti.php"> Zanimljivosti </a>
<br>

<a href= "Onama.php" > O nama </a>
<br>

<a href="Kontakt.php"> Kontakt </a> 
</div>

</div>
 
 <script>
function showResult(str){
	
		var pretrazeno = $("input[name='search']").val();
	$.post("pretraga.php",{upisano: pretrazeno},function(output){
		$("#output").html(output);
	}
	);
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

	
<div class="redStranice1">

<h2> Posaljite nam email! </h2>

	
  
    
    <form action="Kontakt.php" method="post" >

	<td>
	<input type="text" name="search"  id="p" onKeyUp="showResult(this.value)">
	</td>
	<td>
	
	<input type="submit" name="submit" value="Pretraži" >
	</td>

		</form>
		<div id="pretraga">
		
 <?php echo $ispis; ?>


<div class="kontakt">
<table>
 
    <tr> <th>
    <form action="kontakt.php" method="post">
    <label for="username">Ime i prezime</label>
	</th>
	<th>
    <input type="text" id="ime" name="ime">
	</th>
	</tr>
<tr>	
	<th>

    <label for="password">Vaš email</label>
	</th>
	<th>
    <input type="text" id="email" name="email">
	</th>
	</tr>
	 <tr>
	<th>
	
    
    <label for="password">Poruka</label>
	</th>
	<th>
    <textarea id="poruka" name="poruka" placeholder="Poruka" rows="5"  cols="21" required> </textarea>
	</th>
	</tr>
	 <tr>
	<th></th>
	<th>
	
	
	  <input type="submit" value="Pošalji" name="posalji" > </th>
	  <th> <a href="pdf.php"> Skini kontakte u pdf-u </a> </th>
	 
	</tr>
  </form> 
  </table>



</div>
</div>



<footer  class="footer" >
 <img src="slike/Naslovna-3.jpg" alt="greska">

<p> Upoznaj okolinu i putuj sa osmijehom!  </p>
<p> putuj@gmail.com </p>

</footer>
</body>

</html>



