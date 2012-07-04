<?php
class Parent_BasePage extends Zend_Controller_Action
{	
	protected $_administradorModelo;
	protected $_smarty;
    protected $_config;
	
	public function init()
	{
		$this->_administradorModelo = new Models_AdministradorModelo;
		$this->_helper->layout()->disableLayout();
		$this->_smarty = Zend_Registry::get('smarty');     
		$this->_config = Zend_Registry::get('config');
	}
	
	public function postDispatch()
	{
		if ($this->_administradorModelo->isLogged()) {
			$usuario = Zend_Auth::getInstance()->getIdentity();
			$tbUsuario = $this->_administradorModelo->obtenerPorUsuario($usuario);
			$this->_redirect('inicio');
		}
	}

	public function render($mainContent)
	{
        $this->_smarty->template_dir = $this->_config->layout;
		$this->_smarty->assign('baseRoot', $this->getRequest()->getBaseUrl());
		$this->_smarty->assign('mainContent', $mainContent);        
		return $this->_smarty->display('base_page.tpl');
	}
}