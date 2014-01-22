<?php

class DailystatusController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	Zend_Session::namespaceUnset('NEW_BIODATA_SESS');
    }

    private function get_extension($file_name)
    {
    	$ext = explode('.', $file_name);
    	$ext = array_pop($ext);
    	return strtolower($ext);
    }

    public function indexAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	
    	
    	$params = $this->_getAllParams();
    	//Zend_Debug::dump($params);
    	
    	if(isset($params['newAppDailystatus'])) {
	    	$objDailystat = new Application_Model_ApplicantsDailyStatus();
	    	$objDailystat->APPLICANTS_PERSONAL_DATA_ID = $params['inputAppDataId'];
			$objDailystat->APPLICANTS_DAILYSTATUS_CODE = $params['inputRefno'];
			$objDailystat->AGENTBRANCH_ID = $params['inputAgentbranch'];
			$objDailystat->APPLICANTS_DAILYSTATUS_CONTACTNUMBER = $params['inputContactno'];
			$objDailystat->APPLICANTS_DAILYSTATUS_PASSPORT = $params['inputPassportNo'];
			$objDailystat->APPLICANTS_DAILYSTATUS_PASSPORTDATEISSUE = $params['inputPassportDateissue'];
			$objDailystat->APPLICANTS_DAILYSTATUS_PASSPORTDATEEXPIRE = $params['inputPassportDateexpire'];
			$objDailystat->APPLICANTS_DAILYSTATUS_PASSPORTPLACEISSUE = $params['inputPassportplaceissue'];
			$objDailystat->APPLICANTS_DAILYSTATUS_APPIN = $params['dateappin'];
			$objDailystat->APPLICANTS_DAILYSTATUS_MEDICALDATE = $params['datemedical'];
			if(strlen($params['inputMedicalresult']) < 1) {
				$objDailystat->APPLICANTS_DAILYSTATUS_MEDICALRESULT = $params['hiddenMedicalResult'];
			}else {
				$objDailystat->APPLICANTS_DAILYSTATUS_MEDICALRESULT = $params['inputMedicalresult'];
			}
			
			$objDailystat->APPLICANTS_DAILYSTATUS_NBI = $params['datenbi'];
			$objDailystat->APPLICANTS_DAILYSTATUS_NBIRR = $params['datenbirr'];
			if(strlen($params['checkTraining']) < 1) {
				$objDailystat->APPLICANTS_DAILYSTATUS_TRAINING = $params['hiddenTraining'];
			} else {
				$objDailystat->APPLICANTS_DAILYSTATUS_TRAINING = $params['checkTraining'];
			}
			$objDailystat->APPLICANTS_DAILYSTATUS_PDOS = $params['datepdos'];
			$objDailystat->APPLICANTS_DAILYSTATUS_TESDA = $params['datetesda'];
			$objDailystat->APPLICANTS_DAILYSTATUS_OWWA = $params['dateowwa'];
			$objDailystat->APPLICANTS_DAILYSTATUS_POEA = $params['inputpoea'];
			$objDailystat->APPLICANTS_DAILYSTATUS_VISA_DATEISSUE = $params['datevisaissue'];
			$objDailystat->APPLICANTS_DAILYSTATUS_VISA_DATEEXPIRE = $params['datevisaexpiry'];
			$objDailystat->APPLICANTS_DAILYSTATUS_STAMPING_FILE = $params['datestampingfiled'];
			$objDailystat->APPLICANTS_DAILYSTATUS_STAMPING_RELEASE = $params['datestampingrelease'];
			$objDailystat->APPLICANTS_DAILYSTATUS_CONTRACTIN = $params['datecontractin'];
			$objDailystat->APPLICANTS_DAILYSTATUS_CONTRACTLENGTH = $params['inputContract'];
			$objDailystat->APPLICANTS_DAILYSTATUS_SALARY = $params['inputSalary']; // 	APPLICANTS_DAILYSTATUS_EDUCATTAINMENT
			$objDailystat->APPLICANTS_DAILYSTATUS_EDUCATTAINMENT = $params['inputEducAtt'];
			$objDailystat->APPLICANTS_DAILYSTATUS_PROCESSDATE = $params['dateprocess'];
			$objDailystat->APPLICANTS_DAILYSTATUS_SERUM = $params['inputSerum'];
			$objDailystat->APPLICANTS_DAILYSTATUS_BOOKDATE = $params['datebooking'];
			$objDailystat->APPLICANTS_DAILYSTATUS_DEPLOYEDDATE = $params['datedeployed'];
			$objDailystat->APPLICANTS_DAILYSTATUS_SPEAKENGLISH = $params['inputSpeakenglish'];
			$objDailystat->APPLICANTS_DAILYSTATUS_REMARKS = $params['inputDailystatremarks'];
			$objDailystat->APPLICANTS_DAILYSTATUS_ENDCONTRACT_DATE = $params['dateendcontract'];
			//$objDailystat->APPLICANTS_DAILYSTATUS_ISARCHIVE = $params[''];
			date_default_timezone_set("Asia/Manila");
			$objDailystat->APPLICANTS_DAILYSTATUS_DATECREATED = date("m/d/Y");
			//$objDailystat->APPLICANTS_DAILYSTATUS_DATEUPDATED = $params[''];
			
			//upload photo
			$upload_dir = 'files/wbphotos';
			$allowed_ext = array('jpg','jpeg','png','gif');

			if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
				$this->exit_status('Error! Wrong HTTP method!');
			}
			
			//Zend_Debug::dump($_FILES);			
			if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
				$pic = $_FILES['pic'];
				 
				if(!in_array($this->get_extension($pic['name']),$allowed_ext)){
					$this->exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
				}
				 
				if($demo_mode){
					// File uploads are ignored. We only log them.
					$line = implode(' ', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
					file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
					 
					$this->exit_status('Uploads are ignored in demo mode.');
				}
				 
				// Move the uploaded file from the temporary
				// directory to the uploads folder:
				if(move_uploaded_file($pic['tmp_name'], $upload_dir.'/'.$pic['name'])){
					$upload_status = 1;
					//$this->exit_status('File was uploaded successfuly!');
				}
				
				if(empty($pic['name']) || is_null($pic['name'])) {
					unset($objDailystat->APPLICANTS_DAILYSTATUS_WBPHOTO);
				} else {
					$objDailystat->APPLICANTS_DAILYSTATUS_WBPHOTO = $pic['name'];
				}
			}
			
			
			
			$objDailystatMapper = new Application_Model_ApplicantsDailyStatusMapper();
			$res = $objDailystatMapper->save($objDailystat);
			//Zend_Debug::dump($res);
			//Zend_Debug::dump($objDailystat);
    	}    	

    	$pdata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
    	$arrayResAppData = $pdata_mapper->fetchAllApplicantsPersonalData();
    	
    	$this->view->arrayResAppData = $arrayResAppData;
    	
    	//$json = Zend_Json_Encoder::encode($arrayRes);
    }

    public function newAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    }

    public function getappdatabyfullnameAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	
    	
        $name = $this->_getParam('fname');
        
    	if(!is_null($name)) {
    		$dailystatusession = new Zend_Session_Namespace('DAILY_STATUS_SESS');
    		$refArrData = $dailystatusession->refArrData;
    		
    		//Zend_Debug::dump($refArrData);
    		//	exit;
    		
    		$key = array_search($name, $refArrData); 
    		
    		
    		$pdata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
    		$arrayResAppData = $pdata_mapper->getAllApplicantsPersonalDataById($key);
    		
    		$arr = get_object_vars($arrayResAppData[0]);

    		$familydata_mapper = new Application_Model_ApplicantsFamilyDataMapper();
    		$res_familydata = $familydata_mapper->getAllApplicantsFamilyDataById($key);
    		$farray = get_object_vars($res_familydata[0]);
    		
    		if(!is_null($farray['APPLICANTS_FAMILY_DATA_MARITALSTATUS'])) {
	    		$status_select_mapper = new Application_Model_ApplicantsMaritalstatusSelectorMapper();
	    		$res_status_select = $status_select_mapper->getApplicantsMaritalStatusSelectorById($farray['APPLICANTS_FAMILY_DATA_MARITALSTATUS']);
	    		$farray['CIVILSTATUS'] = $res_status_select->APPLICANTS_PERSONAL_MARITALSTATUS_VALUE;
    		}
    		
    		
    		$dailystatus_mapper = new Application_Model_ApplicantsDailyStatusMapper();
    		$res_dailystatus = $dailystatus_mapper->getArrayApplicantsDailyStatusById($key);
    		$arr_dailystatus =  get_object_vars($res_dailystatus[0]);
    		
    		//Zend_Debug::dump($arr_dailystatus);
    		
    		if(!is_null($arr_dailystatus['APPLICANTS_DAILYSTATUS_MEDICALRESULT'])) {
    			$medmapper = new Application_Model_ApplicantsDailyStatusMedicalresultSelectorMapper();
    			$med_select_desc = $medmapper->getApplicantsDailyStatusMedicalSelectorById($arr_dailystatus['APPLICANTS_DAILYSTATUS_MEDICALRESULT']);
    			$farray['MEDICALRESULT_DESC'] = $med_select_desc->APPLICANTS_DAILYSTATUS_MEDICALRESULT_SELECTOR_VALUE;
    			 
    		}
    			
    		$arr = array_merge($arr,$farray);
    		if($arr_dailystatus) {
    			$arr = array_merge($arr , $arr_dailystatus);
    		}
    		
    		//Zend_Debug::dump($arr);
    		echo json_encode($arr);
    	
    	}
    }

    public function gettodayactivityAction()
    {
        // action body
    	$dailystatus_mapper = new Application_Model_ApplicantsDailyStatusMapper();
    	$res_dailystatusCurrent = $dailystatus_mapper->gettodayactivity();
    	//$arr_dailystatusCurrent = get_object_vars($res_dailystatusCurrent);
    	$arr = array();
    	foreach ($res_dailystatusCurrent as $obj) {
    		$arr[] = get_object_vars($obj);
    		
    	}
    	
    	//Zend_Debug::dump($arr);
    }

    public function setdailystatvaluemodalatvaluemodalAction()
    {
        // action body
    	$this->_helper->layout->disableLayout();
    	
        $params = $this->_getAllParams();
        
        $this->view->params = $params;
        
        Zend_Debug::dump($params);
    }

    public function appdeployedAction()
    {
    	$this->_helper->layout->setLayout('layout');
    	
    	$pdata_mapper = new Application_Model_ApplicantsPersonalDataMapper();
    	$arrayResAppData = $pdata_mapper->fetchAllApplicantsPersonalData();
    	 
    	$this->view->arrayResAppData = $arrayResAppData;
    }


}











