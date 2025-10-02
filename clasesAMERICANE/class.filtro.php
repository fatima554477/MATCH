<?php
/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/

define("__ROOT1__", dirname(dirname(__FILE__)));
	include_once (__ROOT1__."/../includes/error_reporting.php");
	include_once (__ROOT1__."/../reportes/class.epcinnMH.php");

	
	class orders extends accesoclase {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->db();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	public function getData($tables,$campos,$search){
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		$session = isset($_SESSION['idem'])?$_SESSION['idem']:''; 
		$sWhere=" ";
		$sWhere2="";$sWhere3="";if($search['COLABORADOR_MATCH']!=""){
$sWhere2.="  $tables.COLABORADOR_MATCH LIKE '%".$search['COLABORADOR_MATCH']."%' and ";}
if($search['TARJETA_MATCH']!=""){
$sWhere2.="  $tables.TARJETA_MATCH LIKE '%".$search['TARJETA_MATCH']."%' and ";}
if($search['FECHADD_MATCH']!=""){
$sWhere2.="  $tables.FECHADD_MATCH LIKE '%".$search['FECHADD_MATCH']."%' and ";}
if($search['ESTABLECIMIENTO_MATCH']!=""){
$sWhere2.="  $tables.ESTABLECIMIENTO_MATCH LIKE '%".$search['ESTABLECIMIENTO_MATCH']."%' and ";}
if($search['MONTO_MATCH']!=""){
$sWhere2.="  $tables.MONTO_MATCH LIKE '%".$search['MONTO_MATCH']."%' and ";}
if($search['OBSERVACIONES_MATCH']!=""){
$sWhere2.="  $tables.OBSERVACIONES_MATCH LIKE '%".$search['OBSERVACIONES_MATCH']."%' and ";}
if($search['FECHA_MATCH']!=""){
$sWhere2.="  $tables.FECHA_MATCH LIKE '%".$search['FECHA_MATCH']."%' and ";}
if($search['hMATCH']!=""){
$sWhere2.="  $tables.hMATCH LIKE '%".$search['hMATCH']."%' OR ";}

$sWhere22 = isset($sWhere2)?substr($sWhere2,0,-4):'';
if($this->variablespermisos('','MATCH_PERMISOTODOS','ver')=='si'){
		IF($sWhere2!=""){
			$sWhere3  = ' where ( ('.$sWhere22.') ) ';
		}ELSE{
		$sWhere3  = ' ';
		}
}else{
		IF($sWhere2!=""){
			$sWhere3  = ' where (idRelacion = "'.$session.'" and ('.$sWhere22.') ) ';
		}ELSE{
		$sWhere3  = ' where (idRelacion = "'.$session.'" ) ';
		}
}

/*IF($sWhere2!=""){
			$sWhere3  = ' where (idRelacion = "'.$session.'" and ('.$sWhere22.') ) ';
		}ELSE{
		$sWhere3  = ' where (idRelacion = "'.$session.'" ) ';	
		}*/
		


		$sWhere3.="  order by $tables.id desc ";
		$sql="SELECT $campos FROM  $tables $sWhere $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos FROM  $tables $sWhere $sWhere3 ";
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}
}
?>
