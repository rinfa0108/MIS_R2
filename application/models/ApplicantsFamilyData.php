<?php

class Application_Model_ApplicantsFamilyData
{
	//declare the user's attributes
	//private $APPLICANTS_FAMILY_DATA_ID;
	private $APPLICANTS_PERSONAL_DATA_ID;
	private $APPLICANTS_FAMILY_DATA_MARITALSTATUS;
	private $APPLICANTS_FAMILY_DATA_NOOFCHILDREN;
	private $APPLICANTS_FAMILY_DATA_CHILDRENAGES;
	private $APPLICANTS_FAMILY_DATA_SPOUSEFULLNAME;
	private $APPLICANTS_FAMILY_DATA_FATHERSFULLNAME;
	private $APPLICANTS_FAMILY_DATA_MOTHERSFULLNAME;
	private $APPLICANTS_FAMILY_DATA_SPOUSETELNO;
	private $APPLICANTS_FAMILY_DATA_FATHERSTELNO;
	private $APPLICANTS_FAMILY_DATA_MOTHERSTELNO;
	private $APPLICANTS_FAMILY_DATA_SPOUSEOCCUPATION;
	private $APPLICANTS_FAMILY_DATA_FATHERSOCCUPATION;
	private $APPLICANTS_FAMILY_DATA_MOTHERSOCCUPATION;
	private $APPLICANTS_FAMILY_DATA_HOWMANYBROTHER;
	private $APPLICANTS_FAMILY_DATA_HOWMANYSISTERS;
	
	//upon construction, map the values
	//from the $familydata_row if available
	public function __construct($familydata_row = null)
	{
		if( !is_null($familydata_row) && $familydata_row instanceof Zend_Db_Table_Row ) {
			//$this->APPLICANTS_FAMILY_DATA_ID = $familydata_row->APPLICANTS_FAMILY_DATA_ID;
			$this->APPLICANTS_PERSONAL_DATA_ID = $familydata_row->APPLICANTS_PERSONAL_DATA_ID;
			$this->APPLICANTS_FAMILY_DATA_MARITALSTATUS = $familydata_row->APPLICANTS_FAMILY_DATA_MARITALSTATUS;
			$this->APPLICANTS_FAMILY_DATA_NOOFCHILDREN = $familydata_row->APPLICANTS_FAMILY_DATA_NOOFCHILDREN;
			$this->APPLICANTS_FAMILY_DATA_CHILDRENAGES = $familydata_row->APPLICANTS_FAMILY_DATA_CHILDRENAGES;
			$this->APPLICANTS_FAMILY_DATA_SPOUSEFULLNAME = $familydata_row->APPLICANTS_FAMILY_DATA_SPOUSEFULLNAME;
			$this->APPLICANTS_FAMILY_DATA_FATHERSFULLNAME = $familydata_row->APPLICANTS_FAMILY_DATA_FATHERSFULLNAME;
			$this->APPLICANTS_FAMILY_DATA_MOTHERSFULLNAME = $familydata_row->APPLICANTS_FAMILY_DATA_MOTHERSFULLNAME;
			$this->APPLICANTS_FAMILY_DATA_SPOUSETELNO = $familydata_row->APPLICANTS_FAMILY_DATA_SPOUSETELNO;
			$this->APPLICANTS_FAMILY_DATA_FATHERSTELNO = $familydata_row->APPLICANTS_FAMILY_DATA_FATHERSTELNO;
			$this->APPLICANTS_FAMILY_DATA_MOTHERSTELNO = $familydata_row->APPLICANTS_FAMILY_DATA_MOTHERSTELNO;
			$this->APPLICANTS_FAMILY_DATA_SPOUSEOCCUPATION = $familydata_row->APPLICANTS_FAMILY_DATA_SPOUSEOCCUPATION;
			$this->APPLICANTS_FAMILY_DATA_FATHERSOCCUPATION = $familydata_row->APPLICANTS_FAMILY_DATA_FATHERSOCCUPATION;
			$this->APPLICANTS_FAMILY_DATA_MOTHERSOCCUPATION = $familydata_row->APPLICANTS_FAMILY_DATA_MOTHERSOCCUPATION;
			$this->APPLICANTS_FAMILY_DATA_HOWMANYBROTHER = $familydata_row->APPLICANTS_FAMILY_DATA_HOWMANYBROTHER;
			$this->APPLICANTS_FAMILY_DATA_HOWMANYSISTERS = $familydata_row->APPLICANTS_FAMILY_DATA_HOWMANYSISTERS;
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

