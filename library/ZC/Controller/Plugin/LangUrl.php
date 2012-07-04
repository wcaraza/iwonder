<?php
class ZC_Controller_Plugin_LangUrl extends Zend_Controller_Dispatcher_Standard
{
    public function dispatch(Zend_Controller_Request_Abstract $request, Zend_Controller_Response_Abstract $response)
    {         
        $translate = new Zend_Translate('csv', APPLICATION_PATH . '/lang/' . 'url_' . $request->getParam('lang') . '.csv', $request->getParam('lang'));        
        $controller = $translate->_($request->getParam('controller'));        

        if ($controller != '') {
            $action = $translate->_($request->getParam('action'));            
            $request->setControllerName($controller);
            $request->setActionName($action);            
        } else {
            $request->setControllerName($request->getParam('controller'));
            $request->setActionName($request->getParam('action'));            
        }

        $parametros = $request->getParams();
        $urlParametros = $parametros;

        $urlController = $parametros['controller'];
        $urlAction = $parametros['action'];
        /*
        unset($parametros['controller']);
        unset($parametros['action']);*/
        unset($parametros['lang']);
        
        
        foreach ($_SESSION['langs'] as $key => $lang) {
            $url = '';
            if ($key != LANG) {
                if($urlController != '') {
                    $translate = new Zend_Translate('csv', APPLICATION_PATH . '/lang/' . $key . '.csv', $key);
                    $parametros['controller'] = $translate->_($controller);
                    if($urlAction != '') {
                        $parametros['action'] = $translate->_($action);
                    }
                }
            }           

            $url = implode('/', $parametros);
            $_SESSION['url'][$key] = $url;          
        }
        $_SESSION['url']['activa'] = $_SESSION['url'][LANG];
        
        parent::dispatch($request, $response);
     }
}