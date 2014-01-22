<?php

class ApplicantspersonaldataController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setapplicantspersonaldataAction()
    {
        // action body
    	
    	$this->_helper->layout->disableLayout();
    	
    	
    	//Sample Data
    	//set form action and values here
    	$personaldata = new Application_Model_ApplicantsPersonalData();
		$personaldata->APPLICANTS_PERSONAL_DATA_DESIRED_POSITION = "King" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_RELIGION = "Muslimun" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_AGE = "99" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_OTHERSKILLS = "Technician" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_EXABROAD = "1" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_EXABROAD_YEARS = "1" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_COUNTRY_ABROAD = "Italy" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_FIRSTNAME = "Sharon" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_MIDDLENAME = "C" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_LASTNAME = "Cuneta" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_HEIGHT = "4'8" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_WEIGHT = "120" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_GENDER = "1" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_ADDRESS = "Malabon City" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_TELEPHONE = "450-2345" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_CELLPHONE = "09332299003" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_DATEOFBIRTH = "Feb 0 1954" ;
		$personaldata->APPLICANTS_PERSONAL_DATA_PLACEOFBIRTH = "Syria" ;
    	 
    	$personaldata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
    	$res = $personaldata_mapper->save($personaldata);
    	 
    	var_dump($res);
    }

    public function getapplicantspersonaldataAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$pdata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
    	$arrayRes = $pdata_mapper->fetchAllApplicantsPersonalData();
    	
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	 
    	$this->view->response = $json;
    }

    public function getapplicantspersonaldatabyidAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	
    	$id = strip_tags($this->_getParam('id'));
    	
    	if(!is_null($id)) {
	    	$pdata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
	    	$res = $pdata_mapper->getApplicantsPersonalDataById($id);
	    	 
	    	$arrayRes = $res->__getProperties();
	    	$json = Zend_Json_Encoder::encode($arrayRes);
	    	
	    	return $this->view->response = $json;
    	} 
    }


}







