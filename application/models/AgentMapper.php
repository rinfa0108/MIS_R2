<?php

class Application_Model_AgentMapper
{

	protected $_db_table;
	
	public function __construct()
	{
		//Instantiate the Table Data Gateway for the User table
		$this->_db_table = new Application_Model_DbTable_Agent();
	}
	
	public function save(Application_Model_Agent $agent_object)
	{
		//Create an associative array
		//of the data you want to update
		$data = array(
				'BRANCH_ID' => $agent_object->branch_id,
				'AGENTS_NAME' => $agent_object->agents_name,
				'AGENTS_CONTACTNUMBER' => $agent_object->agents_contactnumber,
				'AGENTS_ADDRESS' => $agent_object->agents_address,
				'AGENTS_REMARKS' => $agent_object->agents_remarks
	
		);
			
		//Check if the user object has an ID
		//if no, it means the user is a new user
		//if yes, then it means you're updating an old user
		if( is_null($agent_object->agents_id) ) {
			$this->_db_table->insert($data);
				
			return true;
		} else {
			$this->_db_table->update($data, array('agents_id = ?' => $agent_object->agents_id));
				
			return true;
		}
	
		return false;
	
	}
	
	public function getAgentById($id)
	{
		//use the Table Gateway to find the row that
		//the id represents
		$result = $this->_db_table->find($id);
			
		//if not found, throw an exsception
		if( count($result) == 0 ) {
			throw new Exception('Agent id not found');
		}
			
		//if found, get the result, and map it to the
		//corresponding Data Object
		$row = $result->current();
		$object = new Application_Model_Agent($row);
			
		//return the user object
		return $object;
	}
	
	
	public function fetchAllAgents()
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
}

