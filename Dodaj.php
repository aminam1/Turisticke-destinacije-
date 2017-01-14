<?php
/*
if(isset($_POST ['dodaj'])){
	
	
	$destinacije=simplexml_load_file('destinacije.xml');
	$destinacija=$destinacije->addChild('destinacija');
	$destinacija->addAttribute('name', $_POST['name']);
	$destinacija->addChild('tekst', $_POST['tekst']);
	$destinacija->addChild('slika', $_POST['slika']);
	file_put_contents('destinacije.xml', $destinacije->asXML());
	header('location: dodavanje.php');
	
	
}
*/

?>
<?php
if(isset($_POST['dodaj']))
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


			


	
				$naziv= $_POST['name'];
				$detalji= $_POST['tekst'];
				$url= $_POST['slika'];
		
				
				
				
			$sql= "INSERT INTO destinacije( admin, naziv, detalji, url)
			VALUES ( '1', '$naziv', '$detalji', '$url')";
				
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

					
				$conn->close();	
					

	header('location: dodavanje.php');



}

	





?>

<form method="post" >
<table cellpadding="2" cellspacing="2">
<tr>
<td> Naziv lokacije </td>
<td> <input type="text" name="name"> </td>
</tr>
<tr>
<td> Dodatne informacije </td>
<td> <input type="text" name="tekst"> </td>
</tr>
<tr>
<td> Url slike</td>
<td> <input type="text" name="slika"> </td>
</tr>
<tr>
<td> &nbsp; </td>
<td> <input type="submit" name="dodaj" value="Dodaj"> </td>
</tr>
</table>
</form>

