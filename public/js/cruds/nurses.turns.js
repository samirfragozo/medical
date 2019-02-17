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
        let actions = '';

        if (value.cancel) {
            actions =
                '<a onclick="state(' + value.id + ',\'CANCELADA\')" class="m-portlet__nav-link btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--hover-danger" title="Cancelar">' +
                '<i class="fa fa-window-close"></i>' +
                '</a>'
            ;
        }

        return actions;
    }
}