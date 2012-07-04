<?php
class CM_Crud extends Parent_BaseMenu {
    protected $_modelo;
    protected $_form;
    protected $_tplListar;
    protected $_tplNuevo;
    protected $_tplEditar;
    protected $_noRepetir = array();
    protected $_noRepetirConMismo = array();
    protected $_post = array();
    protected $_keys = array();
    protected $_keyUnico = array();
    protected $_imagenes = array();
    protected $_thumbs = array();
    protected $_filtroListar = array();
    protected $_fechaRegistro = false;
    protected $_noBorrar = array();
    protected $_modeloLenguaje;
    protected $_camposLenguaje = array();
    protected $_fkModelo;
    protected $_funciones = array();
    protected $_accion;
    protected $_adaptador = false;
    protected $_metodo = '';
    protected $_editar = true;
    protected $_eliminar = true;
    protected $_observar = array();
    protected $_keyNoLang = false;
    protected $_imagenGrid;

    public function nuevoAction() {
        $baseRoot = $this->getRequest()->getBaseUrl();
        $modulo = $this->getRequest()->getModuleName();
        $controller = $this->getRequest()->getControllerName();

        if (count($this->_filtroListar) > 0) {
            $parametros = '';
            foreach($this->_filtroListar as $key => $valor) {
                $parametros .= "/$key/" . $this->getRequest()->getParam($valor);
            }
        }

        if ($this->getRequest()->getParam('retornar') != '') {
            $parametros .= '/retornar/' . $this->getRequest()->getParam('retornar');
        }

        $this->_form->setAction($baseRoot . '/'. $modulo . '/'. $controller . '/guardar' . $parametros);
        if (count($this->_post) > 0 ){
            $this->_form->populate($this->_post);
        }

        $this->_smarty->assign('form', $this->_form);
        $this->_smarty->assign('baseRoot', $baseRoot);
        parent::render($this->_smarty->fetch($this->_tplNuevo .'.tpl'));
    }

    public function guardarAction() {
        $baseRoot = $this->getRequest()->getBaseUrl();
        $modulo = $this->getRequest()->getModuleName();
        $controller = $this->getRequest()->getControllerName();

        $parametros = '';
        if (count($this->_filtroListar) > 0) {
            foreach ($this->_filtroListar as $key => $value) {
                $parametros .= "/$key/" . $this->getRequest()->getParam($value);
            }
        }

        if ($this->getRequest()->getParam('retornar') != '') {
            $parametros .= '/retornar/' . $this->getRequest()->getParam('retornar');
        }

        $formData = $this->getRequest()->getPost();
        $_SESSION['post'] = $formData;
        $this->_form->setAction($baseRoot . '/'. $modulo . '/'. $controller .'/guardar' . $parametros);

        if (!$this->_form->isValid($formData)) {
            $this->_form->populate($formData);
            $this->_smarty->assign('form', $this->_form);
            $this->_smarty->assign('baseRoot', $baseRoot);
            return parent::render($this->_smarty->fetch($this->_tplNuevo . '.tpl'));
        }

        if (count($this->_noRepetir) > 0) {
            $existe = 0;
            foreach ($this->_noRepetir as $campo) {                
                $select = $this->_modelo->select()
                    ->where("$campo=?", $formData[$campo]);

                foreach ($this->_noRepetirConMismo as $dato) {
                    $select->where("$dato=?", $formData[$dato]);
                }
                $registro = $this->_modelo->fetchRow($select);

                if (!$registro) {
                    $this->_form->getElement($campo)->addErrorMessage('Ya existe');
                    $this->_form->getElement($campo)->markAsError();                    
                    $existe = 1;
                }
            }

            if ($existe == 1) {
                $this->_form->populate($formData);
                $this->_smarty->assign('form', $this->_form);
                $this->_smarty->assign('baseRoot', $baseRoot);
                return parent::render($this->_smarty->fetch($this->_tplNuevo . '.tpl'));
            }
        }
/*
        if (count($this->_noRepetirEnLenguaje) > 0) {
            $existe = 0;
            foreach ($this->_noRepetir as $campo) {
                $select = $this->_modelo->select()
                    ->where("$campo=?", $formData[$campo]);

                foreach ($this->_noRepetirConMismo as $dato) {
                    $select->where("$dato=?", $formData[$dato]);
                }
                $registro = $this->_modelo->fetchRow($select);

                if ($registro) {
                    $this->_form->getElement($campo)->addErrorMessage('Ya existe');
                    $this->_form->getElement($campo)->markAsError();
                    $existe = 1;
                }
            }

            if ($existe == 1) {
                $this->_form->populate($formData);
                $this->_smarty->assign('form', $this->_form);
                $this->_smarty->assign('baseRoot', $baseRoot);
                return parent::render($this->_smarty->fetch($this->_tplNuevo . '.tpl'));
            }
        }*/
        
        if (count($this->_keys) > 0) {
            foreach ($this->_keys as $key => $campos) {
                if (!is_object($this->_modeloLenguaje)) {
                    $formData[$key] = CM_Util::generarKey($campos, $formData);
                }
                if ($this->_keyNoLang == true) {
                    $formData[$key] = CM_Util::generarKey($campos, $formData);
                }
            }
        }
        
        unset($formData['submit']);
        unset($formData['repetir_password']);
        unset($formData['MAX_FILE_SIZE']);


        if (count($this->_imagenes) > 0) {
            foreach ($this->_imagenes as $imagen) {
                $formData[$imagen] = CM_Util::obtenerUrlDeImagen($formData[$imagen]);
            }
        }

        if (count($this->_thumbs) > 0) {            
            foreach ($this->_thumbs as $thumb) {                                
                $url = CM_Util::obtenerUrlDeThumb($formData[$thumb]);
                $thumb = $thumb . '_thumb';
                $formData[$thumb] = $url;
            }
        }
        
        //print_r($formData);
        //exit();
        if ($this->_fechaRegistro == true) {
            $fecha = new Zend_Date();
            $formData['fecha'] = $fecha->get('yyyy-MM-dd');            
        }

        if (is_object($this->_modeloLenguaje)) {
            $lenguajes = $this->_lenguajeModelo->obtenerTodos();
           // print_r($lenguajes);
            //exit();
            foreach ($lenguajes as $lenguaje) {
                $registrosLenguaje[$lenguaje->id]['lenguajes_id'] = $lenguaje->id;
                if (count($this->_keys) > 0 and is_object($this->_modeloLenguaje) and $this->_keyNoLang == false) {
                    foreach ($this->_keys as $key => $campos) {
                        foreach ($campos as $index => $campo) {
                            $campos[$index] = $campo . '_' . $lenguaje->codigo;
                        }
                        $registrosLenguaje[$lenguaje->id][$key] = CM_Util::generarKey($campos, $formData);
                    }
                }                

                foreach ($this->_camposLenguaje as $key) {
                    $keyLenguaje = $key . '_' . $lenguaje->codigo;
                    $registrosLenguaje[$lenguaje->id][$key] = stripslashes(trim($formData[$keyLenguaje]));
                    unset($formData[$keyLenguaje]);                    
                }             
            }
        }

        $id = $this->_modelo->insert($formData);
        if (count($this->_keyUnico) > 0) {
			
            foreach ($this->_keyUnico as $key => $campos) {
                if (!is_object($this->_modeloLenguaje) or $this->_keyNoLang == true) {									
                    $idKey = CM_Util::generarKey($campos, $formData);
                    $idKey = $id . '-' . $idKey;
                    $this->_modelo->update(array($key => $idKey), "id = $id");
                }
				
				if (is_object($this->_modeloLenguaje) and $this->_keyNoLang == false) {
					foreach ($lenguajes as $lenguaje) {
						foreach ($this->_keyUnico as $key => $campos) {
							foreach ($campos as $index => $campo) {
								$campos[$index] = $campo . '_' . $lenguaje->codigo;
							}
							$idKey = CM_Util::generarKey($campos, $formData);
							$idKey = $id . '-' . $idKey;
							$this->_modeloLenguaje->update(array($key => $idKey), "lenguajes_id = $lenguaje->id and $this->_fkModelo = $id");
						}
					}
                }
            }
        }
        

        if (is_object($this->_modeloLenguaje)) {
            foreach ($registrosLenguaje as $registroLenguaje) {
                $registroLenguaje[$this->_fkModelo] = $id;
                $this->_modeloLenguaje->insert($registroLenguaje);
            }
        }


        if ($this->_accion != '') {
            $this->_redirect($modulo . '/' . $controller . '/' . $this->_accion . '/id/' . $id . $parametros);
        }

        if ($this->getRequest()->getParam('retornar') != '') {
            $this->_redirect($_SESSION['url']);
        }

        $this->_redirect($modulo . '/' . $controller . '/listar' . $parametros);
    }

    public function editarAction() {
        $id = $this->_getParam('id');
        $baseRoot = $this->getRequest()->getBaseUrl();
        $modulo = $this->getRequest()->getModuleName();
        $controller = $this->getRequest()->getControllerName();

        $parametros = '';
        if (count($this->_filtroListar) > 0) {
             foreach ($this->_filtroListar as $key => $value) {
                $parametros .= "/$key/" . $this->getRequest()->getParam($value);
             }
        }

        $this->_form->setAction($baseRoot . '/'. $modulo .'/'. $controller .'/editar' . $parametros . '/id/' . $id);
        
        $registros = $this->_modelo->fetchAll();
        $registro = $this->_modelo->find($id)->current()->toArray();        
        
        if (is_object($this->_modeloLenguaje)) {
            $lenguajes = $this->_lenguajeModelo->obtenerTodos();
            foreach ($lenguajes as $lenguaje) {
                foreach ($this->_camposLenguaje as $key) {
                    $modeloLenguaje = $this->_modeloLenguaje->fetchRow($this->_modeloLenguaje->select()
                        ->where('lenguajes_id=?', $lenguaje->id)
                        ->where("$this->_fkModelo=?", $id))->toArray();
                    $keyLenguaje = $key . '_' . $lenguaje->codigo;
                    $registro[$keyLenguaje] = $modeloLenguaje[$key];
                }
            }
        }
        
        $this->_smarty->assign('registro', $registro);
        $this->_smarty->assign('config', $this->_config);

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $_SESSION['post'] = $data;

            if (!$this->_form->isValid($data)) {
                $this->_form->populate($data);
                $this->_smarty->assign('form', $this->_form);
                $this->_smarty->assign('baseRoot', $baseRoot);
                
                return parent::render($this->_smarty->fetch($this->_tplEditar .'.tpl'));
            }

            if (count($this->_noRepetir) > 0) {
                $existe = 0;
                foreach ($this->_noRepetir as $campo) {
                    $select = $this->_modelo->select()
                        ->where("$campo=?", $data[$campo]);

                    foreach ($this->_noRepetirConMismo as $dato) {
                        $select->where("$dato=?", $data[$dato]);
                    }
                    $select->where('id<>?', $id);
                    $registro = $this->_modelo->fetchRow($select);

                    if ($registro) {
                        $this->_form->getElement($campo)->addErrorMessage('Ya existe');
                        $this->_form->getElement($campo)->markAsError();
                        $existe = 1;
                    }
                }

                if ($existe == 1) {
                    $this->_form->populate($data);
                    $this->_smarty->assign('form', $this->_form);

                    return parent::render($this->_smarty->fetch($this->_tplEditar . '.tpl'));
                }
            }

            if (count($this->_keys) > 0) {
                foreach ($this->_keys as $key => $campos) {
                    if (!is_object($this->_modeloLenguaje)) {
                        $data[$key] = CM_Util::generarKey($campos, $data);
                    }
                    if ($this->_keyNoLang == true) {
                        $data[$key] = CM_Util::generarKey($campos, $data);
                    }
                }
            }
            
            if (count($this->_imagenes) > 0) {
                foreach ($this->_imagenes as $imagen) {
                    $data[$imagen] = CM_Util::obtenerUrlDeImagen($data[$imagen]);
                }                
            }            

            unset($data['submit']);
            unset($data['repetir_password']);
            unset($data['MAX_FILE_SIZE']);

            $db = Zend_Registry::get('db');
            if (is_object($this->_modeloLenguaje)) {
                foreach ($lenguajes as $lenguaje) {
                    if (count($this->_keys) > 0 and is_object($this->_modeloLenguaje) and $this->_keyNoLang == false) {
                        foreach ($this->_keys as $key => $campos) {
                            foreach ($campos as $index => $campo) {
                                $campos[$index] = $campo . '_' . $lenguaje->codigo;
                            }
                            $registroLenguaje[$key] = CM_Util::generarKey($campos, $data);
                        }
                    }
                    
                    if (count($this->_keyUnico) > 0 and is_object($this->_modeloLenguaje) and $this->_keyNoLang == false) {
                        foreach ($this->_keyUnico as $key => $campos) {
                            foreach ($campos as $index => $campo) {
                                $campos[$index] = $campo . '_' . $lenguaje->codigo;
                            }
                            $idKey = CM_Util::generarKey($campos, $data);
                            $registroLenguaje[$key] = $id . '-' . $idKey;                            
                        }
                    }

                    foreach ($this->_camposLenguaje as $key) {
                        $keyLenguaje = $key . '_' . $lenguaje->codigo;
                        $registroLenguaje[$key] = stripslashes(trim($data[$keyLenguaje]));
                        unset($data[$keyLenguaje]);
                    }
                    $this->_modeloLenguaje->update($registroLenguaje, "lenguajes_id = $lenguaje->id and $this->_fkModelo = $id");
                }
            }


            if (count($data) > 0) {
                if (count($this->_keyUnico) > 0) {
                    foreach ($this->_keyUnico as $key => $campos) {
                        if (!is_object($this->_modeloLenguaje)) {
                            $idKey = CM_Util::generarKey($campos, $data);
                            $data[$key] = $id . '-' . $idKey;
                        }
                        if ($this->_keyNoLang == true) {
                            $data[$key] = CM_Util::generarKey($campos, $data);
                        }
                    }
                }
               $this->_modelo->update($data, "id = $id");
               
            }
            
            $this->_redirect($modulo . '/' . $controller . '/listar' . $parametros);
        }

        $this->_form->populate($registro);
        $this->_smarty->assign('form', $this->_form);
        $this->_smarty->assign('baseRoot', $baseRoot);
        return parent::render($this->_smarty->fetch($this->_tplEditar .'.tpl'));
    }

    public function eliminarAction() {
        $baseRoot = $this->getRequest()->getBaseUrl();
        $modulo = $this->getRequest()->getModuleName();
        $controller = $this->getRequest()->getControllerName();
        $id = $this->_getParam('id');

        $parametros = '';
        if (count($this->_filtroListar) > 0) {
            foreach ($this->_filtroListar as $key => $value) {
                $parametros .= "/$key/" . $this->getRequest()->getParam($key);
            }
        }

        $registro = $this->_modelo->find($id)->current();
        //print_r($registro);
        foreach ($this->_noBorrar as $key => $valor) {
            if ($registro->$key == $valor) {
                $_SESSION['alerta'] = "jAlert('Este registro no puede ser borrado', 'Borrar usuario')";
                return $this->_redirect($modulo . '/' . $controller . '/listar' . $parametros);
            }
        }

        $this->_modelo->delete('id =' . $id);
        if (is_object($this->_modeloLenguaje)) {
            $this->_modeloLenguaje->delete("$this->_fkModelo = $id");
        }


        $this->_redirect($modulo . '/' . $controller . '/listar' . $parametros);
    }

    public function listarAction() {
        $this->_smarty->assign('baseRoot', $this->_baseRoot);
        $this->_smarty->assign('config', $this->_config);
        return parent::render($this->_smarty->fetch($this->_tplListar .'.tpl'));
    }

    public function testAction()
    {       
        $this->_smarty->assign('baseRoot', $this->_baseRoot);
        return parent::render($this->_smarty->fetch('administradores_test.tpl'));
    }

    public function cargarGridAction()
    {
        $modulo = $this->getRequest()->getModuleName();
        $controller = $this->getRequest()->getControllerName();

        $parametros = '';
        if (count($this->_filtroListar) > 0) {
            foreach ($this->_filtroListar as $key => $value) {
                $parametros .= "/$key/" . $this->getRequest()->getParam($value);
            }
        }

        if ($this->_editar == true) {
            $link['url'] = $this->_baseRoot . "/$modulo/$controller/editar" . $parametros;
            $link['parametros'] = array('id' => 'id');
            $link['nombre'] = '<img src="' . $this->_baseRoot . '/img/edit.png" />';
            $link['alt'] = 'Editar';
            CM_FlexiGrid::agregarLink($link);
        }

        if (count($this->_observar)) {
            $this->_observar['nombre'] = '<img src="' . $this->_baseRoot . '/img/magnifier.png" />';
            CM_FlexiGrid::agregarLink($this->_observar);
        }

        if ($this->_eliminar == true) {
            $link['url'] = $this->_baseRoot . "/$modulo/$controller/eliminar" . $parametros;
            $link['parametros'] = array('id' => 'id');
            $link['nombre'] = '<img src="' . $this->_baseRoot . '/img/borrar.png" />';
            $link['alt'] = 'Eliminar';
            CM_FlexiGrid::agregarLink($link);
        }
 
        $respuesta = $this->_generar($this->_adaptador);

        if ($this->_imagenGrid != '') {
            CM_FlexiGrid::setImagen($this->_imagenGrid);
        }       
        CM_FlexiGrid::json($respuesta, $this->_adaptador);
    }

    public function eliminarVariosAction()
    {
        $idLista = $this->getRequest()->getParam('id');
		$ids = explode(',', $idLista);
		foreach ($ids as $id) {
            $this->_modelo->delete('id = ' . $id);
        }
    }

    private function _generar($adaptador = false)
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
}
        /*
        $tbRegistros = $this->_modelo->obtenerParaPaginado();

        $pagina = $this->_getParam('page',1);

        $paginador = Zend_Paginator::factory($tbRegistros);
        $paginador->setItemCountPerPage(15);
        $paginador->setCurrentPageNumber($pagina);


        $modulo = $this->getRequest()->getModuleName();
        $controller = $this->getRequest()->getControllerName();

        $url = $baseRoot . '/' . $modulo . '/' . $controller . '/listar';
        $paginaControl = CM_Util::paginaControl($paginador, $url);

        $this->_smarty->assign('registros', $paginador);
        $this->_smarty->assign('pagina', $paginador->getCurrentPageNumber());
        $this->_smarty->assign('paginaControl', $paginaControl);
        //print_r($paginador);
        //echo $paginador->getPages()->pageCount;
        $this->_smarty->assign('totalRegistros', $paginador->getPages()->totalItemCount);
         *
         */