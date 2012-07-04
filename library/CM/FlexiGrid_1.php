<?php 
class CM_FlexiGrid
{
	private $_pagina = 0;
	private $_totalRegistros = 0;
	private $_links = array();
	private $_modelo;

    public function setModelo($modelo)
    {
        $this->_modelo = $modelo;
    }
		
	public function agregarLink($link)
	{
		$this->_links[] = $link;
	}
		
	public function getItemsASaltar()
	{
		return $this->_totalRegistros * ($this->_pagina - 1);
	}
	
	public function getTotalRegistros()
	{
		return $this->_totalRegistros;
	}

    public function generar()
    {
        $pagina = $this->getRequest()->getParam('page');
        $campoOrden = $this->getRequest()->getParam('sortname');
        $tipoOrden = $this->getRequest()->getParam('sortorder');
        $numeroRegistros = $this->getRequest()->getParam('rp');
        $inicio = $numeroRegistros * ($pagina - 1);
        
        $select = $this->_modelo->obtenerParaGrid();

        $parametros = $this->getRequest()->getParams();
        $post = array('page' => 0, 'qtype' => 0, 'query' => 0, 'rp' => 0, 'sortname' => 0, 'sortorder' => 0, 'module' => 0, 'controller' => 0, 'action' => 0);

        foreach ($parametros as $key => $valor) {
            $x = 0;
            if (!array_key_exists($key, $post) ) {
                if ($valor != '') {
                    $select->where("$key=?", $valor);
                }
            }
        }
        
        $select->order("$campoOrden $tipoOrden");
        $totalRegistros = count($this->_modelo->fetchAll($select));

        $select->limit($numeroRegistros, $inicio);

        //echo $select;

        $registros = $this->_modelo->fetchAll($select)->toArray();
        $json = '';
		$json .= "{ \n";

        $json .= "page:" . $pagina . ", \n";
        $json .= "total:" . $totalRegistros . ", \n";
        if (count($registros) > 0) {
			$json .= "rows: [";

			foreach ($registros as $registro) {
				$json .= "\n{";
				$json .= "id:'".$registro['id'] . "',";
				$json .= "cell:[";
/*
				if (count($this->_imagenes) > 0) {
					foreach ($this->_imagenes as $imagen) {
						$cadenaImagen = '';

						$cadenaImagen .="'" . '<img width="54px" height="33px" src="' . $imagen['url'] . '/' . $imagen['nombre'] . '_' . $registro->id . $imagen['tipo'];
						$cadenaImagen .= '.jpg" />' . "',";
						$json .= $cadenaImagen;
					}
				}*/

				foreach ($registro as $key => $valor){
                    //if ($key <> 'id') {
                        $json .= "'". $valor ."',";
                    //}
				}

				if (count($this->_links) > 0) {
					foreach ($this->_links as $link) {
						$cadena = '';
						$cadena = $link['url'];
						foreach ($link['parametros'] as $key => $item) {

							$cadena .= "/$key/" . $registro[$item];
						}
						$json .= "'" . '<a title="'. $link['alt'] .'" href="'. $cadena .'">' . $link['nombre'] . '</a>' . "',";
					}
				}


				$json = substr($json, 0, strlen($json)-1);
				$json .= "]},";
			}

			$json = substr($json, 0, strlen($json)-1);
			$json .= "],";
		}
        $json = substr($json, 0, strlen($json)-1);
		$json .= "\n}";
		echo $json;
        
    }
}