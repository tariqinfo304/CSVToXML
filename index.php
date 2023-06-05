<?php 


//function to convert csv to xml string
function convertCsvToXmlString($csv_string) {
	// split rows into lines
	$lines = explode(PHP_EOL, $csv_string);
	
	// retrieve headers
	$headers = explode(',', array_shift($lines));
	
	// Create a new dom document with pretty formatting
	$doc  = new DomDocument();
	$doc->formatOutput   = true;
	
	// Add a root node to the document
	$root = $doc->createElement('policies');
	$root = $doc->appendChild($root);
	
	// Loop through each row creating a <policy> node with the correct data
	foreach ($lines as $line)
	{
		$row = str_getcsv($line);
		$container = $doc->createElement('policy');
		
		foreach($headers as $i => $header)
		{
			$child = $doc->createElement($header);
			$child = $container->appendChild($child);
			$value = $doc->createTextNode($row[$i]);
			$value = $child->appendChild($value);
		}
		$root->appendChild($container);
	}
	
	$strxml = $doc->saveXML();
	
	echo $strxml;
}
function convertCsvToXmlFile($input_file, $output_file) {
	// Open csv file for reading
	$inputFile  = fopen($input_file, 'rt');
	
	// Get the headers of the file
	$headers = fgetcsv($inputFile);
	
	// Create a new dom document with pretty formatting
	$doc  = new DomDocument();
	$doc->formatOutput   = true;
	
	// Add a root node to the document
	$root = $doc->createElement('policies');
	$root = $doc->appendChild($root);
	
	// Loop through each row creating a <policy> node with the correct data
	while (($row = fgetcsv($inputFile)) !== FALSE)
	{
		$container = $doc->createElement('policy');
		
		foreach($headers as $i => $header)
		{
			$child = $doc->createElement($header);
			$child = $container->appendChild($child);
			$value = $doc->createTextNode($row[$i]);
			$value = $child->appendChild($value);
		}
		$root->appendChild($container);
	}
	
	$strxml = $doc->saveXML();
	
	$handle = fopen($output_file, "w");
	fwrite($handle, $strxml);
	fclose($handle);
}


convertCsvToXmlFile("products_20221027035913.csv", "xml/products_20221027035913.xml");


?>