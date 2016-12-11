<?php
/**
 * Created by PhpStorm.
 * User: Patri
 * Date: 02-10-2016
 * Time: 18:48
 */
include "db-connection.php";

$rut = $_REQUEST['rut1'];
$lati = $_REQUEST['latitu1'];
$longi = $_REQUEST['longitu1'];
$long = ip2long($rut);



$datenow = date("d/m/y - H:i:s");
$c1 = $lati;
$c2 = $longi;

//agregar persona
$sql1 = 'INSERT INTO personas (registroIP,dateLogin, cord1, cord2,detalle) VALUES("'.$long.'","'.$datenow.'","'.$c1.'","'.$c2.'","'.$_SERVER['HTTP_USER_AGENT'].'")';
$resultado1 = mysql_query($sql1, $enlace);

//poner grave
$sql2 = "UPDATE personas SET tipo = '1', estado = '123' WHERE registroIP = '".$long."' and detalle = '".$_SERVER['HTTP_USER_AGENT']."'";
$resultado2 = mysql_query($sql2, $enlace);

//mandar mensaje
$sql3 = 'INSERT INTO comentarios (ipautor,comentario,fecha,ubicacionX,ubicacionY) VALUES("'.$long.'","NECESITO AYUDA URGENTE","'.$datenow.'","'.$c1.'","'.$c2.'")';
$resultado3 = mysql_query($sql3, $enlace);

header("Location: home.php?rut=$rut");
die();

?>
