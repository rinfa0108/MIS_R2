<?php

class UsergrouprestrictionController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setrestrictionAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	
    	
    	//Sample Data
    	//set form action and values here
    	$usergrouprestriction = new Application_Model_UserGroupRestriction();
    	$usergrouprestriction->USER_GROUP_RESTRICTION_USER_GROUP_ID = '2';
    	$usergrouprestriction->USER_GROUP_RESTRICTION_MODULE_ID = '5';
    	$usergrouprestriction->USER_GROUP_RESTRICTION_ISENABLED = '1';
    	 
    	$usergrouprestriction_mapper = new Application_Model_UserGroupRestrictionMapper();
    	$res = $usergrouprestriction_mapper->save($usergrouprestriction);
    	 
    	var_dump($res);
    	
    }

    public function getrestrictionAction()
    {
    	$this->_helper->layout->disableLayout();
    	// action body
    	$usergrouprestriction_mapper = new Application_Model_UserGroupRestrictionMapper();
    	$res = $usergrouprestriction_mapper->fetchAllUserGroupRestriction();
    	
    	$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	echo $json;
    }


}





