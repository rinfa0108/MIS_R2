<?php

class Application_Model_ApplicantsFamilyDataSiblingsMapper
{
	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_ApplicantsFamilyDataSiblings();
	}
	
	public function save(Application_Model_DbTable_ApplicantsFamilyDataSiblings $object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'APPLICANTS_FAMILY_DATA_SIBLINGS_ID' => $object->APPLICANTS_FAMILY_DATA_SIBLINGS_ID,
				'APPLICANTS_PERSONAL_DATA_ID' => $object->APPLICANTS_PERSONAL_DATA_ID,
				'APPLICANTS_FAMILY_DATA_SIBLINGS_FULLNAME' => $object->APPLICANTS_FAMILY_DATA_SIBLINGS_FULLNAME,
				'APPLICANTS_FAMILY_DATA_SIBLINGS_TELNO' => $object->APPLICANTS_FAMILY_DATA_SIBLINGS_TELNO,
				'APPLICANTS_FAMILY_DATA_SIBLINGS_OCCUPATION' => $object->APPLICANTS_FAMILY_DATA_SIBLINGS_OCCUPATION	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($object->APPLICANTS_FAMILY_DATA_SIBLINGS_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('APPLICANTS_FAMILY_DATA_SIBLINGS_ID = ?' => $object->APPLICANTS_FAMILY_DATA_SIBLINGS_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getApplicantsFamilyDataSiblingsById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Applicants Family Data Siblings not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_ApplicantsFamilyDataSiblings($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllApplicantsFamilyDataSiblings()
	{
		$result = $this->_db_table->fetchAll();
	
		
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Applicants Family Data Siblings not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->toArray();

		return $row;
	}
	
}

