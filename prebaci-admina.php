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

$podaci=simplexml_load_file('admin.xml');
			

foreach($podaci->podatak as $podatak) {
	
				$user= $podatak->username;
				$pass= $podatak->password;
				
				
				$isti= " SELECT *FROM admin where username='$user'";
				$broj= $conn->query($isti);
				if($broj->num_rows <1)
				{
			$sql= "INSERT INTO admin( username, password)
			VALUES ( '$user', '$pass')";
				
				if (mysqli_query ($conn, $sql))
				{
					echo "Uspjesno ste dodali novu destinaciju u bazu!";
				}
				else{
					echo "Greška pri učitavanju u bazu!";
				}
					
					
					}}

					
header('location: index.php');


?>