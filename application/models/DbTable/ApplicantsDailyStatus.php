<?php

class Application_Model_DbTable_ApplicantsDailyStatus extends Zend_Db_Table_Abstract
{

	protected $_name = 'mis_applicants_dailystatus';

	public function init()
	{
		$this->_db->setFetchMode(Zend_Db::FETCH_OBJ);
	}

	public function ApplicantsWithOutDailystatus() {
		try {

			$db = Zend_Registry::get('db');

			$sql = 'SELECT a.*,b.*
					FROM `mis_applicants_personal_data` a
					INNER JOIN mis_applicants_dailystatus b
					WHERE a.APPLICANTS_PERSONAL_DATA_ID = b.APPLICANTS_PERSONAL_DATA_ID
					';
				
			//limit

			$stmt = $db->query($sql);
			$rows = $stmt->fetchall();
			//$rows = $this->fetchRow($select);
			if($rows) {
				return $rows;
			}
			return false;
			 
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function getArrayApplicantsDailyStatusById($id)
	{
		try {
			 
			$db = Zend_Registry::get('db');
			 
			$sql = 'SELECT *
					FROM  mis_applicants_dailystatus a
					WHERE a.APPLICANTS_PERSONAL_DATA_ID = '.$id.'
							';
			 
			//limit
			 
			$stmt = $db->query($sql);
			$rows = $stmt->fetchall();
			//$rows = $this->fetchRow($select);
			if($rows) {
				return $rows;
			}
			return false;
			 
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	public function gettodayactivity()
	{
		 
		try {

			date_default_timezone_set("Asia/Manila");
			$getcurrent = date("m/d/Y");
			
			$db = Zend_Registry::get('db');
			 
			$sql = 'SELECT a.*,b.*
					FROM `mis_applicants_personal_data` a
					INNER JOIN mis_applicants_dailystatus b
					WHERE a.APPLICANTS_PERSONAL_DATA_ID = b.APPLICANTS_PERSONAL_DATA_ID
					AND b.APPLICANTS_DAILYSTATUS_DATECREATED = "'.$getcurrent.'"
					';
			 //Zend_Debug::dump($sql);
			//limit
			 
			$stmt = $db->query($sql);
			$rows = $stmt->fetchall();
			//$rows = $this->fetchRow($select);
			if($rows) {
				return $rows;
			}
			return false;
			 
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}
	
	public function getdeployed() 
	{
		$db = Zend_Registry::get('db');
		$sql = 'SELECT *
					FROM  mis_applicants_dailystatus a
					WHERE a.APPLICANTS_DAILYSTATUS_DEPLOYEDDATE != ""
							';
			 
			//limit
			 
			$stmt = $db->query($sql);
			$rows = $stmt->fetchall();
			//$rows = $this->fetchRow($select);
			if($rows) {
				return $rows;
			}
			return false;
		
	}
}

