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
		$sWhere2="";$sWhere3="";if($search['COLABORADOR_INBURSA']!=""){
$sWhere2.="  $tables.COLABORADOR_INBURSA LIKE '%".$search['COLABORADOR_INBURSA']."%' and ";}
if($search['TARJETA_INBURSA']!=""){
$sWhere2.="  $tables.TARJETA_INBURSA LIKE '%".$search['TARJETA_INBURSA']."%' and ";}
if($search['FECHADD_INBURSA']!=""){
$sWhere2.="  $tables.FECHADD_INBURSA LIKE '%".$search['FECHADD_INBURSA']."%' and ";}
if($search['ESTABLECIMIENTO_INBURSA']!=""){
$sWhere2.="  $tables.ESTABLECIMIENTO_INBURSA LIKE '%".$search['ESTABLECIMIENTO_INBURSA']."%' and ";}
if($search['RFC_INBURSA']!=""){
$sWhere2.="  $tables.RFC_INBURSA LIKE '%".$search['RFC_INBURSA']."%' and ";}
if($search['MONTO_INBURSA']!=""){
$sWhere2.="  $tables.MONTO_INBURSA LIKE '%".$search['MONTO_INBURSA']."%' and ";}
if($search['OBSERVACIONES_INBURSA']!=""){
$sWhere2.="  $tables.OBSERVACIONES_INBURSA LIKE '%".$search['OBSERVACIONES_INBURSA']."%' and ";}
if($search['FECHA_INBURSA']!=""){
$sWhere2.="  $tables.FECHA_INBURSA LIKE '%".$search['FECHA_INBURSA']."%' and ";}
if($search['hINBURSA']!=""){
$sWhere2.="  $tables.hINBURSA LIKE '%".$search['hINBURSA']."%' and ";}

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
