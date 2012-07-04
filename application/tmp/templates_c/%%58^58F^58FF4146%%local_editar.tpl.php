<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from local_editar.tpl */ ?>
<?php echo '
   <script type="text/javascript">
	$().ready(function() {
			$(\'#descripcion\').ckeditor(config);
			$("#url_imagen").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'url_imagen\' );
            });
	});
    </script>
'; ?>

<h2 id="adm-titulo">PUNTOS DE VENTAS</h2>
<div id="adm-vista">
    <h3 id="adm-subtitulo">EDITAR PUNTOS DE VENTAS</h3>
    <?php echo $this->_tpl_vars['form']; ?>

</div>
