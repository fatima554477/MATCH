<?php
error_reporting(E_ALL);ini_set("display_errors", 1);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
isset($_SESSION["logeado"])?'':header("location: index.php?salir=1");

	require "includes/error_reporting.php";
	require "reportes/controladorMH.php";

	$DESCARGARMATCH = isset($_GET['DESCARGARMATCH'])?$_GET['DESCARGARMATCH']:'';
	if($DESCARGARMATCH!=''){
		$query_excel_vacio = '';
		if($DESCARGARMATCH=='1a'){
			$query_excel_vacio = ' where id = 0 ';
		}

	$conn = $match->db();
	require_once 'Classes/PHPExcel.php';
	$objPHPexcel = new PHPExcel();
	//$Queryvar='select * from 05permisos order by bloque,descripcion asc';
	$Queryvar='select * from 12match '.$query_excel_vacio.' ; ';
	
	$QueryExecel = mysqli_query($conn,$Queryvar);
	$i=2;
	while($row = mysqli_fetch_array($QueryExecel) ){
	
	$objPHPexcel->setActiveSheetIndex(0)
	->setCellValue('A'.$i,$row['COLABORADOR_MATCH'])
	->setCellValue('B'.$i,$row['TARJETA_MATCH'])
	->setCellValue('C'.$i,$row['FECHADD_MATCH'])
	->setCellValue('D'.$i,$row['ESTABLECIMIENTO_MATCH'])	
	->setCellValue('E'.$i,number_format($row['MONTO_MATCH'],2,'.',','))
	->setCellValue('F'.$i,$row['OBSERVACIONES_MATCH']); 
	$i++;
	}
	$objPHPexcel->getActiveSheet()->setTitle('Estado de cuenta');

	
	$objPHPexcel->getActiveSheet()->SetCellValue('A1','COLABORADOR');
	$objPHPexcel->getActiveSheet()->SetCellValue('B1','INSTITUCIÓN BANCARIA');
	$objPHPexcel->getActiveSheet()->SetCellValue('C1','FECHA DE CARGO');
	$objPHPexcel->getActiveSheet()->SetCellValue('D1','NOMBRE COMERCIAL');	
	$objPHPexcel->getActiveSheet()->SetCellValue('E1','MONTO');
	$objPHPexcel->getActiveSheet()->SetCellValue('F1','OBSERVACIONES');	
	
	$objPHPexcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	
	$objPHPexcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

	$objPHPexcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
	$objPHPexcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,2); // donde 0 es la columna desde donde se congela y 4 es la fila hasta donde se congela.
	$fecha=date('Y-m-d');
	$hora=date('H:m:s');
	header('Content-Type: application/vnd.ms-excel');
	header('Content-disposition: attachment; filename="'.$fecha.'T'.$hora.'_AM_estado de cuenta.xlsx"');
	header('Cache-Control: max-age-0');

	$objWriter=PHPExcel_IOFactory::createWriter($objPHPexcel,'Excel2007');
	$objWriter->save('php://output');
	exit;
	}



	$DESCARGARMATCHBBVA = isset($_GET['DESCARGARMATCHBBVA'])?$_GET['DESCARGARMATCHBBVA']:'';
	if($DESCARGARMATCHBBVA!=''){
		$query_excel_vacio = '';
		if($DESCARGARMATCHBBVA=='1a'){
			$query_excel_vacio = ' where id = 0 ';
		}
	$conn = $match->db();
	require_once 'Classes/PHPExcel.php';
	$objPHPexcel = new PHPExcel();
	//$Queryvar='select * from 05permisos order by bloque,descripcion asc';
	$Queryvar='select * from 12matchbbva '.$query_excel_vacio.'; ';
	
	$QueryExecel = mysqli_query($conn,$Queryvar);
	$i=2;
	while($row = mysqli_fetch_array($QueryExecel) ){
	
	$objPHPexcel->setActiveSheetIndex(0)
	->setCellValue('A'.$i,$row['COLABORADOR_BBVA'])
	->setCellValue('B'.$i,$row['TARJETA_BBVA'])
	->setCellValue('C'.$i,$row['FECHADD_BBVA'])
	->setCellValue('D'.$i,$row['ESTABLECIMIENTO_BBVA'])	
	->setCellValue('E'.$i,number_format($row['MONTO_BBVA'],2,'.',','))
	->setCellValue('F'.$i,$row['OBSERVACIONES_BBVA']); 
	$i++;
	}
	$objPHPexcel->getActiveSheet()->setTitle('Estado de cuenta');

	
	$objPHPexcel->getActiveSheet()->SetCellValue('A1','COLABORADOR');
	$objPHPexcel->getActiveSheet()->SetCellValue('B1','INSTITUCIÓN BANCARIA');
	$objPHPexcel->getActiveSheet()->SetCellValue('C1','FECHA DE CARGO');
	$objPHPexcel->getActiveSheet()->SetCellValue('D1','NOMBRE COMERCIAL');	
	$objPHPexcel->getActiveSheet()->SetCellValue('E1','MONTO');
	$objPHPexcel->getActiveSheet()->SetCellValue('F1','OBSERVACIONES');	
	
	$objPHPexcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	
	$objPHPexcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

	$objPHPexcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
	$objPHPexcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,2); // donde 0 es la columna desde donde se congela y 4 es la fila hasta donde se congela.
	$fecha=date('Y-m-d');
	$hora=date('H:m:s');
	header('Content-Type: application/vnd.ms-excel');
	header('Content-disposition: attachment; filename="'.$fecha.'T'.$hora.'_BBVA_estado de cuenta.xlsx"');
	header('Cache-Control: max-age-0');

	$objWriter=PHPExcel_IOFactory::createWriter($objPHPexcel,'Excel2007');
	$objWriter->save('php://output');
	exit;
	}


    	$DESCARGARMATCHINBURSA = isset($_GET['DESCARGARMATCHINBURSA'])?$_GET['DESCARGARMATCHINBURSA']:'';
	if($DESCARGARMATCHINBURSA!=''){
		$query_excel_vacio = '';
		if($DESCARGARMATCHINBURSA=='1a'){
			$query_excel_vacio = ' where id = 0 ';
		}
	$conn = $match->db();
	require_once 'Classes/PHPExcel.php';
	$objPHPexcel = new PHPExcel();
	//$Queryvar='select * from 05permisos order by bloque,descripcion asc';
	$Queryvar='select * from 12matchinbursa '.$query_excel_vacio.' ; ';
	
	$QueryExecel = mysqli_query($conn,$Queryvar);
	$i=2;
	while($row = mysqli_fetch_array($QueryExecel) ){
	
	$objPHPexcel->setActiveSheetIndex(0)
	->setCellValue('A'.$i,$row['COLABORADOR_INBURSA'])
	->setCellValue('B'.$i,$row['TARJETA_INBURSA'])
	->setCellValue('C'.$i,$row['FECHADD_INBURSA'])
	->setCellValue('D'.$i,$row['ESTABLECIMIENTO_INBURSA'])	
	->setCellValue('E'.$i,$row['RFC_INBURSA'])	
	->setCellValue('F'.$i,number_format($row['MONTO_INBURSA'],2,'.',','))
	->setCellValue('G'.$i,$row['OBSERVACIONES_INBURSA']); 
	$i++;
	}
	$objPHPexcel->getActiveSheet()->setTitle('Estado de cuenta');

	
	$objPHPexcel->getActiveSheet()->SetCellValue('A1','COLABORADOR');
	$objPHPexcel->getActiveSheet()->SetCellValue('B1','INSTITUCIÓN BANCARIA');
	$objPHPexcel->getActiveSheet()->SetCellValue('C1','FECHA DE CARGO');
	$objPHPexcel->getActiveSheet()->SetCellValue('D1','NOMBRE COMERCIAL');	
	$objPHPexcel->getActiveSheet()->SetCellValue('E1','RFC');	
	$objPHPexcel->getActiveSheet()->SetCellValue('F1','MONTO');
	$objPHPexcel->getActiveSheet()->SetCellValue('G1','OBSERVACIONES');	
	
	$objPHPexcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPexcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	
	$objPHPexcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
	$objPHPexcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

	$objPHPexcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
	$objPHPexcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,2); // donde 0 es la columna desde donde se congela y 4 es la fila hasta donde se congela.
	$fecha=date('Y-m-d');
	$hora=date('H:m:s');
	header('Content-Type: application/vnd.ms-excel');
	header('Content-disposition: attachment; filename="'.$fecha.'T'.$hora.'_INBURSA_estado de cuenta.xlsx"');
	header('Cache-Control: max-age-0');

	$objWriter=PHPExcel_IOFactory::createWriter($objPHPexcel,'Excel2007');
	$objWriter->save('php://output');
	exit;
	}






	//require "reportes/variables.php";
?><!doctype html>
<html lang="en" class="light-theme">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- loader-->
	  <link href="assets/css/pace.min.css" rel="stylesheet" />
	  <script src="assets/js/pace.min.js"></script>
	  
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="calendariodeeventos/typeahead.js"></script>
    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />
        <style type="text/css">
            #content {

            }
            #close {

            }
            .content2 {
                margin: 0px auto;
                min-height: 100px;
                box-shadow: 0 2px 5px #666666;
                padding: 10px;
            }
			
	#drop_file_zone {
	    background-color: #EEE;
	    border: #999 1px solid;
	    padding: 8px;
	}			

	#nono {
	  display: none;
	}
	
input[type=text] {
    text-transform: uppercase;
}


.fixed2{
position:fixed;
top:65px;
background-color:#fff;
margin-left:500px;
box-shadow:0 0 10px #222;
-webkit-box-shadow:0 0 10px #222;
-moz-box-shadow:0 0 10px #222;
z-index:1;
}

#ACTUALIZADO{
color:green;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}
  #ERROR{
color:red;
    text-transform: uppercase;
	font-size:25px;
	font-weight: bold;
}

		td ,tr, table, textarea {
    text-transform: uppercase;
}

        </style>
    <title>MATCH CON ESTADO DE CUENTA</title>
  </head>
  <body>
    

 <!--start wrapper-->
    <div class="wrapper">
       <!--start sidebar -->
	    <aside class="sidebar-wrapper" data-simplebar="true">
      <?php require "includes/menuLateral.php"; /*php menu lateral*/ ?>
		</aside>
     <!--end sidebar -->

        <!--start top header-->
          <header class="top-header">
		  <?php 
		  
		  require "reportes/notificaciones.php"; /*php notificaciones*/ ?>
          </header>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		  <?php 	

	require "reportes/mapeo1.php"; /*php mapa*/ ?>
          </div>
          <!--end breadcrumb-->


          <div class="row">
            <div class="col-xl-12 mx-auto"> 
	<?php
	
	

		/*require "reportes/expansores.php";*/	
	
	

		 if($conexion->variablespermisos('','MATCH_AMERICANLAY','ver')=='si'){
		require "reportes/cargarexcelMATCHAMERICAN.php";
		}
		 if($conexion->variablespermisos('','MATCH_AMERICAN','ver')=='si'){
		require "reportes/MATCH_AMERICAN.php";
		}
		 if($conexion->variablespermisos('','MATCH_AMERICANfiltro','ver')=='si'){
		require "reportes/fetch_page_AMERICANE.php";
		}
		
		

		if($conexion->variablespermisos('','MATCH_BBVALAY','ver')=='si'){
		require "reportes/cargarexcelMATCHBBVA.php";
		}
		  if($conexion->variablespermisos('','MATCH_BBVA','ver')=='si'){
		require "reportes/MATCH_BBVA.php";
		}
		  if($conexion->variablespermisos('','MATCH_BBVAFILTRO','ver')=='si'){
		require "reportes/fetch_page_BBVA.php";
		}



		if($conexion->variablespermisos('','MATCH_INBURSALAY','ver')=='si'){  
		require "reportes/cargarexcelMATCHINBURSA.php";
		}
		if($conexion->variablespermisos('','MATCH_INBURSA','ver')=='si'){
		require "reportes/MATCH_INBURSA.php";
		}
			if($conexion->variablespermisos('','INBURSA_VERIFICARfiltro','ver')=='si'){
		require "reportes/fetch_page_INBURSA.php";
		}




	?> 
            </div>
          </div>
             

          </div>
          <!-- end page content-->
         </div>
         


         <!--Start Back To Top Button-->
		     <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
         <!--End Back To Top Button-->
  
         <!--start switcher-->
         <div class="switcher-body">
		 <?php require "includes/coloresEncabezado.php"; ?>
         </div>
         <!--end switcher-->


         <!--start overlay-->
          <div class="overlay"></div>
         <!--end overlay-->

     </div>
  <!--end wrapper-->

    <!-- JS Files-->
			<?php require "includes/convertirma.php"; ?>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="//code.angularjs.org/snapshot/angular.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jspdf.umd.min.js"></script> 
    <script src="js/html2canvas.min.js"></script> 
    <script src="js/convertir.js"></script>                
    <script src="html2pdf.bundle.min.js"></script>
    <script src="colaboradores/script.js"></script> 
    <script src="assets/js/jquery.min.js"></script>
	<?php require "reportes/scriptMH.php"; ?>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


  </body>
</html>