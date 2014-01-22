<?php

class ApplicantsfamilydatasiblingsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function getapplicantsfamilydatasiblingsAction()
    {
         // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$applicantsfamilydatasiblings_mapper = new Application_Model_ApplicantsFamilyDataSiblingsMapper();
    	$arrayRes = $applicantsfamilydatasiblings_mapper->fetchAllApplicantsFamilyDataSiblings();
    	 
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	
    	$this->view->response = $json;
    }

    public function setapplicantsfamilydatasiblingsAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	 
    	 
    	//Sample Data
    	//set form action and values here
    	$applicantsfamilydatasiblings = new Application_Model_SysModules();
    	$applicantsfamilydatasiblings->APPLICANTS_PERSONAL_DATA_ID = 'dailaystat';   //no spaces
    	$applicantsfamilydatasiblings->APPLICANTS_FAMILY_DATA_SIBLINGS_FULLNAME = 'Daily Status';
    	$applicantsfamilydatasiblings->APPLICANTS_FAMILY_DATA_SIBLINGS_TELNO = 'Dailystatus';
    	$applicantsfamilydatasiblings->APPLICANTS_FAMILY_DATA_SIBLINGS_OCCUPATION = 'Dailystatus';
    	
    	$applicantsfamilydatasiblings_mapper = new Application_Model_ApplicantsFamilyDataSiblingsMapper();
    	$res = $applicantsfamilydatasiblings_mapper->save($applicantsfamilydatasiblings);
    	
    	var_dump($res);
    }


}





