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

$queryVISTAPREV = $conexion->Listado_INBURSA2($identioficador);
 $output .= '
<div id="mensajeINBURSAActualiza2"></div> 
 <form  id="Listado_INBURSAform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    		
             $output .= '                             

			 
			 
			 
<tr>
<td width="30%"><label>COLABORADOR</label></td>
<td width="70%"><input type="text" name="COLABORADOR_INBURSA" value="'.$row["COLABORADOR_INBURSA"].'"></td>
</tr> 

<tr>
<td width="30%"><label>INSTITUCIÓN BANCARIA</label></td>
<td width="70%"><input type="text" name="TARJETA_INBURSA" value="'.$row["TARJETA_INBURSA"].'"></td>
</tr>
<tr>
<td width="30%"><label>FECHA DEL CARGO</label></td>
<td width="70%"><input type="date" name="FECHADD_INBURSA" value="'.$row["FECHADD_INBURSA"].'"></td>
</tr>
<tr>
<td width="30%"><label>RFC</label></td>
<td width="70%"><input type="text" name="RFC_INBURSA" value="'.$row["RFC_INBURSA"].'"></td>
</tr> 

<tr>
<td width="30%"><label>ESTABLECIMIENTO</label></td>
<td width="70%"><input type="text" name="ESTABLECIMIENTO_INBURSA" value="'.$row["ESTABLECIMIENTO_INBURSA"].'"></td>
</tr> 

 

<tr>
<td width="30%"><label>MONTO</label></td>
<td width="70%"><input type="text" name="MONTO_INBURSA" value="'.$row["MONTO_INBURSA"].'"></td>
</tr> 






<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_INBURSA" value="'.$row["OBSERVACIONES_INBURSA"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type=»text» readonly=»readonly» name="FECHA_INBURSA" value="'.$row["FECHA_INBURSA"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpINBURSA"  id="IpINBURSA"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickINBURSA">GUARDAR</button>
			
			<input type="hidden" value="enviarINBURSA"  name="enviarINBURSA"/>

			</td>  
        </tr>
     ';
    //IPCIERRE
    $output .= '</table></div></form>';
    echo $output;
}
//
?>

<script>


var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload1(fileobj,name);
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        form_data.append("IpINBURSA",  $("#IpINBURSA").val());
	        $.ajax({
	            type: 'POST',
				url:"reportes/controladorMH.php",
				  dataType: "html",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#2'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#respuestaser').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {

if($.trim(response) == 2 ){

$('#2'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#2'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');	
}

	            }
	        });
	    }
	}


    $(document).ready(function(){

$("#clickINBURSA").click(function(){
	
   $.ajax({  
	url:"reportes/controladorMH.php",
    method:"POST",  
    data:$('#Listado_INBURSAform').serialize(),

    beforeSend:function(){  
    $('#mensajeINBURSAActualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
	
		$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
    $('#mensajeINBURSA').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>