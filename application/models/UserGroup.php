<?php

class Application_Model_UserGroup
{

//declare the user's attributes
	private $USER_GROUP_ID;
	private $USER_GROUP_NAME;
	private $USER_GROUP_DESCRIPTION;

	
	//upon construction, map the values
	//from the $usergroup_row if available
	public function __construct($usergroup_row = null)
	{
		if( !is_null($usergroup_row) && $usergroup_row instanceof Zend_Db_Table_Row ) {
			$this->USER_GROUP_ID = $usergroup_row->USER_GROUP_ID;
			$this->USER_GROUP_NAME = $usergroup_row->USER_GROUP_NAME;
			$this->USER_GROUP_DESCRIPTION = $usergroup_row->USER_GROUP_DESCRIPTION;

		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'USER_GROUP_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->USER_GROUP_ID) ) {
					throw new Exception('Cannot update USER_GROUP_ID!');
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

