<!DOCTYPE html>

<html> 
<head> 

<META http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> TuristickeDestinacije-naslovna </title>
<link rel="stylesheet" href="stil.css">
<script src="js/FunkcijaUcitavanje.js"></script>
<script type="text/javascript" src="js/uvecaj.js"></script>
<script type="text/javascript" src="js/ValidacijaDatum.js"></script>
<script type="text/javascript" src="js/ValidacijaKontakt.js"></script>
<script type="text/javascript" src="js/ValidacijaNaslovna.js"></script>
 
</head>

<body>
<?php
if(isset($_REQUEST['potvrdi']))
{
	
	$xml=new DOMDocument("1.0", "UTF-8");
	$xml->load("spasavanje.xml");
	$rootTag=$xml->getElementsByTagName("document")->item(0);
	$dataTag= $xml->createElement("data");
	$UsernameTag=$xml->createElement("username", $_REQUEST['username']);
	$PasswordTag=$xml->createElement("password", $_REQUEST['password']);
	$dataTag->appendChild($UsernameTag);
	$dataTag->appendChild($PasswordTag);
	$rootTag->appendChild($dataTag);
	$xml->save("spasavanje.xml");
	
}


$msg = '';
  
	

	  $error = '';
			$ima = true;
			$ok= false;
	
          
            if (isset($_POST['potvrdi']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			{
				$user1 = $_POST['username'];
				$pass = $_POST['password'];
				
				
				
  $servername = "localhost";
$username = "amina";
$password = "password";
$dbname = "turisticke-destinacije";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT id, username, password FROM admin";
$result = $conn->query($sql);


 
 
  while($row = $result->fetch_assoc())
  {
				
		
			
				 
					$ima = false;
				
					$userr=$row["username"];
					$passs=$row["password"];
					
					if($userr == $user1 && $passs==$pass ){
						$_SESSION['login'] = true;
						
						$error="";
						$ima = true;
						$ok = true;
						break;
					}
					
				}
				
				if($ima ) {
				echo '<script>alert("Logovan");</script>';
				header("Location: dodavanje.php");
			}
		
				
  }	
	
	

	?>
	


<?php
if(isset($_POST['potvrdi']))
{
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


			
	
				$username= $_POST['username'];
		$password= $_POST['password'];
				
				
			$sql= "INSERT INTO admin( username, password)
			VALUES ( '$username', '$password')";
				
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

<div id="polje" >

<div class="red1Naslovna">
<div>
<h1> Najljepše Turističke Destinacije </h1> </div>

<div class="kolona1">


<h3> Dobro došli! </h3>
<p>Ako volite da učite o prirodi i prirodnim ljepota i želite da upoznate najljepša mjesta koja se nalaze u vašoj bližoj i daljoj okolini, nalazite se na pravom mjestu.
Sa nama možete da isplanirate i putovanje prema Vašim željama i da rezervišete neke od najboljih profesionalnih vodiča.

</div>



<div class="kolona2">
<img src="slike/Naslovna-2.jpg" alt="greska">


</div>

</div>


<div class="red2Naslovna">


  <p> <b> Prijavi se </b> </p>
 
	
 <form  action="index.php" method="post" name="naslovna"  onsubmit=' return ProvjeriNaslovnu()'>
<table>

    <tr> <th>
  
    <label for="username">Username</label>
	</th>
	<th>
    <input type="text" id="username" name="username" placeholder= "admin"  onchange="ProvjeriUsername()">

	
     <p id="UsernameGreska"> </p>
	 </th>
	</tr>
<tr>	
	<th>

    <label for="password">Password</label>
	</th>
	<th>
    <input type="text" id="password" name="password" placeholder="tajna" onchange="ProvjeriPassword()">
	  <p id="PasswordGreska"> </p>
	</th>

	<th>
	
	<input type="submit" id="potvrdi" value="Pošalji " name="potvrdi" >
	  <p id="FormaGreska"> </p>
	  
	</th>
	  
	  <td>
	  <a href="prebaci-admina.php" > Prebaci korisnike </a>
	
	  </td>
	</tr>
	  <tr>
	<h4 class = "poruka"><?php
			if(!$ima){
			echo '<p>Pogrešan password ili username!!</p>';
			}
			?>
			</h4>
	</tr>
	</table>
	
  </form> 
 <p> <a href = "Logout.php" tite = "Logout"> Odjavi se </a> </p>
  
  
</div>

</div>

</div>

<footer  class="footer" >
 <img src="slike/Naslovna-3.jpg" alt="greska">

<p> Upoznaj okolinu i putuj sa osmijehom!  </p>
<p>  putuj@gmail.com </p>


</footer>




</body>
</html>
