<?php 

if($hMATCH == 'hMATCH' or $enviarMATCH=='enviarMATCH'){
	  
		  
$TARJETA_MATCH = isset($_POST["TARJETA_MATCH"])?$_POST["TARJETA_MATCH"]:"";
$COLABORADOR_MATCH = isset($_POST["COLABORADOR_MATCH"])?$_POST["COLABORADOR_MATCH"]:"";
$ESTABLECIMIENTO_MATCH = isset($_POST["ESTABLECIMIENTO_MATCH"])?$_POST["ESTABLECIMIENTO_MATCH"]:"";
$FECHADD_MATCH = isset($_POST["FECHADD_MATCH"])?$_POST["FECHADD_MATCH"]:"";
$MONTO_MATCH = isset($_POST["MONTO_MATCH"])?$_POST["MONTO_MATCH"]:"";
$OBSERVACIONES_MATCH = isset($_POST["OBSERVACIONES_MATCH"])?$_POST["OBSERVACIONES_MATCH"]:"";
$FECHA_MATCH = date("Y-m-d");
$hMATCH = isset($_POST["hMATCH"])?$_POST["hMATCH"]:""; 
$IpMATCH = isset($_POST["IpMATCH"])?$_POST["IpMATCH"]:"";


	  
	//echo "si, aqui";
	$match->estadocuenta($TARJETA_MATCH , $COLABORADOR_MATCH , $ESTABLECIMIENTO_MATCH , $FECHADD_MATCH , $MONTO_MATCH , $OBSERVACIONES_MATCH , $FECHA_MATCH , $hMATCH,$enviarMATCH,$IpMATCH);
	
		/*$filepath = "clasesAMERICANE/";
		$RUTAFILTRO = 'reportes'; 
		$claseactual = 'class.epcinnMH.php';
		$tablesdb = '12match';
		include_once (__ROOT1__."/includes/crea_funciones_filtro_completo.php"); */ 
 }
elseif($EMAIL_MATCH ==true){
	//print_r($_POST);
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_MATCH=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';


$array = isset($_POST['matchAMERICAN'])?$_POST['matchAMERICAN']:'';
if($array != ''){
$loopcuenta = count($array) - 1;$loopcuenta2 = count($array) - 2;
$or1='';
for($rrr=0;$rrr<=$loopcuenta;$rrr++){
	if($rrr<=$loopcuenta2){$or1 = ' or ';}else{$or1 = '';}
	$query1 .= ' id= '.$array[$rrr].$or1;
}
$query2 = str_replace('[object Object]','',$query1);
$query2 = " (".$query2.") ";
}else{
	echo "SELECCIONA UNA CASILLA DEL LISTADO DE ABAJO."; exit;
} 
                                                                  
$MANDA_INFORMACION = $match->MANDA_INFORMACION('TARJETA_MATCH ,TARJETA_MATCH,ESTABLECIMIENTO_MATCH,MONTO_MATCH,OBSERVACIONES_MATCH,FECHA_MATCH',

'TARJETA_MATCH ,TARJETA_MATCH,ESTABLECIMIENTO_MATCH,MONTO_MATCH,OBSERVACIONES_MATCH,FECHA_MATCH', '12match',  " where ".$query2 );

$variables = 'ADJUNTO_MATCH, ';
//DOCUMENTO_MATCH trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = '';//$match->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'12match', " where idRelacion = '".$_SESSION['idv'] ."' ".$query2 );

$html = $match->html2('TARJETA AMERICAN EXPRESS',$MANDA_INFORMACION );
$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
//$idlogo = $vehiculos->variable_comborelacion1a();
//$logo = $vehiculos->variables_informacionfiscal_logo($idlogo);


$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}  
	  
 if($borra_MATCH == 'borra_MATCH' ){

$borra_matchh = isset($_POST["borra_matchh"])?$_POST["borra_matchh"]:"";
	echo $match->borra_MATCH( $borra_matchh );
}	  
	//include_once (__ROOT1__."/includes/crea_funciones.php"); 	  
	

//////////////////////////////////////////////////////////////////////////////////EXEL/////////////////////////////////////////////////////////////////////
$MANDAMATCHexcel = isset($_POST["MANDAMATCHexcel"])?$_POST["MANDAMATCHexcel"]:"";
if($MANDAMATCHexcel=='MANDAMATCHexcel'){
	
if( $_FILES["DOCUU_excelMATCH"] == true){
$DOCUU_excelMATCH = $match->solocargarexcel("DOCUU_excelMATCH");
}if($DOCUU_excelMATCH=='2' or $DOCUU_excelMATCH=='' or $DOCUU_excelMATCH=='1'){
	$DOCUU_excelMATCH1="";
} else{
 $DOCUU_excelMATCH1 = __ROOT1__.'/includes/archivos/'.$DOCUU_excelMATCH;
}

	$DOCUU_excelMATCH1;

	$cargare = isset($DOCUU_excelMATCH1) ?$DOCUU_excelMATCH1 :'' ;
	if($cargare!=''){
require_once __ROOT1__.'/Classes/PHPExcel.php';

$inputFileType = PHPExcel_IOFactory::identify($DOCUU_excelMATCH1);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($DOCUU_excelMATCH1);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
		$conn = $match->db();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';
		//$var1 = "TRUNCATE TABLE 12match;  ";
		//mysqli_query($conn,$var1) or die('P276'.mysqli_error($conn));		
	for ($row = 2; $row <= $highestRow; $row++){
				$TARJETA_MATCH = '';$COLABORADOR_MATCH ='';$ESTABLECIMIENTO_MATCH ='';$FECHADD_MATCH = '';$MONTO_MATCH='';$OBSERVACIONES_MATCH ='';
		$COLABORADOR_MATCH =  addslashes($sheet->getCell("A".$row)->getValue()) ;
		$TARJETA_MATCH =  addslashes($sheet->getCell("B".$row)->getValue()) ;
		//$FECHADD_MATCH =  addslashes($sheet->getCell("C".$row)->getValue()) ;
		$ESTABLECIMIENTO_MATCH =  addslashes($sheet->getCell("D".$row)->getValue()) ;
		$MONTO_MATCH =  addslashes($sheet->getCell("E".$row)->getValue()) ;
		$OBSERVACIONES_MATCH =  addslashes($sheet->getCell("F".$row)->getValue()) ;

		
		//if($TARJETA_MATCH != '' ){
			$COLABORADOR_MATCH = trim(iconv("UTF-8","ISO-8859-1",$COLABORADOR_MATCH)," \t\n\r\0\x0B\xA0");	
			$TARJETA_MATCH = trim(iconv("UTF-8","ISO-8859-1",$TARJETA_MATCH)," \t\n\r\0\x0B\xA0");
			$ESTABLECIMIENTO_MATCH = trim(iconv("UTF-8","ISO-8859-1",$ESTABLECIMIENTO_MATCH)," \t\n\r\0\x0B\xA0");
			
     /*$FECHADD_MATCH = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP(
	 trim(iconv("UTF-8","ISO-8859-1",$FECHADD_MATCH)," \t\n\r\0\x0B\xA0"))
	 ); */

$timestamp = '';
$timestamp = PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("C".$row)->getValue() + 1) ;
$FECHADD_MATCH = date("Y-m-d",$timestamp);

			$MONTO_MATCH = trim(iconv("UTF-8","ISO-8859-1",$MONTO_MATCH)," \t\n\r\0\x0B\xA0");			
			$OBSERVACIONES_MATCH = trim(iconv("UTF-8","ISO-8859-1",$OBSERVACIONES_MATCH)," \t\n\r\0\x0B\xA0");
			$FECHA_MATCH = date("Y-m-d");
			$var2 = "insert into 12match (
			COLABORADOR_MATCH, 
			TARJETA_MATCH , 
			ESTABLECIMIENTO_MATCH,	
			FECHADD_MATCH, 
			MONTO_MATCH, 
			OBSERVACIONES_MATCH,
			idRelacion,
			FECHA_MATCH) values ( 
			'".$COLABORADOR_MATCH."', 
			'".$TARJETA_MATCH."' ,
			'".$ESTABLECIMIENTO_MATCH."' ,
			'".$FECHADD_MATCH."' , 
			'".$MONTO_MATCH."' , 
			'".$OBSERVACIONES_MATCH."',
			'".$session."',
			'".$FECHA_MATCH."'
			);  ";
			mysqli_query($conn,$var2) or die('P276'.mysqli_error($conn));
		//}else{echo "NÚMERO DE TARJETA VACÍA";}
	}
			echo "Actualizado";
			unlink($cargare);
	}else{
		echo "No hay documento";
	}
	
	//include_once (__ROOT1__."/includes/crea_funciones.php"); 	  
	
}

$enviarMATCHDOCUMENTOS = isset($_POST["enviarMATCHDOCUMENTOS"])?$_POST["enviarMATCHDOCUMENTOS"]:'';
if($enviarMATCHDOCUMENTOS=='enviarMATCHDOCUMENTOS'){
	echo "entro enviarMATCHDOCUMENTOS";
}


?>