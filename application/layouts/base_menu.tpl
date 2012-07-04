<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PORTA - ADMINISTRADOR</title>
		<link rel="stylesheet" type="text/css" href="{$baseRoot}/css/ui.custom.css" />
        <link rel="stylesheet" type="text/css" href="{$baseRoot}/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="{$baseRoot}/css/main.css" />
        <link rel="stylesheet" type="text/css" href="{$baseRoot}/css/flexigrid.css" />
        <link rel="stylesheet" type="text/css" href="{$baseRoot}/css/jquery.alerts.css" />
        <link rel="stylesheet" type="text/css" href="{$baseRoot}/css/lightbox.css" />
        <link rel="stylesheet" type="text/css" href="{$baseRoot}/js/jquery-autocomplete/jquery.autocomplete.css" />

        <script type="text/javascript" src="{$baseRoot}/js/jquery.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/jquery-ui.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/flexigrid.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/datepicker.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/jquery.alerts.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/ckfinder/ckfinder.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/lightbox.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="{$baseRoot}/js/ckeditor/adapters/jquery.js"></script>
        <script type"text/javascript" src="{$baseRoot}/js/jquery-autocomplete/jquery.autocomplete.js"></script>

        {literal}
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
                    finder.BasePath = '{/literal}{$WEB}/admin{literal}/js/ckfinder/' ;
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
                        url: "{/literal}{$baseRoot}{literal}/usuarios/ajax/guardar-seleccionado/nombre/" + nombre,
                        success: function(html) {
                            window.location = destino;
                        }
                    });
                    return false;
                });
            });
            
        </script>
        {/literal}
    </head>
    <body>
        <div id="adm-contenedor">
			<div id="adm-superior" class="clearfix">
                <div id="adm-logo"><img src="{$baseRoot}/images/logo_porta.jpg" height="100" width="300"/></div>
                <a id="adm-cerrar-session" href="{$baseRoot}/login/index/logout">
                    <div id="adm-cerrar-session">CERRAR SESSION</div>
                </a>
                <div id="adm-titulo">
                    <div id="adm-titulo-texto"></div>
                </div>
                <div id="adm-conectado">
                    <div id="adm-bienvenido">Usuario: </div>
                    
                    <div id="adm-usuario">{$smarty.session.usuario.nombres} {$smarty.session.usuario.apellidos}</div>
                    <div id="adm-user"></div>
                </div>
			</div>
			<div id="adm-centro">
                <div id="adm-contenido" class="clearfix">
                    <div id="adm-menu">
                        <ul class="menu">
                            <li><a class="inicio" href="{$baseRoot}/inicio">Inicio</a></li>
                            <li>&nbsp;</li>
                            <li class="menu">Adm Usuarios
                                <ul class="submenu">
                                    <li class="{$smarty.session.menu.administradores}"><a name="administradores" href="{$baseRoot}/usuarios/administradores/listar">Administradores</a></li>
                                    <li class="{$smarty.session.menu.clientes}"><a name="clientes" href="{$baseRoot}/usuarios/clientes/listar">Clientes</a></li>
                                </ul>
                            </li>
                            <li class="menu">Adm Productos
                                <ul class="submenu">
                                    <li class="{$smarty.session.menu.productos}"><a name="productos" href="{$baseRoot}/productos/productos/listar">Productos</a></li>
                                </ul>
                            </li>
                             <li class="menu">Adm Ventas
                                <ul class="submenu">
                                    <li class="{$smarty.session.menu.local}"><a name="local" href="{$baseRoot}/ventas/local/listar">Locales</a></li>
                                </ul>
                            </li>
                            <li class="menu">Mantenimientos
                                <ul class="submenu">
                                    <li class="{$smarty.session.menu.destinos}"><a name="destinos" href="{$baseRoot}/mantenimiento/ubigeo/listar/ubigeo_id/0">Ubicaciones</a></li>
                                </ul>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                    {$mainContent}
                </div>
			</div>
        </div>
    </body>
</html>