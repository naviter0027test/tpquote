$(document).ready(function() {
    $('[name=memPermissionId]').selectize({
        'create' : false,
        'sortField' : {
            'field' : 'text',
            'direction' : 'asc'
        }
    });
});
