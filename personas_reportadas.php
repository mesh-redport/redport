<?php
include "db-connection.php";



?>
<!DOCTYPE html>
<html lang="es">

<?php include "head.php"; ?>

<body>
   <div class="pagina_esp">
   <!-- ======= header======= -->
  <div class="header2">
    <div class="back-button" onclick="history.back()" ><a href="#"><div class="rpicon-back"></div></a></div>
    <div class="title_header"><h1>Personas recientes</h1></div>

  </div>

  <div class="container">

    <!-- caja de comentarios -->
    <div class="container_list">
      <ul id="user_list" class="container_users_list">
        <li class="users_li">

    <?php

function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}
//TU USUARIO
$sql = 'SELECT cord1,cord2,registroIP,detalle FROM personas WHERE cord1 != 0 and registroIP = "'.ip2long($_REQUEST['rut']).'" and detalle = "'.$_SERVER['HTTP_USER_AGENT'].'"';
        $resultado = mysql_query($sql, $enlace);

        if (!$resultado) {
          echo "Error de BD, no se pudo consultar la base de datos\n";
          echo "Error MySQL:" . mysql_error();
          exit;
        }

        while ($fila = mysql_fetch_assoc($resultado)) {
          $array[] = $fila;
          //echo 'mi coord es lat '.$fila['cord1'].' longi '.$fila['cord2'].'<br>';

          //TODOS LOS USUARIOS
          $sql2 = 'SELECT cord1,cord2,registroIP,personas.estado,familiar FROM personas left join familia on registroIP = familiar where cord1 != 0 and registroIP !='.$fila['registroIP'];
          $resultado2 = mysql_query($sql2, $enlace);

          if (!$resultado2) {
            echo "Error de BD, no se pudo consultar la base de datos\n";
            echo "Error MySQL:" . mysql_error();
            exit;
          }

          while ($fila2 = mysql_fetch_assoc($resultado2)) {
            $array2[] = $fila2;

            echo'<div class="user_box"><a href="#"><div class="user_avatar_2"><div class="rpicon-user-';
            if($fila2['estado'] == 0) echo 'good';
            else echo 'bad';
            echo '-small"></div></div><div class="username"><h2 id="user_name" class="username">';
            echo 'Persona';
            if($fila2['familiar']) echo ' con familia';
            echo'</h2><br><p id="distance" class="username">';
            $distancia_real = distance($fila2['cord1'], $fila2['cord2'], $fila['cord1'], $fila['cord2'], "K");

            if($distancia_real == 0) echo "Cerca</p>";
            else if($distancia_real >=1) echo "A ".round($distancia_real,0)." Km.</p>";
            else echo "A ".round($distancia_real*1000,0)." Mt.</p>";

            if( strpos( $fila2['estado'], "1" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-injured"></div></div>';
            }
            if( strpos( $fila2['estado'], "2" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-caught"></div></div>';
            }
            if( strpos( $fila2['estado'], "3" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-chronic-patient"></div></div>';
            }
            echo "</div></a></div>";



          }
        }
?>
        </li>
      </ul>
    </div>

    </div>
  </div>



  </div>
 </body>
</html>
