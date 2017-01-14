<?php
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

$podaci=simplexml_load_file('destinacije.xml');
			

foreach($podaci->destinacija as $podatak) {
	
				$naziv= $podatak->name;
				$detalji= $podatak->tekst;
				$url= $podatak->slika;
				echo $naziv;
				$isti= " SELECT *FROM destinacije where naziv='$naziv'";
				$broj= $conn->query($isti);
				if($broj->num_rows <1)
				{
			$sql= "INSERT INTO destinacije (admin, naziv, detalji, url)
			VALUES ( '1', '$naziv', '$detalji', '$url')";
				
				if (mysqli_query ($conn, $sql))
				{
					echo "Uspjesno ste dodali novu destinaciju u bazu!";
				}
				else{
					echo "Greška pri učitavanju u bazu!";
				}
					
					
					}}

					



?>