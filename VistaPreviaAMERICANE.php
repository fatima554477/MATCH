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

$queryVISTAPREV = $conexion->Listado_MATCH2($identioficador);
 $output .= '
<div id="mensajeMATCHActualiza2"></div> 
 <form  id="Listado_MATCHform"> 
      <div class="table-responsive">  
           <table class="table table-bordered">';
    $row = mysqli_fetch_array($queryVISTAPREV);
    		
             $output .= '                             

			 
			 
			 
<tr>
<td width="30%"><label>COLABORADOR</label></td>
<td width="70%"><input type="text" name="COLABORADOR_MATCH" value="'.$row["COLABORADOR_MATCH"].'"></td>
</tr> 

<tr>
<td width="30%"><label>INSTITUCIÓN BANCARIA</label></td>
<td width="70%"><input type="text" name="TARJETA_MATCH" value="'.$row["TARJETA_MATCH"].'"></td>
</tr>
<tr>
<td width="30%"><label>FECHA DEL CARGO</label></td>
<td width="70%"><input type="date" name="FECHADD_MATCH" value="'.$row["FECHADD_MATCH"].'"></td>
</tr>


<tr>
<td width="30%"><label>ESTABLECIMIENTO</label></td>
<td width="70%"><input type="text" name="ESTABLECIMIENTO_MATCH" value="'.$row["ESTABLECIMIENTO_MATCH"].'"></td>
</tr> 

 

<tr>
<td width="30%"><label>MONTO</label></td>
<td width="70%"><input type="text" name="MONTO_MATCH" value="'.$row["MONTO_MATCH"].'"></td>
</tr> 






<td width="30%"><label>OBSERVACIONES</label></td>
<td width="70%"><input type="text" name="OBSERVACIONES_MATCH" value="'.$row["OBSERVACIONES_MATCH"].'"></td>
</tr> <tr>
<td width="30%"><label>FECHA DE ÚLTIMA CARGA</label></td>
<td width="70%"><input type=»text» readonly=»readonly» name="FECHA_MATCH" value="'.$row["FECHA_MATCH"].'"></td>
</tr> 



	';
	


	 $output .= '<tr>  
            <td width="30%"><label>GUARDAR</label></td>  
            <td width="70%">
			
			<input type="hidden" value="'.$row["id"].'"  name="IpMATCH"  id="IpMATCH"/>
			
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickMATCH">GUARDAR</button>
			
			<input type="hidden" value="enviarMATCH"  name="enviarMATCH"/>

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
	        form_data.append("IpMATCH",  $("#IpMATCH").val());
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

$("#clickMATCH").click(function(){
	
   $.ajax({  
	url:"reportes/controladorMH.php",
    method:"POST",  
    data:$('#Listado_MATCHform').serialize(),

    beforeSend:function(){  
    $('#mensajeMATCHActualiza2').html('cargando'); 
    }, 	
	
    success:function(data){
	
		$("#reset_MATCH").load(location.href + " #reset_MATCH");
    $('#mensajeMATCH').html("<span id='ACTUALIZADO' >"+data+"</span>"); 

			$('#dataModal').modal('hide');

    }  
   });
   
});

		});
		
	</script>