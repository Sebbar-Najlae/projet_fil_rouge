<?php
if(!session_id()) session_start();



$dbhost 	= "localhost";
$dbname		= "remyurda";
$dbuser		= "root";
$dbpass		= "";
 
// database connection
try{
	$_db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", 
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true
                ));	
}catch(Excepion $e){
	die("ERROR : ".$e->getMessage());
}
?>