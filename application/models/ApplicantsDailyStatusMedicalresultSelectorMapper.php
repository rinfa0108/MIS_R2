<?php

class Application_Model_ApplicantsDailyStatusMedicalresultSelectorMapper
{

	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_ApplicantsDailyStatusMedicalresultSelector();
	}
	
	public function save(Application_Model_ApplicantsDailyStatusMedicalresultSelector $object)
	{
		//Create an associative array
		//of the data you want to update
		$data = $object->__getProperties();
	
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($object->$APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID = ?' => $object->$APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getApplicantsDailyStatusMedicalSelectorById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			//throw new Exception('Applicants Daily Status not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_ApplicantsDailyStatusMedicalresultSelector($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllApplicantsDailyStatusMedicalSelector()
	{
		$result = $this->_db_table->fetchAll();
	
	
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Applicants Daily Status Medical Selector not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->toArray();
	
		return $row;
	}
	
}

