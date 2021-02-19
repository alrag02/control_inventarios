<script type="text/javascript">


    $(document).ready( function () {

        let $spanish  = {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar cualquier campo:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad",
                "collection": "Colección",
                "colvisRestore": "Restaurar visibilidad",
                "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                "copySuccess": {
                    "1": "Copiada 1 fila al portapapeles",
                    "_": "Copiadas %d fila al portapapeles"
                },
                "copyTitle": "Copiar al portapapeles",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todas las filas",
                    "1": "Mostrar 1 fila",
                    "_": "Mostrar %d filas"
                },
                "pdf": "PDF",
                "print": "Imprimir"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Rellene todas las celdas con <i>%d<\/i>",
                "fillHorizontal": "Rellenar celdas horizontalmente",
                "fillVertical": "Rellenar celdas verticalmentemente"
            },
            "decimal": ",",
            "searchBuilder": {
                "add": "Añadir condición",
                "button": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "clearAll": "Borrar todo",
                "condition": "Condición",
                "conditions": {
                    "date": {
                        "after": "Despues",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "No",
                        "notBetween": "No entre",
                        "notEmpty": "No Vacio"
                    },
                    "moment": {
                        "after": "Despues",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vacío",
                        "equals": "Igual a",
                        "not": "No",
                        "notBetween": "No entre",
                        "notEmpty": "No vacio"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vacio",
                        "equals": "Igual a",
                        "gt": "Mayor a",
                        "gte": "Mayor o igual a",
                        "lt": "Menor que",
                        "lte": "Menor o igual que",
                        "not": "No",
                        "notBetween": "No entre",
                        "notEmpty": "No vacío"
                    },
                    "string": {
                        "contains": "Contiene",
                        "empty": "Vacío",
                        "endsWith": "Termina en",
                        "equals": "Igual a",
                        "not": "No",
                        "notEmpty": "No Vacio",
                        "startsWith": "Empieza con"
                    }
                },
                "data": "Data",
                "deleteTitle": "Eliminar regla de filtrado",
                "leftTitle": "Criterios anulados",
                "logicAnd": "Y",
                "logicOr": "O",
                "rightTitle": "Criterios de sangría",
                "title": {
                    "0": "Constructor de búsqueda",
                    "_": "Constructor de búsqueda (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Borrar todo",
                "collapse": {
                    "0": "Paneles de búsqueda",
                    "_": "Paneles de búsqueda (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Sin paneles de búsqueda",
                "loadMessage": "Cargando paneles de búsqueda",
                "title": "Filtros Activos - %d"
            },
            "select": {
                "1": "%d fila seleccionada",
                "_": "%d filas seleccionadas",
                "cells": {
                    "1": "1 celda seleccionada",
                    "_": "$d celdas seleccionadas"
                },
                "columns": {
                    "1": "1 columna seleccionada",
                    "_": "%d columnas seleccionadas"
                }
            },
            "thousands": "."
        };


        $('#table-datatable').DataTable({
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            responsive: true,


            //Cambiar idioma
            language: $spanish,
        });

        $('#table-datatable-foto').DataTable({

            //Responsivo
            responsive: true,

            //Cambiar idioma
            language: $spanish,

            //Busqueda individual por menú desplegable
            initComplete: function () {
                this.api().columns('.col-search-select').every( function () {
                    let column = this;
                    let title = $(column.header()).text();
                    let select = $('<select class="form-select"><option selected disabled class="font-italic font-weight-bold">Buscar por ' + title + '</option><option class="font-italic" value="">Cualquier ' + title + '</option></select>')
                        .appendTo( ".div-search" )
                        .on( 'change', function () {
                            let val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^' + val + '$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="' + d + '">' + d + '</option>' )
                    } );
                } );
            }

        });


        $('#table-datatable-articulo').DataTable({
            //Mostrar números de registros
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],

            //Responsivo (Para evitar que la tabla se salga de la página)
            responsive: true,

            //Mostrar pantalla de carga
            "processing": true,
		

	"paging": true,

            //Configuración del tipo de documento
            dom: 'lBfrtip',

            //Botones para exportación
            buttons: [
                { extend: 'searchPanes', text: 'Búsqueda Avanzada'
                },
                //{ extend: 'csv', text: 'CSV' },
                { extend: 'excel', text: 'Exportar (.xlsx)',
                    exportOptions: {
                        columns: ':not(.not-export-col)'
                    }
                },
                { extend: 'pdf', text: 'Exportar (.pdf)', orientation: 'landscape',pageSize: 'LEGAL',
                    exportOptions: {
                        columns: ':not(.not-export-col)'
                    }
                },

            ],

            //Paneles de busqueda
            columnDefs: [
                {
                    searchPanes: {
                        show: true
                    },
                    targets: [3,4,5,6,7,8,9,10,11,12]
                },
            ],


            //Busqueda individual por menú desplegable


            initComplete: function () {
                this.api().columns('.col-search-type').every( function () {
                    let that = this;

                    let title = $(this.header()).text();

                    $( '<label>' + title + '</label>', this.header() ).appendTo(".div-search-table");
                    $( '<input class="form-control" type="text" placeholder="Search "/><br>', this.header() ).appendTo(".div-search-table").on( 'input', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } )
                });

                this.api().columns('.col-search-select').every( function () {
                    let column = this;
                    let title = $(column.header()).text();

                    $( '<label>' + title + '</label>', this.header() ).appendTo(".div-search-table");
                    let select = $('<select class="form-select"><option selected disabled class="font-italic font-weight-bold">Buscar por ' + title + '</option><option class="font-italic" value="">Cualquier ' + title + '</option></select><br>')
                        .appendTo( ".div-search-table" )
                        .on( 'change', function () {
                            let val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search( val ? '^' + val + '$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="' + d + '">' + d + '</option>' )
                    } );
                });
            },

            //Cambiar idioma
            language: $spanish,
        });

    } );
</script>
