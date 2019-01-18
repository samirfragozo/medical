columnsDataTable = [
    {data: 'person.picture', searchable: false, className: 'dt-center', customValue: true},
    {data: 'person.document'},
    {data: 'person.full_name'},
    {data: 'professional_specialty.professional_type.name'},
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
    } else if (column === 4) {
        return value ? '<i class="fa fa-check-square m--font-success"></i>' : '<i class="fa fa-window-close m--font-danger"></i>'
    } else if (column === 5) {
        return (
            '<a href="javascript:" onclick="active(' + value.id + ',' + value.active + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-' + (value.active ? 'warning' : 'success') + '" title="' + (value.active ? 'Desactivar' : 'Activar') + '">' +
            '<i class="fa fa-shopping-basket"></i>' +
            '</a>' +
            '<a href="javascript:" onclick="delete(' + value.id + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-danger" title="Eliminar">' +
            '<i class="fa fa-trash-alt"></i>' +
            '</a>'
        );
    }
}
