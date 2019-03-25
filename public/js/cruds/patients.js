columnsDataTable = [
    {data: 'document'},
    {data: 'full_name'},
    {data: 'social_security_entity.name'},
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
            '<span class="dropdown">' +
                '<a href="javascript:" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">' +
                    '<i class="la la-ellipsis-h"></i>' +
                '</a>' +
                '<div class="dropdown-menu dropdown-menu-right">' +
                    '<a class="dropdown-item" href="' + crud + '/' + value.id + '/turns"><i class="fa fa-notes-medical"></i> Turnos</a>' +
                    '<a class="dropdown-item" href="' + crud + '/' + value.id + '/medical_appointments"><i class="fa fa-briefcase-medical"></i> Citas Médicas</a>' +
                    '<a class="dropdown-item" href="' + crud + '/' + value.id + '/relatives"><i class="fa fa-users"></i> Familiares</a>' +
            '</div>' +
            '</span>' +
            '<a href="javascript:" onclick="active(' + value.id + ',' + value.active + ')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-' + (value.active ? 'success' : 'danger') + '" title="' + (value.active ? 'Activar' : 'Desactivar') + '">' +
                '<i class="fa ' + (value.active ? 'fa-check-square' : 'fa-window-close') + '"></i>' +
            '</a>'
        );
    }
}
