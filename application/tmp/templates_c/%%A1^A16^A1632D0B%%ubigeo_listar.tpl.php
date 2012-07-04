<?php /* Smarty version 2.6.26, created on *strftime("%Y-%m-%d %H:%M:%S")
         compiled from ubigeo_listar.tpl */ ?>
<h2 id="adm-titulo">
<a name="archivos" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/mantenimiento/ubigeo/listar/ubigeo_id/0">DESTINOS</a>
<?php if ($this->_tpl_vars['ubigeo_padre']->nombre): ?><img src="../../../../img/next.png" /><a name="archivos" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/mantenimiento/ubigeo/listar/ubigeo_id/<?php echo $this->_tpl_vars['ubigeo_padre']->id; ?>
">  <?php echo $this->_tpl_vars['ubigeo_padre']->nombre; ?>
</a><?php endif; ?>
<?php if ($this->_tpl_vars['ubigeo']->nombre): ?> <img src="../../../../img/next.png" /> <a name="archivos" href="<?php echo $this->_tpl_vars['baseRoot']; ?>
/mantenimiento/ubigeo/listar/ubigeo_id/<?php echo $this->_tpl_vars['ubigeo']->id; ?>
"><?php echo $this->_tpl_vars['ubigeo']->nombre; ?>
</a> <?php endif; ?> </h2>
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
/mantenimiento/ubigeo/cargar-grid/ubigeo_id/<?php echo $this->_tpl_vars['ubigeo_id']; ?>
<?php echo '\',
            dataType: \'json\',
            colModel : [
                {display: \'Ubicaci&oacute;n\', name : \'ul.nombre\', width : 200, sortable : false, align: \'left\'},
                {display: \'Editar\', name : \'\', width : 40, sortable : false, align: \'left\'},
				{display: \'Sub Ubicaci&oacute;n\', name : \'\', width : 70, sortable : false, align: \'left\'},
            ],
            buttons :[
					{name: \'Nuevo\', bclass: \'add\', onpress : accion},
					{name: \'Eliminar\', bclass: \'delete\', onpress : accion},
				],
            sortname: "u.id",
            sortorder: "asc",
            usepager: true,
            title: \'LISTA DE UBICACIONES GEOGRAFICAS\',
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
<?php echo '/mantenimiento/ubigeo/nuevo/ubigeo_id/'; ?>
<?php echo $this->_tpl_vars['ubigeo_id']; ?>
<?php echo '\';
			}

			if (com == \'Eliminar\') {
				if($(\'.trSelected\',grid).length == 0){
					jAlert(\'Debe seleccionar por lo menos un destino\', \'Eliminar Destino\');
				} else {
					jConfirm(\'Confirme si desea eliminar\', \'Eliminar Destino\', function(r) {
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
<?php echo '/mantenimiento/ajax/eliminar-ubigeo/ubigeo_id/'; ?>
<?php echo $this->_tpl_vars['ubigeo_id']; ?>
<?php echo '/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != \'\') {
										jAlert(respuesta, \'Confirmacion\');
									} else {
										jAlert(\'Destinos Eliminados con exito\', \'Confirmacion\', function(){
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
