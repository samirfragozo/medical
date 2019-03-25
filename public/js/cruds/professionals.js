columnsDataTable = [
    {data: 'document'},
    {data: 'full_name'},
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
    if (column === 3) {
        return value ? '<i class="fa fa-check-square m--font-success"></i>' : '<i class="fa fa-window-close m--font-danger"></i>'
    } else if (column === 4) {
        return (
            '<a href="' + crud + '/' + value.id + '/medical_appointments" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-brand" title="Citas Médicas">' +
                '<i class="fa fa fa-briefcase-medical"></i>' +
            '</a>' +
            '<a href="javascript:" onclick="active(' + value.id + ',' + value.active + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-' + (value.active ? 'success' : 'danger') + '" title="' + (value.active ? 'Activar' : 'Desactivar') + '">' +
                '<i class="fa ' + (value.active ? 'fa-check-square' : 'fa-window-close') + '"></i>' +
            '</a>'
        );
    }
}
