133
a:4:{s:8:"template";a:1:{s:19:"clientes_listar.tpl";b:1;}s:9:"timestamp";i:1309905771;s:7:"expires";i:-1;s:13:"cache_serials";a:0:{}}<h2 id="adm-titulo">CLIENTES</h2>
<div id="adm-vista">
     <form id="form" class="buscar">
        <div style="padding:15px">
        <table align="left">
         	<tr>
                <td class="label">Nombre:</td>
                <td><input type="text" class="text" name="c$nombres" />&nbsp;&nbsp;&nbsp;<input class="boton" type="submit" value="BUSCAR" /></td>
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

	<script type="text/javascript">
        $("#grid").flexigrid ( {
            url:'/admin/usuarios/clientes/cargar-grid',
            dataType: 'json',
            colModel : [
                {display: 'Nombres', name : 'c.nombres', width : 80, sortable : false, align: 'left'},
                {display: 'Apellidos', name : 'c.apellidos', width : 80, sortable : false, align: 'left'},
                {display: 'Email', name : 'c.email', width : 80, sortable : false, align: 'left'},
                {display: '', name : '', width : 20, sortable : false, align: 'right'},
                {display: '', name : '', width : 20, sortable : false, align: 'right'},
            ],
            buttons :[
					{name: 'Nuevo', bclass: 'add', onpress : accion},
					{name: 'Eliminar', bclass: 'delete', onpress : accion},
				],
            sortname: "c.id",
            sortorder: "asc",
            usepager: true,
            title: 'LISTA DE CLIENTES',
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
				window.location = '/admin/usuarios/clientes/nuevo';
			}

			if (com == 'Eliminar') {
				if($('.trSelected',grid).length == 0){
					jAlert('Debe seleccionar por lo menos un cliente', 'Eliminar Cliente');
				} else {
					jConfirm('Confirme si desea eliminar', 'Eliminar Clientes', function(r) {
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
								url: "/admin/usuarios/clientes/eliminar-varios/id/" + itemsLista,
								success: function(respuesta) {
									if (respuesta != '') {
										jAlert(respuesta, 'Confirmacion');
									} else {
										jAlert('Clientes Eliminados con exito', 'Confirmacion', function(){
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
