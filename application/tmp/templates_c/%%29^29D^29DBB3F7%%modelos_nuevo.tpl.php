<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from modelos_nuevo.tpl */ ?>
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
			$("#estado-1").attr("checked",true);
			
			/*$(\'#imagen_frente_grande\').val();

			$(\'#reef\').html($(\'#imagen_frente_grande\').val());
		
			*/
			
        });
    </script>
'; ?>
 
<h2 id="adm-titulo">MODELOS</h2>
<div id="adm-vista">
    <h3 id="adm-subtitulo">NUEVO MODELO</h3>
    <?php echo $this->_tpl_vars['form']; ?>

    <!--<span id="reef" style="color:#000000">XXXXXXXXXXXXXXXXXXX</span>-->
</div>