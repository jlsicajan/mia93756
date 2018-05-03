<div class="qt-container qt-spacer-l">
    <h3 class="qt-caption-med"><span>Programación Semanal</span></h3>
    <hr class="qt-spacer-s">
    <div class="qt-show-schedule">
        <ul class="tabs">
        	<?php
        	$diasDeProgramacionS="SELECT * FROM dia ORDER BY orden ASC";
        	// echo "<pre>$diasDeProgramacionS</pre>";
        	$diasDeProgramacionS=$conexion->prepare($diasDeProgramacionS);
        	$diasDeProgramacionS->execute();
        	$resultadoDDPs=$diasDeProgramacionS->fetchAll();

        	foreach($resultadoDDPs AS $datosDDPs){ ?>
            <li class="tab"><a href="#dia<?php echo (int) $datosDDPs["id"]; ?>" class="<?php if($datosDDPs["id_php"] == date('N')){ echo 'active'; }else{ echo ''; } ?>"><?php echo (string) validarTitulo($datosDDPs["nombre"]); ?></a></li>
            <?php
        	} ?>
        </ul>
        <hr class="qt-spacer-s">
        <?php
        foreach($resultadoDDPs AS $datosDDPs){
	        $programacionPorDia="SELECT PON.*, PMA.titulo AS Titulo, PMA.imagen AS Imagen, PMA.contenido AS Contenido FROM programacion PON INNER JOIN programa PMA ON PON.programa_id = PMA.id WHERE PON.activo = 1 AND PON.empresa_id = {$empresaId} AND PON.dia_id = {$datosDDPs["id"]} ORDER BY concat(length(trim(PON.inicio_formato)), PON.inicio_formato) ASC";
	        // echo "<pre>$programacionPorDia</pre>";
	        $programacionPorDia=$conexion->prepare($programacionPorDia);
	        $programacionPorDia->execute();
	        $resultadoPPD=$programacionPorDia->fetchAll();
        ?>
        <div id="dia<?php echo (int) $datosDDPs["id"]; ?>" class="qt-show-schedule-day">
            <div class="qt-show-schedule-day row">
            	<?php
            	foreach($resultadoPPD AS $datosPPD){
            		$iniciaPPD = explode(" ", $datosPPD["inicio"]);
        		?>
                <div class="col s12 m4 l4">
                    <div class="qt-part-archive-item qt-part-show-schedule-day-item">
                        <div class="qt-item-header">
                            <div class="qt-header-mid qt-vc">
                                <div class="qt-vi">
                                    <h4 class="qt-item-title qt-title">
                                        <a href="#read" class="qt-ellipsis qt-t"><?php echo (string) validarTitulo($datosPPD["Titulo"]); ?></a>
                                    </h4>
                                    <p class="qt-item-det">
                                        <span class="qt-time"><?php echo (string) $iniciaPPD[0]; ?></span><span class="qt-am"><?php echo (string) strtolower($iniciaPPD[1]); ?></span><span class="qt-day qt-capfont"><?php echo (string) validarTitulo($datosDDPs["nombre"]); ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="qt-header-bg" data-bgimage="<?php echo (string) validarImagen(IMAGEN_PROGRAMA, $datosPPD["Imagen"]); ?>">
                                <img src="<?php echo (string) validarImagen(IMAGEN_PROGRAMA, $datosPPD["Imagen"]); ?>" alt="<?php echo (string) validarTitulo($datosPPD["Titulo"]); ?>" width="690" height="302" />
                            </div>
                        </div>
                        <div class="qt-overinfo qt-paper">
                            <p class="qt-item-det qt-accent">
                                <span class="qt-time"><?php echo (string) $iniciaPPD[0]; ?></span><span class="qt-am"><?php echo (string) strtolower($iniciaPPD[1]); ?></span><span class="qt-day qt-capfont"><?php echo (string) validarTitulo($datosDDPs["nombre"]); ?></span>
                            </p>
                            <div class="qt-more">
                                <p class="qt-ellipsis-2"><?php echo (string) validarTexto($datosPPD["Contenido"], 90, 1); ?></p>
                                <a href="<?php echo (string) urlAmigable("Programa", $datosPPD["programa_id"], $datosPPD["Titulo"], 1); ?>">Ver más</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            	} ?>
            </div>
        </div>
        <?php
    	} ?>
    </div>
</div>