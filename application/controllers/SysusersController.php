<?php

class SysusersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setsysusersAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	
    	
    	//Sample Data
    	//set form action and values here
    	$sysusers = new Application_Model_SysUsers();
    	$sysusers->SYS_USERS_USERNAME = 'juan';
    	$sysusers->SYS_USERS_PASSWORD = sha1('juan');
    	$sysusers->SYS_USERS_FULLNAME = 'juan';
    	$sysusers->SYS_USERS_GROUP_ID = '1';
    	 
    	$sysusers_mapper = new Application_Model_SysUsersMapper();
    	$res = $sysusers_mapper->save($sysusers);
    	 
    	var_dump($res);
    	
    
    }

	public function getsysusersAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$sysusers_mapper = new Application_Model_SysUsersMapper();
    	$arrayRes = $sysusers_mapper->fetchAllSysUsers();
    	 
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	
    	$this->view->response = $json;
    }


}





