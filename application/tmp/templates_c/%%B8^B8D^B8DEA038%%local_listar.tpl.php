<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from local_listar.tpl */ ?>
<?php echo '
   <script type="text/javascript">
	$().ready(function() {
			$("#singleBirdRemote").autocomplete("'; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
/ventas/local/autocomplete<?php echo '", {
			width: 260,
			selectFirst: false
			});
			function log(event, data, formatted) {
			var dump = formatted.replace(/&nbsp;/gi, \'\');
			var dumper = dump.replace(/<BR>/gi, \'\');
			$(\'#singleBirdRemote\').val(dumper);
			$(\'#key\').val(data[1]);
			}
			$(":text, textarea").result(log).next().click(function() {
				$(this).prev().search();
			});
			$(\'#descripcion\').ckeditor(config);
			$("#tipo").attr("checked",true);
			$("#url_imagen").bind(\'click\', function(){
                BrowseServer( \'Images:/\', \'url_imagen\' );
            })
		});
    </script>
'; ?>

<h2 id="adm-titulo">Puntos de Venta</h2>
    <div id="adm-vista" class="near-tabs">
    <h3 id="adm-subtitulo">AGREGAR PUNTO DE VENTAS</h3>
    <form class="registro" method="post" action="<?php echo $this->_tpl_vars['baseRoot']; ?>
/ventas/local/guardar">
        <div style="margin-top:20px;">
            <div>
            <table>
                <tr>
                    <td>Ubicaci&oacute;n:</td>
                    <td><input type="text" id="singleBirdRemote" /><input type="hidden" id="key" value="0" name="key"/></td>
                </tr>
                 <tr>
                    <td>T&iacute;tulo:</td>
                    <td><input type="text" id="titulo" name="titulo"/></td>
                </tr>
                 <tr>
                    <td>Descripci&oacute;n:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><textarea cols="80" rows="24" id="descripcion" name="descripcion"></textarea></td>
                </tr>
                <tr>
                    <td>Imagen:</td>
                    <td><input type="text" id="url_imagen" name="url_imagen"/></td>
                </tr>
                <tr>
                    <td>Tipo de local:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><input name="tipo" type="radio" value="1" id="tipo"/>&nbsp;Tienda<br /><input name="tipo" type="radio" value="0" />&nbsp;Centro Comercial</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="boton" type="submit" value="Agregar" /><br /><br /></td>
                </tr>
                </table>
            </div>
        </div>
        
    </form>
       <br /><br />
     <table id="grid"></table>
</div>
<?php echo '
	<script type="text/javascript">        
        $("#grid").flexigrid ( {
            url:\''; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
/ventas/local/cargar-grid/<?php echo '\',
            dataType: \'json\',
            colModel : [
                {display: \'Ubicacion\', name : \'ul.nombre\', width : 120, sortable : false, align: \'left\'},
				{display: \'Local\', name : \'l.titulo\', width : 150, sortable : false, align: \'left\'},
				{display: \'Tipo\', name : \'tipo\', width : 150, sortable : false, align: \'left\'},
				{display: \'\', name : \'\', width : 20, sortable : false, align: \'left\'},				
            ],
            buttons :[
					//{name: \'Nuevo\', bclass: \'add\', onpress : accion},
					{name: \'Eliminar\', bclass: \'delete\', onpress : accion},
				],
            sortname: "l.id",
            sortorder: "asc",
            usepager: true,
            title: \'LISTA DE PUNTOS DE VENTAS\',
            useRp: true,
            rp: 10,
            onSubmit: addFormData,
            showTableToggleBtn: true,
            width: 672,
            height: 190
        });


		function sortAlpha(com){
			jQuery(\'#grid\').flexOptions({newp:1, params:[{name:\'letter_pressed\', value: com},{name:\'qtype\',value:$(\'select[name=qtype]\').val()}]});
			jQuery("#grid").flexReload();
		}

        function addFormData() {
            var dt = $(\'#form\').serializeArray();
            $("#grid").flexOptions({params: dt});
            return true;
        }
        $(\'#form\').submit (
            function () {
                $(\'#grid\').flexOptions({newp: 1}).flexReload();
                return false;
            }
        );

        function accion(com,grid) {
			if (com == \'Nuevo\') {
				window.location = \''; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
<?php echo '/programa/producto/nuevo\';
			}

			if (com == \'Eliminar\') {
				if($(\'.trSelected\',grid).length == 0){
					jAlert(\'Debe seleccionar por lo menos un Local\', \'Eliminar Local\');
				} else {
					jConfirm(\'Confirme si desea eliminar\', \'Eliminar Local\', function(r) {
						if (r == true) {
							var items = $(\'.trSelected\',grid);
							var itemsLista = \'\';
							var coma = false;

							for(i=0;i<items.length;i++){
								if (coma == true) {
									itemsLista += \',\';
								}
								itemsLista += items[i].id.substr(3);
								coma = true;
							}

							$.ajax({
								url: "'; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
<?php echo '/ventas/local/eliminar-varios/id/" + itemsLista,
								//url: "'; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
<?php echo '/programa/ajax/eliminar-destino/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != \'\') {
										jAlert(\'No se puede eliminar,Verifique la informaci&oacute;n\', \'Confirmacion\');
									} else {
										jAlert(\'Local Eliminados con exito\', \'Confirmacion\', function(){
											jQuery("#grid").flexReload();
										});
									}
								}
							});
						}
					});
				}
			}
		}
        '; ?>
<?php echo $_SESSION['alerta']; ?>
<?php echo ';
</script>
'; ?>


</div>