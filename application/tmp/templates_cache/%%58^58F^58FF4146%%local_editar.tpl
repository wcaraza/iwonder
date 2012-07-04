130
a:4:{s:8:"template";a:1:{s:16:"local_editar.tpl";b:1;}s:9:"timestamp";i:1308237760;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}
   <script type="text/javascript">
	$().ready(function() {
			$('#descripcion').ckeditor(config);
			$("#url_imagen").bind('click', function(){
                BrowseServer( 'Images:/', 'url_imagen' );
            });
	});
    </script>

<h2 id="adm-titulo">PUNTOS DE VENTAS</h2>
<div id="adm-vista">
    <h3 id="adm-subtitulo">EDITAR PUNTOS DE VENTAS</h3>
    <form enctype="application/x-www-form-urlencoded" method="post" class="registro" action="/admin/ventas/local/editar/id/22"><dl class="zend_form">
<dt id="titulo-label"><label for="titulo" class="required">Nombre:</label></dt>
<dd id="titulo-element">
<input type="text" name="titulo" id="titulo" value="Marathon"></dd>
<dt id="descripcion-label"><label for="descripcion" class="required">Descripcion:</label></dt>
<dd id="descripcion-element">
<textarea name="descripcion" id="descripcion" rows="24" cols="80">&lt;p&gt;
	JOCKEY PLAZA&lt;/p&gt;
&lt;p&gt;
	LARCO MAR&lt;/p&gt;
&lt;p&gt;
	C.C. MEGA PLAZA&lt;/p&gt;
&lt;p&gt;
	ASIA&lt;/p&gt;
&lt;p&gt;
	C.C. PLAZA SAN MIGUEL&lt;/p&gt;
</textarea></dd>
<dt id="url_imagen-label"><label for="url_imagen" class="optional">Imagen:</label></dt>
<dd id="url_imagen-element">
<input type="text" name="url_imagen" id="url_imagen" value="/archivos/images/puntosventa/marathon.jpg"></dd>
<dt id="tipo-label"><label class="required">Tipo de Local</label></dt>
<dd id="tipo-element">
<label for="tipo-1"><input type="radio" name="tipo" id="tipo-1" value="1" checked="checked">Tienda</label><br /><label for="tipo-0"><input type="radio" name="tipo" id="tipo-0" value="0">Centro Comercial</label></dd>
<dt id="submit-label">&nbsp;</dt><dd id="submit-element">
<input type="submit" name="submit" id="submit" value="Guardar" class="boton"></dd></dl></form>
</div>
