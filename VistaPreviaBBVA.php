<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }  
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'';
if($identioficador != '')
{
 $output = '';
	require "controladorMH.php";
	$conexion = NEW accesoclase();

$queryVISTAPREV = $conexion->Listado_BBVA2($identioficador);
 $output .= '
<div id="vistaPreviaBBVA" class="vista-previa-bbva">
  <div class="vista-previa-bbva-header">Vista Previa BBVA</div>
  <div class="vista-previa-bbva-body">
    <div id="mensajeBBVAActualiza2"></div>
    <form  id="Listado_BBVAform">
      <div class="table-responsive">
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    		
             $output .= '                             

			 
			 
			 
<tr>
<td width="30%"><label>COLABORADOR</label></td>
<td width="70%"><input type="text" name="COLABORADOR_BBVA" value="'.$row["COLABORADOR_BBVA"].'"></td>
</tr> 

<tr>
<td width="30%"><label>INSTITUCIÓN BANCARIA</label></td>
<td width="70%"><input type="text" name="TARJETA_BBVA" value="'.$row["TARJETA_BBVA"].'"></td>
</tr>

<tr>
<td width="30%"><label>FECHA DEL CARGO</label></td>
<td width="70%"><input type="date" name="FECHADD_BBVA" value="'.$row["FECHADD_BBVA"].'"></td>
</tr>


<tr>
<td width="30%"><label>ESTABLECIMIENTO</label></td>
<td width="70%"><input type="text" name="ESTABLECIMIENTO_BBVA" value="'.$row["ESTABLECIMIENTO_BBVA"].'"></td>
</tr> 

 

<tr>
<td width="30%"><label>MONTO</label></td>
<td width="70%"><input type="text" name="MONTO_BBVA" value="'.$row["MONTO_BBVA"].'"></td>
</tr> 


<tr>
<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_BBVA" value="'.$row["OBSERVACIONES_BBVA"].'"></td>
</tr> 

<tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type=»text» readonly=»readonly» name="FECHA_BBVA" value="'.$row["FECHA_BBVA"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpBBVA"  id="IpBBVA"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickBBVA">GUARDAR</button>
			
                        <input type="hidden" value="enviarBBVA"  name="enviarBBVA"/>

                        </td>
        </tr>
     ';
    //IPCIERRE
    $output .= '</table></div></form></div></div>';
    echo $output;
}
//
?>
<style>
.vista-previa-bbva-body{max-height:400px;overflow-y:auto;}
.vista-previa-bbva-header{position:sticky;top:0;background:#fff;padding:10px;cursor:move;z-index:100;}
</style>

<script>


    $(document).ready(function(){
        const modal = document.getElementById('vistaPreviaBBVA');
        const header = document.querySelector('.vista-previa-bbva-header');
        let isDown = false;
        let offset = [0,0];

        header.addEventListener('mousedown', function(e){
            isDown = true;
            offset = [modal.offsetLeft - e.clientX, modal.offsetTop - e.clientY];
        });
        document.addEventListener('mouseup', function(){
            isDown = false;
        });
        document.addEventListener('mousemove', function(e){
            if (!isDown) return;
            modal.style.position = 'absolute';
            modal.style.left = (e.clientX + offset[0]) + 'px';
            modal.style.top = (e.clientY + offset[1]) + 'px';
        });

        $("#clickBBVA").click(function(){
           $.ajax({
                url:"reportes/controladorMH.php",
            method:"POST",
            data:$('#Listado_BBVAform').serialize(),

            beforeSend:function(){
            $('#mensajeBBVAActualiza2').html('cargando');
            },

            success:function(data){
                        $("#reset_BBVA").load(location.href + " #reset_BBVA");
            $('#mensajeBBVA').html("<span id=\"ACTUALIZADO\" >"+data+"</span>");
                        $('#dataModal').modal('hide');
            }
           });
        });

                });

        </script>