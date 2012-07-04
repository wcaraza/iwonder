<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from index/indexContent.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home - Porta</title>
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/reset.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/main.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/layout.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/typography.css"type="text/css" />
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
	            <li class="inicio"><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/" class="active"></a></li>
	            <li class="quienes"><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/quienes-somos"></a></li>
	            <li class="productos"><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/1-mochilas/modelos/1"></a></li>
	            <li class="venta"><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/puntos-ventas"></a></li>
	            <li class="contactenos"><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/contactenos"></a></li>
	        </ul>
	    </div>
	</div>
		<div id="contentSlide">
	    <div id="slide">
	        <div class="bgSlide1">
	            <div class="lefImg"><img alt="" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/quienesSomos/quien_izq.png" /></div>
	            <div class="centerImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/actitud.png" alt="" /></div>
	            <div class="rightImg"><img alt="" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/quienesSomos/quien_der.png" /></div>
	        </div>
	        <div class="bgSlide2">
	            <div class="lefImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/home_a_izq.png" alt="" /></div>
	            <div class="centerImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/amor.png" alt="" /></div>
	            <div class="rightImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/home_a_der.png" alt="" /></div>
	        </div>
	        <div class="bgSlide3">
	            <div class="lefImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/home_b_der.png" alt="" /></div>
	            <div class="centerImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/libertad.png" alt="" /></div>
	            <div class="rightImg"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/home/home_b_izq.png" alt="" /></div>
	        </div>
	    </div>	 
	</div>		
</div>
<div id="footerHome">     
    <div id="wrapper">
        <div class="clearfix">
            <div id="productos">
                <h1><?php echo $this->_tpl_vars['titleOut']; ?>
</h1>	
				<div id="containerProductos" class="clearfix">
                <?php unset($this->_sections['producto']);
$this->_sections['producto']['name'] = 'producto';
$this->_sections['producto']['loop'] = is_array($_loop=$this->_tpl_vars['productos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['producto']['show'] = true;
$this->_sections['producto']['max'] = $this->_sections['producto']['loop'];
$this->_sections['producto']['step'] = 1;
$this->_sections['producto']['start'] = $this->_sections['producto']['step'] > 0 ? 0 : $this->_sections['producto']['loop']-1;
if ($this->_sections['producto']['show']) {
    $this->_sections['producto']['total'] = $this->_sections['producto']['loop'];
    if ($this->_sections['producto']['total'] == 0)
        $this->_sections['producto']['show'] = false;
} else
    $this->_sections['producto']['total'] = 0;
if ($this->_sections['producto']['show']):

            for ($this->_sections['producto']['index'] = $this->_sections['producto']['start'], $this->_sections['producto']['iteration'] = 1;
                 $this->_sections['producto']['iteration'] <= $this->_sections['producto']['total'];
                 $this->_sections['producto']['index'] += $this->_sections['producto']['step'], $this->_sections['producto']['iteration']++):
$this->_sections['producto']['rownum'] = $this->_sections['producto']['iteration'];
$this->_sections['producto']['index_prev'] = $this->_sections['producto']['index'] - $this->_sections['producto']['step'];
$this->_sections['producto']['index_next'] = $this->_sections['producto']['index'] + $this->_sections['producto']['step'];
$this->_sections['producto']['first']      = ($this->_sections['producto']['iteration'] == 1);
$this->_sections['producto']['last']       = ($this->_sections['producto']['iteration'] == $this->_sections['producto']['total']);
?>
                	<div class="modeloProductos">
                        <a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/<?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['key']; ?>
/modelos/1"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/<?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['imagen']; ?>
" alt="" />
                        <?php echo $this->_tpl_vars['productos'][$this->_sections['producto']['index']]['nombre']; ?>

                        	 <div class="estrella"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/estrella.png" alt="" width="26" height="24" /></div>
                        </a>                       
                    </div>	
                 <?php endfor; endif; ?>
                </div>
        	</div>	
            
            <div id="logo">
                <img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/logo-porta.png" alt="Logo" />
                    <div class="logoFacebook"><a href="http://www.facebook.com/portaline" target="_blank"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/logoFacebook.jpg" alt="" /></a></div>
            </div>	
        </div>	 
    </div>
   </div> 
</div>
<div style="background:#FFF;">
</div>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/cycle/jquery.cycle.all.min.js"></script>	
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/site.js"></script>
<script type="text/javascript">MyApp.home.slide();</script>
</body>
</html>