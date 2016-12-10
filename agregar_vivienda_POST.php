<?php
/**
 * Created by PhpStorm.
 * User: Patri
 * Date: 02-10-2016
 * Time: 18:48
 */
include "db-connection.php";

$rut = $_REQUEST['rut'];
$tipo = $_REQUEST['tipo'];
$estado = $_REQUEST['estado'];
$fuga = $_REQUEST['fuga'];
$albergue = $_REQUEST['albergue'];
$long = ip2long($rut);



$datenow = date("d/m/y - H:i:s");
$c1 = $lati;
$c2 = $longi;
$sql = 'INSERT INTO vivienda (idcreador,fecha,tipo,estado,fugas,albergue) VALUES("'.$long.'","'.$datenow.'","'.$tipo.'","'.$estado.'","'.$fuga.'","'.$albergue.'")';
echo $sql;
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL:" . mysql_error();
    exit;

}

header("Location: home.php?rut=$rut");
die();

?>
