<?php 


  if($hBBVA == 'hBBVA' or $enviarBBVA=='enviarBBVA'){
	  
		  
$TARJETA_BBVA = isset($_POST["TARJETA_BBVA"])?$_POST["TARJETA_BBVA"]:"";
$COLABORADOR_BBVA = isset($_POST["COLABORADOR_BBVA"])?$_POST["COLABORADOR_BBVA"]:"";
$ESTABLECIMIENTO_BBVA = isset($_POST["ESTABLECIMIENTO_BBVA"])?$_POST["ESTABLECIMIENTO_BBVA"]:"";
$FECHADD_BBVA = isset($_POST["FECHADD_BBVA"])?$_POST["FECHADD_BBVA"]:"";
$MONTO_BBVA = isset($_POST["MONTO_BBVA"])?$_POST["MONTO_BBVA"]:"";
$OBSERVACIONES_BBVA = isset($_POST["OBSERVACIONES_BBVA"])?$_POST["OBSERVACIONES_BBVA"]:"";
$FECHA_BBVA = date("Y-m-d");
$hBBVA = isset($_POST["hBBVA"])?$_POST["hBBVA"]:""; 
$IpBBVA = isset($_POST["IpBBVA"])?$_POST["IpBBVA"]:"";


	  
	echo $match->estadocuentabb($TARJETA_BBVA , $COLABORADOR_BBVA , $ESTABLECIMIENTO_BBVA , $FECHADD_BBVA , $MONTO_BBVA , $OBSERVACIONES_BBVA , $FECHA_BBVA , $hBBVA,$enviarBBVA,$IpBBVA);

		/*$filepath = "clasesBBVA/";
		$RUTAFILTRO = 'reportes'; 
		$claseactual = 'class.epcinnMH.php';
		$tablesdb = '12matchbbva';
		include_once (__ROOT1__."/includes/crea_funciones_filtro_completo.php"); */
  
 }
elseif($EMAIL_BBVA ==true){
	//print_r($_POST);
$conexion2 = new herramientas();
$NOMBRE_1 = 'Peticion';
$EMAILnombre = array($EMAIL_BBVA=>$NOMBRE_1);
$adjuntos = array(''=>'');
$Subject = 'DATOS SOLICITADOS';
/*nuevo*/
$array = isset($_POST['matchbbvaarray'])?$_POST['matchbbvaarray']:'';
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
                                                                  
$MANDA_INFORMACION = $match->MANDA_INFORMACION(
'TARJETA_BBVA, COLABORADOR_BBVA, ESTABLECIMIENTO_BBVA, 
MONTO_BBVA, OBSERVACIONES_BBVA, FECHA_BBVA ',

'TARJETA ,COLABORADOR, ESTABLECIMIENTO, MONTO, OBSERVACIONES, FECHA', '12matchbbva',  " where ".$query2/*nuevo*/ );

$variables = 'ADJUNTO_BBVA, ';


 $cadenacompleta =substr($variables, 0, -2);
 
$adjuntos = '';

$html = $match->html2('TARJETA BBVA',$MANDA_INFORMACION );
$logo = 'ADJUNTAR_LOGO_INFORMACION_2023_05_31_07_45_49.jpg';


$embebida = array('../includes/archivos/'.$logo => 'ver');
echo $conexion2->email($EMAILnombre, $html, $adjuntos, $embebida, $Subject,$smtp);
}  
	  
 if($borra_BBVA == 'borra_BBVA' ){

$borra_matchhBB = isset($_POST["borra_matchhBB"])?$_POST["borra_matchhBB"]:"";
	echo $match->borra_BBVA( $borra_matchhBB );
}	  


//////////////////////////////////////////////////////////////////////////////////EXEL/////////////////////////////////////////////////////////////////////
$MANDAMATCHexcelBBVA = isset($_POST["MANDAMATCHexcelBBVA"])?$_POST["MANDAMATCHexcelBBVA"]:"";
if($MANDAMATCHexcelBBVA=='MANDAMATCHexcelBBVA'){
	
if( $_FILES["DOCUU_excelMATCHBBVA"] == true){
$DOCUU_excelMATCHBBVA = $match->solocargarexcel2("DOCUU_excelMATCHBBVA");
}if($DOCUU_excelMATCHBBVA=='2' or $DOCUU_excelMATCHBBVA=='' or $DOCUU_excelMATCHBBVA=='1'){
	$DOCUU_excelMATCHBBVA1="";
} else{
 $DOCUU_excelMATCHBBVA1 = __ROOT1__.'/includes/archivos/'.$DOCUU_excelMATCHBBVA;
}

	$DOCUU_excelMATCHBBVA1;

	$cargare = isset($DOCUU_excelMATCHBBVA1) ?$DOCUU_excelMATCHBBVA1 :'' ;
	if($cargare!=''){
require_once __ROOT1__.'/Classes/PHPExcel.php';

$inputFileType = PHPExcel_IOFactory::identify($DOCUU_excelMATCHBBVA1);
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objReader->load($DOCUU_excelMATCHBBVA1);
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();
		$conn = $match->db();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';
		//$var1 = "TRUNCATE TABLE 12match;  ";
		//mysqli_query($conn,$var1) or die('P276'.mysqli_error($conn));		
	for ($row = 2; $row <= $highestRow; $row++){
		$TARJETA_BBVA = '';$COLABORADOR_BBVA ='';$ESTABLECIMIENTO_BBVA ='';$FECHADD_BBVA = '';$MONTO_BBVA='';$OBSERVACIONES_BBVA ='';
$COLABORADOR_BBVA =  addslashes($sheet->getCell("A".$row)->getValue()) ;
$TARJETA_BBVA =  addslashes($sheet->getCell("B".$row)->getValue()) ;
//$FECHADD_BBVA =  addslashes($sheet->getCell("C".$row)->getValue()) ;
$ESTABLECIMIENTO_BBVA =  addslashes($sheet->getCell("D".$row)->getValue()) ;
$MONTO_BBVA =  addslashes($sheet->getCell("E".$row)->getValue()) ;
$OBSERVACIONES_BBVA =  addslashes($sheet->getCell("F".$row)->getValue()) ;


//if($TARJETA_BBVA != '' ){

	$TARJETA_BBVA = trim(iconv("UTF-8","ISO-8859-1",$TARJETA_BBVA)," \t\n\r\0\x0B\xA0");
	$COLABORADOR_BBVA = trim(iconv("UTF-8","ISO-8859-1",$COLABORADOR_BBVA)," \t\n\r\0\x0B\xA0");
	$ESTABLECIMIENTO_BBVA = trim(iconv("UTF-8","ISO-8859-1",$ESTABLECIMIENTO_BBVA)," \t\n\r\0\x0B\xA0");
	
    // $FECHADD_BBVA = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP(
	 //trim(iconv("UTF-8","ISO-8859-1",$FECHADD_BBVA)," \t\n\r\0\x0B\xA0"))
	// ); 

$timestamp = '';
$timestamp = PHPExcel_Shared_Date::ExcelToPHP($sheet->getCell("C".$row)->getValue() + 1) ;
$FECHADD_BBVA = date("Y-m-d",$timestamp);

	$MONTO_BBVA = trim(iconv("UTF-8","ISO-8859-1",$MONTO_BBVA)," \t\n\r\0\x0B\xA0");			
	$OBSERVACIONES_BBVA = trim(iconv("UTF-8","ISO-8859-1",$OBSERVACIONES_BBVA)," \t\n\r\0\x0B\xA0");
	$FECHA_BBVA = date("Y-m-d");
	$var2 = "insert into 12matchbbva (
	TARJETA_BBVA , 
	COLABORADOR_BBVA, 
	ESTABLECIMIENTO_BBVA,	
	FECHADD_BBVA, 
	MONTO_BBVA, 
	OBSERVACIONES_BBVA,
	idRelacion,
	FECHA_BBVA) values ( 
	'".$TARJETA_BBVA."' ,
	'".$COLABORADOR_BBVA."', 
	'".$ESTABLECIMIENTO_BBVA."' ,
	'".$FECHADD_BBVA."' , 
	'".$MONTO_BBVA."' , 
	'".$OBSERVACIONES_BBVA."',
	'".$session."',
	'".$FECHA_BBVA."'
			);  ";
			mysqli_query($conn,$var2) or die('P276'.mysqli_error($conn));
	}
			echo "Actualizado";
			unlink($cargare);
	}else{
		echo "No hay documento";
	}	
}




?>