<?php
require_once('dsTable.php');
require_once('dbscanner.php');

/**
 * 
 */
class dsTables
{
	protected $coll = array();

	public function add($tableName, $isTable) {
	    $newTable = new dsTable();
	    $newTable->setTableName($tableName);
	    $newTable->setIsTable($isTable);
	    
	    array_push($this->coll, $newTable);
	}

	public function addTable($newTable) {
	    array_push($this->coll, $newTable);
	  }

	  public function getItem($index) {
	  	$myTable = $this->coll[$index];

    	return $myTable;
	  }

	  public function getCount() {
	    return count($this->coll);
	  }

	  public function getTable($tableName) {
	    $myTable = null;
	    for( $i = 0; $i<$this->getCount(); $i++ ) {
	      $myTable = $this->coll[$i];
	      if ($myTable->getTableName()==$tableName) {
	        break;
	      }
	    }
	    return $myTable;
	  }

	  public function getTables(){
	    $tables=array();
	    for( $i = 0; $i<$this->getCount(); $i++ ) {
	      $tabel = $this->coll[$i];
	      $tables[$i] = $tabel->getTableName();
	      // $tables = array_splice($tables, $i);
	    }

	    return $tables;
	  }
}

?>