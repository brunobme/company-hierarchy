<?php 

//NICE TO: update to OAuth 2.0 authentication 
$dbPass = "letshacktogether"; 
$secretCode = $_GET['code'];

$inputEmployeesJSON = file_get_contents('input-employees.json');
$inputEmployees = json_decode($inputEmployeesJSON, true);

function validate_json($jsonFile){
	//handle error loop and multiple root 	
	$file = json_decode($jsonFile, true);

	//error duplicated: if one key appears more than once, then the managers are duplicated and it should return an error

	$fileUnique = array_unique($file);

	return $treeJSON;

}

function convert_to_tree($jsonFile){
	//assuming that the file is valid adjust that into the desired structure
	$file = json_decode($jsonFile, true);

	$treeJSON = array();

	$parentID = 0;
	$childID = 0;
	foreach ($file as $key => $value) {
		// echo "<p>" . $key . ": " . $value . " </p>";
		$treeJSON[$parentID][$value] = $key;
		$parentID++;
		//KEEP
	}

	return $treeJSON;
}

$inputEmployeesJSON = convert_to_tree($inputEmployeesJSON);

echo "<pre>";
	print_r($inputEmployeesJSON);
echo "</pre>";

exit();

if(!isset($secretCode)){
	http_response_code(401);
}

switch ($_SERVER['REQUEST_METHOD']) {
	//API response to each type of request
  	case 'POST':
  		if($secretCode == $dbPass){

	    }else{
			http_response_code(403); // incorrect pass
		}
    	
    	break;

	case 'GET': 

		if($secretCode == $dbPass){

			if($_GET['url'] == 'employees'){
				$inputEmployeesJSON = file_get_contents('input-employees.json');
				echo '<pre>';
		    		print_r($inputEmployeesJSON); 
		    	echo '</pre>';
		    }else{
		    	echo "no";
		    }

		}else{
			http_response_code(403); // incorrect pass
		}
	    
	    break;

	default:
	    // echo 'The app cannot run this type of request. Look at the <a href="https://github.com/brunobme/company-hierarchy/blob/dev/README.md">README.md</a> file for further details';
	    http_response_code(501);
	    break;
}



?>