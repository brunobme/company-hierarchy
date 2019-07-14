<?php 

use PHPUnit\Framework\TestCase;
require $_SERVER['DOCUMENT_ROOT'] . "load-employees.php"; 

class loadEmployeesTest extends TestCase{
	
	public function testValidateEmptyEmployeesJSON(){
		$array = [];
		$jsonArray = json_encode($array);
		$this->assertsTrue(validate_employees_json($jsonArray));
	}
}
 
?>
