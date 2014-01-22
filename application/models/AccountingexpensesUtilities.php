<?php

class Application_Model_AccountingexpensesUtilities
{

	private $ACCOUNTINGEXPENSES_UTILITIES_ID;
	private $ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH;
	private $ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO;
	private $ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE;
	private $ACCOUNTINGEXPENSES_UTILITIES_KIND;
	private $ACCOUNTINGEXPENSES_UTILITIES_AMOUNTEXP;
	private $ACCOUNTINGEXPENSES_UTILITIES_DATERELEASE;
	
	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($sysmodules_row = null)
	{
		if( !is_null($sysmodules_row) && $sysmodules_row instanceof Zend_Db_Table_Row ) {
			$this->ACCOUNTINGEXPENSES_UTILITIES_ID = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_ID;
			$this->ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH;
			$this->ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO;
			$this->ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE;
			$this->ACCOUNTINGEXPENSES_UTILITIES_KIND = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_KIND;
			$this->ACCOUNTINGEXPENSES_UTILITIES_AMOUNTEXP = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_AMOUNTEXP;
			$this->ACCOUNTINGEXPENSES_UTILITIES_DATERELEASE = $sysmodules_row->ACCOUNTINGEXPENSES_UTILITIES_DATERELEASE;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'ACCOUNTINGEXPENSES_UTILITIES_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->ACCOUNTINGEXPENSES_UTILITIES_ID) ) {
					throw new Exception('Cannot update ACCOUNTINGEXPENSES_UTILITIES_ID!');
				}
				break;
		}
			
		//set the attribute with the value
		$this->$name = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function __getProperties()
	{
		return get_object_vars($this);
	}
}

