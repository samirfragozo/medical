columnsDataTable = [
    {data: 'document'},
    {data: 'full_name'},
    {data: 'relationship'},
    {data: 'cellphone'},
    {data: 'id', searchable: false, className: 'dt-center', customValue: true},
];

/**
 * Custom value for status column
 *
 * @param {Number} column - The column number, starting on zero.
 * @param {String} value - The custom value.
 *
 * @returns {String} The HTML string with the status
 */
function getStatus(column, value) {
    if (column === 4) {
        return (
            '<a href="javascript:" onclick="destroy(' + value + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-danger" title="Eliminar">' +
            '<i class="fa fa-trash-alt"></i>' +
            '</a>'
        );
    }
}

function destroy(id) {
    swal({
        title: '¿Esta seguro que desea eliminar este registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.value) {
            let url = routes['delete'].url.replace(':id', id);
            ajaxRequest(url, null, routes['delete'].method, createRow, tablePortlet);
        }
    });
}
