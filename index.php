<?php 

require 'authenticate.php';

$inputEmployees = array(
	'Hanno Renner' => 'Arseniy',
	'Bruno' => 'Hanno Renner',
	'Líbene Fernandes' => 'Hanno Renner',
	'Danang Arbansa Nur' => 'Hanno Renner'
);

//error loop
//error multiple root 

$method = $_SERVER['REQUEST_METHOD'];

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

function do_sth($method){
	echo $method;
}

switch ($method) {
  case 'PUT':
    do_sth($method);  
    break;
  case 'POST':
    do_sth($method);  
    break;
  case 'GET':
    do_sth($method); 
    $ticketsJSON = file_get_contents('tickets.json');
    $tickets = json_decode($ticketsJSON, true);
    $totalScore = 0; 
    print_r($inputEmployees);
    break;
  default:
    handle_error($method);  
    break;
} 

?>
<!DOCTYPE html>

<head>
	<title>HR Company hierarchy</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div id="app">
		
	</div>	
</body>

</html>