<?php

class UsergroupController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function getusergroupAction()
    {
        // action body
    	// action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$sysmodules_mapper = new Application_Model_SysModulesMapper();
    	$arrayRes = $sysmodules_mapper->fetchAllSysModules();
    	
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	 
    	$this->view->response = $json;
    }

    public function setusergroupAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	
    	
    	//Sample Data
    	//set form action and values here
    	$usergroup = new Application_Model_UserGroup();
    	$usergroup->USER_GROUP_NAME = 'Alalay';   //no spaces
    	$usergroup->USER_GROUP_DESCRIPTION = 'Mga Alalay lang';
    	 
    	$usergroup_mapper = new Application_Model_UserGroupMapper();
    	$res = $usergroup_mapper->save($usergroup);
    	 
    	var_dump($res);
    }


}





