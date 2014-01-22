<?php

class LogoutController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$auth = Zend_Auth::getInstance();
    	$auth = Zend_Auth::getInstance();
    	$auth->clearIdentity();
    	$this->_redirect('/login');
    	
    	$sysuserSess = new Zend_Session_Namespace('SYSUSER_SESS');
    	unset($sysuserSess);
    	
    }


}

