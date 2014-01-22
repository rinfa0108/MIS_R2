<?php

class Application_Model_SysUsers
{
	//declare the user's attributes
	private $SYS_USERS_ID;
	private $SYS_USERS_USERNAME;
	private $SYS_USERS_PASSWORD;
	private $SYS_USERS_FULLNAME;
	private $SYS_USERS_GROUP_ID;
	
	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($sysusers_row = null)
	{
		if( !is_null($sysusers_row) && $sysusers_row instanceof Zend_Db_Table_Row ) {
			$this->SYS_USERS_ID = $sysusers_row->SYS_USERS_ID;
			$this->SYS_USERS_USERNAME = $sysusers_row->SYS_USERS_USERNAME;
			$this->SYS_USERS_PASSWORD = $sysusers_row->SYS_USERS_PASSWORD;
			$this->SYS_USERS_FULLNAME = $sysusers_row->SYS_USERS_FULLNAME;
			$this->SYS_USERS_GROUP_ID = $sysusers_row->SYS_USERS_GROUP_ID;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'SYS_USERS_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->SYS_USERS_ID) ) {
					throw new Exception('Cannot update SYS_USERS_ID!');
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

