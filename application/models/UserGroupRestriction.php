<?php

class Application_Model_UserGroupRestriction
{

	//declare the user's attributes
	private $USER_GROUP_RESTRICTION_ID;
	private $USER_GROUP_RESTRICTION_USER_GROUP_ID;
	private $USER_GROUP_RESTRICTION_MODULE_ID;
	private $USER_GROUP_RESTRICTION_ISENABLED;
	
	//upon construction, map the values
	//from the $agent_row if available
	public function __construct($agent_row = null)
	{
		if( !is_null($agent_row) && $agent_row instanceof Zend_Db_Table_Row ) {
			$this->USER_GROUP_RESTRICTION_ID = $agent_row->USER_GROUP_RESTRICTION_ID;
			$this->USER_GROUP_RESTRICTION_USER_GROUP_ID = $agent_row->USER_GROUP_RESTRICTION_USER_GROUP_ID;
			$this->USER_GROUP_RESTRICTION_MODULE_ID = $agent_row->USER_GROUP_RESTRICTION_MODULE_ID;
			$this->USER_GROUP_RESTRICTION_ISENABLED = $agent_row->USER_GROUP_RESTRICTION_ISENABLED;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'USER_GROUP_RESTRICTION_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->USER_GROUP_RESTRICTION_ID) ) {
					throw new Exception('Cannot update USER_GROUP_RESTRICTION \'s id!');
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

