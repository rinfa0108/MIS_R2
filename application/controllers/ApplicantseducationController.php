<?php

class ApplicantseducationController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function setapplicantseducationAction()
    {
        // action body

    	$this->_helper->layout->disableLayout();
    	 
    	 
    	//Sample Data
    	//set form action and values here
    	$applicantseducation = new Application_Model_ApplicantsEducation();
    	//$applicantseducation->APPLICANTS_EDUCATION_ID = "" ;
		$applicantseducation->APPLICANTS_PERSONAL_DATA_ID = "1" ;
		$applicantseducation->APPLICANTS_EDUCATION_ELEM_SCHOOL = "guiwan" ;
		$applicantseducation->APPLICANTS_EDUCATION_ELEM_COURSEDEGREE = "na" ;
		$applicantseducation->APPLICANTS_EDUCATION_ELEM_YEARATTENDED = "1985" ;
		$applicantseducation->APPLICANTS_EDUCATION_HS_SCHOOL = "main" ;
		$applicantseducation->APPLICANTS_EDUCATION_HS_COURSEDEGREE = "high educ" ;
		$applicantseducation->APPLICANTS_EDUCATION_HS_YEARATTENDED = "1991" ;
		$applicantseducation->APPLICANTS_EDUCATION_VOCATIONAL_SCHOOL = "na" ;
		$applicantseducation->APPLICANTS_EDUCATION_VOCATIONAL_COURSEDEGREE = "na" ;
		$applicantseducation->APPLICANTS_EDUCATION_VOCATIONAL_YEARATTENDED = "na" ;
		$applicantseducation->APPLICANTS_EDUCATION_COLLEGE_SCHOOL = "wmsu" ;
		$applicantseducation->APPLICANTS_EDUCATION_COLLEGE_COURSEDEGREE = "vulcanizing" ;
		$applicantseducation->APPLICANTS_EDUCATION_COLLEGE_YEARATTENDED = "1996" ;
		$applicantseducation->APPLICANTS_EDUCATION_OTHERSKILLS_SCHOOL = "na" ;
		$applicantseducation->APPLICANTS_EDUCATION_OTHERSKILLS_COURSEDEGREE = "na" ;
		$applicantseducation->APPLICANTS_EDUCATION_OTHERSKILLS_YEARATTENDED = "na" ;
    	
    	$applicantseducation_mapper = new Application_Model_ApplicantsEducationMapper();
    	$res = $applicantseducation_mapper->save($applicantseducation);
    	
    	var_dump($res);
    }

    public function getapplicantseducationAction()
    {
        // action body
    }

    public function getapplicantseducationbyidAction()
    {
        // action body
    }

    public function setapplicantseducationbyidAction()
    {
        // action body
    }


}









