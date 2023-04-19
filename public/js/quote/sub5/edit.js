$(document).ready(function() {

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
