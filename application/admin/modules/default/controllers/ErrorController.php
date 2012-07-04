<?php

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
		$this->_helper->layout()->disableLayout();
	
        $errors = $this->_getParam('error_handler');

        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
  
                $this->getResponse()->setRawHeader('HTTP/1.1 404 Not Found');

                if ($errors->type == Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER) {
					$mensaje= 'No se ha encontrado el Proceso: ';
					$mensaje.= $errors->request->getControllerName();
				}
				if ($errors->type == Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION) {
					$mensaje= ' No se ha encontrado la Accion: ';
					$mensaje.= '"' . $errors->request->getActionName() . '"';
				}
                break;
            default:
                $errores = $this->getResponse()->getException();
				foreach ($errores as $error) {
					switch(get_class($error)) {
						case 'Zend_Db_Statement_Exception': 
							$mensaje = 'ERROR DE BD: '.$error->getMessage(); 
							break;
						case 'Zend_Loader_Exception':
							$mensaje = 'ERROR AL CARGAR: '.$error->getMessage();
							break;
						case 'Zend_Form_Exception':
							$mensaje = 'ERROR EN EL FORMULARIO: '.$error->getMessage();
							break;
					}
				}
				break;
 
		}
		//$this->_smarty->assign('mensaje', $mensaje);
        echo $mensaje;
		//parent::render($this->_smarty->fetch('error_usuario.tpl'));
    }
}