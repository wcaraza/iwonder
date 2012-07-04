132
a:4:{s:8:"template";a:1:{s:18:"modelos_listar.tpl";b:1;}s:9:"timestamp";i:1309278621;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}<h2 id="adm-titulo">MOCHILAS - Modelos</h2>
<div id="adm-vista">
    <form id="form" class="buscar">
        
    </form>
    <table id="grid"></table>
</div>

<script type="text/javascript">        
        $("#grid").flexigrid ( {
             url:'/admin/productos/modelos/cargar-grid/producto_id/1',
            dataType: 'json',
            colModel : [
                {display: 'Nombre', name : 'm.nombre', width : 80, sortable : false, align: 'left'},
                {display: 'Estado', name : 'm.estado', width : 80, sortable : false, align: 'left'},
                {display: '', name : '', width : 20, sortable : false, align: 'right'},
                {display: '', name : '', width : 20, sortable : false, align: 'right'},
            ],
            buttons :[
					{name: 'Nuevo', bclass: 'add', onpress : accion},
					{name: 'Eliminar', bclass: 'delete', onpress : accion},
				],
            sortname: "m.id",
            sortorder: "asc",
            usepager: true,
            title: 'LISTA DE MODELOS DE MOCHILAS',
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
				window.location = '/admin/productos/modelos/nuevo/producto_id/1';
			}

			if (com == 'Eliminar') {
				if($('.trSelected',grid).length == 0){
					jAlert('Debe seleccionar por lo menos un modelo', 'Eliminar Modelo');
				} else {
					jConfirm('Confirme si desea eliminar', 'Eliminar Modelo', function(r) {
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
								url: "/admin/productos/modelos/eliminar-varios/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != '') {
										jAlert(respuesta, 'Confirmacion');
									} else {
										jAlert('Modelos Eliminados con exito', 'Confirmacion', function(){
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
