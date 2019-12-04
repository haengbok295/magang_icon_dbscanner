<?php
require_once('dsTables.php');

/**
 * 
 */
class dbscanner
{
	protected $collTable;
	public $conn;
	protected $dbname;
	
	function __construct()
	{
    	$this->collTable = new dsTables();
	}

	public function Tables() {
	  return $this->collTable;
	}

	public function scanMySQL($ip, $user, $password, $dbname)
	{
		$this->dbname=$dbname;

		$this->conn = mysqli_connect($ip, $user, $password, $dbname);

		// return $this->conn;

		$data = mysqli_query($this->conn, "SHOW FULL TABLES IN sakila");

		// return $data;

		while($row = mysqli_fetch_row($data)){
			$this->collTable->Add($row[0],$row[1]);
		}

		 	$data2=null;  $tableName="";
		    for ($i=0; $i<$this->collTable->getCount(); $i++) { 
		      $tableName = strtolower($this->collTable->getItem($i)->getTableName());
		      $kolom = mysqli_query($this->conn,"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$tableName."'  ");
		      $myTable = null;
		      $myTable = $this->collTable->getItem($i);

		      // return $kolom;
		      while ($row = mysqli_fetch_array($kolom)) {
		        $myTable->collFields->Add($row['COLUMN_NAME'],$row['DATA_TYPE'],$row['CHARACTER_MAXIMUM_LENGTH'],$row['COLUMN_KEY'],$row['IS_NULLABLE'],$myTable);
		      }
		      
		    }

	}
}

?>