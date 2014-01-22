<?php

class ApplicantspersonaldatagenderselectorController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function getapplicantspersonaldatagenderselectorAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$applicantspersonaldatagenderselector_mapper = new Application_Model_ApplicantsPersonalDataGenderselectorMapper();
    	$arrayRes = $applicantspersonaldatagenderselector_mapper->fetchAllApplicantsPersonalDataGenderselector();
    	 
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	
    	$this->view->response = $json;
    }

    public function setapplicantspersonaldatagenderselectorAction()
    {
        // action body
    }


}





