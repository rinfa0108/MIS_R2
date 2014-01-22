<?php

class Application_Model_ApplicantsEducation
{
	//declare the user's attributes
	private $APPLICANTS_EDUCATION_ID;
	private $APPLICANTS_PERSONAL_DATA_ID;
	private $APPLICANTS_EDUCATION_ELEM_SCHOOL;
	private $APPLICANTS_EDUCATION_ELEM_COURSEDEGREE;
	private $APPLICANTS_EDUCATION_ELEM_YEARATTENDED;
	private $APPLICANTS_EDUCATION_HS_SCHOOL;
	private $APPLICANTS_EDUCATION_HS_COURSEDEGREE;
	private $APPLICANTS_EDUCATION_HS_YEARATTENDED;
	private $APPLICANTS_EDUCATION_VOCATIONAL_SCHOOL;
	private $APPLICANTS_EDUCATION_VOCATIONAL_COURSEDEGREE;
	private $APPLICANTS_EDUCATION_VOCATIONAL_YEARATTENDED;
	private $APPLICANTS_EDUCATION_COLLEGE_SCHOOL;
	private $APPLICANTS_EDUCATION_COLLEGE_COURSEDEGREE;
	private $APPLICANTS_EDUCATION_COLLEGE_YEARATTENDED;
	private $APPLICANTS_EDUCATION_OTHERSKILLS_SCHOOL;
	private $APPLICANTS_EDUCATION_OTHERSKILLS_COURSEDEGREE;
	private $APPLICANTS_EDUCATION_OTHERSKILLS_YEARATTENDED;

	
	
	//upon construction, map the values
	//from the $applicantseducation_row if available
	public function __construct($applicantseducation_row = null)
	{
		if( !is_null($applicantseducation_row) && $applicantseducation_row instanceof Zend_Db_Table_Row ) {
			$this->APPLICANTS_EDUCATION_ID = $applicantseducation_row->APPLICANTS_EDUCATION_ID;
			$this->APPLICANTS_PERSONAL_DATA_ID = $applicantseducation_row->APPLICANTS_PERSONAL_DATA_ID;
			$this->APPLICANTS_EDUCATION_ELEM_SCHOOL = $applicantseducation_row->APPLICANTS_EDUCATION_ELEM_SCHOOL;
			$this->APPLICANTS_EDUCATION_ELEM_COURSEDEGREE = $applicantseducation_row->APPLICANTS_EDUCATION_ELEM_COURSEDEGREE;
			$this->APPLICANTS_EDUCATION_ELEM_YEARATTENDED = $applicantseducation_row->APPLICANTS_EDUCATION_ELEM_YEARATTENDED;
			$this->APPLICANTS_EDUCATION_HS_SCHOOL = $applicantseducation_row->APPLICANTS_EDUCATION_HS_SCHOOL;
			$this->APPLICANTS_EDUCATION_HS_COURSEDEGREE = $applicantseducation_row->APPLICANTS_EDUCATION_HS_COURSEDEGREE;
			$this->APPLICANTS_EDUCATION_HS_YEARATTENDED = $applicantseducation_row->APPLICANTS_EDUCATION_HS_YEARATTENDED;
			$this->APPLICANTS_EDUCATION_VOCATIONAL_SCHOOL = $applicantseducation_row->APPLICANTS_EDUCATION_VOCATIONAL_SCHOOL;
			$this->APPLICANTS_EDUCATION_VOCATIONAL_COURSEDEGREE = $applicantseducation_row->APPLICANTS_EDUCATION_VOCATIONAL_COURSEDEGREE;
			$this->APPLICANTS_EDUCATION_VOCATIONAL_YEARATTENDED = $applicantseducation_row->APPLICANTS_EDUCATION_VOCATIONAL_YEARATTENDED;
			$this->APPLICANTS_EDUCATION_COLLEGE_SCHOOL = $applicantseducation_row->APPLICANTS_EDUCATION_COLLEGE_SCHOOL;
			$this->APPLICANTS_EDUCATION_COLLEGE_COURSEDEGREE = $applicantseducation_row->APPLICANTS_EDUCATION_COLLEGE_COURSEDEGREE;
			$this->APPLICANTS_EDUCATION_COLLEGE_YEARATTENDED = $applicantseducation_row->APPLICANTS_EDUCATION_COLLEGE_YEARATTENDED;
			$this->APPLICANTS_EDUCATION_OTHERSKILLS_SCHOOL = $applicantseducation_row->APPLICANTS_EDUCATION_OTHERSKILLS_SCHOOL;
			$this->APPLICANTS_EDUCATION_OTHERSKILLS_COURSEDEGREE = $applicantseducation_row->APPLICANTS_EDUCATION_OTHERSKILLS_COURSEDEGREE;
			$this->APPLICANTS_EDUCATION_OTHERSKILLS_YEARATTENDED = $applicantseducation_row->APPLICANTS_EDUCATION_OTHERSKILLS_YEARATTENDED;

		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'APPLICANTS_EDUCATION_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->APPLICANTS_EDUCATION_ID) ) {
					throw new Exception('Cannot update APPLICANTS_EDUCATION_ID!');
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

