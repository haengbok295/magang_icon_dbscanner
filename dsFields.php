<?php
require_once('dsField.php');

/**
 * 
 */
class dsFields
{
	protected $coll = array();

	public function add($fieldName, $dataType, $dataLength, $isPK, $isAllowNull, $parentTable) {
	    $newField = new dsField();
	    $newField->setFieldName($fieldName);
	    $newField->setDataType($dataType);
	    $newField->setDataLength($dataLength);
	    $newField->setIsPK($isPK);
	    $newField->setIsAllowNull($isAllowNull);
	    $newField->setParentTable($parentTable);
	   
	    array_push($this->coll, $newField);
	  }

	  public function addField($newField) {
	    array_push($this->coll,$newField);
	  }

	  public function getCount() {
	    return count($this->coll);
	  }

	  public function getItem($index) {
	    $myField = null;
	    $myField = $this->coll[$index];

	    return $myField;
	  }

	  public function getField($FieldName) {
	    $myField = null;

	    for( $i = 0; $i<$this->getCount(); $i++ ) {
	      $myField = $this->coll[$i];
	      if ($myField->getFieldName()==$FieldName) {
	        break;
	      }
	    }

	    return $myField;
	  }

}

?>