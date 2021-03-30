<?php 
include'../autoload.php';
$session = new Session();
$session->validity();

try {
	echo json_encode(array(
    "icon"=>"success",
    "title"=>"Salio del sistema",
    "text"=>$_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS]
	));
	unset($_SESSION[KEY.ID]);
	unset($_SESSION[KEY.NOMBRES]);
	unset($_SESSION[KEY.APELLIDOS]);
} catch (Exception $e) {
	echo "error".$e->getMessage();
}



 ?>