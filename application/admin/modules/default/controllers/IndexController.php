<?php 
class IndexController extends Parent_BasePage
{
	public function indexAction()
	{
		$this->_forward('index', 'index', 'login');
        //$this->_redirect('login/index/index');
	}
}