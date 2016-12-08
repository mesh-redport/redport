<?php

/**
 * Created by PhpStorm.
 * User: Patri
 * Date: 02-10-2016
 * Time: 17:39
 */

error_reporting(E_ALL ^ E_DEPRECATED);

$servername = "127.0.0.1";
$username = "root";
$password = "";
//$password = ""; //PARA LOCALHOSTEAR SIN ROOT
$dbname = "mesh_redport";


$enlace = mysql_connect($servername, $username, $password);

mysql_set_charset('utf8',$enlace);

if (!$enlace) {
    die('No se pudo conectar : ' . mysql_error());
}

// Hacer que foo sea la base de datos actual
$bd_seleccionada = mysql_select_db($dbname, $enlace);
if (!$bd_seleccionada) {
    die ('No se puede usar : ' . mysql_error());
}
?>

<!DOCTYPE html>
<head>
    <meta name="theme-color" content="#ffce00" />
</head>
</html>
