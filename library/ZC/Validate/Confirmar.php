<?php
class ZC_Validate_Confirmar extends Zend_Validate_Abstract
{
    protected $_campoOriginal;
    protected $_campoAComparar;
    public function __construct($original, $aComparar)
    {
        $this->_campoOriginal = $original;
        $this->_campoAComparar = $aComparar;
    }

    public function isValid($valor, $formulario = null)
    {
        $valor = (string) $valor;
        $this->_setValue($valor);
        if ($formulario[$this->_campoAComparar] != $formulario[$this->_campoOriginal]) {
            return false;
        }
        return true;
    }
}
