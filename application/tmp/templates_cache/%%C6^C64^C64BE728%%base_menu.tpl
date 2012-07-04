127
a:4:{s:8:"template";a:1:{s:13:"base_menu.tpl";b:1;}s:9:"timestamp";i:1311098704;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PORTA - ADMINISTRADOR</title>
		<link rel="stylesheet" type="text/css" href="/admin/css/ui.custom.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="/admin/css/main.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/flexigrid.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/jquery.alerts.css" />
        <link rel="stylesheet" type="text/css" href="/admin/css/lightbox.css" />
        <link rel="stylesheet" type="text/css" href="/admin/js/jquery-autocomplete/jquery.autocomplete.css" />

        <script type="text/javascript" src="/admin/js/jquery.js"></script>
        <script type="text/javascript" src="/admin/js/jquery-ui.js"></script>
        <script type="text/javascript" src="/admin/js/flexigrid.js"></script>
        <script type="text/javascript" src="/admin/js/datepicker.js"></script>
        <script type="text/javascript" src="/admin/js/jquery.alerts.js"></script>
        <script type="text/javascript" src="/admin/js/ckfinder/ckfinder.js"></script>
        <script type="text/javascript" src="/admin/js/lightbox.js"></script>
        <script type="text/javascript" src="/admin/js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="/admin/js/ckeditor/adapters/jquery.js"></script>
        <script type"text/javascript" src="/admin/js/jquery-autocomplete/jquery.autocomplete.js"></script>

        
            <script type="text/javascript">
				var config = {
						toolbar:[
							['Source','-','PasteText','Bold','Italic','Underline'],
							['BidiLtr', 'BidiRtl' ],
							['NumberedList','BulletedList'],
							['Link','Unlink'],
							['Table'],
							['Maximize', 'ShowBlocks']
						],
						skin : 'kama'
					};                     

                function BrowseServer( startupPath, functionData )
                {
                    var finder = new CKFinder() ;
                    finder.BasePath = 'http://porta.medialabla.net/admin/js/ckfinder/' ;
                    finder.StartupPath = startupPath ;
                    finder.SelectFunction = SetFileField ;
                    finder.SelectFunctionData = functionData ;
                    finder.SelectThumbnailFunction = ShowThumbnails ;
                    finder.Popup() ;
                }

                function SetFileField( fileUrl, data )
                {
                    document.getElementById( data["selectFunctionData"] ).value = fileUrl ;
                }

                function ShowThumbnails( fileUrl, data )
                {
                    var sFileName = decodeURIComponent( fileUrl.replace( /^.*[\/\\]/g, '' ) ) ;
                    document.getElementById( 'thumbnails' ).innerHTML +=
                            '<div class="thumb">' +
                                '<img src="' + fileUrl + '" />' +
                                '<div class="caption">' +
                                    '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
                                '</div>' +
                            '</div>' ;

                    document.getElementById( 'preview' ).style.display = "";
                    return false;
                }
       
            $(document).ready(function(){
                $("ul.submenu li").bind("mouseover", function() {
                    $(this).addClass('marcado');
                });

                $("ul.submenu li").bind("mouseout", function() {
                    $(this).removeClass('marcado');
                });

                $("ul.submenu li a").bind("click", function() {
                    var destino = $(this).attr("href");
                    var nombre = $(this).attr("name");
                    $.ajax({
                        url: "/admin/usuarios/ajax/guardar-seleccionado/nombre/" + nombre,
                        success: function(html) {
                            window.location = destino;
                        }
                    });
                    return false;
                });
            });
            
        </script>
        
    </head>
    <body>
        <div id="adm-contenedor">
			<div id="adm-superior" class="clearfix">
                <div id="adm-logo"><img src="/admin/images/logo_porta.jpg" height="100" width="300"/></div>
                <a id="adm-cerrar-session" href="/admin/login/index/logout">
                    <div id="adm-cerrar-session">CERRAR SESSION</div>
                </a>
                <div id="adm-titulo">
                    <div id="adm-titulo-texto"></div>
                </div>
                <div id="adm-conectado">
                    <div id="adm-bienvenido">Usuario: </div>
                    
                    <div id="adm-usuario">medialab marketing</div>
                    <div id="adm-user"></div>
                </div>
			</div>
			<div id="adm-centro">
                <div id="adm-contenido" class="clearfix">
                    <div id="adm-menu">
                        <ul class="menu">
                            <li><a class="inicio" href="/admin/inicio">Inicio</a></li>
                            <li>&nbsp;</li>
                            <li class="menu">Adm Usuarios
                                <ul class="submenu">
                                    <li class=""><a name="administradores" href="/admin/usuarios/administradores/listar">Administradores</a></li>
                                    <li class=""><a name="clientes" href="/admin/usuarios/clientes/listar">Clientes</a></li>
                                </ul>
                            </li>
                            <li class="menu">Adm Productos
                                <ul class="submenu">
                                    <li class="seleccionado"><a name="productos" href="/admin/productos/productos/listar">Productos</a></li>
                                </ul>
                            </li>
                             <li class="menu">Adm Ventas
                                <ul class="submenu">
                                    <li class=""><a name="local" href="/admin/ventas/local/listar">Locales</a></li>
                                </ul>
                            </li>
                            <li class="menu">Mantenimientos
                                <ul class="submenu">
                                    <li class=""><a name="destinos" href="/admin/mantenimiento/ubigeo/listar/ubigeo_id/0">Ubicaciones</a></li>
                                </ul>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                    
    <script type="text/javascript">
        $(document).ready(function(){       
            $("#imagen").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen' );
            })
			$("#estado-1").attr("checked",true);
        });
    </script>
 
<h2 id="adm-titulo">PRODUCTOS</h2>
<div id="adm-vista">
   <h3 id="adm-subtitulo">NUEVO PRODUCTO</h3>
   <form enctype="application/x-www-form-urlencoded" method="post" class="registro" action="/admin/productos/productos/guardar"><dl class="zend_form">
<dt id="nombre-label"><label for="nombre" class="required">Nombre:</label></dt>
<dd id="nombre-element">
<input type="text" name="nombre" id="nombre" value="">
<ul class="errors"><li>Ingrese un nombre valido</li></ul></dd>
<dt id="imagen-label"><label for="imagen" class="optional">Imagen:</label></dt>
<dd id="imagen-element">
<input type="text" name="imagen" id="imagen" value=""></dd>
<dt id="estado-label"><label class="required">Estado</label></dt>
<dd id="estado-element">
<label for="estado-1"><input type="radio" name="estado" id="estado-1" value="1" checked="checked">Activo</label><br /><label for="estado-0"><input type="radio" name="estado" id="estado-0" value="0">Inactivo</label></dd>
<dt id="submit-label">&nbsp;</dt><dd id="submit-element">
<input type="submit" name="submit" id="submit" value="Guardar" class="boton"></dd></dl></form>
</div>
                </div>
			</div>
        </div>
    </body>
</html>