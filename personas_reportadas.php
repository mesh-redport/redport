<?php
include "conUCV.php";



?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>redport</title>

  <link rel='stylesheet' type='text/css' href='sass/main.css' />
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
   <link href="https://file.myfontastic.com/KHbqgc9xxoCbZJYRdioaqd/icons.css" rel="stylesheet">
   <link rel='stylesheet' type='text/css' href='css/redport.css' />
</head>
 <body>
   <div class="pagina_esp">
   <!-- ======= header======= -->
  <div class="header2">
    <div class="back-button" onclick="history.back()" ><a href="#"><div class="rpicon-back"></div></a></div>
    <div class="title_header"><h1>Personas recientes</h1></div>

  </div>
  <div class="container_search">
    <form action="">
      <a href="#" class="rpicon-search"></a>
      <input class="input_search" type="text" placeholder="Buscar a alguien" id="search_1">
      <label for="search_1"></label>
    </form>
  </div>

  <div class="container">

    <!-- caja de comentarios -->
    <div class="container_list">
      <ul id="user_list" class="container_users_list">
        <li class="users_li">

    <?php

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::                                                                         :*/
/*::  This routine calculates the distance between two points (given the     :*/
/*::  latitude/longitude of those points). It is being used to calculate     :*/
/*::  the distance between two locations using GeoDataSource(TM) Products    :*/
/*::                                                                         :*/
/*::  Definitions:                                                           :*/
/*::    South latitudes are negative, east longitudes are positive           :*/
/*::                                                                         :*/
/*::  Passed to function:                                                    :*/
/*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
/*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
/*::    unit = the unit you desire for results                               :*/
/*::           where: 'M' is statute miles (default)                         :*/
/*::                  'K' is kilometers                                      :*/
/*::                  'N' is nautical miles                                  :*/
/*::  Worldwide cities and other features databases with latitude longitude  :*/
/*::  are available at http://www.geodatasource.com                          :*/
/*::                                                                         :*/
/*::  For enquiries, please contact sales@geodatasource.com                  :*/
/*::                                                                         :*/
/*::  Official Web site: http://www.geodatasource.com                        :*/
/*::                                                                         :*/
/*::         GeoDataSource.com (C) All Rights Reserved 2015              :*/
/*::                                                                         :*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
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
          $sql2 = 'SELECT cord1,cord2,registroIP FROM personas WHERE cord1 != 0 and registroIP !='.$fila['registroIP'];
          $resultado2 = mysql_query($sql2, $enlace);

          if (!$resultado2) {
            echo "Error de BD, no se pudo consultar la base de datos\n";
            echo "Error MySQL:" . mysql_error();
            exit;
          }

          while ($fila2 = mysql_fetch_assoc($resultado2)) {
            $array2[] = $fila2;

            echo'<div class="user_box"><a href="#"><div class="user_avatar_2"><div class="rpicon-user-good-small"></div></div><div class="username"><h2 id="user_name" class="username">';
            echo /*$fila2['registroIP']*/'Persona'.'</h2><br><p id="distance" class="username">A ';
            $distancia_real = distance($fila2['cord1'], $fila2['cord2'], $fila['cord1'], $fila['cord2'], "K");
            if($distancia_real >=1) echo round($distancia_real,0)." Km.</p></div></a></div>";
            else echo round($distancia_real*1000,0)." Mt.</p></div></a></div>";


          
          }
        }
?>




            
            <!--
              <div class="user_box">
                <a href="#">
                  <div class="user_avatar_2"><div class="rpicon-user-good-small"></div></div>
                  <div class="username">
                  <h2 id="user_name" class="username">nombre_apellido</h2>
                  <p id="distance" class="username">A 2 km</p>
                  </div>
                </a>
              </div>
            
            
              <div class="user_box">
                <a href="#">
                  <div class="user_avatar_2"><div class="rpicon-user-good-small"></div></div>
                  <div class="username">
                  <h2 id="user_name" class="username">nombre_apellido</h2>
                  <p id="distance" class="username">A 5 km</p>
                  </div>
                </a>
              </div>
            
            
              <div class="user_box">
                <a href="ficha_persona.html">
                  <div class="user_avatar_2"><div class="rpicon-user-bad-small"></div></div>
                  <div class="username">
                  <h2 id="user_name" class="username">nombre_apellido</h2>
                  <p id="distance" class="username">A 7 km</p>
                  <span data-tooltip="Paciente crónico"><div class="state_user_box"><div class="rpicon-chronic-patient"></div></div></span>
                  <div class="state_user_box"><div class="rpicon-trapped"></div></div>
                  <div class="state_user_box"><div class="rpicon-injured"></div></div>
                  </div>
                </a>
            </div>
            <div class="user_box">
                <a href="#">
                  <div class="user_avatar_2"><div class="rpicon-user-good-small"></div></div>
                  <div class="username">
                  <h2 id="user_name" class="username">nombre_apellido</h2>
                  <p id="distance" class="username">A 10 km</p>
                </a>
              </div>
            </div>
            <div class="user_box">
                <div class="user_avatar_2"><div class="rpicon-user-bad-small"></div></div>
                <div class="username">
                <h2 id="user_name" class="username">nombre_apellido</h2>
                <p id="distance" class="username">A 13 km</p>
                <div class="state_user_box"><div class="rpicon-chronic-patient"></div></div>  
                <div class="state_user_box"><div class="rpicon-trapped"></div></div>
              </div>
            </div>
            <div class="user_box">
                <div class="user_avatar_2"><div class="rpicon-user-bad-small"></div></div>
                <div class="username">
                <h2 id="user_name" class="username">nombre_apellido</h2>
                <p id="distance" class="username">A 18 km</p>
                <div class="state_user_box"><div class="rpicon-trapped"></div></div>
                <div class="state_user_box"><div class="rpicon-injured"></div></div>
              </div>
            </div>
            <div class="user_box">
                <div class="user_avatar_2"><div class="rpicon-user-bad-small"></div></div>
                <div class="username">
                <h2 id="user_name" class="username">nombre_apellido</h2>
                <p id="distance" class="username">A 22 km</p>
                <div class="state_user_box"><div class="rpicon-trapped"></div></div>
              </div>
            </div>
            <div class="user_box">
                <div class="user_avatar_2"><div class="rpicon-user-bad-small"></div></div>
                <div class="username">
                <h2 id="user_name" class="username">nombre_apellido</h2>
                <p id="distance" class="username">A 28 km</p>
                <div class="state_user_box"><div class="rpicon-chronic-patient"></div></div>
              </div>
            </div>
            <div class="user_box">
                <div class="user_avatar_2"><div class="rpicon-user-bad-small"></div></div>
                <div class="username">
                <h2 id="user_name" class="username">nombre_apellido</h2>
                <p id="distance" class="username">A 27 km</p>
                <div class="state_user_box"><div class="rpicon-chronic-patient"></div></div>
                <div class="state_user_box"><div class="rpicon-trapped"></div></div>
                <div class="state_user_box"><div class="rpicon-injured"></div></div>
              </div>
            </div>-->
            
        </li>
      </ul>
    </div>
    
    </div>
  </div>



  </div>
 </body>
</html>