<script type="text/javascript">
    $(function () {
        $('.table').footable(
            {
                "paging": {
                    "enabled": true,
                    "container": "#paging-ui-container",
                    "countFormat": "Página {CP} de {TP}",
                    "limit": 3
                },
                "sorting": {
                    "enabled": true
                },
                "filtering": {
                    "enabled": true
                }
            }
        );

        $(".excelexport").on("click", function (e) {
            var filename = "filename.csv";
            var csv = FooTable.get('#table-edit').toCSV(true);
            var blob = new Blob([ csv ], {
                type : "application/csv;charset=utf-8;"
            });
            if (window.navigator.msSaveBlob) {
                // FOR IE BROWSER
                navigator.msSaveBlob(blob, filename);
            } else {
                // FOR OTHER BROWSERS
                var link = document.createElement("a");
                var csvUrl = URL.createObjectURL(blob);
                link.href = csvUrl;
                link.style = "visibility:hidden";
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        });

    });
</script>
