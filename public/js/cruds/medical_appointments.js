columnsDataTable = [
    {data: 'date'},
    {data: 'start'},
    {data: 'professional.professional_specialty.name'},
    {data: 'professional.person.full_name'},
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
    if (column === 6) {

    } else if (column === 4) {
        return (
            '<a href="javascript:" onclick="delete(' + value + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-danger" title="Eliminar">' +
            '<i class="fa fa-trash-alt"></i>' +
            '</a>'
        );
    }
}
