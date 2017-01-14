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

$podaci=simplexml_load_file('komentari.xml');
			

foreach($podaci->komentar as $podatak) {
	
				$user= $podatak->text;
		
				
				
				$isti= " SELECT *FROM komentar where komentar='$user'";
				$broj= $conn->query($isti);
				if($broj->num_rows <1)
				{
			$sql= "INSERT INTO komentar( admin, komentar)
			VALUES ( '1', '$user')";
				
				if (mysqli_query ($conn, $sql))
				{
					echo "Uspjesno ste dodali novu destinaciju u bazu!";
				}
				else{
					echo "Greška pri učitavanju u bazu!";
				}
					
					
					}}

					
header('location: dodavanje.php');


?>