<?php 



  if($hINBURSA == 'hINBURSA' or $enviarINBURSA=='enviarINBURSA'){
	  
		  
$TARJETA_INBURSA = isset($_POST["TARJETA_INBURSA"])?$_POST["TARJETA_INBURSA"]:"";
$COLABORADOR_INBURSA = isset($_POST["COLABORADOR_INBURSA"])?$_POST["COLABORADOR_INBURSA"]:"";
$ESTABLECIMIENTO_INBURSA = isset($_POST["ESTABLECIMIENTO_INBURSA"])?$_POST["ESTABLECIMIENTO_INBURSA"]:"";
$RFC_INBURSA = isset($_POST["RFC_INBURSA"])?$_POST["RFC_INBURSA"]:"";
$FECHADD_INBURSA = isset($_POST["FECHADD_INBURSA"])?$_POST["FECHADD_INBURSA"]:"";
$MONTO_INBURSA = isset($_POST["MONTO_INBURSA"])?$_POST["MONTO_INBURSA"]:"";
$OBSERVACIONES_INBURSA = isset($_POST["OBSERVACIONES_INBURSA"])?$_POST["OBSERVACIONES_INBURSA"]:"";
$FECHA_INBURSA = date("Y-m-d");
$hINBURSA = isset($_POST["hINBURSA"])?$_POST["hINBURSA"]:""; 
$IpINBURSA = isset($_POST["IpINBURSA"])?$_POST["IpINBURSA"]:"";


	  
	echo $match->estadocuentainbursa($TARJETA_INBURSA , $COLABORADOR_INBURSA , $ESTABLECIMIENTO_INBURSA ,$RFC_INBURSA, $FECHADD_INBURSA , $MONTO_INBURSA , $OBSERVACIONES_INBURSA , $FECHA_INBURSA , $hINBURSA,$enviarINBURSA,$IpINBURSA);

		/*$filepath = "clasesINBURSA/";
		$RUTAFILTRO = 'reportes'; 
		$claseactual = 'class.epcinnMH.php';
		$tablesdb = '12matchinbursa';
		include_once (__ROOT1__."/includes/crea_funciones_filtro_completo.php");*/
  
 }
elseif($EMAIL_INBURSA ==true){
	//print_r($_POST);
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_INBURSA=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';

$array = isset($_POST['matchinb'])?$_POST['matchinb']:'';
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
                                                                  
$MANDA_INFORMACION = $match->MANDA_INFORMACION('TARJETA_INBURSA, COLABORADOR_INBURSA, ESTABLECIMIENTO_INBURSA, FECHADD_INBURSA, RFC_INBURSA, MONTO_INBURSA, OBSERVACIONES_INBURSA ',

'TARJETA_INBURSA, COLABORADOR_INBURSA, ESTABLECIMIENTO_INBURSA, FECHADD_INBURSA, RFC_INBURSA, MONTO_INBURSA, OBSERVACIONES_INBURSA ', '12matchinbursa',  " where ".$query2 );

$variables = 'ADJUNTO_INBURSA, ';
//DOCUMENTO_INBURSA trim($variables, ',');

 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = '';//$match->ADJUNTA_IMAGENES_EMAIL($cadenacompleta,'12matchinbursa', " where idRelacion = '".$_SESSION['id'] ."' ".$query2 );

$html = $match->html2('FOTOS VEHICULOS',$MANDA_INFORMACION );
$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';
//$idlogo = $vehiculos->variable_comborelacion1a();
//$logo = $vehiculos->variables_informacionfiscal_logo($idlogo);


$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}  
	  
 if($borra_INBURSA == 'borra_INBURSA' ){

$borra_matchhIN = isset($_POST["borra_matchhIN"])?$_POST["borra_matchhIN"]:"";
	echo $match->borra_INBURSA( $borra_matchhIN );
}	  
	//include_once (__ROOT1__."/includes/crea_funciones.php"); 	  


//////////////////////////////////////////////////////////////////////////////////EXEL/////////////////////////////////////////////////////////////////////
$MANDAMATCHexcelINBURSA = isset($_POST["MANDAMATCHexcelINBURSA"])?$_POST["MANDAMATCHexcelINBURSA"]:"";
if($MANDAMATCHexcelINBURSA=='MANDAMATCHexcelINBURSA'){
	
if( $_FILES["DOCUU_excelMATCHINBURSA"] == true){
$DOCUU_excelMATCHINBURSA = $match->solocargarexcel2("DOCUU_excelMATCHINBURSA");
}if($DOCUU_excelMATCHINBURSA=='2' or $DOCUU_excelMATCHINBURSA=='' or $DOCUU_excelMATCHINBURSA=='1'){
	$DOCUU_excelMATCHINBURSA1="";
} else{
 $DOCUU_excelMATCHINBURSA1 = __ROOT1__.'/includes/archivos/'.$DOCUU_excelMATCHINBURSA;
}

	$DOCUU_excelMATCHINBURSA1;

	$cargare = isset($DOCUU_excelMATCHINBURSA1) ?$DOCUU_excelMATCHINBURSA1 :'' ;
	if($cargare!=''){
require_once __ROOT1__.'/Classes/PHPExcel.php';

$inputFileType = PHPExcel_IOFactory::identify($DOCUU_excelMATCHINBURSA1);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($DOCUU_excelMATCHINBURSA1);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
		$conn = $match->db();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';
		//$var1 = "TRUNCATE TABLE 12match;  ";
		//mysqli_query($conn,$var1) or die('P276'.mysqli_error($conn));		
	for ($row = 2; $row <= $highestRow; $row++){
		$TARJETA_INBURSA = '';$COLABORADOR_INBURSA ='';$ESTABLECIMIENTO_INBURSA ='';$FECHADD_INBURSA = '';$MONTO_INBURSA='';$OBSERVACIONES_INBURSA ='';
		
	$COLABORADOR_INBURSA =  addslashes($sheet->getCell("A".$row)->getValue()) ;
	$TARJETA_INBURSA =  addslashes($sheet->getCell("B".$row)->getValue()) ;
	//$FECHADD_INBURSA =  addslashes($sheet->getCell("C".$row)->getValue()) ;
	$ESTABLECIMIENTO_INBURSA =  addslashes($sheet->getCell("D".$row)->getValue()) ;
	$RFC_INBURSA =  addslashes($sheet->getCell("E".$row)->getValue()) ;
	$MONTO_INBURSA =  addslashes($sheet->getCell("F".$row)->getValue()) ;
	$OBSERVACIONES_INBURSA =  addslashes($sheet->getCell("G".$row)->getValue()) ;


//if($TARJETA_INBURSA != '' ){

	$TARJETA_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$TARJETA_INBURSA)," \t\n\r\0\x0B\xA0");
	$COLABORADOR_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$COLABORADOR_INBURSA)," \t\n\r\0\x0B\xA0");

/*$cell = $excel->getActiveSheet()->getCell('B' . $i);
$InvDate= $cell->getValue();
if(PHPExcel_Shared_Date::isDateTime($cell)) {
     $InvDate = date($format, PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
}*/
//$FECHADD_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$FECHADD_INBURSA)," \t\n\r\0\x0B\xA0");

//if(PHPExcel_Shared_Date::isDateTime($FECHADD_INBURSA)) {
   //  $FECHADD_INBURSA = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("C".$row)->getValue())); 
//}



$timestamp = '';
$timestamp = PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("C".$row)->getValue() + 1) ;
$FECHADD_INBURSA = date("Y-m-d",$timestamp);

	//$FECHADD_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$FECHADD_INBURSA)," \t\n\r\0\x0B\xA0");
	$ESTABLECIMIENTO_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$ESTABLECIMIENTO_INBURSA)," \t\n\r\0\x0B\xA0");
	$RFC_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$RFC_INBURSA)," \t\n\r\0\x0B\xA0");
	$MONTO_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$MONTO_INBURSA)," \t\n\r\0\x0B\xA0");			
	$OBSERVACIONES_INBURSA = trim(iconv("UTF-8","ISO-8859-1",$OBSERVACIONES_INBURSA)," \t\n\r\0\x0B\xA0");
	$FECHA_INBURSA = date('Y-m-d');
	$var2 = "insert into 12matchinbursa (
	TARJETA_INBURSA , 
	COLABORADOR_INBURSA, 	
	FECHADD_INBURSA,
    ESTABLECIMIENTO_INBURSA,	
	RFC_INBURSA, 
	MONTO_INBURSA, 
	OBSERVACIONES_INBURSA,
	idRelacion,
	FECHA_INBURSA) values ( 
	'".$TARJETA_INBURSA."' ,
	'".$COLABORADOR_INBURSA."', 
	'".$FECHADD_INBURSA."' ,
    '".$ESTABLECIMIENTO_INBURSA."' ,	
	'".$RFC_INBURSA."' , 
	'".$MONTO_INBURSA."' , 
	'".$OBSERVACIONES_INBURSA."',
	'".$session."',
	'".$FECHA_INBURSA."'	
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


?>