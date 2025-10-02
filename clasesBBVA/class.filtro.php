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
		$sWhere2="";$sWhere3="";if($search['COLABORADOR_BBVA']!=""){
$sWhere2.="  $tables.COLABORADOR_BBVA LIKE '%".$search['COLABORADOR_BBVA']."%' and ";}
if($search['TARJETA_BBVA']!=""){
$sWhere2.="  $tables.TARJETA_BBVA LIKE '%".$search['TARJETA_BBVA']."%' and ";}
if($search['ESTABLECIMIENTO_BBVA']!=""){
$sWhere2.="  $tables.ESTABLECIMIENTO_BBVA LIKE '%".$search['ESTABLECIMIENTO_BBVA']."%' and ";}
if($search['FECHADD_BBVA']!=""){
$sWhere2.="  $tables.FECHADD_BBVA LIKE '%".$search['FECHADD_BBVA']."%' and ";}
if($search['MONTO_BBVA']!=""){
$sWhere2.="  $tables.MONTO_BBVA LIKE '%".$search['MONTO_BBVA']."%' and ";}
if($search['OBSERVACIONES_BBVA']!=""){
$sWhere2.="  $tables.OBSERVACIONES_BBVA LIKE '%".$search['OBSERVACIONES_BBVA']."%' and ";}
if($search['FECHA_BBVA']!=""){
$sWhere2.="  $tables.FECHA_BBVA LIKE '%".$search['FECHA_BBVA']."%' and ";}
if($search['hBBVA']!=""){
$sWhere2.="  $tables.hBBVA LIKE '%".$search['hBBVA']."%' OR ";}

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
