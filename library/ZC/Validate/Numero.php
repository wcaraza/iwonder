<?php
class ZC_Validate_Numero extends Zend_Validate_Abstract
{
    protected $_tipo;
    public function __construct()
    {
        //$this->_tipo = $tipo;
    }

    public function isValid($valor, $formulario = null)
    {
        //$valor = $valor;
        $this->_setValue($valor);
        
        if (!is_numeric($valor)) {
            return false;
        }
        return true;
    }
}
