<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from productos_listar.tpl */ ?>
<h2 id="adm-titulo">Productos</h2>
<div id="adm-vista">
    <form id="form" class="buscar">
    <div style="padding:15px">
        <table align="left">
         	<tr>
                <td class="label">Producto:</td>
                <td><input type="text" class="text" name="p$nombre" />&nbsp;&nbsp;&nbsp;<input class="boton" type="submit" value="BUSCAR" /></td>
            </tr>
             <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
    </form>
    <table id="grid"></table>
</div>
<?php echo '
	<script type="text/javascript">        
        $("#grid").flexigrid ( {
            url:\''; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/productos/cargar-grid<?php echo '\',
            dataType: \'json\',
            colModel : [
                {display: \'Producto\', name : \'p.nombre\', width : 150, sortable : false, align: \'left\'},
                {display: \'\', name : \'\', width : 20, sortable : false, align: \'right\'},
                {display: \'\', name : \'\', width : 20, sortable : false, align: \'right\'},
                {display: \'\', name : \'\', width : 20, sortable : false, align: \'right\'},
            ],
            buttons :[
					{name: \'Nuevo\', bclass: \'add\', onpress : accion},
					{name: \'Eliminar\', bclass: \'delete\', onpress : accion},
				],
            sortname: "p.id",
            sortorder: "desc",
            usepager: true,
            title: \'LISTA DE PRODUCTOS\',
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
<?php echo '/productos/productos/nuevo\';
			}

			if (com == \'Eliminar\') {
				if($(\'.trSelected\',grid).length == 0){
					jAlert(\'Debe seleccionar por lo menos un Producto\', \'Eliminar Producto\');
				} else {
					jConfirm(\'Confirme si desea eliminar\', \'Eliminar Producto\', function(r) {
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
<?php echo '/productos/productos/eliminar-varios/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != \'\') {
										jAlert(respuesta, \'Confirmacion\');
									} else {
										jAlert(\'Producto Eliminados con exito\', \'Confirmacion\', function(){
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
