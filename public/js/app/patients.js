columnsDataTable = [
    {data: 'document'},
    {data: 'name'},
    {data: 'last_name'},
    {data: 'sex'},
    {data: 'social_security_entity.name'},
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
    if (column === 5) {
        return (
            '<span class="dropdown">' +
                '<a href="javascript:" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">' +
                    '<i class="la la-ellipsis-h"></i>' +
                '</a>' +
                '<div class="dropdown-menu dropdown-menu-right">' +
                    '<a class="dropdown-item" href="' + crud + '/' + value + '/turns"><i class="fa fa-notes-medical"></i> Turnos</a>' +
                    '<a class="dropdown-item" href="' + crud + '/' + value + '/medical_appointments"><i class="fa fa-briefcase-medical"></i> Citas Médicas</a>' +
                    '<a class="dropdown-item" href="' + crud + '/' + value + '/relatives"><i class="fa fa-users"></i> Familiares</a>' +
                '</div>' +
            '</span>'
        );
    }
}
