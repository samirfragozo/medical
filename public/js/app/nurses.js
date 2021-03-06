columnsDataTable = [
    {data: 'document'},
    {data: 'full_name'},
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
    if (column === 2) {
        return (
            '<a href="' + crud + '/' + value + '/turns" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-brand" title="Turnos">' +
                '<i class="fa fa fa-notes-medical"></i>' +
            '</a>'
        );
    }
}
