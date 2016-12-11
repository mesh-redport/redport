<?php include "db-connection.php"; ?>

<!DOCTYPE html>

<html lang="es">

<?php include "head.php"; ?>

<body>
  <div class="pagina_test">

    <!-- ======= header======= -->
    <div class="header">
      <div class="title_header">
        <div class="logo">
          <img src="img/Logo_redport_web.png" alt="logo_redport">
        </div>
      </div>
      <div class="menu-button"><a href="#"><div class="rpicon-menu"></div></a></div>
    </div>

    <?php include "menu.php" ?>

    <!-- ======= Fin header======= -->
    <?php

    $shots = mysql_query("SELECT id,fecha,hora,tipo,lugar,alerta,intensidad,magnitud FROM mesh_redport.evento ORDER BY id DESC LIMIT 1;") or die(mysql_error());

    while($row = mysql_fetch_assoc($shots)) {

      if($row["alerta"] == "Temprana Preventiva"){
        echo "<div class='event_box_green'>";
      }else if($row["alerta"] == "Amarilla"){
        echo "<div class='event_box_yellow'>";
      }else if($row["alerta"] == "Roja"){
        echo "<div class='event_box_red'>";
      }
      echo "<h1>Alerta ".$row["alerta"]." por ".$row["tipo"]."</h1>";
      echo "<div class='event_content'>";
      if($row["alerta"] == "Temprana Preventiva"){
        echo "<div class='number_box_green'>";
        echo "<p id='numero'>7.5º</p>";
      }else if($row["alerta"] == "Amarilla"){
        echo "<div class='number_box_yellow'>";
        echo "<p id='numero'>7.5º</p>";
      }else if($row["alerta"] == "Roja"){
        echo "<div class='number_box_red'>";
        echo "<p id='numero'>7.5º</p>";
      }
      echo "</div><div class='table'><table><tr><td class=\"celda\"><p class=\"table_text\">Fecha:</p></td>";
      echo "<td><p class=\"table_text\">".$row["fecha"]."</p></td></tr><tr><td class=\"celda\"><p class=\"table_text\">Hora:</p></td>";
      echo "<td><p class=\"table_text\">".$row["hora"]."</p></td></tr><tr><td class=\"celda\"><p class=\"table_text\">Lugar:</p></td>";
      echo " <td><p class=\"table_text\">".$row["lugar"];
      if(strlen($row["lugar"]) < 5){ echo " Region"; };
      echo "</p></td></tr><tr>";
      if($row["intensidad"]) {
        echo "<td class=\"celda\"><p class=\"table_text\">Intensidad:</p></td>";
        echo " <td><p class=\"table_text\">" . $row["intensidad"] . " </p></td>";
      };
      echo "</tr><tr><td class=\"celda\"><p class=\"table_text\">Magnitud:</p></td>";
      echo " <td><p class=\"table_text\">".$row["magnitud"]." Ricther</p></td>";


    } ?>
  </tr>
</table>
</div>
</div>

<div class="container_button">
 <a id="btn_display" class="button_two_event" href="#">Ver alertas</a>
 <a class="button_two_event" href="eventos.html">ver registro</a>
</div>

<div id="display_content" class="effects">
  <h1 id="title_form">Alertas</h1>

  <div class="alert">
    <?php

    $shots = mysql_query("SELECT id,fecha,hora,tipo,lugar,alerta,intensidad,magnitud,detalle FROM mesh_redport.evento ORDER BY id DESC;") or die(mysql_error());

    while($row = mysql_fetch_assoc($shots)) {

      echo '<span class="alert_date">'.$row["fecha"].'</span><span class="alert_hour">'.$row["lugar"].'</span>';
      echo '<p class="alerts">'.$row["detalle"].'</p>';

    } ?>
  </div>
</div>
</div>

<div class="container" id="indicatorsAJAX">
  <h1>Indicadores ambientales</h1>


  <div class="indicators">

    <?php

    $shots = mysql_query("SELECT id,tipo,valor,fecha FROM mesh_redport.sensores ORDER BY id DESC LIMIT 3;") or die(mysql_error());

    while($row = mysql_fetch_assoc($shots)) { ?>
    <div class="indicator">
      <?php
      if($row["tipo"] == "Temperatura"){
        echo "<div class='rpicon-temperature'></div>";
      }else if($row["tipo"] == "UV"){
        echo "<div class='rpicon-uv'></div>";
      }else if($row["tipo"] == "Humedad"){
        echo "<div class='rpicon-humedity'></div>";
      }

      if($row["tipo"] == "Temperatura"){
        echo "<p class='text_indicator'>".round($row['valor'])."°C</p>";
      }else if($row["tipo"] == "UV"){

        if(round($row["valor"]) <= 2){
          echo "<p class='text_indicator' style='color:#41ab4b;'>BAJO</p>";
        }else if(round($row["valor"]) <= 5){
          echo "<p class='text_indicator' style='color:orange;'>MEDIO</p>";
        }else if(round($row["valor"]) <= 7){
          echo "<p class='text_indicator' style='color:orangered;'>ALTO</p>";
        }else if(round($row["valor"]) <= 10){
          echo "<p class='text_indicator' style='color:#f71138;'>MUY ALTO</p>";
        }else if(round($row["valor"]) >= 11){
          echo "<p class='text_indicator' style='color:#7a58dc;'>EXTREMO</p>";
        }
      }else if($row["tipo"] == "Humedad"){
        echo "<p class='text_indicator'>".round($row['valor'])."%</p>";
      }


      if($row["tipo"] == "UV"){
        //echo "<span class='text_uv'>uv</span>";
        echo "<div class='bar_background'></div>";
        echo "<div class='bar_uv' style='width: ".(abs($row['valor']*100)+10)."%;'></div>";
      }else if($row["tipo"] == "Temperatura"){
        echo "<div class='bar_background'></div>";
        echo "<div class='bar_t' style='width: ".(abs($row['valor'])/50*75)."%;'></div>";
      }else if($row["tipo"] == "Humedad"){
        echo "<div class='bar_background'></div>";
        echo "<div class='bar_h' style='width: ".(abs($row['valor'])/100*75)."%;'></div>";
      }

      ?>
      <!--<p class="text_indicator">soleado</p>
      <span class="text_uv">uv</span>
      <div class="bar_uv_background"></div>
      <div class="bar_uv"></div>-->
    </div>

    <!--<div class="feedbody">
      <div class="title"><?php echo $row["valor"]; ?></div>
      <div class="feed-data">: gets a pass from <span><?php echo $row["tipo"]; ?></span> and he takes a shot!</div>
    </div>-->
    <?php } ?>


  </div>
</div>

<div class="container" id="mi_ficha">
 <a class="button_edit" href="#"><div class="rpicon-edit"></div></a>
 <div class="edit_title"><h1 class="title-icon">Ficha de información</h1></div>
 <div class="perfil_persona">
  <div class="usuario_personal"><div class="rpicon-user-good"></div></div>
  <!--<p id="nombre_personal">Gloria Aracena</p>-->
</div>
<h2>Te encuentras con</h2>
<ul class="name_list">
  <div class="list_box">
    <?php
    $array = null;

    if($_REQUEST['rut']) {
      $rut = $_REQUEST['rut'];
      $sql = 'SELECT tipo,estado FROM familia WHERE familiar = ' . ip2long($rut);
      $resultado = mysql_query($sql, $enlace);

      if (!$resultado) {
        echo "Error de BD, no se pudo consultar la base de datos\n";
        echo "Error MySQL:" . mysql_error();
        exit;
      }

      while ($fila = mysql_fetch_assoc($resultado)) {
        $array[] = $fila;

          //echo $fila['nombre'];
      }

      mysql_free_result($resultado);
    }else{
      echo "Error";
    }


      //$array = array(1, 2, 3, 4);
      /*foreach ($array as &$valor) {
          $valor = $valor * 2;
        }*/
      // $array ahora es array(2, 4, 6, 8)

      // sin unset($valor), $valor aún es una referencia al último elemento: $array[3]
        if($array!= null) {
          foreach ($array as $clave) {
          // $array[3] se actualizará con cada valor de $array...
            echo '<div class="text_box_2">';

            echo '<div class="icon_box_f">';
            if( strpos( $clave['estado'], "1" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-injured"></div></div>';
            }
            if( strpos( $clave['estado'], "2" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-caught"></div></div>';
            }
            if( strpos( $clave['estado'], "3" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-chronic-patient"></div></div>';
            }
            if( strpos( $clave['estado'], "4" ) !== false ) {
              echo '<div class="state_user_box"><div class="rpicon-dead"></div></div>';
            }

            echo '</div><li>';

            if ($clave['tipo'] == 0) {
              echo "Menor";
            } elseif ($clave['tipo'] == 1) {
              echo "Adulto";
            } elseif ($clave['tipo'] == 2) {
              echo "3ª Edad";
            } else {
              echo "Especial";
            }


            echo '</li>';
            echo '</div>';


          }
        }

        ?>

      </div>
    </ul>

    <div class="toggle_box">
      <div class="text_box_3">
        <form action="agregar_persona_POST.php" class="login-rut" method="POST">
          <p id="text_button">Agregar otra persona</p>
          <button id="btn_reportar" class="button_small_two" type="submit" >+</button>
          <input type="text" hidden id="rut" name="rut" value="<?php echo $_REQUEST['rut']; ?>">

        </form>
      </div>
    </div>

  </div>

  <div id="hogar" class="container">
    <a class="button_edit" href="estado_hogar.php?rut=<?php echo $_REQUEST['rut']; ?>"><div class="rpicon-edit"></div></a>
    <div class="edit_title"><h1 class="title-icon">Estado de mi hogar</h1></div>


    <?php

    $casas = mysql_query("SELECT id,idcreador,tipo,estado,fugas,albergue,fecha FROM mesh_redport.vivienda WHERE idcreador = '".ip2long($_REQUEST['rut'])."' ORDER BY id DESC LIMIT 1;") or die(mysql_error());

    while($row = mysql_fetch_assoc($casas)) {

      if($row["tipo"] == "1"){
        echo '<div class="home-icon-container"><div class="rpicon-appartment"></div></div><h2 class="texto_vivienda">Departamento</h2>';
      }else {
        echo '<div class="home-icon-container"><div class="rpicon-home"></div></div><h2 class="texto_vivienda">Casa</h2>';
      }
      echo '<ul class="name_list"><div class="list_box">';

      if($row["estado"] == "0"){
        echo '<div class="text_box_2"><li>Sin Daños</li></div>';
      }else if($row["estado"] == "1"){
        echo '<div class="text_box_2"><li>Daño menor</li></div>';
      }else if($row["estado"] == "2"){
        echo '<div class="text_box_2"><li>Daño mayor recuperable</li></div>';
      }else if($row["estado"] == "3"){
        echo '<div class="text_box_2"><li>Destrudia / Irrecuperable</li></div>';
      }

      if($row["fugas"] == "0"){
        echo '<div class="text_box_2"><li>Sin Fugas</li></div>';
      }else if($row["fugas"] == "1"){
        echo '<div class="text_box_2"><li>Fuga de Gas</li></div>';
      }else if($row["fugas"] == "2"){
        echo '<div class="text_box_2"><li>Fuga de Agua</li></div>';
      }

      if($row["albergue"] == "1"){
        echo '<div class="text_box_2"><li>No necesita albergue</li></div>';
      }else if($row["albergue"] == "0"){
        echo '<div class="text_box_2"><li>Necesita albergue</li></div>';
      }

    }

      ?>

      </div>
    </ul>
  </div>


  <div class="container">
   <div class="map_people">

     <?php

     $sql = 'SELECT cord1,cord2,registroIP,detalle FROM personas WHERE cord1 != 0 ';
     $resultado = mysql_query($sql, $enlace);

     $número_filas = mysql_num_rows($resultado);

     echo '<p id="texto_mapa">'.$número_filas;
     ?>

     personas reportadas</p>
     <a class="button_two" href="personas_reportadas.php?rut=<?php echo $_REQUEST['rut'];?>">ver más</a>
   </div>
   <div class="map">

    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3345.0698151437036!2d-71.58095672261143!3d-33.02829109958188!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scl!4v1468279338455" width="347" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    <!--Mapbox screenshot-->
    <!--<img class="map_content" src="https://api.mapbox.com/styles/v1/cleudio/ciqiooxr70000bjm0krbou6i0/static/-71.579739,-33.029077,12.96,-9.96,30.00/347x250?access_token=pk.eyJ1IjoiY2xldWRpbyIsImEiOiJjaWkxNmUyeGIwMDM5dDNrZnI1N2Y1eGxrIn0.gZNnFCWNxfxUD50feHVsyg" width="347" height="250" alt="Dark" />-->
    <a class="button_two_map" href="reportar_entorno.html">Reporta tu entorno</a>
    <div id='map' style='width: 347px; height: 250px;'></div>

    <script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiY2xldWRpbyIsImEiOiJjaXIxb3o2NTUwMDNvOWhrcTVwaGRudG0xIn0.ve3cEnjZjNjqpYw_hju_cQ';
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/cleudio/ciqiooxr70000bjm0krbou6i0',
        center: [-71.601162, -33.017948],
        zoom: 10
      });
    </script>

  </div>
</div>

<!-- =====Inicio caja de comentarios===== -->
<div class="container" id="reportes">
  <h1><a name="reportes">Últimos reportes cerca<br>de Usted</a></h1>
  <!--Comentar-->
  <div style="height: 150px;">
    <form action="#" class="form-report" id="formulariocomentarios">
      <textarea class="report__box" type="text" id="comentario" name="título" placeholder="Escribe aquí tu reporte" rows="5" cols="5"></textarea>
      <div class="container_button">
        <button id="btn_reportar" class="button_comment" type="submit">Reportar</button>
      </div>
      <input type="text" hidden id="rut" name="rut" value="<?php echo $_REQUEST['rut']; ?>">
      <input type="text" hidden id="comentarioM" name="comentarioM" value="">
      <input type="text" hidden id="cord1C" name="cord1C" value="<?php echo $fila['cord1']; ?>">
      <input type="text" hidden id="cord2C" name="cord2C">
    </form>
  </div>

  <div id="reportesAJAX">

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
    $sql = 'SELECT cord1,cord2,registroIP,detalle FROM personas WHERE cord1 != 0 and registroIP = "'.ip2long($_REQUEST['rut']).'" and detalle = "'.$_SERVER['HTTP_USER_AGENT'].'" LIMIT 1';
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

      $coordenadaX =  $fila['cord1'];
      $coordenadaY =  $fila['cord2'];
      $sql2 = 'SELECT cid,ipautor,ubicacionX,ubicacionY,comentario,fecha,hora,p.estado FROM comentarios LEFT JOIN personas as p on ipautor = registroIP and ubicacionX = cord1 group by cid order by cid desc limit 4';
      $resultado2 = mysql_query($sql2, $enlace);

      if (!$resultado2) {
        echo "Error de BD, no se pudo consultar la base de datos\n";
        echo "Error MySQL:" . mysql_error();
        exit;
      }

      while ($fila2 = mysql_fetch_assoc($resultado2)) {
        $array2[] = $fila2;
        $distancia_real = distance($fila2['ubicacionX'], $fila2['ubicacionY'], $fila['cord1'], $fila['cord2'], "K");

        if($distancia_real <= 2){
          echo'<div class="container_report">
          <ul id="reports_list" class="container_reports">
            <li>
              <a href="ficha_persona.html">
                <div class="user_avatar"><div class="rpicon-user-';
                  if($fila2['estado'] == 0) echo 'good';
                  else echo 'bad';


                  echo '-small"></div></div>
                  <div class="comment_box">
                    <div class="username">
                      <h2 id="name" class="username"> A ';
                        if($distancia_real >=1) echo round($distancia_real,0)." Km.";
                        else echo round($distancia_real*1000,0)." Mt.";
                        echo '</h2>
                      </a>
                      <span class="comment_date">';
                        echo $fila2['fecha'].'</span>
                        <div class="comment_content"><p class="comment">'.$fila2['comentario'].'</p></div>
                      </div>
                    </div>

                  </li>
                </ul>
              </div>';
            }
          }
        }
        ?>
      </div>

      <!-- botón ver más reportes-->
      <div class="button_more">
        <a href="#" class="text_button_more">ver más reportes<div class="rpicon-down"></div></a>
      </div>

    </div>
  </div>
</div>
<!-- =====Fin caja de comentarios===== -->

<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/main.js"></script>
<script>
  //reportes
  var timeout = setInterval(reload, 3000);
  function reload(){
    $('#reportesAJAX').load(location.href + ' #reportesAJAX');
  }
  //sensores
  var timeout1 = setInterval(reloadS, 60000);
  function reloadS(){
    $('#indicatorsAJAX').load(location.href + ' #indicatorsAJAX');
  }

  $('#comentario').change(function() {
    document.getElementById("comentarioM").value = document.getElementById("comentario").value;
    document.getElementById("cord1C").value = "<?php echo $coordenadaX; ?>";
    document.getElementById("cord2C").value = "<?php echo $coordenadaY; ?>";
          // Change occurred so count chars...
        });

  /* Data Insert Starts Here */
  $(document).on('submit', '#formulariocomentarios', function() {

    $.post("enviarComentario_POST.php", $(this).serialize())
    .done(function(data){
     $("#dis").fadeIn('slow', function(){
       $("#dis").html('<div class="alert alert-info">'+data+'</div>');
       $("#emp-SaveForm")[0].reset();
     });
   });
    return false;
  });
  /* Data Insert Ends Here */
</script>
</body>
</html>
