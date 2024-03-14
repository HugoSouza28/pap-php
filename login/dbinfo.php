<?php 

$bdlocalhost='localhost';
$bdusername='root';
$bdpassword='';
$bdbasedados='paphugo';

function QueryDB($instrucao){	
	global $bdlocalhost;global $bdusername; global $bdpassword; global $bdbasedados;
	$conn = mysqli_connect($bdlocalhost, $bdusername, $bdpassword,$bdbasedados);
	mysqli_set_charset($conn,"utf8");	
	$result = mysqli_query($conn, $instrucao);
	return $result;							
	mysqli_close($conn);
}

?>