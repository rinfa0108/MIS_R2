<?php

class Application_Model_Agent
{

	//declare the user's attributes
	private $agents_id;
	private $branch_id;
	private $agents_name;
	private $agents_contactnumber;
	private $agents_address;
	private $agents_remarks;
	
	//upon construction, map the values
	//from the $agent_row if available
	public function __construct($agent_row = null)
	{
		if( !is_null($agent_row) && $agent_row instanceof Zend_Db_Table_Row ) {
			$this->agents_id = $agent_row->agents_id;
			$this->agents_contactnumber = $agent_row->agents_contactnumber;
			$this->agents_name = $agent_row->agents_name;
			$this->agents_address = $agent_row->agents_address;
			$this->agents_remarks = $agent_row->agents_remarks;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'agent_id':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->agent_id) ) {
					throw new Exception('Cannot update Agent\'s id!');
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
	
}

