<?php

class Application_Model_ApplicantsMaritalstatusSelectorMapper
{
	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_ApplicantsMaritalStatusSelector();
	}
	
	public function save(Application_Model_DbTable_ApplicantsMaritalStatusSelector $object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'APPLICANTS_PERSONAL_MARITALSTATUS_ID' => $object->APPLICANTS_PERSONAL_MARITALSTATUS_ID,
				'APPLICANTS_PERSONAL_MARITALSTATUS_VALUE' => $object->APPLICANTS_PERSONAL_MARITALSTATUS_VALUE	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($object->APPLICANTS_PERSONAL_MARITALSTATUS_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('APPLICANTS_PERSONAL_MARITALSTATUS_ID = ?' => $object->APPLICANTS_PERSONAL_MARITALSTATUS_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getApplicantsMaritalStatusSelectorById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Applicants Marital Status Selector not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_ApplicantsMaritalStatusSelector($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllApplicantsMaritalStatusSelector()
	{
		$result = $this->_db_table->fetchAll();
	
		
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Applicants Marital Status Selector not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->toArray();

		return $row;
	}

}

