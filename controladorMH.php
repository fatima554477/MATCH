<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/reportes/class.epcinnMH.php");

$match = NEW accesoclase();
$conexion = NEW colaboradores();
$conexion2 = new herramientas();






$formato_telefono_1 = isset($_POST["formato_telefono_1"])?$_POST["formato_telefono_1"]:"";
if($formato_telefono_1=='formato_telefono_1'){
	$TELEFONO = isset($_POST["TELEFONO"])?$_POST["TELEFONO"]:"";
	$telefono2 = str_replace(' ','',$TELEFONO);
	$telefono3 = str_split($telefono2, 2);
	$cuenta = count($telefono3) - 1;
		for($iii=0;$iii<=$cuenta;$iii++){
			$salida .= $telefono3[$iii].' ';
		}
	echo $salida;
}


$hBBVA = isset($_POST["hBBVA"])?$_POST["hBBVA"]:"";
$enviarBBVA = isset($_POST["enviarBBVA"])?$_POST["enviarBBVA"]:"";
$borra_BBVA = isset($_POST["borra_BBVA"])?$_POST["borra_BBVA"]:"";
$EMAIL_BBVA = isset($_POST["EMAIL_BBVA"])?$_POST["EMAIL_BBVA"]:"";

$hINBURSA = isset($_POST["hINBURSA"])?$_POST["hINBURSA"]:"";
$enviarINBURSA = isset($_POST["enviarINBURSA"])?$_POST["enviarINBURSA"]:"";
$borra_INBURSA = isset($_POST["borra_INBURSA"])?$_POST["borra_INBURSA"]:"";
$EMAIL_INBURSA = isset($_POST["EMAIL_INBURSA"])?$_POST["EMAIL_INBURSA"]:"";
		

//////////////////////////////MATCH/////////////////////////
$hMATCH = isset($_POST["hMATCH"])?$_POST["hMATCH"]:"";
$enviarMATCH = isset($_POST["enviarMATCH"])?$_POST["enviarMATCH"]:"";
$borra_MATCH = isset($_POST["borra_MATCH"])?$_POST["borra_MATCH"]:"";
$EMAIL_MATCH = isset($_POST["EMAIL_MATCH"])?$_POST["EMAIL_MATCH"]:"";



///////////////////////////////*AMERICAN EXPRESS*//////////////////////////

include_once __ROOT1__."/reportes/controladorAMERICANE.php";

///////////////////////////////*BBVA*//////////////////////////

include_once __ROOT1__."/reportes/controladorBBVA.php";

///////////////////////////////*IONBURSA*//////////////////////////

include_once __ROOT1__."/reportes/controladorINBURSA.php";

$pasardocumentomatch_id= isset($_POST["pasardocumentomatch_id"])?$_POST["pasardocumentomatch_id"]:"";
$pasardocumentomatch_text= isset($_POST["pasardocumentomatch_text"])?$_POST["pasardocumentomatch_text"]:"";
$IpMATCHDOCUMENTOS2= isset($_POST["IpMATCHDOCUMENTOS2"])?$_POST["IpMATCHDOCUMENTOS2"]:"";
$tarjeta= isset($_POST["tarjeta"])?$_POST["tarjeta"]:"";
if($pasardocumentomatch_id!='' and ($pasardocumentomatch_text=='si' or $pasardocumentomatch_text=='no') ){
 //$pasardocumentomatch_text.' '.$pasardocumentomatch_id.' '.$IpMATCHDOCUMENTOS2.' '.$tarjeta;
	echo $match->actualizadocumentosmatch ($pasardocumentomatch_id , $pasardocumentomatch_text , $IpMATCHDOCUMENTOS2, $tarjeta );
}

//////////////////////////////INBURSA//////////////////////////////////////////////////////////////////////////////////////////

/*
*/

//////////////////////////////relacion documentos match//////////////////////////////




?>