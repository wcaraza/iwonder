<?php
class Parent_BaseMenu extends Zend_Controller_Action
{
	protected $_smarty;
	protected $_config;
	protected $_db;
    protected $_administradorModelo;
    protected $_localModelo;
    protected $_productoModelo;
    protected $_clienteModelo;
	protected $_modeloModelo;
	protected $_lenguajeModelo;
	protected $_modeloLenguajeModelo;

	public function init()
	{
        $this->_helper->layout()->disableLayout();
		$this->_config = Zend_Registry::get('config');
		$this->_db = Zend_Registry::get('db');
		$this->_administradorModelo = new Models_AdministradorModelo;
		$this->_localModelo = new Models_LocalModelo;
        $this->_productoModelo = new Models_ProductoModelo;
        $this->_clienteModelo = new Models_ClienteModelo;
		$this->_modeloModelo = new Models_ModeloModelo;
		$this->_lenguajeModelo = new Models_LenguajeModelo;
        $this->_modeloLenguajeModelo = new Models_ModeloLenguajeModelo;
		$this->_smarty = Zend_Registry::get('smarty');		
        $this->_baseRoot = $this->getRequest()->getBaseUrl();		
		if (!$this->_administradorModelo->isLogged()) {
            $this->_redirect('');
        }
	}

	public function render($mainContent)
	{
        $this->_smarty->template_dir = $this->_config->layout;
		$this->_smarty->assign('baseRoot', $this->_baseRoot);
		$this->_smarty->assign('mainContent', $mainContent);
		$this->_smarty->assign('WEB', $this->_config->web);
		return $this->_smarty->display('base_menu.tpl');
	}
}