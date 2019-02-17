columnsDataTable = [
    {data: 'picture', searchable: false, className: 'dt-center', customValue: true},
    {data: 'document'},
    {data: 'full_name'},
    {data: 'active', className: 'dt-center', customValue: true},
    {data: 'actions', searchable: false, className: 'dt-center', customValue: true},
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
    if (column === 0) {
        return '<img width="35" height="35" src="' + value + '" class="m--img-rounded m--marginless" alt="Picture">';
    } else if (column === 3) {
        return value ? '<i class="fa fa-check-square m--font-success"></i>' : '<i class="fa fa-window-close m--font-danger"></i>'
    } else if (column === 4) {
        return (
            '<a href="' + crud + '/' + value.id + '/turns" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-brand" title="Turnos">' +
                '<i class="fa fa fa-notes-medical"></i>' +
            '</a>' +
            '<a href="javascript:" onclick="active(' + value.id + ',' + value.active + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-' + (value.active ? 'success' : 'danger') + '" title="' + (value.active ? 'Activar' : 'Desactivar') + '">' +
                '<i class="fa ' + (value.active ? 'fa-check-square' : 'fa-window-close') + '"></i>' +
            '</a>'
        );
    }
}
