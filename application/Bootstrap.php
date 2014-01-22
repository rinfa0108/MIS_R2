<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initSessionStart()
	{
		Zend_Session::start();
	}
	
	/**
	 *
	 * This puts the application.ini setting in the registry
	 */
	protected function _initConfig()
	{

		Zend_Registry::set('config', $this->getOptions());
	}
	
	protected function _initDb()
	{
			
		$resource = $this->getPluginResource('db');
		$db = $resource->getDbAdapter();
	
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
		Zend_Registry::set("db", $db);
			
	}

}

