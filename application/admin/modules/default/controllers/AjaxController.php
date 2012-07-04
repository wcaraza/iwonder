<?php
class Default_AjaxController extends Zend_Controller_Action
{
	private $_smarty;
	private $_baseRoot;
	public function init()
	{
		$this->_helper->layout()->disableLayout();
		$this->_smarty = Zend_Registry::get('smarty');
		$this->_baseRoot = $this->getRequest()->getBaseUrl();
	}

    public function guardarSeleccionadoAction()
    {
    	
    }
}