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
	//$conexion = NEW accesoclase();
	$idempermiso = $_SESSION["idempermiso"];
	$conn = $match->db();
	echo 'ROL DE TRABAJO: '.$permiso = $conexion2->idempermiso($idempermiso,$conn);
	$queryVISTAPREV = $match->SELECT_match_xml($identioficador);
	$var_respuesta = $conexion->variablespermisos('','AMERICAN_VERIFICAR','ver');
 $output .= '
<div id="mensajeMATCHAdocumentos"></div> 
 <form  id="Listado_MATCH_documentos_form"> 
      <div class="table-responsive">  
           <table class="table table-bordered">
		   <tr>
		   <td width="30%">id</td>		   
		   <td width="30%">NÚMERO DE EVENTO</td>
		   <td width="30%">NOMBRE DEL EVENTO</td>
		   <td width="30%">CONCEPTO DEL GASTO</td>
		   <td width="30%">UUID</td>
		   <td width="30%">DESCRIPCION</td>
		   <td width="30%">FECHA TIMBRADO</td>
		   <td width="30%">TOTAL</td>
		   <td width="30%">MATCH</td>		   
		   </tr>
		   ';

    		while($row = mysqli_fetch_array($queryVISTAPREV)){
				if($row['TARJETA']!='AMERICANE' and $row['TABLE_MATCH']=='si'){
					//echo 'pppppppppppppp'.$row["idd"];
					continue;
				}				
             $output .= '

<tr>
<td width="20%">'.$row["idd"].'</td>
<td width="20%">'.$row["NUMERO_EVENTO"].'</td>
<td width="20%">'.$row["NOMBRE_EVENTO"].'</td>
<td width="20%">'.$row["MOTIVO_GASTO"].'</td>
<td width="20%">'.$row["UUID"].'</td>
<td width="20%">'.$row["CONCEPTO_PROVEE"].'</td>
<td width="20%">'.$row["fechaTimbrado"].'</td>
<td width="20%">$'. number_format( $row["total"],2,'.',',').'</td>
			<td width="20%">
			<input type="checkbox" style="width:30px; color:red;" name="documentos'.$row["idd"].'"  value="'.$row["idd"].'" class="form-check-input" 
			id="documentos'.$row['idd'].'"  
			onclick="pasarmatchdocumento('.$row["idd"].','.$identioficador.',\'AMERICANE\')" 
			'./*regresa checked*/$match->validaexistematch($row["idd"],$identioficador,'AMERICANE').' 
			'./*regresa disabled*/$match->validaexistematch3res($row["idd"],$identioficador,$permiso,'AMERICANE',$var_respuesta).'> &nbsp;&nbsp;&nbsp;&nbsp;'.$match->validaexistematch4($row["idd"],'AMERICANE').'
			</td>
</tr> 

	';
			}


	 $output .= '<tr>  
            <td width="30%" colspan="5"></td>  
            <td width="30%">
			<label>GUARDAR</label>
			<input type="hidden" value="'.$row["idd"].'"  name="IpMATCHDOCUMENTOS"  id="IpMATCHDOCUMENTOS"/>
			
			
			<input type="hidden" value="enviarMATCHDOCUMENTOS"  name="enviarMATCHDOCUMENTOS"/>

			</td>  
			<td width="30%">
			<button class="btn btn-sm btn-outline-success px-5" type="button" id="clickMATCH">GUARDAR</button>
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

function pasarmatchdocumento(pasardocumentomatch_id,IpMATCHDOCUMENTOS2,tarjeta){
	//$('#personal_detalles4').html();

	var checkBox = document.getElementById("documentos"+pasardocumentomatch_id);
	//var checkBox = document.getElementById("documentos"+pasardocumentomatch_id);
	var pasardocumentomatch_text = "";
	if (checkBox.checked == true){
	pasardocumentomatch_text = "si";
	}else{
	pasardocumentomatch_text = "no";
	}
	  $.ajax({
		url:'reportes/controladorMH.php',
		method:'POST',
		data:{pasardocumentomatch_id:pasardocumentomatch_id,pasardocumentomatch_text:pasardocumentomatch_text,IpMATCHDOCUMENTOS2:IpMATCHDOCUMENTOS2,tarjeta:tarjeta},
		beforeSend:function(){
		$('#mensajeMATCHAdocumentos').html('cargando');
	},
		success:function(data){
    $('#mensajeMATCHAdocumentos').html("<span id='ACTUALIZADO' >"+data+"</span>");
	//$("#reset_MATCH").load(location.href + " #reset_MATCH");
		$.getScript(load1(1));	
	/*$("#actualizatotalpagadoingreso").load(location.href + " #actualizatotalpagadoingreso");
		$("#reset_totales_egresos").load(location.href + " #reset_totales_egresos");
		$('#mensapagosingresos').html("<span id='ACTUALIZADO' >"+data+"</span>");*/
	}
	});

}


    $(document).ready(function(){

$("#clickMATCH").click(function(){
	
   $.ajax({  
	url:"reportes/controladorMH.php",
    method:"POST",  
    data:$('#Listado_MATCH_documentos_form').serialize(),

    beforeSend:function(){  
    $('#mensajeMATCHAdocumentos').html('cargando'); 
    }, 	
	
    success:function(data){
    //$('#mensajeMATCHAdocumentos').html(data);
	$('#dataModal4').modal('hide'); 	
	//$("#reset_MATCH").load(location.href + " #reset_MATCH");
		$.getScript(load1(1));
	/*$('#mensajeMATCH').html("<span id='ACTUALIZADO' >"+data+"</span>"); 
*/

    }  
   });
   
});

		});
		
	</script>