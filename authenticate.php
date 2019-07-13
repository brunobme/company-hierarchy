<?php

$password = $_POST['password'];
$db_pass = "letshacktogether"; //
$authenticated = false;

if($password == $db_pass){
    $authenticated = true;
} 

if($authenticated){
    echo "success";
    header("refresh: .1; url= index.php"); 
}else{
    echo "authenticate";
?>  
    <form id="authenticate" action="index.php" method="POST">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Submit</button>
    </form>
<?php 
    exit();
}
?>


