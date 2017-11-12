<?php
	
try {
	$baseInstall = file_get_contents("create_congregation_base.sql");

	$bd = new SQLite3('congregation.db');

	$results = $bd->exec($baseInstall);

	$arr = array ('status'=> 200, 'message'=>'Successfully install basic system');	
} catch(Exception $e){
	$arr = array ('status'=> 500, 'message'=>'error installing basic system');
}	


 echo json_encode($arr);