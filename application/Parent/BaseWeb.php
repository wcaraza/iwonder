<?php
class Parent_BaseWeb extends Zend_Controller_Action
{
    protected $_smarty;
    protected $_baseRoot;
    protected $_baseUrl;
    protected $_config;
    protected $_js = array();
    protected $_jsContent = "";
    protected $_css = array();
    protected $_sectionTitle;
    protected $_bgSection;
    
    public function init()
	{
		#$this->_modeloProducto = new Models_ProductoModelo;
		#$this->_modeloModelo = new Models_ModeloModelo;
		
                $this->_helper->layout()->disableLayout();
                $this->_config = Zend_Registry::get('config');
                $this->_smarty = Zend_Registry::get('smarty');        
                $this->_baseRoot = $this->_config->web;
		
		#$controller = $this->getRequest()->getControllerName();
		
		/*if($controller!='productos'){
			$this->_smarty->assign('van','false');
			$this->_smarty->assign('cxss',$this->_getParam('0'));
			$this->_smarty->assign('titleOut','productos');
			$this->_smarty->assign('productos',$this->productoAction());
		}else{
			$this->_smarty->assign('van','true');
			$this->_smarty->assign('titleOut','ultimas vistas');
			$this->_smarty->assign('productos',$this->ultimasvistas());
		}*/
		
	}

	public function render($mainContent)
	{
		$js = "";
		if(!empty($this->_js)){	
			foreach($this->_js as $key => $item){
				$js .= '<script type="text/javascript" src="'.$item.'"></script>';
			}
		}
		
		$jsContent = '<script type="text/javascript">'.$this->_jsContent.'</script>';
		
		$css = "";
		if(!empty($this->_css)){	
			foreach($this->_css as $key => $url){
				$css .= '<link type="text/css" href="'.$url.'" rel="stylesheet" />';
			}
		}
		
		$this->_smarty->assign('js', $js);
		$this->_smarty->assign('jsContent', $jsContent);
		$this->_smarty->assign('css', $css);
		$this->_smarty->assign('sectionTitle', $this->_sectionTitle);
		$this->_smarty->assign('baseRoot', $this->_baseRoot);
		$this->_smarty->assign('mainContent', $mainContent);
		$this->_smarty->assign('bgSection',$this->_bgSection);
                $this->_smarty->template_dir = $this->_config->layout;
		
		return $this->_smarty->display('base_web.tpl');
	}
		
}