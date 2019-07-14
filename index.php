<?php 

//NICE TO: update to OAuth 2.0 authentication 
$dbPass = "letshacktogether"; 
$secretCode = $_GET['secretCode'];

if(!isset($secretCode)){
	http_response_code(401);
}

require 'load-employees.php';

switch ($_SERVER['REQUEST_METHOD']) {
	//API response to each type of request
  	case 'POST':
  		if($secretCode == $dbPass){
  			$inputEmployeesJSON = file_get_contents("php://input");
  			
  			if(validate_employees_json($inputEmployeesJSON)){
  				// $inputEmployees = json_decode($inputEmployeesJSON);
  				// file_put_contents('input-employees.json', $inputEmployeesJSON);	
  			}
  			
  			
	    }else{
			http_response_code(403); // incorrect pass
		}
    	
    	break;

	case 'GET': 

		if($secretCode == $dbPass){


			if($_GET['url'] == 'employees'){

				$inputEmployeesJSON = file_get_contents('input-employees.json');

				if(isset($_GET['name'])){
					$inputEmployees = json_decode($inputEmployeesJSON, true);

					if(in_array($_GET['name'], $inputEmployees) || isset($inputEmployees[$_GET['name']])){
						$employee = $_GET['name'];
						$supervisor = $inputEmployees[$_GET['name']];
						$supervisors = $inputEmployees[$supervisor];	
						echo $supervisors . " => " . $supervisor . " => " . $employee;
					}else{
						echo "Employee not registered. Please post an updated employees data";
					}
				}else{
		    		print_r($inputEmployeesJSON); 
		    		
				}
				
				http_response_code(200);
		    }


		}else{
			http_response_code(403); // incorrect pass
		}
	    
	    break;

	default:
	    http_response_code(405); //method not allowed
	    break;
}

?>