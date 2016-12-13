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
    <div class="title_header"><h1>Reportes</h1></div>

  </div>

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

      $cont=0;

      while ($fila = mysql_fetch_assoc($resultado)) {
        $array[] = $fila;
            //echo 'mi coord es lat '.$fila['cord1'].' longi '.$fila['cord2'].'<br>';

            //TODOS LOS USUARIOS

        $coordenadaX =  $fila['cord1'];
        $coordenadaY =  $fila['cord2'];
        $sql2 = 'SELECT cid,ipautor,ubicacionX,ubicacionY,comentario,fecha,hora,p.estado FROM comentarios LEFT JOIN personas as p on ipautor = registroIP and ubicacionX = cord1 order by cid desc';
        $resultado2 = mysql_query($sql2, $enlace);

        if (!$resultado2) {
          echo "Error de BD, no se pudo consultar la base de datos\n";
          echo "Error MySQL:" . mysql_error();
          exit;
        }

        $limite = 5;
        while ($fila2 = mysql_fetch_assoc($resultado2)) {
          $array2[] = $fila2;
          $distancia_real = distance($fila2['ubicacionX'], $fila2['ubicacionY'], $fila['cord1'], $fila['cord2'], "K");
          if($distancia_real <= 2 && $cont<$limite){
            $cont++;
            //echo $cont;
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
                        <h2 id="name" class="username">';
                          if($distancia_real == 0) echo "Cerca";
                          else if($distancia_real >=1) echo "A ".round($distancia_real,0)." Km.";
                          else echo "A ".round($distancia_real*1000,0)." Mt.";
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
            break;
            exit;
          }
          ?>
        </div>

        <!-- botón ver más reportes-->

      </div>
    </div>
  </div>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/main.js"></script>
<script>
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

var timeout = setInterval(reload, 3000);
function reload(){
  $('#reportesAJAX').load(location.href + ' #reportesAJAX');
}
</script>
 </body>
</html>
