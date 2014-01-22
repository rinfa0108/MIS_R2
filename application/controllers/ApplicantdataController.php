<?php

class ApplicantdataController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    }

    public function newAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    }

    public function searchAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    }

    public function newpersonaldataAction()
    {
        // action body
        $this->_helper->layout->setLayout('layout');
        
    }

    public function newfamilydataAction()
    {
        // action body
        $this->_helper->layout->setLayout('layout');
        
        $param = $this->_getAllParams();
        
        if($param['newpersonaldata'] && strlen($param['inputDesiredPosition']) > 1 
        		&& strlen($param['inputFirstName']) > 1 
        		&& strlen($param['inputLastName']) > 1) {
        	
	        $personaldata = new Application_Model_ApplicantsPersonalData();
	        $personaldata->APPLICANTS_PERSONAL_DATA_DESIRED_POSITION = $param['inputDesiredPosition'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_RELIGION =  $param['inputReligion'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_AGE =  $param['inputAge'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_OTHERSKILLS =  $param['inputOtherSkill'];;
	        $personaldata->APPLICANTS_PERSONAL_DATA_EXABROAD =  $param['optionsRadios'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_EXABROAD_YEARS =  $param['inputYearsAbroad'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_COUNTRY_ABROAD =  $param['inputWhatCountry'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_FIRSTNAME =  $param['inputFirstName'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_MIDDLENAME =  $param['inputMiddleName'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_LASTNAME =  $param['inputLastName'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_HEIGHT =  $param['inputHeight'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_WEIGHT =  $param['inputWeight'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_GENDER =  $param['inputGender'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_ADDRESS =  $param['inputAddress'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_TELEPHONE =  $param['inputTelNumber'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_CELLPHONE =  $param['inputCellphoneNumber'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_DATEOFBIRTH = $param['inputBirthdate'];
	        $personaldata->APPLICANTS_PERSONAL_DATA_PLACEOFBIRTH =  $param['inputPlaceofbirth'];
	        
	        $personaldata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
	        $res = $personaldata_mapper->save($personaldata);
	        
	        
	        //save session
	        $newbiodatasession = new Zend_Session_Namespace('NEW_BIODATA_SESS');
	        
			$res_newappdata = $personaldata_mapper->getApplicantId($param['inputFirstName'], $param['inputLastName'], $param['inputBirthdate']);
			$newappdata = get_object_vars($res_newappdata[0]);
			$newbiodatasession->newappdata = $newappdata;
			
			/**
			 * $familydata_mapper = new Application_Model_ApplicantsFamilyDataMapper();
	    		$res_familydata = $familydata_mapper->getAllApplicantsFamilyDataById($key);
	    		$farray = get_object_vars($res_familydata[0]);
	    		*/
        } else {
        	
        	$this->_redirect('/Applicantdata/newpersonaldata');
        }
        
    }

    public function newworkexperienceAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	
    	$params = $this->_getAllParams();
    	
    	if(isset($params['inputFamilydatasubmit'])){
    		$familydata = new Application_Model_ApplicantsFamilyData();
    		$familydata->APPLICANTS_PERSONAL_DATA_ID = $params['APPLICANTS_PERSONAL_DATA_ID'];
    		$familydata->APPLICANTS_FAMILY_DATA_MARITALSTATUS = $params['APPLICANTS_FAMILY_DATA_MARITALSTATUS'];
    		$familydata->APPLICANTS_FAMILY_DATA_NOOFCHILDREN = $params['APPLICANTS_FAMILY_DATA_NOOFCHILDREN'];
    		$familydata->APPLICANTS_FAMILY_DATA_CHILDRENAGES = $params['APPLICANTS_FAMILY_DATA_CHILDRENAGES'];
    		$familydata->APPLICANTS_FAMILY_DATA_SPOUSEFULLNAME = $params['APPLICANTS_FAMILY_DATA_SPOUSEFULLNAME'];
    		$familydata->APPLICANTS_FAMILY_DATA_FATHERSFULLNAME = $params['APPLICANTS_FAMILY_DATA_FATHERSFULLNAME'];
    		$familydata->APPLICANTS_FAMILY_DATA_MOTHERSFULLNAME = $params['APPLICANTS_FAMILY_DATA_MOTHERSFULLNAME'];
    		$familydata->APPLICANTS_FAMILY_DATA_SPOUSETELNO = $params['APPLICANTS_FAMILY_DATA_SPOUSETELNO'];
    		$familydata->APPLICANTS_FAMILY_DATA_FATHERSTELNO = $params['APPLICANTS_FAMILY_DATA_FATHERSTELNO'];
    		$familydata->APPLICANTS_FAMILY_DATA_MOTHERSTELNO = $params['APPLICANTS_FAMILY_DATA_MOTHERSTELNO'];
    		$familydata->APPLICANTS_FAMILY_DATA_SPOUSEOCCUPATION = $params['APPLICANTS_FAMILY_DATA_SPOUSEOCCUPATION'];
    		$familydata->APPLICANTS_FAMILY_DATA_FATHERSOCCUPATION = $params['APPLICANTS_FAMILY_DATA_FATHERSOCCUPATION'];
    		$familydata->APPLICANTS_FAMILY_DATA_MOTHERSOCCUPATION = $params['APPLICANTS_FAMILY_DATA_MOTHERSOCCUPATION'];
    		$familydata->APPLICANTS_FAMILY_DATA_HOWMANYBROTHER = $params['APPLICANTS_FAMILY_DATA_HOWMANYBROTHER'];
    		$familydata->APPLICANTS_FAMILY_DATA_HOWMANYSISTERS = $params['APPLICANTS_FAMILY_DATA_HOWMANYSISTERS'];
    		
			$familydata_mapper = new Application_Model_ApplicantsFamilyDataMapper();
			$familydata_mapper->save($familydata);
    		
    	}
    	
    	
    	//Zend_Debug::dump($params);
    }

    public function neweducationAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	 
    	$params = $this->_getAllParams();
    	
    	if(isset($params['inputWorkExpDataSubmit'])) {
    		$workexp = new Application_Model_ApplicantsWorkexperience();
    		
    		$workexp->APPLICANTS_PERSONAL_DATA_ID = $params['APPLICANTS_PERSONAL_DATA_ID'];
    		$workexp->APPLICANTS_WORKEXPERIENCE_COMPANY = $params['APPLICANTS_WORKEXPERIENCE_COMPANY'];
    		$workexp->APPLICANTS_WORKEXPERIENCE_COMPANYADDR = $params['APPLICANTS_WORKEXPERIENCE_COMPANYADDR'];
    		$workexp->APPLICANTS_WORKEXPERIENCE_POSITION = $params['APPLICANTS_WORKEXPERIENCE_POSITION'];
    		$workexp->APPLICANTS_WORKEXPERIENCE_FROM = $params['APPLICANTS_WORKEXPERIENCE_FROM'];
    		$workexp->APPLICANTS_WORKEXPERIENCE_TO = $params['APPLICANTS_WORKEXPERIENCE_TO'];
    		
    		$workexp_mapper = new Application_Model_ApplicantsWorkexperienceMapper();
    		$workexp_mapper->save($workexp);
    		
    	}
    	
    	//Zend_Debug::dump($params);
    }

    public function newrelativesAction()
    {
        // action body
        $this->_helper->layout->setLayout('layout');
    }

    public function viewbiodatasummaryAction()
    {
        // action body
    	$this->_helper->layout->setLayout('bdsummary');
    	
        $appid = $this->_getParam('id');
		$key = $appid;
        
        $pdata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
        $arrayResAppData = $pdata_mapper->getAllApplicantsPersonalDataById($key);
        
        $arr = get_object_vars($arrayResAppData[0]);
        
        $familydata_mapper = new Application_Model_ApplicantsFamilyDataMapper();
        $res_familydata = $familydata_mapper->getAllApplicantsFamilyDataById($key);
        $farray = get_object_vars($res_familydata[0]);
        
        if(!is_null($farray['APPLICANTS_FAMILY_DATA_MARITALSTATUS'])) {
        	$status_select_mapper = new Application_Model_ApplicantsMaritalstatusSelectorMapper();
        	$res_status_select = $status_select_mapper->getApplicantsMaritalStatusSelectorById($farray['APPLICANTS_FAMILY_DATA_MARITALSTATUS']);
        	$farray['CIVILSTATUS'] = $res_status_select->APPLICANTS_PERSONAL_MARITALSTATUS_VALUE.'/';
        } else {
        	$farray['CIVILSTATUS'] = ''; 	
        }
        
        $dailystatus_mapper = new Application_Model_ApplicantsDailyStatusMapper();
        $res_dailystatus = $dailystatus_mapper->getArrayApplicantsDailyStatusById($key);
        $arr_dailystatus =  get_object_vars($res_dailystatus[0]);
         
        $arr = array_merge($arr,$farray);
        if($arr_dailystatus) {
        	$arr = array_merge($arr , $arr_dailystatus);
        }
        
        $this->view->appdata = $arr;
        
        //Zend_Debug::dump($arr);
    }


}

















