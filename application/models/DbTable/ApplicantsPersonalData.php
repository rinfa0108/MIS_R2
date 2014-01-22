<?php

class Application_Model_DbTable_ApplicantsPersonalData extends Zend_Db_Table_Abstract
{

    protected $_name = 'mis_applicants_personal_data';


    public function init()
    {
    	$this->_db->setFetchMode(Zend_Db::FETCH_OBJ);
    }
    
    public function getAllApplicantDataById($id) {
    	try {
    
    		$db = Zend_Registry::get('db');
    
    		$sql = 'SELECT *
					FROM mis_applicants_personal_data a
    				WHERE a.APPLICANTS_PERSONAL_DATA_ID = '.$id.' 
    				
    				';
			
    		$stmt = $db->query($sql);
    		$rows = $stmt->fetchall();
    		//$rows = $this->fetchRow();
    		if($rows) {
    			return $rows;
    		}
    		return false;
    		 
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}
    }
    
    public function getApplicantId($firstname, $lastname, $dateofbirth)
    {
    	try {
    	
    		$db = Zend_Registry::get('db');
    	
    		$sql = 'SELECT *
					FROM mis_applicants_personal_data a
    				WHERE a.APPLICANTS_PERSONAL_DATA_FIRSTNAME = "'.$firstname.'"
    				AND a.APPLICANTS_PERSONAL_DATA_LASTNAME = "'.$lastname.'"
    						AND a.APPLICANTS_PERSONAL_DATA_DATEOFBIRTH = "'.$dateofbirth.'"
    				';
    			
    		$stmt = $db->query($sql);
    		$rows = $stmt->fetchall();
    		//$rows = $this->fetchRow();
    		if($rows) {
    			return $rows;
    		}
    		return false;
    		 
    	} catch (Exception $e) {
    		throw new Exception($e->getMessage());
    	}	
    }
}

