<?php

class Application_Model_ApplicantsDailyStatusMedicalresultSelector
{

	//declare the user's attributes
	//private $APPLICANTS_DAILYSTATUS_ID;
	private $APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID;
	private $APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_VALUE;
	private $APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_STAT;
	
	
	//upon construction, map the values
	//from the $valueobject_row if available
	public function __construct($valueobject_row = null)
	{
		if( !is_null($valueobject_row) && $valueobject_row instanceof Zend_Db_Table_Row ) {
			
			$this->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID = $valueobject_row->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID;
			$this->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_VALUE = $valueobject_row->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_VALUE;
			$this->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_STAT = $valueobject_row->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_STAT;
				
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID) ) {
					throw new Exception('Cannot update APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID!');
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

