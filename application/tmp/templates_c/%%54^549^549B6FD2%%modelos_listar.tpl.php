<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from modelos_listar.tpl */ ?>
<h2 id="adm-titulo"><?php echo $this->_tpl_vars['producto']->nombre; ?>
 - Modelos</h2>
<div id="adm-vista">
    <form id="form" class="buscar">
        
    </form>
    <table id="grid"></table>
</div>
<?php echo '
<script type="text/javascript">        
        $("#grid").flexigrid ( {
             url:\''; ?>
<?php echo $this->_tpl_vars['baseRoot']; ?>
/productos/modelos/cargar-grid/producto_id/<?php echo $this->_tpl_vars['producto']->id; ?>
<?php echo '\',
            dataType: \'json\',
            colModel : [
                {display: \'Nombre\', name : \'m.nombre\', width : 80, sortable : false, align: \'left\'},
                {display: \'Estado\', name : \'m.estado\', width : 80, sortable : false, align: \'left\'},
                {display: \'\', name : \'\', width : 20, sortable : false, align: \'right\'},
                {display: \'\', name : \'\', width : 20, sortable : false, align: \'right\'},
            ],
            buttons :[
					{name: \'Nuevo\', bclass: \'add\', onpress : accion},
					{name: \'Eliminar\', bclass: \'delete\', onpress : accion},
				],
            sortname: "m.id",
            sortorder: "asc",
            usepager: true,
            title: \'LISTA DE MODELOS DE '; ?>
<?php echo $this->_tpl_vars['producto']->nombre; ?>
<?php echo '\',
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
/productos/modelos/nuevo/producto_id/<?php echo $this->_tpl_vars['producto']->id; ?>
<?php echo '\';
			}

			if (com == \'Eliminar\') {
				if($(\'.trSelected\',grid).length == 0){
					jAlert(\'Debe seleccionar por lo menos un modelo\', \'Eliminar Modelo\');
				} else {
					jConfirm(\'Confirme si desea eliminar\', \'Eliminar Modelo\', function(r) {
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
<?php echo '/productos/modelos/eliminar-varios/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != \'\') {
										jAlert(respuesta, \'Confirmacion\');
									} else {
										jAlert(\'Modelos Eliminados con exito\', \'Confirmacion\', function(){
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
