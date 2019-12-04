<?php
require_once('dsFields.php');
require_once('dbscanner.php');

/**
 * 
 */
class dsTable
{
	protected $tableName;
	protected $isTable;
	public $collFields;
	protected $dbscanner;
	
	function __construct()
	{
		$this->collFields = new dsFields();
    	$this->dbscanner = new dbscanner();
	}

	public function Fields() {
	  return $this->collFields;
	}

	public function setTableName($value) {
		$this->tableName = $value;
	}

	public function getTableName() {
	  return $this->tableName;
	}

	public function setIsTable($value) {
	  $this->isTable = $value;
	}

	public function getIsTable() {
	  return $this->isTable;
	}

	public function getDbScan() {
	  return $this->dbscanner;
	}

}

?>