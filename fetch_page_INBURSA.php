<?php 


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar22" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar22" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO  <a style="color:red;font:12px">    (INBURSA)</a></p></strong></div>


<div  id="mensajefiltro"></div>
<div  id="pasarpagado2"></div>

							
	        <div id="target22" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader3" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_page3" onchange="load3(1);">
		<option value="10" <?php if(!empty($_REQUEST['per_page3'])){echo 'selected';} ?>>8</option>
        <option value="20" <?php if($_REQUEST['per_page3']=='20') echo 'selected'; ?>>20</option>
        <option value="50" <?php if($_REQUEST['per_page3']=='50') echo 'selected'; ?>>50</option>
        <option value="100"<?php if($_REQUEST['per_page3']=='100')echo 'selected'; ?>>100</option>
        <option value="1000"<?php if($_REQUEST['per_page3']=='1000')echo 'selected'; ?>>TODOS</option>			
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="load3(1);"  href="javascript:void(0);" >BUSCAR/RESET</button>
</td>


<td width="20%" align="center">					
<span class="btn btn-sm btn-outline-success px-5" type="button" onclick="LIMPIAR3();">LIMPIAR FILTRO</span> 
</td>

	<!--onclick="location.href='pagoproveedores/clases/excel.php'"
onclick="window.open('https://www.w3.org/', '_blank');"-->


<td width="20%" align="center">
	<span>PLANTILLA</span>


	<?php

	
	?>	




</td>

</tr>
</table>
<div id="mensajeINBURSA"></div> 
                  <!--<form name="form_emil_INBURSA" id="form_emil_INBURSA">
				  
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_INBURSA" id="EMAIL_INBURSA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_INBURSA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_INCIDENCIAS">ENVIAR POR EMAIL</button></td> -->
		<div class="datos_ajax3">
		</div>
		<!--</form>-->
<!--aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "clasesINBURSA/script.filtro.php";
?>