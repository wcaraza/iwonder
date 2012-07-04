131
a:4:{s:8:"template";a:1:{s:17:"modelos_nuevo.tpl";b:1;}s:9:"timestamp";i:1308753523;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}
    <script type="text/javascript">
        $(document).ready(function(){       
            $("#imagen_frente_chica").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen_frente_chica' );
            })
            $("#imagen_frente_grande").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen_frente_grande' );
            })
			$("#imagen_reverso_chica").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen_reverso_chica' );
            })
            $("#imagen_reverso_grande").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen_reverso_grande' );
            })
			$("#imagen_default").bind('click', function(){
                BrowseServer( 'Images:/', 'imagen_default' );
            })
 	 	    $('#descripcion_es').ckeditor(config);
			$('#descripcion_extra_es').ckeditor(config);
			$("#estado-1").attr("checked",true);
			
			/*$('#imagen_frente_grande').val();

			$('#reef').html($('#imagen_frente_grande').val());
		
			*/
			
        });
    </script>
 
<h2 id="adm-titulo">MODELOS</h2>
<div id="adm-vista">
    <h3 id="adm-subtitulo">NUEVO MODELO</h3>
    <form enctype="application/x-www-form-urlencoded" method="post" class="registro" action="/admin/productos/modelos/guardar/producto_id/15"><dl class="zend_form">
<dt id="nombre-label"><label for="nombre" class="required">Nombre:</label></dt>
<dd id="nombre-element">
<input type="text" name="nombre" id="nombre" value=""></dd>
<dt id="codigo-label"><label for="codigo" class="optional">Codigo:</label></dt>
<dd id="codigo-element">
<input type="text" name="codigo" id="codigo" value=""></dd>
<dt id="precio-label"><label for="precio" class="optional">Precio(S/):</label></dt>
<dd id="precio-element">
<input type="text" name="precio" id="precio" value=""></dd>
<dt id="material-label"><label for="material" class="required">Material:</label></dt>
<dd id="material-element">
<input type="text" name="material" id="material" value=""></dd>
<dt id="dimension-label"><label for="dimension" class="required">Dimension:</label></dt>
<dd id="dimension-element">
<input type="text" name="dimension" id="dimension" value=""></dd>
<dt id="capacidad-label"><label for="capacidad" class="optional">Capacidad:</label></dt>
<dd id="capacidad-element">
<input type="text" name="capacidad" id="capacidad" value=""></dd>
<dt id="descripcion_es-label"><label for="descripcion_es" class="required">Descripcion:</label></dt>
<dd id="descripcion_es-element">
<textarea name="descripcion_es" id="descripcion_es" rows="24" cols="80"></textarea></dd>
<dt id="descripcion_extra_es-label"><label for="descripcion_extra_es" class="optional">Tabla de Capacidad:</label></dt>
<dd id="descripcion_extra_es-element">
<textarea name="descripcion_extra_es" id="descripcion_extra_es" rows="24" cols="80"></textarea></dd>
<dt id="imagen_default-label"><label for="imagen_default" class="required">Foto por Defecto:</label></dt>
<dd id="imagen_default-element">
<input type="text" name="imagen_default" id="imagen_default" value=""></dd>
<dt id="imagen_frente_chica-label"><label for="imagen_frente_chica" class="optional">Foto Chica (Frente):</label></dt>
<dd id="imagen_frente_chica-element">
<input type="text" name="imagen_frente_chica" id="imagen_frente_chica" value=""></dd>
<dt id="imagen_frente_grande-label"><label for="imagen_frente_grande" class="optional">Foto Grande (Frente):</label></dt>
<dd id="imagen_frente_grande-element">
<input type="text" name="imagen_frente_grande" id="imagen_frente_grande" value=""></dd>
<dt id="imagen_reverso_chica-label"><label for="imagen_reverso_chica" class="optional">Foto Chica (Reverso):</label></dt>
<dd id="imagen_reverso_chica-element">
<input type="text" name="imagen_reverso_chica" id="imagen_reverso_chica" value=""></dd>
<dt id="imagen_reverso_grande-label"><label for="imagen_reverso_grande" class="optional">Foto Grande (Reverso):</label></dt>
<dd id="imagen_reverso_grande-element">
<input type="text" name="imagen_reverso_grande" id="imagen_reverso_grande" value=""></dd>
<dt id="estado-label"><label class="required">Estado</label></dt>
<dd id="estado-element">
<label for="estado-1"><input type="radio" name="estado" id="estado-1" value="1">Activo</label><br /><label for="estado-0"><input type="radio" name="estado" id="estado-0" value="0">Inactivo</label></dd>
<dt id="submit-label">&nbsp;</dt><dd id="submit-element">
<input type="submit" name="submit" id="submit" value="Guardar" class="boton"></dd>
<dt id="producto_id-label">&nbsp;</dt>
<dd id="producto_id-element">
<input type="hidden" name="producto_id" value="15" id="producto_id"></dd></dl></form>
    <!--<span id="reef" style="color:#000000">XXXXXXXXXXXXXXXXXXX</span>-->
</div>