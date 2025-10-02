<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/


	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"])&& $_POST["action"] !=NULL)?$_POST["action"]:"";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database=new orders();	

	$query=isset($_POST["query"])?$_POST["query"]:"";

	$DEPARTAMENTO = !EMPTY($_POST["DEPARTAMENTO2"])?$_POST["DEPARTAMENTO2"]:"DEFAULT";	
	$nombreTabla = "SELECT * FROM `08altaeventosfiltroDes`, 08altaeventosfiltroPLA WHERE 08altaeventosfiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "altaeventos";
	$tables="12matchbbva";
	

$COLABORADOR_BBVA = isset($_POST["COLABORADOR_BBVA"])?$_POST["COLABORADOR_BBVA"]:""; 
$TARJETA_BBVA = isset($_POST["TARJETA_BBVA"])?$_POST["TARJETA_BBVA"]:""; 
$ESTABLECIMIENTO_BBVA = isset($_POST["ESTABLECIMIENTO_BBVA"])?$_POST["ESTABLECIMIENTO_BBVA"]:""; 
$FECHADD_BBVA = isset($_POST["FECHADD_BBVA"])?$_POST["FECHADD_BBVA"]:""; 
$MONTO_BBVA = isset($_POST["MONTO_BBVA"])?$_POST["MONTO_BBVA"]:""; 
$OBSERVACIONES_BBVA = isset($_POST["OBSERVACIONES_BBVA"])?$_POST["OBSERVACIONES_BBVA"]:""; 
$FECHA_BBVA = isset($_POST["FECHA_BBVA"])?$_POST["FECHA_BBVA"]:""; 
$hBBVA = isset($_POST["hBBVA"])?$_POST["hBBVA"]:""; 

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"COLABORADOR_BBVA"=>$COLABORADOR_BBVA,
"TARJETA_BBVA"=>$TARJETA_BBVA,
"ESTABLECIMIENTO_BBVA"=>$ESTABLECIMIENTO_BBVA,
"FECHADD_BBVA"=>$FECHADD_BBVA,
"MONTO_BBVA"=>$MONTO_BBVA,
"OBSERVACIONES_BBVA"=>$OBSERVACIONES_BBVA,
"FECHA_BBVA"=>$FECHA_BBVA,
"hBBVA"=>$hBBVA,

 "per_page"=>$per_page,
	"query"=>$query,
	"offset"=>$offset);
	//consulta principal para recuperar los datos
	$datos=$database->getData($tables,$campos,$search);
	$countAll=$database->getCounter();
	$row = $countAll;
	
	if ($row>0){
		$numrows = $countAll;;
	} else {
		$numrows=0;
	}	
	$total_pages = ceil($numrows/$per_page);
	
	
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination=new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();
			?>
        </div>
	<div class="table-responsive">
		<style>
    thead tr:first-child th {
        position: sticky;
        top: 0;
        background: #c9e8e8;
        z-index: 10;
    }

    thead tr:nth-child(2) td {
        position: sticky;
        top: 55px; /* Altura del primer encabezado */
        background: #e2f2f2;
        z-index: 9;
    }
</style>
<div style="max-height: 600px; overflow-y: auto;">
	 <table class="table table-striped table-bordered" >	
		<thead>
            <tr style='background:#f5f9fc;text-align:center'>
<th style="background:#c9e8e8"></th>
<th style="background:#c9e8e8">#</th>
<?php /*inicia copiar y pegar iniciaA3*/ ?>

<!--<hr/><H1>HTML FILTRO .PHP A3</H1><BR/>--><?php 
if($database->plantilla_filtro($nombreTabla,"COLABORADOR_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">COLABORADOR</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"TARJETA_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">INTITUCIÓN BANCARIA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ESTABLECIMIENTO_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NOMBRE COMERCIAL</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHADD_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA DEL CARGO</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO</th>
<?php } ?>


<?php 
if($database->plantilla_filtro($nombreTabla,"COMPROBAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">COMPROBAR</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"STATUS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">STATUS DE<BR>COMPROBACIÓN</th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">OBSERVACIONES</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA DE CARGA</th>
<?php } ?>
<th style="background:#c9e8e8"></th>
<th style="background:#c9e8e8"></th>
<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr style='background:#f5f9fc;text-align:center'>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<?php  
if($database->plantilla_filtro($nombreTabla,"COLABORADOR_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="COLABORADOR_BBVA_1" value="<?php 
echo $COLABORADOR_BBVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"TARJETA_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="TARJETA_BBVA_1" value="<?php 
echo $TARJETA_BBVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"ESTABLECIMIENTO_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="ESTABLECIMIENTO_BBVA_1" value="<?php 
echo $ESTABLECIMIENTO_BBVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHADD_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="date" class="form-control" id="FECHADD_BBVA_1" value="<?php 
echo $FECHADD_BBVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_BBVA_1" value="<?php 
echo $MONTO_BBVA; ?>"></td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"COMPROBAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>

<td style="background:#c9e8e8"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"STATUS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"></td>
<?php } ?>




<?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="OBSERVACIONES_BBVA_1" value="<?php 
echo $OBSERVACIONES_BBVA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="date" class="form-control" id="FECHA_BBVA_1" value="<?php 
echo $FECHA_BBVA; ?>"></td>
<?php } ?>


<?php /*termina copiar y terminaA4*/ ?>
	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>
		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		
		foreach ($datos as $key=>$row){?>
		<tr style='background:#f5f9fc;text-align:center'>
				<td>
    <input type="checkbox" 
           class="checkbox"
           data-id="<?php echo $row['id'];?>" 
           style="transform: scale(1.1); cursor: pointer;" 
           onchange="
               const fila = this.closest('tr');
               const id = this.getAttribute('data-id');
               if (this.checked) {
                      fila.style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
                   localStorage.setItem('checkbox_' + id, 'checked');
               } else {
                   fila.style.filter = 'none';
                   localStorage.removeItem('checkbox_' + id);
               }">
</td>
<td><?php echo $row["id"];?></td>
<?php /*inicia copiar y pegar iniciaA5*/ ?>
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>--><?php  if($database->plantilla_filtro($nombreTabla,"COLABORADOR_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['COLABORADOR_BBVA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"TARJETA_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['TARJETA_BBVA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"ESTABLECIMIENTO_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['ESTABLECIMIENTO_BBVA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHADD_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHADD_BBVA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style='text-align:RIGHT;'>$ <?php 

echo NUMBER_FORMAT($row['MONTO_BBVA'],2,'.',',');

?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"COMPROBAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td>
	<input class="btn btn-success dropdown-toggle" value="COMPROBAR" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		<ul class="dropdown-menu">
			<li style="background-color:#edccf3; cursor:pointer;" name="view" value="COMPROBAR"  id="<?php echo $row["id"]; ?>" class="dropdown-item view_MATCH2">
			<a>COMPROBAR CON FACTURA <br>PREVIAMENTE CARGADA</a>
			</li>
			<li style="background-color:#ccd9f3"><a target="_blank" class="dropdown-item" href="comprobacionesVYO.php">COMPROBAR PARA <br>SUBIR FACTURA</a>
			</li>  
		</ul>
	</input>
</td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"STATUS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td><input type="checkbox" style="width:30%;color:red" class="form-check-input" <?php echo $database->validaexistematch2($row["id"],'TARJETABBVA'); ?> disabled> </td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['OBSERVACIONES_BBVA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_BBVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_BBVA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>
			<td>
<?php if($database->variablespermisos('','MATCH_BBVAFILTRO','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_BBVA" />			
<?php } ?>
			</td>
			<td>
<?php if($database->variablespermisos('','MATCH_BBVAFILTRO','borrar')=='si'){ ?>
<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataBBVAborrar" />
<?php } ?>
			</td>			
		</tr>
			<?php
			$finales++;
		}	
	?>
		</tbody>
		</table>
		</div>
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
