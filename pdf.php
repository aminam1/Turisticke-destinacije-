<?php
require('fpdf.php');


class PDF extends FPDF
{
  function Header()
    {
   
      $this->SetFont('Helvetica','B',15);
      $this->SetXY(50, 10);
	  $this->Ln(20);
      $this->Cell(0,10,'Poruke',1,0,'C');  
	   $this->Ln(35);
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
    
    }
}



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);


$i=1;
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
$sql = "SELECT ime, email, poruka  FROM kontakt";
$result = $conn->query($sql);

 if($result->num_rows > 0){
 
 
  while($row = $result->fetch_assoc())
	{ 
		   
		       
			   $pdf->Cell(0,10,'Ime:'.$row["ime"],0,1);
			   $pdf->Cell(0,10,'Email:'.$row["email"],0,1);
			   $pdf->Cell(0,10,'Poruka:'.$row["poruka"],0,1);
			   
			   
			   $i=$i+1;
 }}
 else {
    echo "0 results";
}
$conn->close();
	
$pdf->Output();
?>