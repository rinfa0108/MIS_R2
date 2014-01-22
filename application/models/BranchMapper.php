<?php

class Application_Model_BranchMapper
{

	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_Branch();
	}
	
	public function save(Application_Model_Branch $misbranch_object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'BRANCH_CODENUMBER' => $misbranch_object->BRANCH_CODENUMBER,
				'BRANCH_NAME' => $misbranch_object->BRANCH_NAME,
				'BRANCH_ADDRESS' => $misbranch_object->BRANCH_ADDRESS,
				'BRANCH_REMARKS' => $misbranch_object->BRANCH_REMARKS
				
		);
		 
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($misbranch_object->BRANCH_ID) ) {
			$this->_db_table->insert($data);
			
			return true;
		} else {
			$this->_db_table->update($data, array('BRANCH_ID = ?' => $misbranch_object->BRANCH_ID));
			
			return true;
		}
		
		return false;
		
	}
	
	public function getBranchById($id)
	{//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			

		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('branch not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_Branch($row);
			
		//return the user object
		return $object;
	}
	
	public function fetchAllBranch()
	{
		
		$result = $this->_db_table->fetchAll();
		
		
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('No Branch not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->toArray();
		
		return $row;
	}
}

