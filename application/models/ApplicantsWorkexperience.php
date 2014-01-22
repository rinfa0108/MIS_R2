<?php

class Application_Model_ApplicantsWorkexperience
{

	//declare the user's attributes
	private $APPLICANTS_PERSONAL_DATA_ID;
	private $APPLICANTS_WORKEXPERIENCE_COMPANY;
	private $APPLICANTS_WORKEXPERIENCE_COMPANYADDR;
	private $APPLICANTS_WORKEXPERIENCE_POSITION;
	private $APPLICANTS_WORKEXPERIENCE_FROM;
	private $APPLICANTS_WORKEXPERIENCE_TO;
	
	
	
	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($sysmodules_row = null)
	{
		if( !is_null($sysmodules_row) && $sysmodules_row instanceof Zend_Db_Table_Row ) {
			$this->APPLICANTS_PERSONAL_DATA_ID = $sysmodules_row->APPLICANTS_PERSONAL_DATA_ID;
			$this->APPLICANTS_WORKEXPERIENCE_COMPANY = $sysmodules_row->APPLICANTS_WORKEXPERIENCE_COMPANY;
			$this->APPLICANTS_WORKEXPERIENCE_COMPANYADDR = $sysmodules_row->APPLICANTS_WORKEXPERIENCE_COMPANYADDR;
			$this->APPLICANTS_WORKEXPERIENCE_POSITION = $sysmodules_row->APPLICANTS_WORKEXPERIENCE_POSITION;
			$this->APPLICANTS_WORKEXPERIENCE_FROM = $sysmodules_row->APPLICANTS_WORKEXPERIENCE_FROM;
			$this->APPLICANTS_WORKEXPERIENCE_TO = $sysmodules_row->APPLICANTS_WORKEXPERIENCE_TO;
	
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'APPLICANTS_PERSONAL_DATA_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->APPLICANTS_PERSONAL_DATA_ID) ) {
					throw new Exception('Cannot update APPLICANTS_PERSONAL_DATA_ID!');
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

