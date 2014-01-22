<?php

class Application_Model_Branch
{
	//declare the user's attributes
	private $BRANCH_ID;
	private $BRANCH_CODENUMBER;
	private $BRANCH_NAME;
	private $BRANCH_ADDRESS;
	private $BRANCH_REMARKS;
	
	//upon construction, map the values
	//from the $branch_row if available
	public function __construct($branch_row = null)
	{
		if( !is_null($branch_row) && $branch_row instanceof Zend_Db_Table_Row ) {
			$this->BRANCH_ID = $branch_row->BRANCH_ID;
			$this->BRANCH_CODENUMBER = $branch_row->BRANCH_CODENUMBER;
			$this->BRANCH_NAME = $branch_row->BRANCH_NAME;
			$this->BRANCH_ADDRESS = $branch_row->BRANCH_ADDRESS;
			$this->BRANCH_REMARKS = $branch_row->BRANCH_REMARKS;
		}
	}
	
	//magic function __set to set the
	//attributes of the User model
	public function __set($name, $value)
	{
		switch($name) {
			case 'BRANCH_ID':
				//if the id isn't null, you shouldn't update it!
				if( !is_null($this->branch_id) ) {
					throw new Exception('Cannot update Branch\'s id!');
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

