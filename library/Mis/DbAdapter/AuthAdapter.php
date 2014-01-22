<?php
/**
 * 
 * @desc 	   Custom Library for Authentication Adapter
 * @category   MIS Library
 * @copyright  Copyright (c) 2011 Moneymagnet Inc.
 * @version    $Id: AuthAdapter.php 0 $
 */

class Mis_DbAdapter_AuthAdapter implements Zend_Auth_Adapter_Interface
{
    protected $_username;
    protected $_password;
    protected $_sysuser;
    
    /**
     * 
     * Authenticate members
     * @param String $email
     * @param String $password
     */
    public function __construct($username, $password) {
        $this->_username = $username;
        $this->_password = $password;
       	$this->_sysuser = new Application_Model_DbTable_Sysusers();
    }
    
    /**
     * (non-PHPdoc)
     * @see Zend/Auth/Adapter/Zend_Auth_Adapter_Interface::authenticate()
     */
    public function authenticate()
    {
    	
        $match = $this->_sysuser->findCredentials($this->_username, $this->_password);
        
        var_dump();
        exit;
        
        if(!$match) {
            $result = new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID, null);
        } else {
            $sysuser = current($match);
            
            $sysuserSess = new Zend_Session_Namespace('SYSUSER_SESS');
            $sysuserSess->arrSysusersession = $sysuser;
            
            $result = new Zend_Auth_Result(Zend_Auth_Result::SUCCESS, $sysuser);
        }
        return $result;
    }
}