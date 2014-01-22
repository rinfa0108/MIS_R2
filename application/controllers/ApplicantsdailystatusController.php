<?php

class ApplicantsdailystatusController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setapplicantsdailystatusAction()
    {
        // action body
    	// action body
    	$this->_helper->layout->disableLayout();
    	
    	
    	//Sample Data
    	//set form action and values here
    	$personaldata = new Application_Model_ApplicantsPersonalData();
		$personaldata->APPLICANTS_PERSONAL_DATA_ID = "King" ;
		$personaldata->AGENTBRANCH_ID = "Muslimun" ;
		$personaldata->APPLICANTS_DAILYSTATUS_CONTACTNUMBER = "99" ;
		$personaldata->APPLICANTS_DAILYSTATUS_APPIN = "Technician" ;
		$personaldata->APPLICANTS_DAILYSTATUS_MEDICALDATE = "1" ;
		$personaldata->APPLICANTS_DAILYSTATUS_MEDICALRESULT = "1" ;
		$personaldata->APPLICANTS_DAILYSTATUS_NBI = "Italy" ;
		$personaldata->APPLICANTS_DAILYSTATUS_NBIRR = "Sharon" ;
		$personaldata->APPLICANTS_DAILYSTATUS_TRAINING = "C" ;
		$personaldata->APPLICANTS_DAILYSTATUS_PDOS = "Cuneta" ;
		$personaldata->APPLICANTS_DAILYSTATUS_TESDA = "4'8" ;
		$personaldata->APPLICANTS_DAILYSTATUS_OWWA = "120" ;
		$personaldata->APPLICANTS_DAILYSTATUS_VISA_DATEISSUE = "1" ;
		$personaldata->APPLICANTS_DAILYSTATUS_VISA_DATEEXPIRE = "Malabon City" ;
		$personaldata->APPLICANTS_DAILYSTATUS_STAMPING_FILE = "450-2345" ;
		$personaldata->APPLICANTS_DAILYSTATUS_STAMPING_RELEASE = "09332299003" ;
		$personaldata->APPLICANTS_DAILYSTATUS_CONTRACTIN = "Feb 0 1954" ;
		$personaldata->APPLICANTS_DAILYSTATUS_REMARKS = "Syria" ;
		$personaldata->APPLICANTS_DAILYSTATUS_ENDCONTRACT_DATE = "Syria" ;
		$personaldata->APPLICANTS_DAILYSTATUS_ISARCHIVE = "Syria" ;
		$personaldata->APPLICANTS_DAILYSTATUS_DATECREATED = "Syria" ;
		$personaldata->APPLICANTS_DAILYSTATUS_DATEUPDATED = "Syria" ;
    	 
    	$personaldata_mapper = new Application_Model_ApplicantsDailyStatusMapper();
    	$res = $personaldata_mapper->save($personaldata);
    	 
    	var_dump($res);
    }

    public function getapplicantsdailystatusAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	// action body
    	$applicantsdailystatus_mapper = new Application_Model_ApplicantsDailyStatusMapper();
    	$arrayRes = $applicantsdailystatus_mapper->fetchAllApplicantsDailyStatus();
    	
    	//$arrayRes = $res->__getProperties();
    	$json = Zend_Json_Encoder::encode($arrayRes);
    	 
    	$this->view->response = $json;
    }


}





