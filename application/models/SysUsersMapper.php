<?php

class Application_Model_SysUsersMapper
{

	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_SysUsers();
	}
	
	public function save(Application_Model_SysUsers $object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'SYS_USERS_ID' => $object->SYS_USERS_ID,
				'SYS_USERS_USERNAME' => $object->SYS_USERS_USERNAME,
				'SYS_USERS_PASSWORD' => $object->SYS_USERS_PASSWORD,
				'SYS_USERS_FULLNAME' => $object->SYS_USERS_FULLNAME,
				'SYS_USERS_GROUP_ID' => $object->SYS_USERS_GROUP_ID
	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($object->SYS_USERS_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('SYS_USERS_ID = ?' => $object->SYS_USERS_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getSysUsersById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('User System not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_SysUsers($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllSysUsers()
	{
		$result = $this->_db_table->fetchAll();
	
		
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('User  System not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->toArray();

		return $row;
	}
	
	public function getDatabyUsername($username) {
		$result = $this->_db_table->getUserbyUsername($username);
		return $result;
	}
}

