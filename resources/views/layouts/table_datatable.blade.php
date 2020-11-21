<script>
    const dataTable = new simpleDatatables.DataTable(".table", {
        searchable: true,
        labels: {
            placeholder: "Busque cualquier campo",
            perPage: "{select} entradas por página",
            noRows: "No se encontraron entradas",
            info: "Mostrando {start}-{end} de {rows} entradas",
        },
        sortable: true
    })
</script>
