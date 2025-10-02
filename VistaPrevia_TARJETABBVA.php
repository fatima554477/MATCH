<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	//echo "ASDFASDFASDFASD";
//select.php  CONTRASENA_DE1
$identioficador = isset($_POST["personal_id"])?$_POST["personal_id"]:'S';
/*if($identioficador == 'S')
{*/
 $output = '';
	require "controladorMH.php";
	//$conexion = NEW accesoclase();
	//echo "ASDFASDFASDFASD";
	$queryVISTAPREV = $match->validaexistematch5('TARJETABBVA');
	//echo "ASDFASDFASDFASD";
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
	   
		   </tr>
		   ';

    		while($row = mysqli_fetch_array($queryVISTAPREV)){
			$row2=$match->SELECT_match_xml2($row['documentoConFactura']);
			
			$GTOTAL += $row2["total"];
             $output .= '
<tr>
<td width="20%">'.$row2["idd"].'</td>
<td width="20%">'.$row2["NUMERO_EVENTO"].'</td>
<td width="20%">'.$row2["NOMBRE_EVENTO"].'</td>
<td width="20%">'.$row2["MOTIVO_GASTO"].'</td>
<td width="20%">'.$row2["UUID"].'</td>
<td width="20%">'.$row2["CONCEPTO_PROVEE"].'</td>
<td width="20%">'.$row2["fechaTimbrado"].'</td>
<td width="20%">$'. number_format( $row2["total"],2,'.',',').'</td>

</tr> 

	';
			}


	 $output .= '<tr>  
            <td width="30%" colspan="6"></td>  
            <td width="30%">TOTAL</td>  
			<td width="30%">$'.NUMBER_FORMAT($GTOTAL,2,'.',',').'</td>
        </tr>
     ';
    //IPCIERRE
    $output .= '</table></div></form>';
    echo $output;
//}
//
?>

<script>

	</script>