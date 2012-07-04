<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Porta</title>
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/reset.css" type="text/css" />
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/main.css" type="text/css" />
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/layout.css" type="text/css" />
<link rel="stylesheet" media="screen" href="{$baseRoot}/css/typography.css"type="text/css" />
<!--[if IE]>
<link rel="stylesheet" media="screen" href="../css/ie.css" type="text/css" />
<![endif]-->
</head>
<body>
<div>
<div id="bgWrapper">
	<div id="mainNavigationHome">
	    <div id="menu">
	        <ul class="clearfix">
	            <li class="inicio"><a href="{$baseRoot}/" class="active"></a></li>
	            <li class="quienes"><a href="{$baseRoot}/quienes-somos"></a></li>
	            <li class="productos"><a href="{$baseRoot}/productos/1-mochilas/modelos/1"></a></li>
	            <li class="venta"><a href="{$baseRoot}/puntos-ventas"></a></li>
	            <li class="contactenos"><a href="{$baseRoot}/contactenos"></a></li>
	        </ul>
	    </div>
	</div>
		<div id="contentSlide">
	    <div id="slide">
	        <div class="bgSlide1">
	            <div class="lefImg"><img alt="" src="{$baseRoot}/images/quienesSomos/quien_izq.png" /></div>
	            <div class="centerImg"><img src="{$baseRoot}/images/home/actitud.png" alt="" /></div>
	            <div class="rightImg"><img alt="" src="{$baseRoot}/images/quienesSomos/quien_der.png" /></div>
	        </div>
	        <div class="bgSlide2">
	            <div class="lefImg"><img src="{$baseRoot}/images/home/home_a_izq.png" alt="" /></div>
	            <div class="centerImg"><img src="{$baseRoot}/images/home/amor.png" alt="" /></div>
	            <div class="rightImg"><img src="{$baseRoot}/images/home/home_a_der.png" alt="" /></div>
	        </div>
	        <div class="bgSlide3">
	            <div class="lefImg"><img src="{$baseRoot}/images/home/home_b_der.png" alt="" /></div>
	            <div class="centerImg"><img src="{$baseRoot}/images/home/libertad.png" alt="" /></div>
	            <div class="rightImg"><img src="{$baseRoot}/images/home/home_b_izq.png" alt="" /></div>
	        </div>
	    </div>	 
	</div>		
</div>
<div id="footerHome">     
    <div id="wrapper">
        <div class="clearfix">
            <div id="productos">
                <h1>{$titleOut}</h1>	
				<div id="containerProductos" class="clearfix">
                {section name=producto loop=$productos}
                	<div class="modeloProductos">
                        <a href="{$baseRoot}/productos/{$productos[producto].key}/modelos/1"><img src="{$baseRoot}/{$productos[producto].imagen}" alt="" />
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
    </div>
   </div> 
</div>
<div style="background:#FFF;">
</div>
<script type="text/javascript" src="{$baseRoot}/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="{$baseRoot}/js/cycle/jquery.cycle.all.min.js"></script>	
<script type="text/javascript" src="{$baseRoot}/js/site.js"></script>
<script type="text/javascript">MyApp.home.slide();</script>
</body>
</html>