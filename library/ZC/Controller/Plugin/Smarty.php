<?php
class ZC_Controller_Plugin_Smarty extends Zend_Controller_Plugin_Abstract
{  
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        define('DS', DIRECTORY_SEPARATOR);

        $smarty = new Smarty();
		$smarty->debugging = false;
		$smarty->force_compile = true;
		$smarty->caching = true;
		$smarty->compile_check = true;
		$smarty->cache_lifetime = -1;                
		$smarty->template_dir = APPLICATION_PATH . DS . 'modules' . DS . $request->getModuleName() . DS . 'tpl' . DS;
		$smarty->compile_dir = APPLICATION_PATH . '/../tmp/' . 'templates_c';
		$smarty->cache_dir = APPLICATION_PATH . '/../tmp/' . 'templates_cache';
		Zend_Registry::set('smarty', $smarty);
    }
}