133
a:4:{s:8:"template";a:1:{s:19:"productos_nuevo.tpl";b:1;}s:9:"timestamp";i:1311098704;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}
    <script type="text/javascript">
        $(document).ready(function(){       
            $("#imagen").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen' );
            })
			$("#estado-1").attr("checked",true);
        });
    </script>
 
<h2 id="adm-titulo">PRODUCTOS</h2>
<div id="adm-vista">
   <h3 id="adm-subtitulo">NUEVO PRODUCTO</h3>
   <form enctype="application/x-www-form-urlencoded" method="post" class="registro" action="/admin/productos/productos/guardar"><dl class="zend_form">
<dt id="nombre-label"><label for="nombre" class="required">Nombre:</label></dt>
<dd id="nombre-element">
<input type="text" name="nombre" id="nombre" value="">
<ul class="errors"><li>Ingrese un nombre valido</li></ul></dd>
<dt id="imagen-label"><label for="imagen" class="optional">Imagen:</label></dt>
<dd id="imagen-element">
<input type="text" name="imagen" id="imagen" value=""></dd>
<dt id="estado-label"><label class="required">Estado</label></dt>
<dd id="estado-element">
<label for="estado-1"><input type="radio" name="estado" id="estado-1" value="1" checked="checked">Activo</label><br /><label for="estado-0"><input type="radio" name="estado" id="estado-0" value="0">Inactivo</label></dd>
<dt id="submit-label">&nbsp;</dt><dd id="submit-element">
<input type="submit" name="submit" id="submit" value="Guardar" class="boton"></dd></dl></form>
</div>