<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$auth = Zend_Auth::getInstance();
    	
    	if(!$auth->hasIdentity()){
    		$this->_redirect('/login');
    	}
    }

    public function indexAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	
    	/**
		["SYS_USERS_ID"] => string(1) "1"
	    ["SYS_USERS_USERNAME"] => string(5) "admin"
	    ["SYS_USERS_PASSWORD"] => string(40) "d033e22ae348aeb5660fc2140aec35850c4da997"
	    ["SYS_USERS_FULLNAME"] => string(13) "administrator"
	    ["SYS_USERS_GROUP_ID"] => string(1) "1"
	    ["SYS_USERS_DATE_CREATED"] => string(19) "2013-11-24 23:41:49"
    	 */
    	$sysuserSess = new Zend_Session_Namespace('SYSUSER_SESS');
    	//Zend_Debug::dump($sysuserSess->arrSysusersession);
   
    }

    public function newAction()
    {
        // action body
    }

    public function getapplicantseducationAction()
    {
        // action body
    }

    public function getapplicantseducationbyidAction()
    {
        // action body
    }

    public function setapplicantseducationbyidAction()
    {
        // action body
    }

    public function setapplicantseducationAction()
    {
        // action body
    }

    public function setaccountexpensesbranchAction()
    {
        // action body
    }


}













