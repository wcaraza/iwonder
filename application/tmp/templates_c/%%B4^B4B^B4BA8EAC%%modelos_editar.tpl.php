<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from modelos_editar.tpl */ ?>
<?php echo '
    <script type="text/javascript">
         $(document).ready(function(){
            $("#imagen_frente_chica").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen_frente_chica\' );
            })
            $("#imagen_frente_grande").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen_frente_grande\' );
            })
			$("#imagen_reverso_chica").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen_reverso_chica\' );
            })
            $("#imagen_reverso_grande").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen_reverso_grande\' );
            })
			$("#imagen_default").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen_default\' );
            })
            $(\'#descripcion_es\').ckeditor(config);
			$(\'#descripcion_extra_es\').ckeditor(config);
        });
    </script>
'; ?>
 
<h2 id="adm-titulo">MODELOS</h2>
<div id="adm-vista">
    <h3 id="adm-subtitulo">EDITAR MODELO</h3>
    <div id="adm-fotos">
        <a href="<?php echo $this->_tpl_vars['config']->web; ?>
/<?php echo $this->_tpl_vars['registro']['foto_chica']; ?>
">
            <span>Foto Chica:</span>
            <img src="<?php echo $this->_tpl_vars['config']->web; ?>
/<?php echo $this->_tpl_vars['registro']['foto_chica']; ?>
" />
        </a>
        <a href="<?php echo $this->_tpl_vars['config']->web; ?>
/<?php echo $this->_tpl_vars['registro']['foto_grande']; ?>
">
            <span>Foto Grande:</span>
            <img src="<?php echo $this->_tpl_vars['config']->web; ?>
/<?php echo $this->_tpl_vars['registro']['foto_grande']; ?>
" />
        </a>
    </div>
    <?php echo $this->_tpl_vars['form']; ?>

</div>