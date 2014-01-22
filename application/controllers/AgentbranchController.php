<?php

class AgentbranchController extends Zend_Controller_Action
{
	
    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');

    	// action body
    	$agents_mapper = new Application_Model_AgentMapper();
    	$arrayRes = $agents_mapper->fetchAllAgents(); 
    	$this->view->agents = $arrayRes;
    	
    	
    	$branch_mapper = new Application_Model_BranchMapper();
    	$branch_res = $branch_mapper->fetchAllBranch();
    	$this->view->allbranch = $branch_res;
    	
    }

    public function newbranchAction()
    {
    	
    	// action body
    	$this->_helper->layout->disableLayout();
        $data = $this->_getAllParams();
        
        $branch = new Application_Model_Branch();
    	$branch->BRANCH_CODENUMBER = $data['inputBranchDataCodeNumber']; 
    	$branch->BRANCH_NAME = $data['inputBranchDataName'];
    	$branch->BRANCH_ADDRESS = $data['inputBrachDataAddress'];
    	$branch->BRANCH_REMARKS = $data['inputBranchDataRemarks'];
    	
    	$branch_mapper = new Application_Model_BranchMapper();
    	$res = $branch_mapper->save($branch);
        if($res) {
        	//$this->view->response = json_encode(array('result'=>'true'));
        	$this->view->response = 'Add new branch sucessfull for '.$data['inputBranchDataName'];
        	$this->view->redirectlink = '/Agentbranch/';
        }
        
        //var_dump($data);
    	/**
    	$branch = new Application_Model_Branch();
    	$branch->branch_codenumber = 'TEST-01234'; 
    	$branch->branch_name = 'Metro Manila Test branch';
    	$branch->branch_address = 'Quezon City M.M. Phils';
    	$branch->branch_remarks = 'Manage By Juan Dela Cruz';
    	
    	$branch_mapper = new Application_Model_BranchMapper();
    	$res = $branch_mapper->save($branch);
    	
    	var_dump($res);
    	*/
    	
    }

    public function newagentAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	$data = $this->_getAllParams();
    	
     	$agents = new Application_Model_Agent();
     	//$agents->agents_id = $data['inputAgentsID'] ? $data['inputAgentsID'] : null;
    	$agents->branch_id = $data['inputAgentsBranchID']; 
    	$agents->agents_name = $data['inputAgentsName'];
    	$agents->agents_contactnumber = $data['inputAgentsContactNumbers'];
    	$agents->agents_address = $data['inputAgentsAddress'];
    	$agents->agents_remarks = $data['inputAgentsRemarks'];
    	
    	$agents_mapper = new Application_Model_AgentMapper();
    	$res = $agents_mapper->save($agents);
        if($res) {
        	//$this->view->response = json_encode(array('result'=>'true'));
        	$this->view->response = 'Add new agents sucessfull for '.$data['inputAgentsName'];
        	$this->view->redirectlink = '/Agentbranch/';
        }
    	

    }

    public function getbranchbyidAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	 
   		 $id = strip_tags($this->_getParam('id'));
    	
    	if(!is_null($id)) {
	    	$branch_mapper = new Application_Model_BranchMapper();
	    	$res = $branch_mapper->getBranchById($id);

	    	$arrayRes = $res->__getProperties();
	
	    
	    	$json = Zend_Json_Encoder::encode($arrayRes);
	    	
	    	return $this->view->response = $json;
    	}
    }


}







