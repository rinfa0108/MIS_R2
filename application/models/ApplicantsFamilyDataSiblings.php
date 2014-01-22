<?php

class Application_Model_ApplicantsFamilyDataSiblings
{
	//declare the user's attributes
	private $APPLICANTS_FAMILY_DATA_SIBLINGS_ID;
	private $APPLICANTS_PERSONAL_DATA_ID;
	private $APPLICANTS_FAMILY_DATA_SIBLINGS_FULLNAME;
	private $APPLICANTS_FAMILY_DATA_SIBLINGS_TELNO;
	private $APPLICANTS_FAMILY_DATA_SIBLINGS_OCCUPATION;

	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($applicantsfamilydatasiblings_row = null)
	{
		if( !is_null($applicantsfamilydatasiblings_row) && $applicantsfamilydatasiblings_row instanceof Zend_Db_Table_Row ) {
			$this->APPLICANTS_FAMILY_DATA_SIBLINGS_ID = $applicantsfamilydatasiblings_row->APPLICANTS_FAMILY_DATA_SIBLINGS_ID;
			$this->APPLICANTS_PERSONAL_DATA_ID = $applicantsfamilydatasiblings_row->APPLICANTS_PERSONAL_DATA_ID;
			$this->APPLICANTS_FAMILY_DATA_SIBLINGS_FULLNAME = $applicantsfamilydatasiblings_row->APPLICANTS_FAMILY_DATA_SIBLINGS_FULLNAME;
			$this->APPLICANTS_FAMILY_DATA_SIBLINGS_TELNO = $applicantsfamilydatasiblings_row->APPLICANTS_FAMILY_DATA_SIBLINGS_TELNO;
			$this->APPLICANTS_FAMILY_DATA_SIBLINGS_OCCUPATION = $applicantsfamilydatasiblings_row->APPLICANTS_FAMILY_DATA_SIBLINGS_OCCUPATION;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'APPLICANTS_FAMILY_DATA_SIBLINGS_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->APPLICANTS_FAMILY_DATA_SIBLINGS_ID) ) {
					throw new Exception('Cannot update APPLICANTS_FAMILY_DATA_SIBLINGS_ID!');
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

