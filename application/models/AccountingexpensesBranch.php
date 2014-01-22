<?php

class Application_Model_AccountingexpensesBranch
{

	//declare the user's attributes
	//private $APPLICANTS_DAILYSTATUS_ID;
	private $ACCOUNTINGEXPENSES_BRANCH_AGENTNAME;
	private $ACCOUNTINGEXPENSES_BRANCH_BNAME;
	private $ACCOUNTINGEXPENSES_BRANCH_APPLICANTNAME;
	private $ACCOUNTINGEXPENSES_BRANCH_AGE;
	private $ACCOUNTINGEXPENSES_BRANCH_HOMEADDRESS;
	private $ACCOUNTINGEXPENSES_BRANCH_CONTACTNUMBER;
	private $ACCOUNTINGEXPENSES_BRANCH_PASSPORT;
	private $ACCOUNTINGEXPENSES_BRANCH_PASSPORTEXP;
	private $ACCOUNTINGEXPENSES_BRANCH_AIRLINE;
	private $ACCOUNTINGEXPENSES_BRANCH_SEA;
	private $ACCOUNTINGEXPENSES_BRANCH_LAND;
	private $ACCOUNTINGEXPENSES_BRANCH_DATEDEPARTURE;
	private $ACCOUNTINGEXPENSES_BRANCH_TOTALEXP;
	
	
	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($sysmodules_row = null)
	{
		if( !is_null($sysmodules_row) && $sysmodules_row instanceof Zend_Db_Table_Row ) {
			$this->ACCOUNTINGEXPENSES_BRANCH_AGENTNAME = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_AGENTNAME;
			$this->ACCOUNTINGEXPENSES_BRANCH_BNAME = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_BNAME;
			$this->ACCOUNTINGEXPENSES_BRANCH_APPLICANTNAME = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_APPLICANTNAME;
			$this->ACCOUNTINGEXPENSES_BRANCH_AGE = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_AGE;
			$this->ACCOUNTINGEXPENSES_BRANCH_HOMEADDRESS = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_HOMEADDRESS;
			$this->ACCOUNTINGEXPENSES_BRANCH_CONTACTNUMBER = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_CONTACTNUMBER;
			$this->ACCOUNTINGEXPENSES_BRANCH_PASSPORT = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_PASSPORT;
			$this->ACCOUNTINGEXPENSES_BRANCH_PASSPORTEXP = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_PASSPORTEXP;
			$this->ACCOUNTINGEXPENSES_BRANCH_AIRLINE = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_AIRLINE;
			$this->ACCOUNTINGEXPENSES_BRANCH_SEA = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_SEA;
			$this->ACCOUNTINGEXPENSES_BRANCH_LAND = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_LAND; //ACCOUNTINGEXPENSES_BRANCH_TOTALEXP
			$this->ACCOUNTINGEXPENSES_BRANCH_TOTALEXP = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_TOTALEXP;
			$this->ACCOUNTINGEXPENSES_BRANCH_DATEDEPARTURE = $sysmodules_row->ACCOUNTINGEXPENSES_BRANCH_DATEDEPARTURE;

		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'ACCOUNTINGEXPENSES_BRANCH_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->ACCOUNTINGEXPENSES_BRANCH_ID) ) {
					throw new Exception('Cannot update ACCOUNTINGEXPENSES_BRANCH_ID!');
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

