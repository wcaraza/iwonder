<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from productos_editar.tpl */ ?>
<?php echo '
    <script type="text/javascript">
        $(document).ready(function(){       
            $("#imagen").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'imagen\' );
            })
        });
    </script>
'; ?>
 
<h2 id="adm-titulo">PRODUCTOS</h2>
<div id="adm-vista">
    <h3 id="adm-subtitulo">EDITAR PRODUCTO</h3>
    <?php echo $this->_tpl_vars['form']; ?>

</div>
