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
	$tables="12matchinbursa";
	

$COLABORADOR_INBURSA = isset($_POST["COLABORADOR_INBURSA"])?$_POST["COLABORADOR_INBURSA"]:""; 
$TARJETA_INBURSA = isset($_POST["TARJETA_INBURSA"])?$_POST["TARJETA_INBURSA"]:""; 
$FECHADD_INBURSA = isset($_POST["FECHADD_INBURSA"])?$_POST["FECHADD_INBURSA"]:""; 
$ESTABLECIMIENTO_INBURSA = isset($_POST["ESTABLECIMIENTO_INBURSA"])?$_POST["ESTABLECIMIENTO_INBURSA"]:""; 
$RFC_INBURSA = isset($_POST["RFC_INBURSA"])?$_POST["RFC_INBURSA"]:""; 
$MONTO_INBURSA = isset($_POST["MONTO_INBURSA"])?$_POST["MONTO_INBURSA"]:""; 
$OBSERVACIONES_INBURSA = isset($_POST["OBSERVACIONES_INBURSA"])?$_POST["OBSERVACIONES_INBURSA"]:""; 
$FECHA_INBURSA = isset($_POST["FECHA_INBURSA"])?$_POST["FECHA_INBURSA"]:""; 
$hINBURSA = isset($_POST["hINBURSA"])?$_POST["hINBURSA"]:""; 

$per_page=intval($_POST["per_page"]);
	$campos="*";
	//Variables de paginación
	$page = (isset($_POST["page"]) && !empty($_POST["page"]))?$_POST["page"]:1;
	$adjacents  = 4; //espacio entre páginas después del número de adyacentes
	$offset = ($page - 1) * $per_page;
	
	$search=array(

"COLABORADOR_INBURSA"=>$COLABORADOR_INBURSA,
"TARJETA_INBURSA"=>$TARJETA_INBURSA,
"FECHADD_INBURSA"=>$FECHADD_INBURSA,
"ESTABLECIMIENTO_INBURSA"=>$ESTABLECIMIENTO_INBURSA,
"RFC_INBURSA"=>$RFC_INBURSA,
"MONTO_INBURSA"=>$MONTO_INBURSA,
"OBSERVACIONES_INBURSA"=>$OBSERVACIONES_INBURSA,
"FECHA_INBURSA"=>$FECHA_INBURSA,
"hINBURSA"=>$hINBURSA,

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
if($database->plantilla_filtro($nombreTabla,"COLABORADOR_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">COLABORADOR INBURSA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"TARJETA_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">TARJETA INBURSA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHADD_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHADD INBURSA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"ESTABLECIMIENTO_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">ESTABLECIMIENTO INBURSA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"RFC_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">RFC INBURSA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO INBURSA</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"COMPROBAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">COMPROBAR</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"STATUS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">STATUS DE<BR>COMPROBACIÓN</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">OBSERVACIONES INBURSA</th>
<?php } ?><?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">FECHA INBURSA</th>
<?php } ?>
<th style="background:#c9e8e8"></th>
<th style="background:#c9e8e8"></th>


<?php /*termina copiar y terminaA3*/ ?>
            </tr>
            <tr style='background:#f5f9fc;text-align:center'>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>
<?php /*inicia copiar y pegar iniciaA4*/ ?>

<!--<hr/><H1>HTML FILTRO E INPUT .PHP A4</H1><BR/>--><?php  
if($database->plantilla_filtro($nombreTabla,"COLABORADOR_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="COLABORADOR_INBURSA_1" value="<?php 
echo $COLABORADOR_INBURSA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"TARJETA_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="TARJETA_INBURSA_1" value="<?php 
echo $TARJETA_INBURSA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHADD_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="date" class="form-control" id="FECHADD_INBURSA_1" value="<?php 
echo $FECHADD_INBURSA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"ESTABLECIMIENTO_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="ESTABLECIMIENTO_INBURSA_1" value="<?php 
echo $ESTABLECIMIENTO_INBURSA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"RFC_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="RFC_INBURSA_1" value="<?php 
echo $RFC_INBURSA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_INBURSA_1" value="<?php 
echo $MONTO_INBURSA; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"COMPROBAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>

<td style="background:#c9e8e8"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"STATUS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="OBSERVACIONES_INBURSA_1" value="<?php 
echo $OBSERVACIONES_INBURSA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="date" class="form-control" id="FECHA_INBURSA_1" value="<?php 
echo $FECHA_INBURSA; ?>"></td>
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
<!--<hr/><H1>FOREACH FILTRO .PHP A5</H1><BR/>--><?php  if($database->plantilla_filtro($nombreTabla,"COLABORADOR_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['COLABORADOR_INBURSA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"TARJETA_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['TARJETA_INBURSA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHADD_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHADD_INBURSA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"ESTABLECIMIENTO_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['ESTABLECIMIENTO_INBURSA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"RFC_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['RFC_INBURSA'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style='text-align:RIGHT;'>$ <?php echo NUMBER_FORMAT($row['MONTO_INBURSA'],2,'.',',');?></td>

<?php  if($database->plantilla_filtro($nombreTabla,"COMPROBAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td>
	<input class="btn btn-success dropdown-toggle" value="COMPROBAR" type="button" data-bs-toggle="dropdown" aria-expanded="false">
			<ul class="dropdown-menu">
				<li style="background-color:#edccf3; cursor:pointer;" name="view" value="COMPROBAR"  id="<?php echo $row["id"]; ?>" class="dropdown-item view_MATCH2INBURSA" >
				<a>COMPROBAR CON FACTURA <br>PREVIAMENTE CARGADA</a>
				</li>
				<li style="background-color:#ccd9f3"><a class="dropdown-item" href="comprobacionesVYO.php">COMPROBAR PARA <br>SUBIR FACTURA</a>
				</li>  
			</ul>
		</input>
</td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"STATUS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
<td><input type="checkbox" style="width:30%;color:red" class="form-check-input" <?php echo $database->validaexistematch2($row["id"],'INBURSA'); ?> disabled> </td>
<?php } ?>






<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['OBSERVACIONES_INBURSA'];?></td>
<?php } ?><?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INBURSA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td><?php echo $row['FECHA_INBURSA'];?></td>
<?php } ?>


<?php /*termina copiar y terminaA5*/ ?>
			<td>
<?php if($database->variablespermisos('','INBURSA_VERIFICARfiltro','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_INBURSA" />			
<?php } ?>
			</td>
			<td>
<?php if($database->variablespermisos('','INBURSA_VERIFICARfiltro','borrar')=='si'){ ?>
<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataINBURSAborrar" />
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
