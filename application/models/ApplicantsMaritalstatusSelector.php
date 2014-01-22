<?php

class Application_Model_ApplicantsMaritalstatusSelector
{
	//declare the user's attributes
	private $APPLICANTS_PERSONAL_MARITALSTATUS_ID;
	private $APPLICANTS_PERSONAL_MARITALSTATUS_VALUE;

	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($applicantsmaritalstatusselector_row = null)
	{
		if( !is_null($applicantsmaritalstatusselector_row) && $applicantsmaritalstatusselector_row instanceof Zend_Db_Table_Row ) {
			$this->APPLICANTS_PERSONAL_MARITALSTATUS_ID = $applicantsmaritalstatusselector_row->APPLICANTS_PERSONAL_MARITALSTATUS_ID;
			$this->APPLICANTS_PERSONAL_MARITALSTATUS_VALUE = $applicantsmaritalstatusselector_row->APPLICANTS_PERSONAL_MARITALSTATUS_VALUE;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'APPLICANTS_PERSONAL_MARITALSTATUS_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->APPLICANTS_PERSONAL_MARITALSTATUS_ID) ) {
					throw new Exception('Cannot update APPLICANTS_PERSONAL_MARITALSTATUS_ID!');
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

