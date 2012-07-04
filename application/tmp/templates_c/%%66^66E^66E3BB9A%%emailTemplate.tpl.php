<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from contactenos/emailTemplate.tpl */ ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<div style="margin:0px 20px;border:2px solid #999;width:840px;padding:20px;">
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor='#ffffff'>
<p style="color:#414042;font:12px Arial,Helvetica,sans-serif;text-align:justify;margin:0px 0px 8px 0px;font-variant: small-caps;">Formulario de Cont&aacute;ctenos</p>
<p style="color:#414042;font:12px Arial,Helvetica,sans-serif;text-align:justify;margin:0px 0px 15px 0px;">
Nombre: <?php echo $this->_tpl_vars['name']; ?>
<br />
Apellidos: <?php echo $this->_tpl_vars['lastName']; ?>
<br />
Pa&iacute;s: <?php echo $this->_tpl_vars['country']; ?>
<br />
Departamento: <?php echo $this->_tpl_vars['departments']; ?>
<br />
Tel&eacute;fono: <?php echo $this->_tpl_vars['phone']; ?>
<br />
Email: <?php echo $this->_tpl_vars['email']; ?>
<br />
Comentarios: <?php echo $this->_tpl_vars['comments']; ?>
<br />
</p>
<p style="padding:0px;margin:0px 0px 8px 0px;"><a href="<?php echo $this->_tpl_vars['baseRoot']; ?>
">
<img alt="Porta - ¿Qu&eacute; es lo que llevas dentro?" src="<?php echo $this->_tpl_vars['baseRoot']; ?>
/images/logo-porta-medium.png" style="border:none;"></a></p>
<p style="color:#414042;font:11px Arial,Helvetica,sans-serif;text-align:justify;margin:0px 0px 8px 0px;">Direcci&oacute;n: Jose Pardo 345 Miraflores Lima - Per&uacute;<br />
Central Telef&oacute;nica: 512 3737<br />
Ventas por Mayor: Anexo 105<br />
Canal Retail: Anexo 106<br /></p>
</div>
</body>
</html>