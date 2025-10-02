<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar7" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar7" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;MATCH CON ESTADO DE CUENTA&nbsp;&nbsp;  <a style="color:red;font:12px">    (INBURSA)</a></p></strong>


<div  id="mensajeINBURSA">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target7" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
   <?php if($conexion->variablespermisos('PRUEBA','MATCH_INBURSA','guardar')=='si'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="INBURSAform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

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
$encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" id="COLABORADOR_INBURSA" required="" name="COLABORADOR_INBURSA"  placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row156 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($COLABORADOR_INBURSA==$row156['USUARIO_CRM']){$select = "selected";};

$nombre_apellido2 = $match->informacionpersonal_contrasenias($row156['idem']);

$option3 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$nombre_apellido2.'">'.$nombre_apellido2.'</option>';
}
echo $encabezadoA.$option3.'</select>';		
?></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">INSTITUCIÓN BANCARIA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="INBURSA" name="TARJETA_INBURSA"  readonly="readonly"></td>

    </tr>
    	
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">FECHA DEL CARGO:</th>
    <td  style="background:#ebf8fa"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHADD_INBURSA; ?>" name="FECHADD_INBURSA"></td>

</tr>


	
	<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NOMBRE COMERCIAL:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $ESTABLECIMIENTO_INBURSA; ?>" name="ESTABLECIMIENTO_INBURSA"></td>

</tr>
	
<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">RFC:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $RFC_INBURSA; ?>" name="RFC_INBURSA"></td>

</tr>
	


<tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">MONTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_INBURSA" required="" value="<?php echo number_format($MONTO_INBURSA,2,'.',','); ?>" name="MONTO_INBURSA" onkeyup="comasainput('MONTO_INBURSA')">
 </div>
 </td>
         </tr>
		 

		 
    </table>

<table class="table mb-0 table-striped">
<tr style="background:#ebf8fa;">
<th style="text-align:center" scope="col">OBSERVACIONES</th>
<td ><textarea style="width:400px;" name="OBSERVACIONES_INBURSA" class="form-control" aria-label="With textarea"><?php echo $OBSERVACIONES_INBURSA; ?></textarea></td><br></br>
           
           </tr>
                          
                          
                          <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_INBURSA">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hINBURSA" name="hINBURSA"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_INBURSA">GUARDAR</button></th></tr></table>
           
            
                
 </form><?php } ?>


       <?php if($conexion->variablespermisos('','MATCH_INBURSA','email')=='si'){ ?>
                  <form name="form_emil_INBURSA" id="form_emil_INBURSA">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_INBURSA" id="EMAIL_INBURSA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_INBURSA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_INBURSA">ENVIAR POR EMAIL</button></td>  </tr><?php } ?>
<tr><td>
<BR/><BR/><BR/>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?DESCARGARMATCHINBURSA=1" target="_blank">DESCARGAR EXCEL CON REGISTROS</a>
</td></tr>
</table>
<?php
$querycontras = $match->Listado_INBURSA();
?>

<br />
<!--
<div class='table-responsive'>
<div align='right'>
</div>
<br />
<div id='employee_table'>
<tbody= 'font-style:italic;'>
<table class="table table-striped table-bordered" style="width:100%" id='reset_INBURSA' name='reset_INBURSA'>
<tr style='background:#f5f9fc;text-align:center'>
<th width="10%"style="background:#c9e8e8">id</th> 
<th width="10%"style="background:#c9e8e8">ENVIAR POR EMAIL</th>  
<th width="10%"style="background:#c9e8e8">COLABORADOR</th>
<th width="20%"style="background:#c9e8e8">INTITUCIÓN BANCARIA</th>
<th width="20%"style="background:#c9e8e8">FECHA DEL CARGO</th>
<th width="20%"style="background:#c9e8e8">NOMBRE COMERCIAL</th>
<th width="20%"style="background:#c9e8e8">RFC</th>
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
<input type="checkbox" style="width:15%" class="form-check-input" name="matchinb[]" id="matchinb" value="<?php echo $row["id"]; ?>"/> </td>

<td ><?php echo $row["COLABORADOR_INBURSA"]; ?></td>
<td ><?php echo $row["TARJETA_INBURSA"]; ?></td>
<td ><?php echo $row["FECHADD_INBURSA"]; ?></td>
<td ><?php echo $row["ESTABLECIMIENTO_INBURSA"]; ?></td>
<td ><?php echo $row["RFC_INBURSA"]; ?></td>
<td ><?php echo number_format($row["MONTO_INBURSA"],2,'.',','); ?></td>

<td class="dropdown">
	<input class="btn btn-success dropdown-toggle" value="COMPROBAR" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		<ul class="dropdown-menu">
			<li style="background-color:#edccf3; cursor:pointer;" name="view" value="COMPROBAR"  id="<?php echo $row["id"]; ?>" class="dropdown-item view_MATCH2INBURSA" >
			<a>COMPROBAR CON FACTURA <br>PREVIAMENTE CARGADA</a>
			</li>
			<li style="background-color:#ccd9f3"><a class="dropdown-item" href="https://epcinn.com/crm/sistemaPROD/comprobacionesVYO.php">COMPROBAR PARA <br>SUBIR FACTURA</a>
			</li>  
		</ul>
	</input>
</td>

<td style="text-align:center" >
<input type="checkbox" style="width:30%;color:red" class="form-check-input" <?php echo $match->validaexistematch2($row["id"],'INBURSA'); ?> disabled> 
</td>


<td ><?php echo $row["OBSERVACIONES_INBURSA"]; ?></td>
<td ><?php echo $row["FECHA_INBURSA"]; ?></td>
<?php if($conexion->variablespermisos('','MATCH_INBURSA','modificar')=='si'){ ?>
<td>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_INBURSA" />
</td><?php } ?>
<?php if($conexion->variablespermisos('','MATCH_INBURSA','borrar')=='si'){ ?>
<td><input type="button" name="view2" value="BORRAR" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_dataINBURSAborrar" />
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
 
