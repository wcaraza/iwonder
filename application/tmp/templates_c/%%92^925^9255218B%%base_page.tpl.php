<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from base_page.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>PORTA - ADMINISTRADOR</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/css/main.css" />
        <script type="text/javascript" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/js/unitpngfix.js"></script>
    </head>
    <body>
        <div id="adm-contenedor">
			<div id="adm-superior" class="clearfix">
                <div id="adm-logo"><img src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/logo_porta.jpg" height="100" width="300"/></div>
                <div id="adm-titulo">
                    <div id="adm-titulo-texto"></div>
                </div>
			</div>
			<div id="adm-centro">
                <?php echo $this->_tpl_vars['mainContent']; ?>

			</div>
        </div>
    </body>
</html>