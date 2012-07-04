<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from productos_nuevo.tpl */ ?>
<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){       
            $("#imagen").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen\' );
            })
			$("#estado-1").attr("checked",true);
        });
    </script>
'; ?>
 
<h2 id="adm-titulo">PRODUCTOS</h2>
<div id="adm-vista">
   <h3 id="adm-subtitulo">NUEVO PRODUCTO</h3>
   <?php echo $this->_tpl_vars['form']; ?>

</div>