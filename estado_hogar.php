<?php include "db-connection.php"; ?>

<!DOCTYPE html>
<html lang="es">
<?php include "head.php"; ?>
<body>
   <div class="pagina_esp">
   <!-- ======= header======= -->
  <div class="header2">
    <div class="back-button"><a href="home.html"><div class="rpicon-back"></div></a></div>
    <div class="title_header"><h1>Estado de mi hogar</h1></div>

  </div>

<div class="container">

  <h1 id="title_form">Tipo de vivienda</h1>
  <div class="markers">
    <input type="radio" name="tipo" id="checkbox_big_1" class="marker" onclick="checkType(this,0)"/>
    <label for="checkbox_big_1" class="rpicon-toggle-small-inverse"><div id="home" class="rpicon-home"></div><p class="text_marker">Casa</p></label>
    <input type="radio" name="tipo" id="checkbox_big_2" class="marker" onclick="checkType(this,1)"/>
    <label for="checkbox_big_2" class="rpicon-toggle-small-inverse"><div id="appartment" class="rpicon-appartment"></div><p class="text_marker">Departamento</p></label>
  </div>
</div>

<div class="container">

  	<h1 id="title_form">¿Cuál es el estado del inmueble?</h1>
	<div class="toggle_box">
    <div class="text_box_2">
		  <input type="radio" name="estate" id="checkbox_small_3" class="checkbox_button_small" onclick="checkState(this,0)"/>
  		<label for="checkbox_small_3" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Sin&nbsp;daños</p></label>
    </div>
    <div class="text_box_2">
  		<input type="radio" name="estate" id="checkbox_small_4" class="checkbox_button_small" onclick="checkState(this,1)"/>
  		<label for="checkbox_small_4" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Daño&nbsp;menor</p></label>
    </div>
    <div class="text_box_2">
  		<input type="radio" name="estate" id="checkbox_small_5" class="checkbox_button_small" onclick="checkState(this,2)"/>
  		<label for="checkbox_small_5" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Daño&nbsp;mayor&nbsp;recuperable</p></label>
    </div>
    <div class="text_box_2">
  		<input type="radio" name="estate" id="checkbox_small_6" class="checkbox_button_small" onclick="checkState(this,3)"/>
  		<label for="checkbox_small_6" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Destruida/irrecuperable</p></label>
    </div>
  </div>




</div>

<div class="container">

  <h1 id="title_form">¿Existe alguna fuga?</h1>
	<div class="toggle_box">
    <div class="text_box_2">
		  <input type="radio" name="fuga" id="checkbox_small_7" class="checkbox_button_small" onclick="checkLeak(this,2)"/>
  		<label for="checkbox_small_7" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Fuga&nbsp;de&nbsp;gas</p></label>
    </div>
    <div class="text_box_2">
  		<input type="radio" name="fuga" id="checkbox_small_8" class="checkbox_button_small" onclick="checkLeak(this,1)"/>
  		<label for="checkbox_small_8" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Fuga&nbsp;de&nbsp;agua</p></label>
     </div>
     <div class="text_box_2">
      <input type="radio" name="fuga" id="checkbox_small_9" class="checkbox_button_small" onclick="checkLeak(this,0)"/>
      <label for="checkbox_small_9" class="rpicon-toggle-small-inverse"><p class="texto-checkbox">Ninguna</p></label>
     </div>
  </div>

</div>

<div class="container">

	<div>
		<h1 id="title_form">¿Necesitas albergue?</h1>
		<div class="toggle_button"></div>
		<input type="checkbox" id="toggle" class="toggle_button_big" onclick="checkHostel(this,0)" />
		<label for="toggle" class="rpicon-toggle"></label>
	</div>
</div>

<form action="agregar_vivienda_POST.php" method="POST">

	 		<input hidden type="text" id="tipo" name="tipo" value="0">
			<input hidden type="text" id="estado" name="estado" value="0">
			<input hidden type="text" id="fuga" name="fuga" value="0">
			<input hidden type="text" id="albergue" name="albergue" value="0">
 			<input hidden type="text" id="rut" name="rut" value=<?php echo $_REQUEST['rut']; ?>>

</div>

		   <input class="button_ip" type="submit" />
<!--<a class="button" href="home.html#hogar">Guardar</a>-->

</div>
   </form>

</div>
	<script src="js/jquery-3.0.0.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		//var estado+"";
		function checkType(radio,sta)
		{
		 if(radio.checked){
			 document.getElementById("tipo").value = sta;
		 }
		}
		function checkState(radio,sta)
		{
		 if(radio.checked){
			 document.getElementById("estado").value = sta;
		 }
		}
		function checkLeak(radio,sta)
		{
		 if(radio.checked){
			 document.getElementById("fuga").value = sta;
		 }
		}

		function checkHostel(checkbox,sta)
    {
	    if (checkbox.checked)
	    {
	 			document.getElementById("albergue").value = 1;
			}else{
				document.getElementById("albergue").value = 0;
			}

    }
		</script>
 </body>
</html>
