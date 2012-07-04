<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initConfig()
    {
		$config = new Zend_Config_Ini(APPLICATION_PATH
				. '/../configs/application.ini', APPLICATION_ENV);
		Zend_Registry::set('config', $config);
		return $config;
    }

    protected function _initLoader()
    {
        $timeZone = (string) Zend_Registry::get('config')->general->timezone;
		if (empty ($timeZone)) {
			$timeZone = 'America/Lima';
		}
        
		$loader = Zend_Loader_Autoloader::getInstance();
		$loader->setFallbackAutoloader(true);
		$loader->suppressNotFoundWarnings(false);
		return $loader;
    }

    protected function _initView()
	{
		$view = new Zend_View();
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper(
			'ViewRenderer'
		);
		$viewRenderer->setView($view);

		return $view;
	}

    protected function _initDb()
    {
		$config   = Zend_Registry::get('config');
		$db       = Zend_Db::factory($config->resources->db);
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$db->getProfiler()->setEnabled(true);
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
		$stmt = new Zend_Db_Statement_Pdo($db, "SET CHARACTER SET utf8");
                //$stmt = new Zend_Db_Statement_Mysqli($db, "SET CHARACTER SET utf8");
		$stmt->execute();
		$stmt = new Zend_Db_Statement_Pdo($db, "SET NAMES utf8");
                //$stmt = new Zend_Db_Statement_Mysqli($db, "SET NAMES utf8");
		$stmt->execute();
			
        Zend_Registry::set('db', $db);

        return $db;
    }
}