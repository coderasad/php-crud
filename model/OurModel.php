<?php 
class OurModel
{
	private $db;
	public $Id;

	// database connection ===========
	function __construct()
	{
		// $host = "localhost";
		// $user = "coderasa_auction";
		// $pass = "VeryE@syP@ssword$";
		// $database = "coderasa_auction";
		$host = "localhost";
		$user = "root";
		$pass = "";
		$database = "php_crud";
		$this->db = new mysqli($host, $user, $pass, $database);	
	}

	private function realStr($data){		
		return $this->db->real_escape_string($data);
	}

	// insert function ============
	public function insert($table, $data){
		$sql = "";
		foreach ($data as $key => $value) {
			if ($sql != "") {
				$sql .= ", ";
			}
			$sql .= "{$key}='".$this->realStr($value)."'";

		}
		$sql = "insert into {$table} set {$sql}";
		// echo $sql;

		// current id function========
		if ($this->db->query($sql)) {
			$this->Id = $this->db->insert_id;
			return true;
		}
		else{
			return false;
		}
	}

	// View function ============
	public function view($table, $select, $order = "", $where="", $rel= "",$limit=""){
		$sqlOrder = "";
		$sqllimit = "";
		$sqlWhere = "";
		$sqlRel = "";

		$sql = "select {$select} from $table";
		
		if ($order) {
			$sqlOrder =" order by {$order[0]} {$order[1]}";
		}
		if ($limit) {
			$sqllimit =" limit {$limit}";
		} 
		if ($where) {
			foreach ($where as $key => $value) {
				if ($sqlWhere != "") {
					$sqlWhere .= " and ";
				}
				else{
					$sqlWhere = " where ";
				}
				$sqlWhere .="{$key}='".$value."'";
			}
		} 
		if ($rel) {
			foreach ($rel as $key => $value) {
				if ($sqlRel) {
					$sqlRel .= " and ";
				}
				else if(!$sqlWhere){
					$sqlRel = " where ";
				}
				else if (!$sqlRel && $sqlWhere) {
					$sqlRel .= " and ";
				}
				$sqlRel .="{$key}={$value}";
			}
		} 

		$sql = $sql .$sqlWhere .$sqlRel .$sqlOrder .$sqllimit;
		// echo $sql;
		// echo die();
		$results = $this->db->query($sql);
		return $results;
	}

	// update function ============
	public function update($table, $data, $where){
		$sql = "";
		$sqlWhere = "";
		foreach ($data as $key => $value) {
			if ($sql != "") {
				$sql .= ", ";
			}
			$sql .= "{$key}='".$this->realStr($value)."'";
		}
		if ($where) {
			foreach ($where as $key => $value) {
				if ($sqlWhere != "") {
					$sqlWhere .= " and ";
				}
				else{
					$sqlWhere = " where ";
				}
				$sqlWhere .="{$key}='".$value."'";
			}
		} 

		$sql = "update {$table} set {$sql} {$sqlWhere}";
		// echo $sql;
		$this->db->query($sql);
		if($this->db->affected_rows>-1){
			return true;
		}
		
		else{
			return false;
		}
	}

	// Delete function ============
	public function delete($table, $where){
		$sql = "";
		$sqlWhere = "";
		if ($where) {
			foreach ($where as $key => $value) {
				if ($sqlWhere != "") {
					$sqlWhere .= " and ";
				}
				else{
					$sqlWhere = " where ";
				}
				$sqlWhere .="{$key}='".$value."'";
			}
		} 

		$sql = "delete from {$table} {$sqlWhere}";
		// echo $sql;
		$this->db->query($sql);
		if($this->db->affected_rows){
			return true;
		}		
		else{
			return false;
		}
	}

	public function dbRaw($sql)
	{
		// echo $sql;
		return $this->db->query($sql);
	}
}
