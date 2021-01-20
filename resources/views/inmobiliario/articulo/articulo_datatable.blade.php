<script type="text/javascript">

    /* Custom filtering function which will search data in column four between two values */
    $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            var min = parseInt( $('#min').val(), 10 );
            var max = parseInt( $('#max').val(), 10 );
            var age = parseFloat( data[3] ) || 0; // use data for the age column

            if ( ( isNaN( min ) && isNaN( max ) ) ||
                ( isNaN( min ) && age <= max ) ||
                ( min <= age   && isNaN( max ) ) ||
                ( min <= age   && age <= max ) )
            {
                return true;
            }
            return false;
        }
    );

    $(document).ready( function () {
        $('.table').DataTable({
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
        });
    } );
</script>
