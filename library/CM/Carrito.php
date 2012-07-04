<?php
class CM_Carrito
{
    public function addItem($item, $cantidad = 'cantidad')
    {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
            $_SESSION['carrito']['items'] = array();
        }
        
        if (!array_key_exists($item['id'], $_SESSION['carrito']['items'])) {
            $_SESSION['carrito']['items'][$item['id']] = $item;
        } else {
            $_SESSION['carrito']['items'][$item['id']][$cantidad] += $item[$cantidad];
        }
    }

    public function obtenerTotalCampoXCantidad($campo, $cantidad = 'cantidad')
    {
        $total = 0;
        foreach( $_SESSION['carrito']['items'] as $item) {
            $subtotal = $item[$campo] * $item[$cantidad];
            $total += $subtotal;
        }
        return $total;
    }

    public function quitarItem($id)
    {
        unset($_SESSION['carrito']['items'][$id]);
    }

    public function getTotalItems($cantidad = 'cantidad')
    {
        $totalItems = 0;
        if (isset($_SESSION['carrito'])) {
            if (count($_SESSION['carrito']['items']) > 0) {
                foreach ($_SESSION['carrito']['items'] as $item) {
                    $totalItems += $item[$cantidad];
                }
            }
        }
        return $totalItems;        
    }

    public function getTotal($precio = 'precio')
    {
        $total = 0;
        if (isset($_SESSION['carrito'])) {
            if (count($_SESSION['carrito']['items']) > 0) {
                foreach ($_SESSION['carrito']['items'] as $item) {
                    $total += $item[$precio];
                }
            }
        }

        return $total;
    }

    public function vaciarCarrito()
    {
        unset($_SESSION['carrito']);
    }

    public function getCarrito()
    {
        return $_SESSION['carrito']['items'];
    }

    public function actualizarCantidades($cantidades)
    {
        foreach ($cantidades as $key => $valor) {
            $_SESSION['carrito']['items'][$key]['cantidad'] = $valor;
        }
    }
}