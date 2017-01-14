<?php
$destinacije=simplexml_load_file('destinacije.xml');
if(isset($_POST['sacuvaj'])){
	foreach($destinacije->destinacija as $destinacija){
		if($destinacija['name']==$_POST['name']){
			$destinacija->tekst=$_POST['tekst'];
			$destinacija->slika=$_POST['slika'];
			break;
		}
	}
	
	file_put_contents('destinacije.xml', $destinacije->asXML());
	header('location: dodavanje.php');
}

foreach($destinacije->destinacija as $destinacija){
	if($destinacija['name']==$_GET['name']){
		$name=$destinacija['name'];
		
		$tekst=$destinacija->tekst;
			
		$slika=$destinacija->slika;
		break;
	}
	
}
?>

<form method="post">
    <table cellpading="2" cellspacing="2">
	   <tr>
	         <td>Naziv lokacije</td>
			 <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
	   </tr>
	   <tr>
	         <td>Dodatne informacije</td>
			 <td><input type="text" name="tekst" value="<?php echo $tekst; ?>"></td>
	   </tr>
	  <tr>
	         <td>URL slike</td>
			 <td><input type="text" name="slika" value="<?php echo $slika; ?>"></td>
	   </tr>
	    <tr>
	         <td>&nbsp;</td>
			 <td><input type="submit" name="sacuvaj" value="Sačuvaj"></td>
	   </tr>
	
	</table>
</form>