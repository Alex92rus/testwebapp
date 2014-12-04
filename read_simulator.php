<?php
$url = 'http://qualoccupy.azurewebsites.net/add_data_simulator.php';
$handle = fopen("inputfile.csv", "r");
if ($handle) {
    while (($data = fgetcsv($handle)) !== false) {
	
		$fields = array(
								'DoorID' => urlencode($data[0]),
								'transition' => urlencode($data[1]),
								'Confidence' => urlencode($data[2])
						);

		$fields_string =  http_build_query( $fields ) ;

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		echo $fields_string;
		//execute post
		$result = curl_exec($ch);	
		curl_close($ch);	// free url resources (ch also). Could slow down execution to emulate reality
	
    }
} else {
    // error opening the file.
} 
fclose($handle);
?>