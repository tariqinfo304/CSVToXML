# XML To CSV Format Using PHP

The provided code is written in PHP and demonstrates how to convert a CSV file to an XML file using the DOMDocument class.
Here's a breakdown of the code:

- The code defines two functions: convertCsvToXmlString and convertCsvToXmlFile.

- The convertCsvToXmlString function takes a CSV string as input and converts it to an XML string. It splits the CSV string into lines, retrieves the headers, creates a DOMDocument object, adds a root node named "policies," and loops through each row to create a <policy> node with the appropriate data. The resulting XML string is echoed.

- The convertCsvToXmlFile function takes an input CSV file and an output XML file as parameters. It opens the CSV file for reading, gets the headers, creates a DOMDocument object, adds a root node named "policies," and loops through each row to create a <policy> node with the correct data. The resulting XML is saved to the output file.

- The code calls the convertCsvToXmlFile function with the input CSV file path ("products_20221027035913.csv") and the output XML file path ("xml/products_20221027035913.xml").

- Overall, this code demonstrates a way to convert CSV data into an XML format using the PHP DOMDocument class.
