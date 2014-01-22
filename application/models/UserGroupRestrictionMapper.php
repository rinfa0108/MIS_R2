<?php

class Application_Model_UserGroupRestrictionMapper
{
	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_UserGroupRestriction();
	}
	
	public function save(Application_Model_UserGroupRestriction $usergrouprestriction_object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'USER_GROUP_RESTRICTION_ID' => $usergrouprestriction_object->USER_GROUP_RESTRICTION_ID,
				'USER_GROUP_RESTRICTION_USER_GROUP_ID' => $usergrouprestriction_object->USER_GROUP_RESTRICTION_USER_GROUP_ID,
				'USER_GROUP_RESTRICTION_MODULE_ID' => $usergrouprestriction_object->USER_GROUP_RESTRICTION_MODULE_ID,
				'USER_GROUP_RESTRICTION_ISENABLED' => $usergrouprestriction_object->USER_GROUP_RESTRICTION_ISENABLED
	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($usergrouprestriction_object->USER_GROUP_RESTRICTION_ID) ) {
			$this->_db_table->insert($data);
	
			return true;
		} else {
			$this->_db_table->update($data, array('USER_GROUP_RESTRICTION_ID = ?' => $usergrouprestriction_object->USER_GROUP_RESTRICTION_ID));
	
			return true;
		}
	
		return false;
	
	}
	
	public function getUserGroupRestrictionById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('User Restriction not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$usergrouprestriction_object = new Application_Model_UserGroupRestriction($row);
			
		//return the user object
		return $usergrouprestriction_object;
	}

	
	public function fetchAllUserGroupRestriction()
	{
		$result = $this->_db_table->fetchAll();

		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('User Restriction not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
	
		$usergrouprestriction_object = new Application_Model_UserGroupRestriction($row);
			
		//return the user object
		return $usergrouprestriction_object;
	}
}

