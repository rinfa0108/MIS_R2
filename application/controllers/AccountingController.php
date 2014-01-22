<?php

class AccountingController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setexpensesAction()
    {
        // action body
    }

    public function setaccountingexpensesAction()
    {
        // action body
    }

    public function setaccountingexpensesbranchAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	
    	$setparam = $this->_getParam('newaccountingexpensesbranch');
    	if($setparam) {
    		
    		$params = $this->_getAllParams();
    		
    		//Zend_Debug::dump($params);
    		/**
    		 * array(16) {
			  ["controller"] => string(10) "Accounting"
			  ["action"] => string(27) "setaccountingexpensesbranch"
			  ["module"] => string(7) "default"
			  ["newaccountingexpensesbranch"] => string(1) "1"
			  ["todaysDate"] => string(10) "12/29/2013"
			  ["ACCOUNTINGEXPENSES_BRANCH_AGENTNAME"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_BNAME"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_APPLICANTNAME"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_AGE"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_HOMEADDRESS"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_CONTACTNUMBER"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_AIRLINE"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_SEA"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_LAND"] => string(0) ""
			  ["ACCOUNTINGEXPENSES_BRANCH_DATEDEPARTURE"] => string(0) ""
			  ["inputAgentsDataSubmit"] => string(0) ""
			}
    		 */
    		
    		$accntexpbranch = new Application_Model_AccountingexpensesBranch();
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_AGENTNAME = $params['ACCOUNTINGEXPENSES_BRANCH_AGENTNAME'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_BNAME = $params['ACCOUNTINGEXPENSES_BRANCH_BNAME'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_APPLICANTNAME = $params['ACCOUNTINGEXPENSES_BRANCH_APPLICANTNAME'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_AGE = $params['ACCOUNTINGEXPENSES_BRANCH_AGE'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_HOMEADDRESS = $params['ACCOUNTINGEXPENSES_BRANCH_HOMEADDRESS'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_CONTACTNUMBER = $params['ACCOUNTINGEXPENSES_BRANCH_CONTACTNUMBER'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_AIRLINE = $params['ACCOUNTINGEXPENSES_BRANCH_AIRLINE'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_SEA = $params['ACCOUNTINGEXPENSES_BRANCH_SEA'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_LAND = $params['ACCOUNTINGEXPENSES_BRANCH_LAND'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_TOTALEXP = $params['ACCOUNTINGEXPENSES_BRANCH_TOTALEXP'];
    		$accntexpbranch->ACCOUNTINGEXPENSES_BRANCH_DATEDEPARTURE = $params['ACCOUNTINGEXPENSES_BRANCH_DATEDEPARTURE'];
    		
    		
    		$accntexpbranch_mapper = new Application_Model_AccountingexpensesBranchMapper();
    		$res = $accntexpbranch_mapper->save($accntexpbranch);
    		
    		
    		if($res) {
    			
    			$this->view->response = array('newsavebranchexp'=> 1);
     		} else {
     			$this->view->response = array('newsavebranchexp'=> 0);
     		}
    	}
    	
    	
    }

    public function getaccountingexpensesbranchAction()
    {
        // action body
    }

    public function getaccountingexpensesheadofficeAction()
    {
        // action body
    }

    public function setaccountingexpensesheadofficeAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	 
    	$setparam = $this->_getParam('newaccountingexpensesheadoffice');
    	
    	if($setparam) {
    		
    		$params = $this->_getAllParams();
    		/**
    		 * private $ACCOUNTINGEXPENSES_HEADOFFICE_BNAME;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_PAYMENTFORM;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_APPLICANTNAME;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_ARRIVALDATE;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_ARRIVALFROM_ADDRESS;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_TRAVELMODE;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_PASSPORT;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_MEDICALEXP;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_TESDAEXP;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_TRAININGEXP;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_VISAEXP;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_TICKETEXP;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSEXP;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSNOTE;
				private $ACCOUNTINGEXPENSES_HEADOFFICE_TOTALEXP;
    		 */
    		
    		$accntexpheadoffice = new Application_Model_AccountingexpensesHeadoffice();
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_BNAME = $params['ACCOUNTINGEXPENSES_HEADOFFICE_BNAME'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_PAYMENTFORM = $params['ACCOUNTINGEXPENSES_HEADOFFICE_PAYMENTFORM'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_APPLICANTNAME = $params['ACCOUNTINGEXPENSES_HEADOFFICE_APPLICANTNAME'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_ARRIVALDATE = $params['ACCOUNTINGEXPENSES_HEADOFFICE_ARRIVALDATE'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_ARRIVALFROM_ADDRESS = $params['ACCOUNTINGEXPENSES_HEADOFFICE_ARRIVALFROM_ADDRESS'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_TRAVELMODE = $params['ACCOUNTINGEXPENSES_HEADOFFICE_TRAVELMODE'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_PASSPORT = $params['ACCOUNTINGEXPENSES_HEADOFFICE_PASSPORT'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_MEDICALEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_MEDICALEXP'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_TESDAEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_TESDAEXP'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_TRAININGEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_TRAININGEXP'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_VISAEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_VISAEXP'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_TICKETEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_TICKETEXP'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSEXP'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSNOTE = $params['ACCOUNTINGEXPENSES_HEADOFFICE_OTHERSNOTE'];
    		$accntexpheadoffice->ACCOUNTINGEXPENSES_HEADOFFICE_TOTALEXP = $params['ACCOUNTINGEXPENSES_HEADOFFICE_TOTALEXP'];
    		
    		$accntexpheadoffice_mapper = new Application_Model_AccountingexpensesHeadofficeMapper();
    		$res = $accntexpheadoffice_mapper->save($accntexpheadoffice);
    		
    		if($res) {
    			$this->view->response = array('newsaveheadofficeexp'=> 1);
     		} else {
     			$this->view->response = array('newsaveheadofficeexp'=> 0);
     		}
    		
    		//Zend_Debug::dump($accntexpheadoffice);	
    	}
    	
    }

    public function getaccountingreportsAction()
    {
        // action body
    }

    public function setaccountingutilitiesAction()
    {
        // action body
    }

    public function setaccountingexpensesutilitiesAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    	
    	$setparam = $this->_getParam('newaccountingexpensesutilities');
    	 
    	if($setparam) {
    		$params = $this->_getAllParams();
    		
    		/**
			private $ACCOUNTINGEXPENSES_UTILITIES_ID;
			private $ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH;
			private $ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO;
			private $ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE;
			private $ACCOUNTINGEXPENSES_UTILITIES_KIND;
			private $ACCOUNTINGEXPENSES_UTILITIES_AMOUNTEXP;
			private $ACCOUNTINGEXPENSES_UTILITIES_DATERELEASE;
    		 */
    		
    		$accntutilities = new Application_Model_AccountingexpensesUtilities();
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_ID = $params['ACCOUNTINGEXPENSES_UTILITIES_ID'];
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH = $params['ACCOUNTINGEXPENSES_UTILITIES_ISBRANCH'];
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO = $params['ACCOUNTINGEXPENSES_UTILITIES_BRANCHNO'];
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE = $params['ACCOUNTINGEXPENSES_UTILITIES_ISHEADOFFICE'];
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_KIND = $params['ACCOUNTINGEXPENSES_UTILITIES_KIND'];
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_AMOUNTEXP = $params['ACCOUNTINGEXPENSES_UTILITIES_AMOUNTEXP'];
    		$accntutilities->ACCOUNTINGEXPENSES_UTILITIES_DATERELEASE = $params['ACCOUNTINGEXPENSES_UTILITIES_DATERELEASE'];
    		
    		$accntutilities_mapper = new Application_Model_AccountingexpensesUtilitiesMapper();
    		
    		
    	}
    	
    	//Zend_Debug::dump($params);
    }

    public function setaccountingexpensescommissionAction()
    {
        // action body
    	$this->_helper->layout->setLayout('layout');
    }


}























