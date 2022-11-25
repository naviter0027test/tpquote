$(document).ready(function() {
    $('.form1').validate({
        rules: {
            oldPass: "required",
            pass: "required",
            passConfirm:
            {
                required: true,
                equalTo: "#pass"
            }
        }
    });
});
