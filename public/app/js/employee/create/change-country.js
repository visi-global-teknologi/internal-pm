$(document).ready(function (e) {
    $('input[type="radio"][name="radioCountry"]').change(() => {
        if ($('input[type="radio"][name="radioCountry"]:checked').val() == "indonesia") {
            $('#other_address').hide();
            $("#textareaOtherAddress").val("");
            $('#indonesia_address').show();
        } else {
            $('#indonesia_address').hide();
            $("#textareaIndonesiaAddress").val("");
            $('#other_address').show();
        }
    });
});
