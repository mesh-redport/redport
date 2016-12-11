<?php include "db-connection.php"; ?>

<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>

<body onload="getLocation()">
  <div class="pagina_esp">
  <!-- ======= header======= -->
  <div class="header2">
    <div class="logo">
    <img src="img/Logo_redport_web.png" alt="logo_redport">
  </div>
  </div>

<section class="content"></section>
<div class="container_2">
  <form action="agregar_SOS_POST.php" class="login-rut" method="POST">
      <!--<form action="formulario_1.php" class="login-rut" method="POST">-->

      <input hidden type="text" id="rut1" name="rut1" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
      <input hidden type="text" id="latitu1" name="latitu1" value="">
      <input hidden type="text" id="longitu1" name="longitu1" value="">

      <button id="btn_SOS" class="button_rut button_sos" onclick="getLocation()" type="submit" disabled >Enviar SOS</button>
      <!--<input class="button_rut" type="k  submit" text="Reportarme" />-->
  </form>
</div>

<div class="container">
  <h1>Repórtate</h1>
  <p>Repórta tu estado para que puedas recibir <b>ayuda</b> o los demás sepan que <b>estás bien</b></p>
  <div class="input_rut">
  <!--<label class="label_rut" for="rut" type="text">Ingresa tu rut</label>-->

  <form action="agregar_direccion_POST.php" class="login-rut" method="POST">
      <!--<form action="formulario_1.php" class="login-rut" method="POST">-->

      <input type="text" hidden id="rut" name="rut" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
      <input type="text" hidden id="latitu" name="latitu" value="">
      <input type="text" hidden id="longitu" name="longitu" value="">

      <button id="btn_reportar" class="button_ip" onclick="getLocation()" type="submit" disabled >Reportarme</button>
      <!--<input class="button_rut" type="k  submit" text="Reportarme" />-->
  </form>
  </div>
 <!--<a class="button_rut" href="formulario_1.html">Ingresar</a>-->
</div>

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
        <a id="btn_display" class="button_two_event" href="#">ver alertas</a>
</div>

  <div id="display_content" class="effects">

 <!--   <div class="effect">
      <div class="rpicon-tsunami"></div>
    </div>
    <div class="effect">
      <div class="rpicon-rupture-home"></div>
  </div>-->

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
   </section>
<div class="container">

   <div class="map_people">
     <p id="texto_mapa">100 personas reportadas</p>
     <a class="button_two" href="personas_reportadas.php">ver más</a>
   </div>

   <div class="map">
    <!--Google maps-->
      <!--<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3345.0698151437036!2d-71.58095672261143!3d-33.02829109958188!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2scl!4v1468279338455" width="347" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    <!--Mapbox screenshot-->
    <!--
      <img class="map_content" src="https://api.mapbox.com/styles/v1/cleudio/ciqiooxr70000bjm0krbou6i0/static/-71.579739,-33.029077,12.96,-9.96,30.00/347x250?access_token=pk.eyJ1IjoiY2xldWRpbyIsImEiOiJjaWkxNmUyeGIwMDM5dDNrZnI1N2Y1eGxrIn0.gZNnFCWNxfxUD50feHVsyg" width="347" height="250" alt="Dark" />-->
      <div id='map' style='width: 347px; height: 250px;'></div>

        <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiY2xldWRpbyIsImEiOiJjaXIxb3o2NTUwMDNvOWhrcTVwaGRudG0xIn0.ve3cEnjZjNjqpYw_hju_cQ';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/cleudio/ciqiooxr70000bjm0krbou6i0',
            center: [-71.601162, -33.017948],
            zoom: 10
        })
        </script>

   </div>
</div>

</div>

<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/main.js"></script>
   <script>
       var y = document.getElementById("latitu");
       var z = document.getElementById("longitu");
       var y1 = document.getElementById("latitu1");
       var z1 = document.getElementById("longitu1");

       function getLocation() {
           if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(showPosition);
           }
       }

       function showPosition(position) {
               y.value = "" + position.coords.latitude;

               z.value = "" + position.coords.longitude;
               y1.value = "" + position.coords.latitude;

               z1.value = "" + position.coords.longitude;
               document.getElementById("btn_reportar").disabled = false;
               document.getElementById("btn_SOS").disabled = false;
       }
   </script>
 </body>
</html>
