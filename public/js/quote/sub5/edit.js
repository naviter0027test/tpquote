$(document).ready(function() {

    if($('[name=fillDate]').val().trim() != '') {
        var fillDateTmp = $('[name=fillDate]').val().trim();
        console.log(fillDateTmp);
        $('[name=fillDateInput]').val(fillDateTmp.split(' ')[0]);
    }
    if($('[name=devFillDate]').val().trim() != '') {
        var devFillDateTmp = $('[name=devFillDate]').val().trim();
        console.log(devFillDateTmp);
        $('[name=devFillDateInput]').val(devFillDateTmp.split(' ')[0]);
    }
    if($('[name=auditDate]').val().trim() != '') {
        var auditDateTmp = $('[name=auditDate]').val().trim();
        console.log(auditDateTmp);
        $('[name=auditDateInput]').val(auditDateTmp.split(' ')[0]);
    }

    $('.form1').submit(function() {
        var fillDate = $('[name=fillDateInput]').val();
        if(fillDate.trim() != '')
            $('[name=fillDate]').val(fillDate+ " 00:00:00");

        var devFillDate = $('[name=devFillDateInput]').val();
        if(devFillDate.trim() != '')
            $('[name=devFillDate]').val(devFillDate+ " 00:00:00");

        var auditDate = $('[name=auditDateInput]').val();
        if(auditDate.trim() != '')
            $('[name=auditDate]').val(auditDate+ " 00:00:00");
    });
});
