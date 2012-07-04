<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   /*
   public function __construct($application)
   {
       parent::__construct($application);
       $fc = Zend_Controller_Front::getInstance();

       //$router = new Custom_Router();
       $dispatcher = new ZC_Controller_Plugin_LangUrl;

       //$fc->setRouter($router);
       $fc->setDispatcher($dispatcher);
   }*/
   
    protected function _initConfig()
    {
		$config = new Zend_Config_Ini(APPLICATION_PATH
				. '/configs/web.ini', APPLICATION_ENV);
		Zend_Registry::set('config', $config);
		return $config;
    }

    protected function _initLoader()
	{
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
		//$stmt = new Zend_Db_Statement_Mysqli($db, "SET CHARACTER SET utf8");
                $stmt = new Zend_Db_Statement_Pdo($db, "SET CHARACTER SET utf8");
		$stmt->execute();
		//$stmt = new Zend_Db_Statement_Mysqli($db, "SET NAMES utf8");
                $stmt = new Zend_Db_Statement_Pdo($db, "SET NAMES utf8");
		$stmt->execute();
			
        Zend_Registry::set('db', $db);

        return $db;
    }

    protected function _initSmarty()
    {
		$smarty = new Smarty();
		$smarty->debugging = false;
		$smarty->force_compile = true;
		$smarty->caching = true;
		$smarty->compile_check = true;
		$smarty->cache_lifetime = -1;
		$smarty->template_dir = APPLICATION_PATH . '/tpl';
		$smarty->compile_dir = APPLICATION_PATH . '/tmp/templates_c';
		$smarty->cache_dir = APPLICATION_PATH .'/tmp/templates_cache';
		Zend_Registry::set('smarty', $smarty);
		return $smarty;
    }

    protected function _initRoutes()
    {
        $frontController = Zend_Controller_Front::getInstance();
        $router = $frontController->getRouter();
/*
        $router->addRoute(
            'langindex',
            new Zend_Controller_Router_Route('/:lang',
                array('lang' => 'en')
            )
        );*/
/*
        $router->addRoute(
            'langcontroller',
            new Zend_Controller_Router_Route('/:lang/:controller',
                array('lang' => ':lang')
            )
        );
*/
        $router->addRoute(
            'langcontroller',
            new Zend_Controller_Router_Route('/:controller',
                array('lang' => ':lang')
            )
        );


        $url = '/:controller';
        for ($i = 0; $i <= 0; $i++) {
            $url .= "/:$i";
            $router->addRoute(
            "parametro$i",
                new Zend_Controller_Router_Route($url,
                    array('lang' => ':lang')
                )
            );
        }

        $router->addRoute(
            'lang',
            new Zend_Controller_Router_Route('/:controller/:0/:action',
                array('lang' => ':lang')
            )
        );

        $url = '/:controller/:0/:action';
        
        for ($i = 1; $i <= 2; $i++) {
            $url .= "/:$i";
            $router->addRoute(
            "parametro$i",
                new Zend_Controller_Router_Route($url,
                    array('lang' => ':lang')
                )
            );
        }
    }
}