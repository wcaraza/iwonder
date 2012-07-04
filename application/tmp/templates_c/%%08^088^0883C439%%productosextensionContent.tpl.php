<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from productos/productosextensionContent.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/reset.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/main.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/layout.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/typography.css" type="text/css" />

<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery.carousel/skins/tango/skin.css" />   
<!--<link type="text/css" rel="stylesheet" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery-scrollProductos/jScrollPane.css" />-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery-1.4.2.min.js"></script>   
<!--<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery.jloupe/jquery.jloupe.js"></script>-->
<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery.carousel/lib/jquery.jcarousel.min.js"></script>
<!--<script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/jquery-scrollProductos/jScrollPane.js"></script>-->
<?php echo '
<!--<script type="text/javascript">
	$(function(){ $(\'.zoom\').jloupe({ radiusLT:80, radiusRT:80, radiusRB:80, radiusLB:80, width:150, height:150, borderColor:\'#f2730b\', background:\'none\', fade:false}); });
</script>-->
<script type="text/javascript">
'; ?>
<?php if ($this->_tpl_vars['x'] == 'true'): ?><?php echo '
	jQuery(document).ready(function() {
		jQuery(\'#mycarousel\').jcarousel();
	});
'; ?>
<?php endif; ?><?php echo '
</script>
<style type="text/css">
.jScrollPaneContainer{
	width:auto !important; }
</style>
'; ?>



</head>
<body>
<div id="contentExtensionProducto" class="clearfix">
    <div id="imgProduct">
    <div id="producto"><input name="modelo_id" id="modelo_id" type="hidden" value="<?php echo $this->_tpl_vars['key']; ?>
" />
        <?php if ($this->_tpl_vars['modelo']->imagen_frente_chica != ""): ?>
            <ul id="mycarousel" class="jcarousel-skin-tango">
                <li><img src="<?php echo $this->_tpl_vars['modelo']->imagen_frente_chica; ?>
" alt="" /></li>
                <?php if ($this->_tpl_vars['modelo']->imagen_reverso_chica != ""): ?>
                <li><img src="<?php echo $this->_tpl_vars['modelo']->imagen_reverso_chica; ?>
" alt="" /></li>
                <?php endif; ?>
            </ul>
		<?php if ($this->_tpl_vars['modelo']->imagen_reverso_chica != ""): ?>   
        <div id="rotateImage">
        </div>
        <?php endif; ?>
       
        <?php else: ?>
        <img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/slides.png" title="No se encontro la imagen" />
        <?php endif; ?>
        </div>
                        
    </div>
    <div id="productDescription">
    	<h1><?php echo $this->_tpl_vars['modelo']->nombre; ?>
</h1>
         <div class="scrollPaneDescription">
            <?php echo $this->_tpl_vars['modelo']->descripcion; ?>

            <br />
           <!-- <p><span>Material:</span>  <?php echo $this->_tpl_vars['modelo']->material; ?>
</p> -->
            <!-- Peso:  <?php echo $this->_tpl_vars['modelo']->descripcion; ?>
 -->
          <!--  <p><span>Dimensiones:</span>  <?php echo $this->_tpl_vars['modelo']->dimension; ?>
</p>
            <p><span>Capacidad:</span>  <?php echo $this->_tpl_vars['modelo']->capacidad; ?>
</p> -->
            <!-- Capacidad:  <?php echo $this->_tpl_vars['modelo']->capacidad; ?>
 -->
        </div>
    </div>
</div>
</body>
</html>