<?php

class LoginController extends Zend_Controller_Action
{

	private $_config;
	private $_errconfig;
	private $_db;
	private $_registry;
	private $_auth;
	
    public function init()
    {
        /* Initialize action controller here */
    	$this->_errconfig = new Zend_Config_Ini( APPLICATION_PATH . '/configs/errors.ini', 'login' );
    	$this->_config = new Zend_Config_Ini( APPLICATION_PATH . '/configs/data.ini', 'users' );
    	
    	$this->_db = Zend_Registry::get("db");
    	$this->_registry   = Zend_Registry::getInstance();
    	$this->_auth       = Zend_Auth::getInstance();
    	
    }

    
	public function preDispatch()
    {
	    if ('logout' == $this->getRequest()->getActionName()) {
	    	Zend_Auth::getInstance()->clearIdentity();
	    	
	    	Zend_Session::destroy(true);
	    	$this->_redirect('/');
	    }
    }

	public function indexAction()
    {

    	$this->_helper->layout->setLayout('layout');
    	
        $auth = Zend_Auth::getInstance();
        if(Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/');
            return;
        }
        
        if($this->_request->isPost()) {
	    	$arrParams = $this->getRequest()->getParams();
	    	$this->view->arrParams = $arrParams;
	    	
	    	$arrFormData = $this->getRequest()->getPost(); 	    
	    	
	    	if(empty($arrFormData['username']) && empty($arrFormData['password'])) {
	    		$arrFormData['username'] = rand(1,10);
	    		$arrFormData['password'] = rand(1,10);
	    	}
	    	
	    	$authAdapter = new Zend_Auth_Adapter_DbTable($this->_db);
	    	$authAdapter->setTableName('mis_sys_users')
	    	->setIdentityColumn('SYS_USERS_USERNAME')
	    	->setCredentialColumn('SYS_USERS_PASSWORD');
	    	
	    	$authAdapter->setIdentity($arrFormData['username']);
	    	$authAdapter->setCredential(sha1($arrFormData['password']));
	    	
	    	// Perform the authentication query, saving the result
	    	$result = $this->_auth->authenticate($authAdapter);
	    	
   			if(!$result->isValid()) {

                    switch ($result->getCode()) {
                       case Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID:
                       	
                       	/**
                       	 * @see application/configs/errors.ini
                       	 */
                       default :
                       	$this->view->errorlogin = $this->_errconfig->errlog;
                        //$this->_helper->layout->setLayout('errorlogin');
                        
                        $this->view->loginfailed = TRUE;
                        break;
                    }
           	} else {    
           		$data = $authAdapter->getResultRowObject(null,'password');
           		$this->_auth->getStorage()->write($data);
           		
           		$objsysuser = new Application_Model_SysUsersMapper();
           		$sysuser = $objsysuser->getDatabyUsername($arrFormData['username']);
           		
           		
           		
           		$sysuserSess = new Zend_Session_Namespace('SYSUSER_SESS');
           		$sysuserSess->sysuser = $sysuser[0];
           		
           		
           		$result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $sysuser);
           		
                $this->_redirect('/');
            }

        }
    }



}

