columnsDataTable = [
    {data: 'start_table'},
    {data: 'end_table'},
    {data: 'patient.full_name'},
    {data: 'translated_state', searchable: false, className: 'dt-center', customValue: true},
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
        return '<span class="m-badge m-badge--' + value.class + ' m-badge--wide">' + value.state + '</span>';
    } else if (column === 4) {
        const dropdown = (
            '<span class="dropdown">' +
            '<a href="javascript:" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">' +
            '<i class="la la-ellipsis-h"></i>' +
            '</a>' +
            '<div class="dropdown-menu dropdown-menu-right">' +
            '<a class="dropdown-item" href="' + crud + '/' + value['id'] + '/medicines">Administración de Medicamentos</a>' +
            '<a class="dropdown-item" href="' + crud + '/' + value['id'] + '/supplies">Control de Insumos</a>' +
            '<a class="dropdown-item" href="' + crud + '/' + value['id'] + '/fluids">Control de Líquidos</a>' +
            '<a class="dropdown-item" href="' + crud + '/' + value['id'] + '/vital_signs">Control de Signos Vitales</a>' +
            '<a class="dropdown-item" href="' + crud + '/' + value['id'] + '/cures">Evolución de Curaciones</a>' +
            '<a class="dropdown-item" href="' + crud + '/' + value['id'] + '/notes">Notas de Enfermería</a>' +
            '</div>' +
            '</span>'
        );

        if (value['cancel']) return (
            '<a onclick="state(' + value.id + ',\'CANCELADO\')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-danger" title="Cancelar">' +
            '<i class="fa fa-window-close"></i>' +
            '</a>'
        );
        else if (value['state'] === 'CANCELADO') return null;
        else return dropdown;
    }
}