<?php

class Application_Model_SysModules
{
	//declare the user's attributes
	private $SYS_MODULES_ID;
	private $SYS_MODULES_NAME;
	private $SYS_MODULES_DESCRIPTION;
	private $SYS_MODULES_CONTROLLERNAME;
	
	//upon construction, map the values
	//from the $sysmodules_row if available
	public function __construct($sysmodules_row = null)
	{
		if( !is_null($sysmodules_row) && $sysmodules_row instanceof Zend_Db_Table_Row ) {
			$this->SYS_MODULES_ID = $sysmodules_row->SYS_MODULES_ID;
			$this->SYS_MODULES_NAME = $sysmodules_row->SYS_MODULES_NAME;
			$this->SYS_MODULES_DESCRIPTION = $sysmodules_row->SYS_MODULES_DESCRIPTION;
			$this->SYS_MODULES_CONTROLLERNAME = $sysmodules_row->SYS_MODULES_CONTROLLERNAME;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'SYS_MODULES_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->SYS_MODULES_ID) ) {
					throw new Exception('Cannot update SYS_MODULES_ID!');
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

