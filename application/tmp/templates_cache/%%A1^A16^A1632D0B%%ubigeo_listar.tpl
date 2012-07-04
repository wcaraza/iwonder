131
a:4:{s:8:"template";a:1:{s:17:"ubigeo_listar.tpl";b:1;}s:9:"timestamp";i:1310404928;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}<h2 id="adm-titulo">
<a name="archivos" href="/admin/mantenimiento/ubigeo/listar/ubigeo_id/0">DESTINOS</a>
 </h2>
<div id="adm-vista">
    <form id="form" class="buscar">
    </form>
    <table id="grid"></table>
</div>

	<script type="text/javascript">        
        $("#grid").flexigrid ( {
            url:'/admin/mantenimiento/ubigeo/cargar-grid/ubigeo_id/0',
            dataType: 'json',
            colModel : [
                {display: 'Ubicaci&oacute;n', name : 'ul.nombre', width : 200, sortable : false, align: 'left'},
                {display: 'Editar', name : '', width : 40, sortable : false, align: 'left'},
				{display: 'Sub Ubicaci&oacute;n', name : '', width : 70, sortable : false, align: 'left'},
            ],
            buttons :[
					{name: 'Nuevo', bclass: 'add', onpress : accion},
					{name: 'Eliminar', bclass: 'delete', onpress : accion},
				],
            sortname: "u.id",
            sortorder: "asc",
            usepager: true,
            title: 'LISTA DE UBICACIONES GEOGRAFICAS',
            useRp: true,
            rp: 10,
            onSubmit: addFormData,
            showTableToggleBtn: true,
            width: 672,
            height: 190
        });


		function sortAlpha(com){
			jQuery('#grid').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[name=qtype]').val()}]});
			jQuery("#grid").flexReload();
		}

        function addFormData() {
            var dt = $('#form').serializeArray();
            $("#grid").flexOptions({params: dt});
            return true;
        }
        $('#form').submit (
            function () {
                $('#grid').flexOptions({newp: 1}).flexReload();
                return false;
            }
        );

        function accion(com,grid) {
			if (com == 'Nuevo') {
				window.location = '/admin/mantenimiento/ubigeo/nuevo/ubigeo_id/0';
			}

			if (com == 'Eliminar') {
				if($('.trSelected',grid).length == 0){
					jAlert('Debe seleccionar por lo menos un destino', 'Eliminar Destino');
				} else {
					jConfirm('Confirme si desea eliminar', 'Eliminar Destino', function(r) {
						if (r == true) {
							var items = $('.trSelected',grid);
							var itemsLista = '';
							var coma = false;

							for(i=0;i<items.length;i++){
								if (coma == true) {
									itemsLista += ',';
								}
								itemsLista += items[i].id.substr(3);
								coma = true;
							}

							$.ajax({
								url: "/admin/mantenimiento/ajax/eliminar-ubigeo/ubigeo_id/0/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != '') {
										jAlert(respuesta, 'Confirmacion');
									} else {
										jAlert('Destinos Eliminados con exito', 'Confirmacion', function(){
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
        ;
</script>
