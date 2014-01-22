<?php

class SysmodulesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setsysmodulesAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	 
    	 
    	//Sample Data
    	//set form action and values here
    	$sysmodules = new Application_Model_SysModules();
    	$sysmodules->SYS_MODULES_NAME = 'dailaystat';   //no spaces
    	$sysmodules->SYS_MODULES_DESCRIPTION = 'Daily Status';
    	$sysmodules->SYS_MODULES_CONTROLLERNAME = 'Dailystatus';
    	
    	$sysmodules_mapper = new Application_Model_SysModulesMapper();
    	$res = $sysmodules_mapper->save($sysmodules);
    	
    	var_dump($res);
    	
    }

    public function getsysmodulesAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$sysmodules_mapper = new Application_Model_SysModulesMapper();
    	$arrayRes = $sysmodules_mapper->fetchAllSysModules();
    	 
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	
    	$this->view->response = $json;
    }


}





