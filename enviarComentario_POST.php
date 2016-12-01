<?php
include "conUCV.php";

$rut = $_REQUEST['rut'];
$description = $_REQUEST['comentarioM'];
$datenow = date("d/m/y - H:i:s");
$ubix = $_REQUEST['cord1C'];
$ubiy = $_REQUEST['cord2C'];

$sql = 'INSERT INTO comentarios (ipautor,comentario,fecha,ubicacionX,ubicacionY) VALUES("'.ip2long($rut).'","'.$description.'","'.$datenow.'","'.$ubix.'","'.$ubiy.'")';
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL:" . mysql_error();
    exit;

}
	//header("Location: home.php?rut=$rut#reportesAJAX");
	die();


