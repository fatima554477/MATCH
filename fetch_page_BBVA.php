<?php 


?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">     
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar21" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar21" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO <a style="color:red;font:12px">    (BBVA)</a></p></strong></div>


<div  id="mensajefiltro"></div>
<div  id="pasarpagado2"></div>

							
	        <div id="target21" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader2" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="20%" align="center">
	<span>Mostrar</span>
	<select  class="form-select mb-3" id="per_page2" onchange="load2(1);">
		<option value="10" <?php if(!empty($_REQUEST['per_page'])){echo 'selected';} ?>>8</option>
        <option value="20" <?php if($_REQUEST['per_page']=='20') echo 'selected'; ?>>20</option>
        <option value="50" <?php if($_REQUEST['per_page']=='50') echo 'selected'; ?>>50</option>
        <option value="100"<?php if($_REQUEST['per_page']=='100')echo 'selected'; ?>>100</option>
        <option value="1000"<?php if($_REQUEST['per_page']=='1000')echo 'selected'; ?>>TODOS</option>		
	</select>
</td>


<td width="20%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="load2(1);"  href="javascript:void(0);" >BUSCAR/RESET</button>
</td>


<td width="20%" align="center">					
<span class="btn btn-sm btn-outline-success px-5" type="button" onclick="LIMPIAR2();">LIMPIAR FILTRO</span> 
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
<div id="mensajeBBVA"></div> 
               <!--   <form name="form_emil_BBVA" id="form_emil_BBVA">
				  
             <td ><textarea  placeholder="ESCRIBE AQUÍ TUS CORREOS SEPARADOS POR PUNTO Y COMA EJEMPLO: NOMBRE@CORREO.ES;NOMBRE@CORREO.ES" style="width: 500px;" name="EMAIL_BBVA" id="EMAIL_BBVA" class="form-control" aria-label="With textarea"><?php echo $EMAIL_BBVA; ?></textarea>
            <button class="btn btn-sm btn-outline-success px-5"  type="button" id="BUTTON_INCIDENCIAS">ENVIAR POR EMAIL</button></td> -->
		<div class="datos_ajax2">
		</div>
		<!--</form>
aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "clasesBBVA/script.filtro.php";
?>