<?php

class Application_Model_DbTable_SysUsers extends Zend_Db_Table_Abstract
{

    protected $_name = 'mis_sys_users';

    public function getUserbyUsername( $username )
    {
    	try {
    		 
    		$db = Zend_Registry::get('db');
    		 
    		$sql = 'SELECT *
					FROM mis_sys_users a
    				WHERE a.SYS_USERS_USERNAME = "'.$username.'"  
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

