$(document).ready(function() {

    if($('[name=reviewFillDate]').val().trim() != '') {
        var reviewFillDateTmp = $('[name=reviewFillDate]').val().trim();
        console.log(reviewFillDateTmp);
        $('[name=reviewFillDateInput]').val(reviewFillDateTmp.split(' ')[0]);
    }

    if($('[name=reviewGeneralManagerFillDate]').val().trim() != '') {
        var reviewGeneralManagerFillDateTmp = $('[name=reviewGeneralManagerFillDate]').val().trim();
        console.log(reviewGeneralManagerFillDateTmp);
        $('[name=reviewGeneralManagerFillDateInput]').val(reviewGeneralManagerFillDateTmp.split(' ')[0]);
    }

    if($('[name=reviewFinalGeneralManagerFillDate]').val().trim() != '') {
        var reviewFinalGeneralManagerFillDateTmp = $('[name=reviewFinalGeneralManagerFillDate]').val().trim();
        console.log(reviewFinalGeneralManagerFillDateTmp);
        $('[name=reviewFinalGeneralManagerFillDateInput]').val(reviewFinalGeneralManagerFillDateTmp.split(' ')[0]);
    }

    $('.form1').submit(function() {
        var reviewFillDate = $('[name=reviewFillDateInput]').val();
        if(reviewFillDate.trim() != '')
            $('[name=reviewFillDate]').val(reviewFillDate+ " 00:00:00");

        var reviewGeneralManagerFillDate = $('[name=reviewGeneralManagerFillDateInput]').val();
        if(reviewGeneralManagerFillDate.trim() != '')
            $('[name=reviewGeneralManagerFillDate]').val(reviewGeneralManagerFillDate+ " 00:00:00");

        var reviewFinalGeneralManagerFillDate = $('[name=reviewFinalGeneralManagerFillDateInput]').val();
        if(reviewFinalGeneralManagerFillDate.trim() != '')
            $('[name=reviewFinalGeneralManagerFillDate]').val(reviewFinalGeneralManagerFillDate+ " 00:00:00");

    });
});
