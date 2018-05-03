<div class="qt-vertical-padding-m qt-content-primary-light qt-negative" style="background-color: #101010!important">
	<div class="qt-container">
		<h5 class="qt-caption-small"><span><?php echo (string) validarTitulo("PRÓXIMOS PROGRAMAS", 1); ?></span></h5>
		<hr class="qt-spacer-s">
		<div class="qt-slickslider-container qt-slickslider-externalarrows">
			<div class="row">
				<div class="qt-slickslider qt-slickslider-multiple qt-slickslider-podcast" data-slidestoshow="3" data-variablewidth="false" data-arrows="true" data-dots="false" data-infinite="true" data-centermode="false" data-pauseonhover="true" data-autoplay="false" data-arrowsmobile="false" data-centermodemobile="true" data-dotsmobile="false" data-slidestoshowmobile="1" data-variablewidthmobile="true" data-infinitemobile="false">
					<?php
					$diaActual = date("N");
					$horaActual = date("G");
					$horaActual *=  100;
					$longitudHA = strlen($horaActual);
  				    $concatHA = $diaActual * $longitudHA * $horaActual;
					$arregloProgramas = [];
					$limite = 6;

					$proximosProgramasP1="SELECT PON.id AS Id FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id WHERE D.id_php = {$diaActual} AND PON.activo = 1 AND PON.empresa_id = {$empresaId} AND (D.id_php * length(trim(PON.inicio_formato)) * PON.inicio_formato) > {$concatHA} ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC LIMIT 0,{$limite}";
					// echo "<pre>$proximosProgramasP1</pre>";
					$proximosProgramasP1=$conexion->prepare($proximosProgramasP1);
					$proximosProgramasP1->execute();
					$resultadoPPp1=$proximosProgramasP1->fetchAll();

					foreach($resultadoPPp1 AS $datosPPp1){
						array_push($arregloProgramas, $datosPPp1["Id"]);
					}

					$contadorPPp1 = count($resultadoPPp1);
					$limite -= $contadorPPp1;

					if($limite){
						if($diaActual === 7){ $diaActual = 1;$ordenMostrar = "D.id_php DESC,"; }else{ $diaActual++;$ordenMostrar = "D.id_php ASC,"; }

						$proximosProgramasP2="SELECT PON.id AS Id FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id WHERE D.id_php = {$diaActual} AND PON.activo = 1 AND PON.empresa_id = {$empresaId} ORDER BY concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC LIMIT 0,{$limite}";
						// echo "<pre>$proximosProgramasP2</pre>";
						$proximosProgramasP2=$conexion->prepare($proximosProgramasP2);
						$proximosProgramasP2->execute();
						$resultadoPPp2=$proximosProgramasP2->fetchAll();

						foreach($resultadoPPp2 AS $datosPPp2){
							array_push($arregloProgramas, $datosPPp2["Id"]);
						}
					}

					// echo "<pre>";
					// print_r($arregloProgramas);
					// echo "</pre>";

					$programacionIdS = implode(",", $arregloProgramas);

					$proximosProgramas="SELECT PON.*, D.nombre AS Dia, PMA.titulo AS Titulo, PMA.imagen AS Imagen FROM programacion PON INNER JOIN dia D ON PON.dia_id = D.id INNER JOIN programa PMA ON PON.programa_id = PMA.id WHERE PON.id IN($programacionIdS) ORDER BY $ordenMostrar concat(D.id_php, length(trim(PON.inicio_formato)), PON.inicio_formato) ASC";
					// echo "<pre>$proximosProgramas</pre>";
					$proximosProgramas=$conexion->prepare($proximosProgramas);
					$proximosProgramas->execute();
					$proximosProgramas=$proximosProgramas->fetchAll();

					foreach($proximosProgramas AS $datosProximosProgramas){ ?>
					<div class="qt-item">
						<div class="qt-part-archive-item qt-part-archive-item-show qt-negative">
							<div class="qt-item-header">
								<div class="qt-header-mid qt-vc">
									<div class="qt-vi">
										<h5 class="qt-time"><?php echo (string) validarTitulo($datosProximosProgramas["Dia"]); ?> <?php echo (string) $datosProximosProgramas["inicio"]; ?></h5>
										<h3 class="qt-ellipsis qt-t qt-title">
											<a href="<?php echo (string) urlAmigable("Programa", $datosProximosProgramas["programa_id"], $datosProximosProgramas["Titulo"], 1); ?>" class="qt-text-shadow"><?php echo (string) validarTitulo($datosProximosProgramas["Titulo"]); ?></a>
										</h3>
									</div>
								</div>
								<div class="qt-header-bg" data-bgimage="<?php echo (string) validarImagen(IMAGEN_PROGRAMA, $datosProximosProgramas["Imagen"]); ?>">
									<img src="<?php echo (string) validarImagen(IMAGEN_PROGRAMA, $datosProximosProgramas["Imagen"]); ?>" alt="<?php echo (string) validarTitulo($datosProximosProgramas["Dia"]); ?>" width="690" height="302">
								</div>
							</div>
						</div>
					</div>
					<?php
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>