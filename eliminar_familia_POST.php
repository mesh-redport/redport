<?php
include "db-connection.php";

$rut = $_REQUEST['id'];
$sql = 'DELETE FROM mesh_redport.familia WHERE id ='.$rut.';';
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL:" . mysql_error();
    exit;

}
	//header("Location: home.php?rut=$rut#reportesAJAX");
	die();
