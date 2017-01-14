<?php



$filexml='destinacije.xml';

    if (file_exists($filexml)) 
           {
       $xml = simplexml_load_file($filexml);
       $f = fopen('destinacije.csv', 'w');
       createCsv($xml, $f);
       fclose($f);
    }

    function createCsv($xml,$f)
    {

        foreach ($xml->destinacija as $destinacija) 
        {

           $hasChild = (count($destinacija->name ) > 0)?true:false;

        if( ! $hasChild)
        {
           $put_arr = array($destinacija['name'], $destinacija->slika); 
           fputcsv($f, $put_arr ,',','"');
		    outputCSV(array(
       $put_arr
    ),'destinacije.csv');
		   }
        else
        {
         createCsv($item, $f);
        }
     }
      

        }
    
	
	
 function outputCSV($data,$file_name = 'destinacije.csv') {
       # output headers so that the file is downloaded rather than displayed
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=$file_name");
        # Disable caching - HTTP 1.1
        header("Cache-Control: no-cache, no-store, must-revalidate");
        # Disable caching - HTTP 1.0
        header("Pragma: no-cache");
        # Disable caching - Proxies
        header("Expires: 0");
    
        # Start the ouput
        $output = fopen("php://output", "w");
        
         # Then loop through the rows
        foreach ($data as $row) {
            # Add the rows to the body
            fputcsv($output, $row); // here you can change delimiter/enclosure
        }
        # Close the stream off
        fclose($output);
    }
	
?>


