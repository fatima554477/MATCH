<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023

ALTER TABLE `07COMPROBACION` ADD COLUMN TABLE_MATCH varchar(50) default 'no' 
ALTER TABLE `07COMPROBACION` ADD COLUMN ID_MATCH INT(50) default NULL
ALTER TABLE `07COMPROBACION` ADD COLUMN TARJETA varchar(50) default NULL

*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	

	
	class accesoclase extends colaboradores{


	public function solocargarexcel($archivo)/*new file*/
	{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		//echo '1aaaaaaaaaaaaaaaa2'.$extension[$cuenta].'1aaaaaaaaaaaaaaaa2';
		
		if( 
		strtolower($extension[$cuenta]) == 'xls' or 
		strtolower($extension[$cuenta]) == 'xlsx'
		){
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);
		
		return trim($nuevonombre);
		
		}
		else{
			return "1";
		}
		
		}
		else{
			return "2";
		}
	}


    	public function solocargarexcel2($archivo)/*new file*/
	{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		//echo '1aaaaaaaaaaaaaaaa2'.$extension[$cuenta].'1aaaaaaaaaaaaaaaa2';
		
		if( 
		strtolower($extension[$cuenta]) == 'xls' or 
		strtolower($extension[$cuenta]) == 'xlsx'
		){
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);
		
		return trim($nuevonombre);
		
		}
		else{
			return "1";
		}
		
		}
		else{
			return "2";
		}
	}


/**//**//**//**//**//**//**//**//**//*AMERICAN EXPRESS*//**//**//**//**//**//**//**//**//**/


	public function Listado_MATCH2($id){
			$conn = $this->db();
			$variablequery = "select * from 12match  where id = '".$id."' ";
			return $arrayquery = mysqli_query($conn,$variablequery);
		}
		

		
		
	public function borra_MATCH($id){
			$conn = $this->db();
			$variablequery = "delete from 12match where id = '".$id."' ";
			$arrayquery = mysqli_query($conn,$variablequery);
			RETURN 
			
			"<P style='color:green; font-size:18px;'>ELEMENTO BORRADO</P>";
		}
	
	
	public function estadocuenta($TARJETA_MATCH , $COLABORADOR_MATCH , $ESTABLECIMIENTO_MATCH , $FECHADD_MATCH , $MONTO_MATCH , $OBSERVACIONES_MATCH , $FECHA_MATCH , $hMATCH,$enviarMATCH,$IpMATCH){
		
		$conn = $this->db();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';  
		if($session != ''){
			$MONTO_MATCH2 = str_replace(',','',$MONTO_MATCH);
			$MONTO_MATCH3 = str_replace('$','',$MONTO_MATCH2);			
		 $var1 = "update 12match  set
		 
		 
		 TARJETA_MATCH = '".$TARJETA_MATCH."' , COLABORADOR_MATCH = '".$COLABORADOR_MATCH."' , ESTABLECIMIENTO_MATCH = '".$ESTABLECIMIENTO_MATCH."' , FECHADD_MATCH = '".$FECHADD_MATCH."' , MONTO_MATCH = '".$MONTO_MATCH3."' , OBSERVACIONES_MATCH = '".$OBSERVACIONES_MATCH."' , FECHA_MATCH = '".$FECHA_MATCH."' , hMATCH = '".$hMATCH."'
		 where id = '".$IpMATCH."' ;  ";
		 
		 
	
		 $var2 = "insert into 12match (TARJETA_MATCH, COLABORADOR_MATCH, ESTABLECIMIENTO_MATCH, FECHADD_MATCH, MONTO_MATCH, OBSERVACIONES_MATCH, FECHA_MATCH, hMATCH, idRelacion) values ( '".$TARJETA_MATCH."' , '".$COLABORADOR_MATCH."' , '".$ESTABLECIMIENTO_MATCH."' , '".$FECHADD_MATCH."' , '".$MONTO_MATCH3."' , '".$OBSERVACIONES_MATCH."' , '".$FECHA_MATCH."' , '".$hMATCH."' , '".$session."' ); ";		
			
		    if($enviarMATCH=='enviarMATCH'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO111";	
		}
		
	}
	
	
	
	public function Listado_MATCH(){
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 12match order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	


	
 /**//**//**//**//**//**//**//**//**//*BBVA*//**//**//**//**//**//**//**//**//**/
	public function estadocuentabb($TARJETA_BBVA , $COLABORADOR_BBVA , $ESTABLECIMIENTO_BBVA , $FECHADD_BBVA , $MONTO_BBVA , $OBSERVACIONES_BBVA , $FECHA_BBVA , $hBBVA,$enviarBBVA,$IpBBVA){
		
		$conn = $this->db();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';  
		if($session != ''){
			$MONTO_BBVA2 = str_replace(',','',$MONTO_BBVA);
			$MONTO_BBVA3 = str_replace('$','',$MONTO_BBVA2);			
		 $var1 = "update 12matchbbva  set
		 
		 
		 TARJETA_BBVA = '".$TARJETA_BBVA."' , COLABORADOR_BBVA = '".$COLABORADOR_BBVA."' , ESTABLECIMIENTO_BBVA = '".$ESTABLECIMIENTO_BBVA."' , FECHADD_BBVA = '".$FECHADD_BBVA."' , MONTO_BBVA = '".$MONTO_BBVA3."' , OBSERVACIONES_BBVA = '".$OBSERVACIONES_BBVA."' , FECHA_BBVA = '".$FECHA_BBVA."' , hBBVA = '".$hBBVA."'
		 where id = '".$IpBBVA."' ;  ";
		 
		 
	
		 $var2 = "insert into 12matchbbva (TARJETA_BBVA, COLABORADOR_BBVA, ESTABLECIMIENTO_BBVA, FECHADD_BBVA, MONTO_BBVA, OBSERVACIONES_BBVA, FECHA_BBVA, hBBVA, idRelacion) values ( '".$TARJETA_BBVA."' , '".$COLABORADOR_BBVA."' , '".$ESTABLECIMIENTO_BBVA."' , '".$FECHADD_BBVA."' , '".$MONTO_BBVA3."' , '".$OBSERVACIONES_BBVA."' , '".$FECHA_BBVA."' , '".$hBBVA."' , '".$session."' ); ";		
			
		    if($enviarBBVA=='enviarBBVA'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO111";	
		}
		
	}
	
		
	public function Listado_BBVA(){
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 12matchbbva order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function Listado_BBVA2($id){
		$conn = $this->db();
		$variablequery = "select * from 12matchbbva  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	
	
	
	
	public function borra_BBVA($id){
		$conn = $this->db();
		$variablequery = "delete from 12matchbbva where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:18px;'>ELEMENTO BORRADO</P>";
	}

	public function SELECT_match_xml($id){
		$conn = $this->db();
/*SELECT *,07COMPROBACION.id as idd FROM 07COMPROBACION LEFT JOIN 07XML ON 07COMPROBACION.id = 07XML.`ultimo_id` order by 07COMPROBACION.id desc */
		$variablequery = "SELECT *,07COMPROBACION.id as idd FROM 
		07COMPROBACION LEFT JOIN 07XML ON 
		07COMPROBACION.id = 07XML.`ultimo_id` 
		order by 07COMPROBACION.id desc ";

		RETURN $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function SELECT_match_xml2($id){
		$conn = $this->db();

		$variablequery = "SELECT *,07COMPROBACION.id as idd FROM 
		07COMPROBACION LEFT JOIN 07XML ON 
		07COMPROBACION.id = 07XML.`ultimo_id` where
		07COMPROBACION.id = ".$id."
		order by 07COMPROBACION.id desc ";

		$arrayquery = mysqli_query($conn,$variablequery);
		$rowacomprobacion = mysqli_fetch_array($arrayquery);
		RETURN $rowacomprobacion;
		}


	/*se ocupa en VistaPreviaMatch2.php regresa checked*/
	public function validaexistematch($pasardocumentomatch_id,$IpMATCHDOCUMENTOS2,$TARJETA){
		$conn = $this->db();		
			$pregunta = 'select * from 12matchDocumentos where 
			documentoConFactura = "'.$pasardocumentomatch_id.'" and 
			estatus = "si" and 
			/*documentoMATCH="'.$IpMATCHDOCUMENTOS2.'" AND*/ 
			tarjeta="'.$TARJETA.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

			if($ROWP['id']==0){
			return '';
			}else{
			return 'checked';				
			}
	}

	/*se ocupa en VistaPreviaMatch2.php regresa checked*/
	public function validaexistematchCOMPROBACION($pasardocumentomatch_id,$IpMATCHDOCUMENTOS2,$TARJETA){
		$conn = $this->db();		
			 $pregunta = 'select * from 12matchDocumentos where 
			/*documentoConFactura = "'.$pasardocumentomatch_id.'" and */ 
			estatus = "si" and 
			documentoMATCH="'.$IpMATCHDOCUMENTOS2.'" AND
			tarjeta="'.$TARJETA.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

			if($ROWP['id']==0){
			return '';
			}else{
			return 'checked';				
			}
	}
	
	/*se ocupa en MATCH_BBVA.php regresa checked*/
	public function validaexistematch2($IpMATCHDOCUMENTOS2,$TARJETA){
		$conn = $this->db();		
			$pregunta = 'select * from 12matchDocumentos where 
			estatus = "si" and documentoMATCH="'.$IpMATCHDOCUMENTOS2.'" AND tarjeta="'.$TARJETA.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

			if($ROWP['id']==0){
			return '';
			}else{
			return 'checked';				
			}
	}


	/*se ocupa en MATCH_BBVA.php regresa checked*/
	public function validaexistematch2COMPROBACION($IpMATCHDOCUMENTOS2,$TARJETA){
		$conn = $this->db();		
			$pregunta = 'select * from 12matchDocumentos where 
			estatus = "si" and documentoConFactura="'.$IpMATCHDOCUMENTOS2.'" AND tarjeta="'.$TARJETA.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

			if($ROWP['id']==0){
			return '';
			}else{
			return 'checked';				
			}
	}


	/*se ocupa en VistaPreviaMatch2.php*/

	public function validaexistematch3res($pasardocumentomatch_id,$IpMATCHDOCUMENTOS2,$permiso,$TARJETA,$var_respuesta){
		$conn = $this->db();	
		if($var_respuesta=='si'){
			$query='and 
			documentoMATCH<>"'.$IpMATCHDOCUMENTOS2.'"';
		}
			$pregunta = 'select * from 12matchDocumentos where 
			documentoConFactura = "'.$pasardocumentomatch_id.'" and 
			estatus = "si" '.$query.' AND
			tarjeta="'.$TARJETA.'" ';
			
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

					//echo 'pp'.$var_respuesta;
		if($var_respuesta == 'si'){
			if($ROWP['id']==0){
				return '';
			}else{
				return 'disabled';
			}
		}else{
			if($ROWP['id']!=0){
				return 'disabled';
			}else{
				return '';
			}		
		}
	}
	
	public function validaexistematch3resCOMPROBACION($pasardocumentomatch_id,$IpMATCHDOCUMENTOS2,$permiso,$TARJETA,$var_respuesta){
		$conn = $this->db();	
		if($var_respuesta=='si'){
			$query='and 
			documentoConFactura<>"'.$IpMATCHDOCUMENTOS2.'"';
		}
			$pregunta = 'select * from 12matchDocumentos where 
			documentoMATCH = "'.$pasardocumentomatch_id.'" and 
			estatus = "si" '.$query.' AND
			tarjeta="'.$TARJETA.'" ';
			
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

					//echo 'pp'.$var_respuesta;
		if($var_respuesta == 'si'){
			if($ROWP['id']==0){
				return '';
			}else{
				return 'disabled';
			}
		}else{
			if($ROWP['id']!=0){
				return 'disabled';
			}else{
				return '';
			}		
		}
	}
	/*buen script pero solicitan todos bloqueados y solo podrá desbloquear administración*/
	function validaexistematch3($pasardocumentomatch_id,$IpMATCHDOCUMENTOS2,$TARJETA){
		$conn = $this->db();		
			$pregunta = 'select * from 12matchDocumentos where 
			
			documentoConFactura = "'.$pasardocumentomatch_id.'" and 
			estatus = "si" and
			
			/*el valor que viene del excel o del formulario bancario*/
			documentoMATCH <> "'.$IpMATCHDOCUMENTOS2.'" AND 
			
			tarjeta="'.$TARJETA.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

			if($ROWP['id']==0){
			return '';
			}else{
			return 'disabled';				
			}
	}

	public function validaexistematch4COMPROBACION($pasardocumentomatch_id,$TARJETA){
			$conn = $this->db();	
			$pregunta4 = "select * from 12matchDocumentos where 
			documentoMATCH = '".$pasardocumentomatch_id."' and 
			estatus = 'si' and 
			tarjeta = '".$TARJETA."' ";
			$preguntaQ = mysqli_query($conn,$pregunta4) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);
			RETURN $ROWP['documentoConFactura'];
	}
	

	public function validaexistematch4($pasardocumentomatch_id,$TARJETA){
			$conn = $this->db();	
			$pregunta4 = "select * from 12matchDocumentos where 
			documentoConFactura = '".$pasardocumentomatch_id."' and 
			estatus = 'si' and 
			tarjeta = '".$TARJETA."' ";
			$preguntaQ = mysqli_query($conn,$pregunta4) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);
			RETURN $ROWP['documentoMATCH'];
	}

	public function validaexistematch5($TARJETA){
		$conn = $this->db();		
			$pregunta = 'select * from 12matchDocumentos where 
			estatus = "si" and 
			tarjeta="'.$TARJETA.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			//$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);

			return $preguntaQ;

	}



	
	public function actualizadocumentosmatch($pasardocumentomatch_id , $pasardocumentomatch_text , $IpMATCHDOCUMENTOS2, $tarjeta ){
		$conn = $this->db();
			$preguntano = 'delete from 12matchDocumentos where 
			estatus = "no" and 
			tarjeta = "'.$tarjeta.'" ';
			$preguntano = mysqli_query($conn,$preguntano) or die('P1533'.mysqli_error($conn));
			$pregunta = 'select * from 12matchDocumentos where 
			documentoConFactura = "'.$pasardocumentomatch_id.'" and 
			tarjeta = "'.$tarjeta.'" and 
			documentoMATCH="'.$IpMATCHDOCUMENTOS2.'" ';
			$preguntaQ = mysqli_query($conn,$pregunta) or die('P1533'.mysqli_error($conn));
			$ROWP = MYSQLI_FETCH_ARRAY($preguntaQ, MYSQLI_ASSOC);
			$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';  
	if($session != ''){
		
			if($ROWP['id']==0){
				$var1 = 'insert into 12matchDocumentos 
				(documentoConFactura,estatus,tarjeta,documentoMATCH) values 
				("'.$pasardocumentomatch_id.'",
				"'.$pasardocumentomatch_text.'",
				"'.$tarjeta.'",
				"'.$IpMATCHDOCUMENTOS2.'")';
			}else{
				$var1 = 'update 12matchDocumentos set 
				estatus = "'.$pasardocumentomatch_text.'",
				tarjeta = "'.$tarjeta.'",
				documentoMATCH="'.$IpMATCHDOCUMENTOS2.'" where documentoConFactura = "'.$pasardocumentomatch_id.'"';
			}

		$variablequery = "UPDATE 07COMPROBACION SET ID_MATCH = '".$IpMATCHDOCUMENTOS2."', TABLE_MATCH = '".$pasardocumentomatch_text."', TARJETA = '".$tarjeta."' where
		07COMPROBACION.id = '".$pasardocumentomatch_id."' ";
		mysqli_query($conn,$variablequery) or die('P156'.mysqli_error($conn));

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";

	}else{
		echo "TU SESIÓN HA TERMINADO";	
	}
	}

/////////////////////////////////////////////////////////////////INBURSA//////////////////////////////////////////////////////////////////
    
   public function estadocuentainbursa($TARJETA_INBURSA , $COLABORADOR_INBURSA , $ESTABLECIMIENTO_INBURSA ,$RFC_INBURSA,$FECHADD_INBURSA , $MONTO_INBURSA , $OBSERVACIONES_INBURSA , $FECHA_INBURSA , $hINBURSA,$enviarINBURSA,$IpINBURSA){
		
		$conn = $this->db();
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';  
		if($session != ''){
			$MONTO_INBURSA2 = str_replace(',','',$MONTO_INBURSA);
			$MONTO_INBURSA3 = str_replace('$','',$MONTO_INBURSA2);
			
		 $var1 = "update 12matchinbursa  set
		 TARJETA_INBURSA = '".$TARJETA_INBURSA."' , COLABORADOR_INBURSA = '".$COLABORADOR_INBURSA."' , ESTABLECIMIENTO_INBURSA = '".$ESTABLECIMIENTO_INBURSA."' , RFC_INBURSA = '".$RFC_INBURSA."' , FECHADD_INBURSA = '".$FECHADD_INBURSA."' , MONTO_INBURSA = '".$MONTO_INBURSA3."' , OBSERVACIONES_INBURSA = '".$OBSERVACIONES_INBURSA."' , FECHA_INBURSA = '".$FECHA_INBURSA."' , hINBURSA = '".$hINBURSA."'
		 where id = '".$IpINBURSA."' ;  ";
		 
		 
	
		 $var2 = "insert into 12matchinbursa (TARJETA_INBURSA, COLABORADOR_INBURSA, ESTABLECIMIENTO_INBURSA, RFC_INBURSA, FECHADD_INBURSA, MONTO_INBURSA, OBSERVACIONES_INBURSA, FECHA_INBURSA, hINBURSA, idRelacion) values ( '".$TARJETA_INBURSA."' , '".$COLABORADOR_INBURSA."' , '".$ESTABLECIMIENTO_INBURSA."' , '".$RFC_INBURSA."' , '".$FECHADD_INBURSA."' , '".$MONTO_INBURSA3."' , '".$OBSERVACIONES_INBURSA."' , '".$FECHA_INBURSA."' , '".$hINBURSA."' , '".$session."' ); ";		
			
		    if($enviarINBURSA=='enviarINBURSA'){
		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return "Actualizado";
					
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "TU SESIÓN HA TERMINADO111";	
		}
		
	}
	
		
	public function Listado_INBURSA(){
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:'';
		
		$conn = $this->db();
		$variablequery = "select * from 12matchinbursa order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}	

	
		public function Listado_INBURSA2($id){
		$conn = $this->db();
		$variablequery = "select * from 12matchinbursa  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
	

	
	
	
	
	public function borra_INBURSA($id){
		$conn = $this->db();
		$variablequery = "delete from 12matchinbursa where id = '".$id."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		RETURN 
		
		"<P style='color:green; font-size:18px;'>ELEMENTO BORRADO</P>";
	}



	
	public function SELECT_INBURSA_xml($id){
		$conn = $this->db();
		$variablequery = "SELECT * from 11XML WHERE UUID IS NOT NULL and UUID <> '' order by id desc";
		RETURN $arrayquery = mysqli_query($conn,$variablequery);
	}



}
	

	
	
	
	

		
	

?>