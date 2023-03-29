$(document).ready(function() {
    var printMethodStr = $('[name=printMethod]').val();
    //console.log(printMethodStr.split(','));
    $('[name=printMethodSelect]').selectize({
        'sortField' : {
            'field' : 'text',
            'direction' : 'asc'
        }
    });
    $('[name=printMethodSelect]')[0].selectize.setValue(printMethodStr.split(','));

    var craftMethodStr = $('[name=craftMethod]').val();
    $('[name=craftMethodSelect]').selectize({
        'maxItems' : 3,
        'sortField' : {
            'field' : 'text',
            'direction' : 'asc'
        }
    });
    $('[name=craftMethodSelect]')[0].selectize.setValue(craftMethodStr.split(','));

    $('.form1').submit(function() {
        $('[name=printMethod]').val($('[name=printMethodSelect]').val().join(','));
        $('[name=craftMethod]').val($('[name=craftMethodSelect]').val().join(','));
    });
});
