<?php
$file = file_get_contents("http://10.30.61.100");
file_put_contents("seed.txt", $file);
?>
<!DOCTYPE html>
<!-- Template by quackit.com -->
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Modular Emergency Mesh MeM</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.0.0.min.js"></script>
</head>
<body>

<header id="header">
    <h1>MeM</h1>
    <p class="tagline">Modular Emergency Mesh Project</p>
</header>

<nav id="nav">
    <h2>Portal Access</h2>
    <ul>
        <li><a href="#">Sensors</a></li>
        <li><a href="#">Chat</a></li>
        <li><a href="#">Node</a></li>
        <li><a href="#">Notice</a></li>
    </ul>

    <h2>Node Access</h2>
    <ul>
        <li><a href="http://10.30.235.1">Node 1</a></li>
        <li><a href="http://10.30.42.1">Node 2</a></li>
        <li><a href="http://10.30.165.1/">Node 3</a></li>
        <li><a href="http://10.30.235.100">Sensor 1</a></li>
        <li><a href="http://10.30.165.100">Sensor 2</a></li>
    </ul>
</nav>

<div id="main">


    <?php
    include "conUCV.php";

    $fh = fopen('seed.txt','r');
    $cleanquery = "DELETE FROM mesh_redport.sensores WHERE DATE_FORMAT(STR_TO_DATE(fecha, '%d/%m/%Y'), '%Y-%m-%d') < DATE_SUB(NOW(), INTERVAL 10 DAY)";
    $resultado = mysql_query($cleanquery, $enlace);

    while ($lines = fgets($fh)) {
        // <... Do your work with the line ...>
        $line = explode(" ", $lines);
        foreach ($line as &$valor) {
            echo $valor."<br>";
            $valores = explode(":", $valor);
            $sqltemp = 'INSERT INTO sensores (tipo, valor, fecha) VALUES("'.$valores[0].'","'.$valores[1].'","'.date("d/m/Y H:i:s").'")';

            $resultado = mysql_query($sqltemp, $enlace);
        }

    }
    fclose($fh);


    ?>
    <div id="lights" class='cf'>
        <h2>Node 1: Light Control</h2>
        <dir id="module-1">
            <div class="led-control">
                <label>Blink rate</label>
                <input type="range" id="rangered" min="0" max="255" value="0">
            </div>
            <div class="led-control">
                <label>Light 1</label>
                <input type="range" id="rangegreen" min="0" max="255" value="0">
            </div>
            <div class="led-control">
                <label>Light 2</label>
                <input type="range" id="rangeblue" min="0" max="255" value="0">
            </div>



    </div>

    <script>
        $("#main").click(function () {

            /*$("#main").load(location.href + " #lights");
            alert("hi");*/
        });

    </script>

    <!--<button id="mod1-send">send</button>-->
    </dir>
</div>
</div>


<footer id="footer">
    <div class="innertube">
        <p>fabAcademy 2016 - Fablab Santiago - Modular Emergency Mesh MeM</p>
    </div>
</footer>
</body>
<script type="text/javascript">

    var red = 0;
    var green = 0;
    var blue = 0;

        //Bindeo los elementos range.
        // RED
        $('#rangered').change(function(){
            red = $(this).val();
            //console.log(red);
            updateColor();
        });
        // GREEN
        $('#rangegreen').change(function(){
            green = $(this).val();
            //console.log(green);
            updateColor();
        });
        // BLUE
        $('#rangeblue').change(function(){
            blue = $(this).val();
            //console.log(blue);
            updateColor();
        });


    function updateColor(){
        alert("paso1");
        var rgbColor = "rgb("+red.toString()+","+green.toString()+","+blue.toString()+")";
        alert("paso2");
        //console.log("rgbColor = "+rgbColor);
        $('#mod1-light').css("background-color",rgbColor);
        alert("paso3");
        var colorURL = "rgb="+("00" + red).slice(-3)+("00" + green).slice(-3)+("00" + blue).slice(-3);
        alert("paso4");
        //console.log("colorURL="+colorURL);
        var lightIP = "http://10.30.61.201/";
        alert("paso5");
        $.get(lightIP+colorURL);
        $("#main").load(location.href + " #lights");
        alert("paso6");
        //console.log(lightIP+colorURL);
    }


</script>
</html>

