<?php
function convertirHoraMilitar($hora){
	if(strpos($hora, "AM") !== false){
		if(strpos($hora, "12") !== false){
			$hora = 0;
		}
		else{
			$hora = trim(str_replace("PM", "", (str_replace("AM", "", (str_replace(":", "", trim($hora)))))));
		}
	}
	else{
		if(strpos($hora, "12") !== false){
			$hora = 1200;
		}
		else{
			$hora = trim(str_replace("PM", "", (str_replace("AM", "", (str_replace(":", "", trim($hora)))))));
			$hora += 1200;
		}
	}

	return $hora;
}

$diaActual = date("N");
$horaActual = date("G");
$horaActual *=  100;

$programaAlAireMnr="SELECT PON.*, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON D.id = PON.dia_id INNER JOIN programa PMA ON PMA.id = PON.programa_id WHERE PON.inicio_formato <= {$horaActual} AND D.id_php = {$diaActual} AND PON.activo = 1 AND PON.empresa_id = {$empresaId} ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) DESC LIMIT 0,1";
// echo "<pre>$programaAlAireMnr</pre>";
$programaAlAireMnr=$conexion->prepare($programaAlAireMnr);
$programaAlAireMnr->execute();
$resultadoPAAMnr=$programaAlAireMnr->fetch();

$programaAlAireMyr="SELECT PON.*, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON D.id = PON.dia_id INNER JOIN programa PMA ON PMA.id = PON.programa_id WHERE PON.inicio_formato >= {$horaActual} AND D.id_php = {$diaActual} AND PON.activo = 1 AND PON.empresa_id = {$empresaId} ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC LIMIT 0,1";
// echo "<pre>$programaAlAireMyr</pre>";
$programaAlAireMyr=$conexion->prepare($programaAlAireMyr);
$programaAlAireMyr->execute();
$resultadoPAAMyr=$programaAlAireMyr->fetch();

$inicioMnr = convertirHoraMilitar($resultadoPAAMnr["inicio"]);
$finMnr = convertirHoraMilitar($resultadoPAAMnr["fin"]);
$inicioMyr = convertirHoraMilitar($resultadoPAAMyr["inicio"]);
$finMyr = convertirHoraMilitar($resultadoPAAMyr["fin"]);

// echo "inicio menor: $inicioMnr | fin menor: $finMnr <br/>";
// echo "inicio mayor: $inicioMyr | fin mayor: $finMyr <br/>";
// echo "Hora actual: $horaActual<br/>";

if($resultadoPAAMnr && !$resultadoPAAMyr){ goto MuestraMenor; }
else if(!$resultadoPAAMnr && $resultadoPAAMyr){ goto MuestraMayor; }
else if(!$resultadoPAAMnr && !$resultadoPAAMyr){ goto MuestraVacio; }
else{
	// SI SON IGUALES
	if( ($inicioMnr == $inicioMyr) && ($finMnr == $finMyr) ){ goto MuestraMenor; }

	if($finMnr > $horaActual){ goto MuestraMenor; }
	else{ goto MuestraMayor; }
}

MuestraMenor:
$mensajePAAF = validarTitulo("Al aire ahora", 1);
$tituloPAAF = validarTitulo($resultadoPAAMnr["Titulo"]);
$imagenPAAF = validarImagen(IMAGEN_PROGRAMA, $resultadoPAAMnr["Imagen"]);
$inicioPAAF = $resultadoPAAMnr["inicio"];
$finPAAF = $resultadoPAAMnr["fin"];
goto FrontProgramacion;

MuestraMayor:
$mensajePAAF = validarTitulo("Próximo programa", 1);
$tituloPAAF = validarTitulo($resultadoPAAMyr["Titulo"]);
$imagenPAAF = validarImagen(IMAGEN_PROGRAMA, $resultadoPAAMyr["Imagen"]);
$inicioPAAF = $resultadoPAAMyr["inicio"];
$finPAAF = $resultadoPAAMyr["fin"];
goto FrontProgramacion;

MuestraVacio:
$mensajePAAF = validarTitulo("Próximo programa", 1);
$tituloPAAF = validarTitulo("No hay programa");
$imagenPAAF = validarImagen(IMAGEN_PROGRAMA, "");
$inicioPAAF = "00:00";
$finPAAF = "00:00";

FrontProgramacion:
?>
<div class="qt-pageheader qt-negative">
	<div class="qt-container">
		<h3 class="qt-spacer-s"><?php echo $mensajePAAF; ?></h3>
        <h1 class="qt-caption-med qt-caption"><span><?php echo $tituloPAAF; ?></span></h1>
        <h4 class="qt-subtitle"><?php echo $inicioPAAF; ?> | <?php echo $finPAAF; ?></h4>
    </div>
	<div class="qt-header-bg" data-bgimage="<?php echo $imagenPAAF; ?>">
		<img src="<?php echo $imagenPAAF; ?>" alt="<?php echo $tituloPAAF; ?>" width="690" height="302">
	</div>
</div>