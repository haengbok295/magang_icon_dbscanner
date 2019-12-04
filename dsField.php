<?php
require_once('dsTable.php');

/**
 * 
 */
class dsField
{
	  protected $fieldName = "";
	  protected $dataType = "";
	  protected $dataLength = 0;
	  protected $isPK = false;
	  protected $isAllowNull = true;
	  protected $parentTable;

	  function __construct()
	  {
	    $this->parentTable = new dsTable();
	  }

	  function setFieldName($value) {
	    $this->fieldName = $value;
	  }

	  function getFieldName() {
	    return $this->fieldName;
	  }

	  function setDataType($value) {
	    $this->dataType = $value;
	  }

	  function getDataType() {
	    return $this->dataType;
	  }

	  function setDataLength($value) {
	    $this->dataLength = $value;
	  }

	  function getDataLength() {
	    return $this->dataLength;
	  }

	  function setIsPK($value) {
	    $this->isPK = $value;
	  }

	  function getIsPK() {
	    return $this->isPK;
	  }

	  function setIsAllowNull($value) {
	    $this->isAllowNull = $value;
	  }

	  function getIsAllowNull() {
	    return $this->isAllowNull;
	  }

	  public function getParentTable(){
	    return $this->parentTable;
	  }

	  public function setParentTable($parentTable)
	  {
	    $this->parentTable=$parentTable;
	  }
}

?>