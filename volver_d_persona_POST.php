<?php
/**
 * Created by PhpStorm.
 * User: Patri
 * Date: 02-10-2016
 * Time: 18:48
 */
include "conUCV.php";

$rut = $_REQUEST['rut'];
$nombre = $_REQUEST['tipo'];
$estado = $_REQUEST['estado'];
$sql = 'INSERT INTO familia (tipo, familiar, estado) VALUES("'.$nombre.'","'.ip2long($rut).'","'.$estado.'")';
echo $sql;
$resultado = mysql_query($sql, $enlace);

if (!$resultado) {
    echo "Error de BD, no se pudo consultar la base de datos\n";
    echo "Error MySQL:" . mysql_error();
    exit;

}

header("Location: formulario_1.php?rut=$rut");
die();

                /*while ($fila = mysql_fetch_assoc($resultado)) {
                    echo $fila['nombre'];
                }

                mysql_free_result($resultado);*/
            /*}else{
                echo "Error";
            }*/

?>