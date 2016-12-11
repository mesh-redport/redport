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
        echo "<h1>Alerta ".$row["alerta"]." por ";
        if($row["tipo"] == 1){
            echo "Sismo</h1>";
        }else if($row["tipo"] == 2){
            echo "Incendio</h1>";
        }else{
            echo "Emergencia</h1>";
        }
        echo "<div class='event_content'>";
        if($row["alerta"] == "Temprana Preventiva"){
            echo "<div class='number_box_green'>";
        }else if($row["alerta"] == "Amarilla"){
            echo "<div class='number_box_yellow'>";
        }else if($row["alerta"] == "Roja"){
            echo "<div class='number_box_red'>";
        }
        if($row["tipo"] == 1){
            echo "<p id='numero'><div class='rpicon-rupture-home'></div></p>";
        }else if($row["tipo"] == 2){
            echo "<p id='numero'><div class='rpicon-fire fire-event'></div></p>";
        }else{
            echo "<p id='numero'><div class='rpicon-cut-bridge cut-event'></div></p>";
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
 MI CALVARIO
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
