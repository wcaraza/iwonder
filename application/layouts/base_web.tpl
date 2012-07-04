<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7"> 
<title>{$sectionTitle} - Porta</title>
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/reset.css" type="text/css" />
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/main.css" type="text/css" />
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/layout.css" type="text/css" />
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/typography.css" type="text/css" />



{$css}
</head>
<body>
<div id="{$bgSection}">
	{$topContent}
    <div id="bgWrapper">
    	<div id="mainNavigation">
			<div id="textProduct">{$product->nombre}</div>
    		<div id="menu">
                <ul class="clearfix">
                    <li class="inicio"><a href="{$baseRoot}/" class="{$smarty.session.menu.inicio}"></a></li>
                    <li class="quienes"><a href="{$baseRoot}/quienes-somos" class="{$smarty.session.menu.quienes}"></a></li>
                    <li class="productos"><a href="{$baseRoot}/productos/1-mochilas/modelos/1" class="{$smarty.session.menu.productos}"></a></li>
                    <li class="venta"><a href="{$baseRoot}/puntos-ventas" class="{$smarty.session.menu.venta}"></a></li>
                    <li class="contactenos"><a href="{$baseRoot}/contactenos" class="{$smarty.session.menu.contactenos}"></a></li>
                </ul>
            </div>        
            <div id="contentProduct" class="clearfix">
            {$mainContent}    
            </div>
        </div>
    </div>
    <div id="footer">    
      <div id="wrapper">
      		{if $van=='false'}
            <div class="clearfix">
                <div id="productos">
                  <h1>{$titleOut}</h1>	
                    <div id="containerProductos" class="clearfix">
                    {section name=producto loop=$productos}
                    	<div class="modeloProductos">
                            <a href="{$baseRoot}/productos/{$productos[producto].key}/modelos/1" {if $cxss==$productos[producto].key}class="active"{/if}><img src="{$baseRoot}/{$productos[producto].imagen}" alt="" />
                            {$productos[producto].nombre}
                            	<div class="estrella"><img src="{$baseRoot}/images/estrella.png" alt="" width="26" height="24" /></div>
                            </a>
                        </div>	
                     {/section}
                    </div>	
                </div>	
              <div id="logo">
                    <img src="{$baseRoot}/images/logo-porta.png" alt="Logo" />
                    <div class="logoFacebook"><a href="http://www.facebook.com/portaline" target="_blank"><img src="{$baseRoot}/images/logoFacebook.jpg" alt="" /></a></div>
              </div>	
          </div>	 
          {else}
          	<div class="clearfix">
                <div id="productos">
                  <!--<h1>{$titleOut}</h1>	-->
                  <h1><img src="{$baseRoot}/images/ultimas-vistas.jpg" alt="" /></h1>
                    <div id="containerProductos">
                    	<ul class="clearfix">
                        {section name=producto loop=$productos}
                        	<li><a href="{$baseRoot}/productos/{$productos[producto].key_producto}/detalle-modelo/{$productos[producto].key}" rel="shadowbox; width=884px; height=560px;"><img alt="" src="{$productos[producto].url}"> {$productos[producto].nombre} </a></li>
                        {/section}  
                        </ul>
                    </div>	
                </div>	
                
              <div id="logo">
                    <img src="{$baseRoot}/images/logo-porta.png" alt="Logo" />
                    <div class="logoFacebook"><a href="http://www.facebook.com/portaline" target="_blank"><img src="{$baseRoot}/images/logoFacebook.jpg" alt="" /></a></div>
              </div>	
          </div>
          {/if}	
      </div>
    </div>
</div>
<script type="text/javascript" src="{$baseRoot}/js/jquery-1.4.2.min.js"></script>
{$js}
<script type="text/javascript" src="{$baseRoot}/js/site.js"></script>
{$jsContent}
</body>
</html>