<?php
	
try {
	$baseInstall = file_get_contents("create_congregation_base.sql");
	$bd = new PDO('sqlite:/Users/samuelgarcia/www/conferencias/conference.db:');

	$results = $bd->exec($baseInstall);

	$arr = array ('status'=> 200, 'message'=>'Successfully install basic system');	
} catch(Exception $e){
	echo(var_dump($e));
	$arr = array ('status'=> 500, 'message'=>'error installing basic system');
}	


 echo json_encode($arr);