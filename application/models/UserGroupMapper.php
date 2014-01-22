<?php

class Application_Model_UserGroupMapper
{

	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_UserGroup();
	}
	
	public function save(Application_Model_UserGroup $object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'USER_GROUP_ID' => $object->USER_GROUP_ID,
				'USER_GROUP_NAME' => $object->USER_GROUP_NAME,
				'USER_GROUP_DESCRIPTION' => $object->USER_GROUP_DESCRIPTION
	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($object->USER_GROUP_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('USER_GROUP_ID = ?' => $object->USER_GROUP_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getSysUserGroupById($id)
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
		$object = new Application_Model_UserGroup($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllUserGroup()
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

