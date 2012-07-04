<?php 
class CM_FlexiGrid
{
	private $_pagina = 0;
	private $_totalRegistros = 0;
	private $_links = array();
    private $_quitar = array();
    private $_noMostrar = array();
    private $_like;
	private $_modelo;
	private $_metodo;
	private $_condiciones;
    private $_imagen;

    public function setModelo($modelo)
    {
        $this->_modelo = $modelo;
    }

    public function setLike($valor)
    {
        $this->_like = $valor;
    }

    public function setImagen($imagen)
    {
        CM_FlexiGrid::noMostrar($imagen);
        $this->_imagen = $imagen;
    }

    public function setMetodo($metodo, $condiciones = array())
    {
        $this->_metodo = $metodo;
        if ($condiciones > 0) {
            $this->_condiciones = implode(',', $condiciones);
        }
    }

    public function quitar($parametro)
    {
        $this->_quitar[] = $parametro;
    }

    public function noMostrar($parametro)
    {
        $this->_noMostrar[$parametro] = $parametro;
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

    public function generar($adaptador = false)
    {
        $pagina = $this->getRequest()->getParam('page');
        $campoOrden = $this->getRequest()->getParam('sortname');
        $tipoOrden = $this->getRequest()->getParam('sortorder');
        $numeroRegistros = $this->getRequest()->getParam('rp');
        $inicio = $numeroRegistros * ($pagina - 1);

        
        
        if ($this->_metodo == '') {
            $select = $this->_modelo->obtenerParaGrid($this->_condiciones);
        } else {
            $metodo = $this->_metodo;
            $select = $this->_modelo->$metodo($this->_condiciones);
                    
            
        }

        $parametros = $this->getRequest()->getParams();

        if (count($this->_quitar) > 0) {
            foreach ($this->_quitar as $valor) {
                unset($parametros[$valor]);
            }
        }        

        $post = array('page' => 0, 'qtype' => 0, 'query' => 0, 'rp' => 0, 'sortname' => 0, 'sortorder' => 0, 'module' => 0, 'controller' => 0, 'action' => 0);

        foreach ($parametros as $key => $valor) {
            $x = 0;
            $y = 0;
            if (!array_key_exists($key, $post) ) {
                if ($valor != '') {
                    $key = str_replace('$', '.', $key);
                    if ($this->_like == $key) {
                        $select->where("$key like '$valor%'");
                    } else {
                        $select->where("$key=?", $valor);
                    }
                }
            }
        }

        $select->order("$campoOrden $tipoOrden");

        if ($adaptador == true) {
            $this->_modelo = Zend_Registry::get('db');
        }
        $totalRegistros = count($this->_modelo->fetchAll($select));
        
        

        $select->limit($numeroRegistros, $inicio);

        //echo $select;
        //exit();
        if ($adaptador == false) {
            $registros = $this->_modelo->fetchAll($select)->toArray();
        } else {
            $registros = $this->_modelo->fetchAll($select);
        }
        
        $respuesta['registros'] = $registros;
        $respuesta['total'] = $totalRegistros;

        return $respuesta;
    }

    public function json($generado, $adaptador = false)
    {
        $config = Zend_Registry::get('config');

        $pagina = $this->getRequest()->getParam('page');
        $registros = $generado['registros'];
        $totalRegistros = $generado['total'];

        $json = '';
		$json .= "{ \n";

        $json .= "page:" . $pagina . ", \n";
        $json .= "total:" . $totalRegistros . ", \n";
        if (count($registros) > 0) {
			$json .= "rows: [";

			foreach ($registros as $registro) {
                //print_r($registro);
                if ($adaptador == true) {
                    $registro = CM_Util::objetoToArray($registro);
                }

				$json .= "\n{";
				$json .= "id:'".$registro['id'] . "',";
				$json .= "cell:[";

                if ($this->_imagen != '') {
                    $json .="'" . '<img width="30px" height="30px" src="' . $config->web . '/' . $registro[$this->_imagen].'"' . " /> ',";
                }
				
				foreach ($registro as $key => $valor){
                    if ($key <> 'id') {                        
                        if (count($this->_noMostrar) > 0) {
                            if (!array_key_exists($key, $this->_noMostrar)) {                                
                                $json .= "'". $valor ."',";
                            }
                        } else {
                            $json .= "'". $valor ."',";
                        }
                    }
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