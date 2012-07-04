<?php 
class CM_Util
{		
    public function paginaControl($paginador, $url)
    {
        $html = '<ul id="adm-pagina-control">';
        
        if ($paginador->getPages()->first == $paginador->getPages()->current) {
            $html .= '<li><<</li>';
        } else {
            $html .= '<li><a href="'. $url .'/page/'. $paginador->getPages()->first .'"><<</li>';
        }

        if ($paginador->getPages()->first == $paginador->getPages()->current) {
            $html .= '<li><</li>';
        } else {
            $anterior = $paginador->getPages()->current - 1;
            $html .= '<li><a href="'. $url .'/page/'. $anterior .'"><</li>';
        }

        for ($i = 1; $i <= $paginador->getPages()->pageCount; $i++) {
            if ($i == $paginador->getPages()->current) {
                $html .= '<li>'. $i . '</li>';
            } else {
                $html .= '<li><a href="' . $url . '/page/' . $i . '">' . $i . '</a></li>';
            }
        }

        if ($paginador->getPages()->last == $paginador->getPages()->current) {
            $html .= '<li>></li>';
        } else {
            $html .= '<li><a href="'. $url .'/page/'. $paginador->getPages()->next .'">></li>';
        }

        if ($paginador->getPages()->last == $paginador->getPages()->current) {
            $html .= '<li>>></li>';
        } else {
            $html .= '<li><a href="'. $url .'/page/'. $paginador->getPages()->last .'">>></a></li>';
        }

        $html .= "</ul>";

        return $html;
    }	  

    public function objetoToArray($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        }
        return $array;
    }

    public function generarKey($campos, $datos)
    {
        $key = '';
        $x = 0;
        foreach ($campos as $campo) {
            if ($x == 1) {
                $key .= '-';
            }
            $cadena = $datos[$campo];
            $key .= CM_Util::quitarCaracteresRaros($cadena);
            $x = 1;
        }
        return $key;
    }

    public function quitarCaracteresRaros($cadena)
    {
        $cadena = str_replace(' ', '-', $cadena);                
        $caracteresRaros = array('á','é','í','ó','ú','�?','É','�?','Ó','Ú','ñ','Ñ','ç');
        $caracteresCorrectos = array('a','e','i','o','u','A','E','I','O','U','n','N','c');
        $cadena = str_replace($caracteresRaros, $caracteresCorrectos, $cadena);
        return strtolower($cadena);
    }


    public function obtenerUrlActual($lang = true)
    {
        $parametros = $this->getRequest()->getParams();
        if ($lang == true) {
            unset($parametros['lang']);
        }
        
        $url = '';
        $x = 0;
        foreach ($parametros as $key => $valor) {           
            if ($x == 0) {
                $url .= $valor . '/';
            } else {
                $url .= $key . '/' . $valor . '/';
            }            
            if ($key == 'action') {
                $x = 1;
            }
        }
        $url = substr($url, 0, strlen($json)-1);
        return $url;
    }

    public function obtenerUrlActualWeb()
    {
        $parametros = $this->getRequest()->getParams();        
        unset($parametros['lang']);        
        $url = '';
        foreach ($parametros as $valor) {
           $url .= $valor . '/';
        }
        $url = substr($url, 0, strlen($json)-1);
        return $url;
    }

    public function obtenerUrlDeImagen($url)
    {
        $config = Zend_Registry::get('config');
        $quitarRaiz = $config->quitar_url;
        $url = str_replace($quitarRaiz, 'archivos', $url);
        return $url;
    }

    public function obtenerUrlDeThumb($url)
    {
        $url = str_replace('archivos/images', 'archivos/_thumbs/Images', $url);
        return $url;
    }

    public function recortar($cadena, $numero_caracteres)
    {
        if (strlen($cadena) > $numero_caracteres) {
            $numero_caracteres = $numero_caracteres - 3;
            return substr($cadena, 0, $numero_caracteres) . '...';
        }
        return $cadena;
    }
	
public function espace($rang) {
$ch="";
	for ($x=0;$x<$rang;$x++) {
		$ch=$ch."&nbsp;&nbsp;&nbsp;&nbsp;";
	}
return $ch;
}

public static function recur($tab,$pere,$rang) {
  for ($x=0;$x<count($tab);$x++) {
    if ($tab[$x]["ubigeo_id"]==$pere) {
       $_SESSION["json"][$tab[$x]["id"]] = CM_Util::espace($rang).$tab[$x]["nombre"]."<BR>";
        CM_Util::recur($tab,$tab[$x]["id"],$rang+1);
    }
  }
}

}