<?php

class ApplicantsmaritalstatusselectorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function getapplicantsmaritalstatusselectorAction()
	{
        // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$applicantsmaritalstatusselector_mapper = new Application_Model_ApplicantsMaritalStatusSelectorMapper();
    	$arrayRes = $applicantsmaritalstatusselector_mapper->fetchAllApplicantsMaritalStatusSelector();
    	 
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	
    	$this->view->response = $json;
    }

}



