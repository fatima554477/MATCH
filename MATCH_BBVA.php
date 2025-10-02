<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar5" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar5" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;MATCH CON ESTADO DE CUENTA&nbsp;&nbsp;  <a style="color:red;font:12px">    (BBVA)</a></p></strong>


<div  id="mensajeBBVA">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target5" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
		   <?php if($conexion->variablespermisos('PRUEBA','MATCH_BBVA','guardar')=='si'){ ?>
  
                      <form class="row g-3 needs-validation was-validated" id="BBVAform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<table class="table mb-0 table-striped">
<tr>

<th style="text-align:center" scope="col"></th>
<th style="text-align:center" scope="col"></th>

</tr>

<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">COLABORADOR:</th>
       <td  style="background:#ebf8fa"><?php
$encabezadoA = '';
$queryper = $conexion->lista_plantillausuariocontrasenas();
$encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" id="COLABORADOR_BBVA" required="" name="COLABORADOR_BBVA"  placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row156 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($COLABORADOR_BBVA==$row156['USUARIO_CRM']){$select = "selected";};

$nombre_apellido2 = $match->informacionpersonal_contrasenias($row156['idem']);

$option3 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$nombre_apellido2.'">'.$nombre_apellido2.'</option>';
}
echo $encabezadoA.$option3.'</select>';		
?></td>

    </tr>
<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">INSTITUCIÓN BANCARIA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="BBVA" name="TARJETA_BBVA"  readonly="readonly"></td>

    </tr>
	
	<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NOMBRE COMERCIAL:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $ESTABLECIMIENTO_BBVA; ?>" name="ESTABLECIMIENTO_BBVA"></td>

</tr>
	
	
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">FECHA DEL CARGO:</th>
    <td  style="background:#ebf8fa"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHADD_BBVA; ?>" name="FECHADD_BBVA"></td>

</tr>


<tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">MONTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span>
		 <input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_BBVA" required="" value="<?php echo number_format($MONTO_BBVA,2,'.',','); ?>" name="MONTO_BBVA" onkeyup="comasainput('MONTO_BBVA')">
 </div>
 </td>
         </tr>
    </table>

<table class="table mb-0 table-striped">
<tr style="background:#ebf8fa;">
<th style="text-align:center" scope="col">OBSERVACIONES</th>
<td ><textarea style="width:400px;" name="OBSERVACIONES_BBVA" class="form-control" aria-label="With textarea"><?php echo $OBSERVACIONES_BBVA; ?></textarea></td><br></br>
           
           </tr>
                          
                          
                          <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_BBVA">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hBBVA" name="hBBVA"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_BBVA">GUARDAR</button></th></tr><?php } ?></table>
           
            
                
 </form>
<?php if($conexion->variablespermisos('','MATCH_BBVA','email')=='si'){ ?>


                  <form name="form_emil_BBVA" id="form_emil_BBVA">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_BBVA" id="EMAIL_BBVA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_BBVA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_BBVA">ENVIAR POR EMAIL</button></td><?php } ?>  </tr>
<tr><td>
<BR/><BR/><BR/>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?DESCARGARMATCHBBVA=1" target="_blank">DESCARGAR EXCEL CON REGISTROS</a>
</td></tr>
</table>
<?php
//$querycontras = $match->Listado_BBVA();
?>
<!--
<br />
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_BBVA' name='reset_BBVA'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">id</th> 
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="10%"style="background:#c9e8e8">COLABORADOR</th>  
<th width="20%"style="background:#c9e8e8">INTITUCIÓN BANCARIA</th>
<th width="20%"style="background:#c9e8e8">NOMBRE COMERCIAL</th>
<th width="20%"style="background:#c9e8e8">FECHA DEL CARGO</th>

<th width="20%"style="background:#c9e8e8">MONTO</th>
<th width="20%"style="background:#c9e8e8">COMPROBAR</th>
<th width="20%"style="background:#c9e8e8">STATUS DE<br>COMPROBACIÓN</th>
<th width="20%"style="background:#c9e8e8">OBSERVACIONES</th>
<th width="20%"style="background:#c9e8e8">FECHA DE CARGA</th>
</tr>

<?php
while($row = mysqli_fetch_array($querycontras))   
{
?>
<tr style='background:#f5f9fc;text-align:center'>

<td ><?php echo $row["id"]; ?></td>

<td style="text-align:center" >
<input type="checkbox" style="width:15%" class="form-check-input" name="matchbbvaarray[]" id="matchbbvaarray" value="<?php echo $row["id"]; ?>"/> </td>
<td ><?php echo $row["COLABORADOR_BBVA"]; ?></td>
<td ><?php echo $row["TARJETA_BBVA"]; ?></td>
<td ><?php echo $row["ESTABLECIMIENTO_BBVA"]; ?></td>
<td ><?php echo $row["FECHADD_BBVA"]; ?></td>
<td ><?php echo number_format($row["MONTO_BBVA"],2,'.',','); ?></td>


<td class="dropdown">
	<input class="btn btn-success dropdown-toggle" value="COMPROBAR" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		<ul class="dropdown-menu">
			<li style="background-color:#edccf3; cursor:pointer;" name="view" value="COMPROBAR"  id="<?php echo $row["id"]; ?>" class="dropdown-item view_MATCH2">
			<a>COMPROBAR CON FACTURA <br>PREVIAMENTE CARGADA</a>
			</li>
			<li style="background-color:#ccd9f3"><a target="_blank" class="dropdown-item" href="https://epcinn.com/crm/sistemaPROD/comprobacionesVYO.php">COMPROBAR PARA <br>SUBIR FACTURA</a>
			</li>  
		</ul>
	</input>
</td>





<td style="text-align:center" >
<input type="checkbox" style="width:30%;color:red" class="form-check-input" <?php echo $match->validaexistematch2($row["id"],'TARJETABBVA'); ?> disabled> 
</td>


<td ><?php echo $row["OBSERVACIONES_BBVA"]; ?></td>
<td ><?php echo $row["FECHA_BBVA"]; ?></td>
  <?php if($conexion->variablespermisos('','MATCH_BBVA','modificar')=='si'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_BBVA" />
</td><?php } ?>
<?php if($conexion->variablespermisos('','MATCH_BBVA','borrar')=='si'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataBBVAborrar" />
</td><?php } ?>
</tr>
<?php
}
?>

</table>


</tbody>


</tbody>
</form>
</div>
</div>
-->
</div>  
</div>
</div>  
 