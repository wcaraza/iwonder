<?php 
class CM_Moneda
{		
    public function cambiar($monto, $cambio)
    {
        return $monto * $cambio;
	}
	
	public function darFormato($monto, $decimales)
	{
		return number_format($monto, $decimales);
	}
}