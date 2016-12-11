<?php include "db-connection.php"; ?>
<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>
<body>
   <div class="pagina_esp">
   
   <!-- ======= header======= -->
  <div class="header2">
  	<div class="back-button">
  		<a href="index.php">
  			<div class="rpicon-back"></div>
  		</a></div>
    <div class="title_header">
    	<h1>Bienvenido</h1>
    </div>
  </div>

  <div class="container">
  	<h1 id="title_form">Usted es:</h1>

	<div class="markers" >
		<input type="radio" name="estate" id="checkbox_big_1" class="marker" onclick="checkType(this,0)"/>
		<label for="checkbox_big_1" class="rpicon-toggle-small-inverse"><div class="rpicon-kid"></div><p class="text_marker"><br>Menor</p></label>
		<input type="radio" name="estate" id="checkbox_big_2" class="marker" onclick="checkType(this,1)"/>
		<label for="checkbox_big_2" class="rpicon-toggle-small-inverse"><div class="rpicon-adult"></div><p class="text_marker"><br>Adulto</p></label>
	    <input type="radio" name="estate" id="checkbox_big_3" class="marker" onclick="checkType(this,2)"/>
	    <label for="checkbox_big_3" class="rpicon-toggle-small-inverse"><div class="rpicon-old"></div><p class="text_marker"><br>3ª Edad</p></label>
	    <input type="radio" name="estate" id="checkbox_big_4" class="marker" onclick="checkType(this,3)"/>
	    <label for="checkbox_big_4" class="rpicon-toggle-small-inverse"><div class="rpicon-especial"></div><p class="text_marker"><br>Especial</p></label>
	  </div>
</div>

<div id="container_p2" class="container">
	<div class="form_container">
		<h1 id="title_form">¿Te encuentras bien?</h1>
		<div class="toggle_button">
		<input type="checkbox" id="toggle" class="toggle_button_big" onclick="checkAddress(this,0)"/>
		<label for="toggle" class="rpicon-toggle"></label>
		</div>
	</div>

	<div class="form_content">
		<h1 id="title_form">Indica tu estado</h1>
		<div class="toggle_box">
		<div class="text_box">
			<input type="checkbox" id="toggle_small_1" class="toggle_button_small_2" onclick="checkAddress(this,1)"/>
			<label for="toggle_small_1" class="rpicon-toggle-small"><p class="texto-toggle">Estoy&nbsp;herido</p></label>
		</div>
		<div class="text_box">
			<input type="checkbox" id="toggle_small_2" class="toggle_button_small_2" onclick="checkAddress(this,2)"/>
			<label for="toggle_small_2" class="rpicon-toggle-small"><p class="texto-toggle">Estoy&nbsp;atrapado</p></label>
		</div>
		<div class="text_box">
			<input type="checkbox" id="toggle_small_3" class="toggle_button_small_2" onclick="checkAddress(this,3)"/>
			<label for="toggle_small_3" class="rpicon-toggle-small"><p class="texto-toggle">Enfermo&nbsp;crónico</p></label>
		</div>
		</div>
	</div>

</div>

<form action="agregar_estado_POST.php" class="login-rut" method="POST">
      <!--<form action="formulario_1.php" class="login-rut" method="POST">-->

      <input type="text" hidden id="tipo" name="tipo" value="1">
      <input type="text" hidden id="estado" name="estado" value="0">
      <input type="text" hidden id="rut" name="rut" value="<?php echo $_REQUEST['rut']; ?>">
      <input type="text" hidden id="detalle" name="detalle" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>">
	  <input type="text" hidden id="enlace" name="enlace" value="1">
		<button id="btn_reportar" class="button_ip" type="submit" >Reportar Estado</button>
</form>

<!--
<div class="container">

  	<h1 id="title_form">¿Están estas personas contigo?</h1>
	<div class="toggle_box">
		<div class="text_box_2">
		    <input type="checkbox" id="toggle_small_4" class="toggle_button_small"/>
		  	<label for="toggle_small_4" class="rpicon-toggle-small"><p class="texto-toggle">Carlos Aracena R.</p></label>
		 </div>
		<div class="text_box_2">
			<input type="checkbox" id="toggle_small_5" class="toggle_button_small"/>
		  	<label for="toggle_small_5" class="rpicon-toggle-small"><p class="texto-toggle">María Fernandez S.</p></label>
		</div>
  </div>

  <h1 id="title_form">¿Se encuentran bien?</h1>
	<div class="toggle_box">
		<div class="text_box_2">
			<input type="checkbox" id="toggle_small_6" class="toggle_button_small"/>	
		  	<label for="toggle_small_6" class="rpicon-toggle-small"><p class="texto-toggle">Carlos Aracena R.</p></label>
		</div>
  </div>

    
</div>-->

<div class="container">

  <h1 id="title_form">¿Hay otras personas contigo?</h1>
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

					//echo "{$clave}";
					//print_r($array);
				}
			}
			// ...hasta que finalmente el penúltimo valor se copia al último valor

			// salida:
			// 0 => 2 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 2 )
			// 1 => 4 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 4 )
			// 2 => 6 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 6 )
			// 3 => 6 Array ( [0] => 2, [1] => 4, [2] => 6, [3] => 6 )*/
			?>

		</div>
	</ul>

<div class="toggle_box">
  <div class="text_box_3">
	  <form action="agregar_persona_POST.php" class="login-rut" method="POST">
		  <p id="text_button">Agregar otra persona</p>
		  <button id="btn_reportar" class="button_small_two" type="submit">+</button>
		  <input type="text" hidden id="rut" name="rut" value="<?php echo $_REQUEST['rut']; ?>">

	  </form>
	</div>
</div>
</div>


<a class="button" href="home.php?rut=<?php echo $_REQUEST['rut'];?>">Terminado</a>


<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/main.js"></script>

 </body>
 <script>
	   //var estado+"";
	   function checkType(radio,sta)
	   {
	   	if(radio.checked){
	   		var valorT = document.getElementById("tipo").value;
	   		document.getElementById("tipo").value = sta;
	   	}
	   }
	   </script>
	   <script>
   function checkAddress(checkbox,sta)
   {
   if (checkbox.checked)
   {
	   //alert(sta);
	   var valor = document.getElementById("estado").value;
	   var estado = ''+sta;
	   //alert(valor);
	   if(valor.indexOf(estado) <= -1) //si no lo encuentra
	   {
	   		if(sta == 0){
	   			document.getElementById("estado").value = 0;
		   		document.getElementById("toggle_small_1").checked = false;
		   		document.getElementById("toggle_small_2").checked = false;
		   		document.getElementById("toggle_small_3").checked = false;
	   		}
		   else
		   {
			   document.getElementById("toggle").checked = true;
			   valor = valor.replace(/0/g, '');
			   document.getElementById("estado").value = valor;
			   valor += estado;
			   document.getElementById("estado").value += estado;
		   }
	   }

   }else {
   	if(document.getElementById("toggle").checked == false)document.getElementById("estado").value = 0;
	   //alert(sta);
	   var valor = document.getElementById("estado").value;
	   var estado = '' + sta;
	   //alert(valor);
	   if (valor.indexOf(estado) > -1) //si lo encuentra
	   {
		   if (sta == 0) {
			   valor = valor.replace(/0/g, '');
			   document.getElementById("estado").value = valor;
		   }
		   if (sta == 1) {
			   valor = valor.replace(/1/g, '');
			   document.getElementById("estado").value = valor;
		   }
		   if (sta == 2) {
			   valor = valor.replace(/2/g, '');
			   document.getElementById("estado").value = valor;
		   }
		   if (sta == 3) {
			   valor = valor.replace(/3/g, '');
			   document.getElementById("estado").value = valor;
		   }
		   if (sta == 4) {
			   valor = valor.replace(/4/g, '');
			   document.getElementById("estado").value = valor;
		   }

	   }

	   //document.getElementById("estado").value = estado;

   }
   }
   </script>
</html>