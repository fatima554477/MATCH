<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar2" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar2" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp;MATCH CON ESTADO DE CUENTA&nbsp;&nbsp;  <a style="color:red;font:12px">    (AMERICAN EXPRESS)</a></p></strong>


<div  id="mensajeMATCH">
<div class="progress" style="width: 25%;">
									<div class="progress-bar" role="progressbar" style="width: <?php echo $eventoscrono ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
									</div>
									</div>
							
	        <div id="target2" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
   <?php if($conexion->variablespermisos('PRUEBA','MATCH_AMERICAN','guardar')=='si'){ ?>
                      <form class="row g-3 needs-validation was-validated" id="MATCHform"  novalidate="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

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
$encabezadoA = '<select class="form-select mb-3" aria-label="Default select example" id="COLABORADOR_MATCH" required="" name="COLABORADOR_MATCH"  placeholder="SELECIONA UNA OPCIÓN"><option value="">SELECCIONA UNA OPCIÓN</option>';


$fondos = array("fff0df","f4ffdf","dfffed","dffeff","dfe8ff","efdfff","ffdffd","efdfff","ffdfe9");
$num = 0;

while($row156 = mysqli_fetch_array($queryper))
{

if($num==8){$num=0;}else{$num++;}

$select='';
//if($COLABORADOR_MATCH==$row156['USUARIO_CRM']){$select = "selected";};

$nombre_apellido2 = $match->informacionpersonal_contrasenias($row156['idem']);

$option2 .= '<option style="background: #'.$fondos[$num].'" '.$select.' value="'.$nombre_apellido2.'">'.$nombre_apellido2.'</option>';
}
echo $encabezadoA.$option2.'</select>';		
?></td>

    </tr>
<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">INSTITUCIÓN BANCARIA:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="AMERICAN EXPRESS" name="TARJETA_MATCH"  readonly="readonly"></td>

    </tr>
    <tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">FECHA DEL CARGO:</th>
    <td  style="background:#ebf8fa"><input type="date" class="form-control" id="validationCustom03" required=""  value="<?php echo $FECHADD_MATCH; ?>" name="FECHADD_MATCH"></td>

</tr>
<tr>
    <th style="background:#ebf8fa; text-align:left" scope="col">NOMBRE COMERCIAL:</th>
    <td  style="background:#ebf8fa"><input type="text" class="form-control" id="validationCustom03" required=""  value="<?php echo $ESTABLECIMIENTO_MATCH; ?>" name="ESTABLECIMIENTO_MATCH"></td>

</tr>

<tr style="background:#ebf8fa"> 
         <th  scope="row"> <label for="validationCustom03" class="form-label">MONTO:</label></th>
         <td>

         <div class="input-group mb-3"> <span class="input-group-text">$</span><input type="text"  style="width:450px;height:40px;"  class="form-control" id="MONTO_MATCH" required="" value="<?php echo number_format($MONTO_MATCH,2,'.',','); ?>" name="MONTO_MATCH" onkeyup="comasainput('MONTO_MATCH')">
 </div>
 </td>
         </tr>
    </table>

<table class="table mb-0 table-striped">
<tr style="background:#ebf8fa;">
<th style="text-align:center" scope="col">OBSERVACIONES</th>
<td ><textarea style="width:400px;" name="OBSERVACIONES_MATCH" class="form-control" aria-label="With textarea"><?php echo $OBSERVACIONES_MATCH; ?></textarea></td><br></br>
           
           </tr>
                          
                          
                          <div><tr>
                        <th style="text-align:center;background:#faebee;" scope="col">FECHA DE ÚLTIMA CARGA</th>   
           <td  style="background:#faebee">
           <strong>
           <?php echo date('Y-m-d'); ?>
           </strong>
           <input type="hidden" style="width:200px;"  class="form-control" id="validationCustom03"   value="<?php echo date('Y-m-d'); ?>" name="FECHA_MATCH">
           
           </td></tr></div>



                                    
    <input type="hidden" value="hMATCH" name="hMATCH"/>     
 
  <table>
  <tr>    
 <th>
           

 <button  style="float:right"  class="btn btn-sm btn-outline-success px-5"   type="button" id="GUARDAR_MATCH">GUARDAR</button></th></tr></table>
           
            
                
 </form><?php } ?>
  <?php if($conexion->variablespermisos('','MATCH_AMERICAN','email')=='si'){ ?>


                  <form name="form_emil_MATCH" id="form_emil_MATCH">
				  <tr>
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_MATCH" id="EMAIL_MATCH" class="form-control" aria-label="With textarea"><?php echo $EMAIL_MATCH; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_MATCH">ENVIAR POR EMAIL</button></td><?php } ?>  </tr>
<tr><td>
<BR/><BR/><BR/>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?DESCARGARMATCH=1" target="_blank">DESCARGAR EXCEL CON REGISTROS</a>
</td></tr>
</table>
<?php
//$querycontras = $match->Listado_MATCH();
?>

<br />





</div>  
</div>
</div>
