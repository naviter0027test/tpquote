$(document).ready(function() {

    if($('[name=purchaseFillDate]').val().trim() != '') {
        var purchaseFillDateTmp = $('[name=purchaseFillDate]').val().trim();
        console.log(purchaseFillDateTmp);
        $('[name=purchaseFillDateInput]').val(purchaseFillDateTmp.split(' ')[0]);
    }

    if($('[name=reviewFillDate]').val().trim() != '') {
        var reviewFillDateTmp = $('[name=reviewFillDate]').val().trim();
        console.log(reviewFillDateTmp);
        $('[name=reviewFillDateInput]').val(reviewFillDateTmp.split(' ')[0]);
    }

    $('.form1').submit(function() {
        var purchaseFillDate = $('[name=purchaseFillDateInput]').val();
        if(purchaseFillDate.trim() != '')
            $('[name=purchaseFillDate]').val(purchaseFillDate+ " 00:00:00");

        var reviewFillDate = $('[name=reviewFillDateInput]').val();
        if(reviewFillDate.trim() != '')
            $('[name=reviewFillDate]').val(reviewFillDate+ " 00:00:00");
    });
});
