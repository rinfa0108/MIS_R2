<?php

class Application_Model_SysModulesMapper
{

	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_SysModules();
	}
	
	public function save(Application_Model_SysModules $object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'SYS_MODULES_ID' => $object->SYS_MODULES_ID,
				'SYS_MODULES_NAME' => $object->SYS_MODULES_NAME,
				'SYS_MODULES_DESCRIPTION' => $object->SYS_MODULES_DESCRIPTION,
				'SYS_MODULES_CONTROLLERNAME' => $object->SYS_MODULES_CONTROLLERNAME
	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($object->SYS_MODULES_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('SYS_MODULES_ID = ?' => $object->SYS_MODULES_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getSysModulesById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('User System Module not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_SysModules($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllSysModules()
	{
		$result = $this->_db_table->fetchAll();
	
		
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('User  System Module not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->toArray();

		return $row;
	}
}

