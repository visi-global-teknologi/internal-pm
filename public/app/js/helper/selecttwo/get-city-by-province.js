$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('#selectTwoIndonesiaProvince').on('change', function() {
        var provinceCode = $(this).val();
        $('#selectTwoIndonesiaCity').empty();
        let url = $("input[name=route_api_private_helper_selecttwo_get_indonesia_city_by_province]").val();
        let fullUrl = url.replace('xxx', provinceCode);
        $.ajax({
            url: fullUrl,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let data = response.data
                $("#selectTwoIndonesiaCity").select2({
                    data: data.results
                })
            }
        });
    });
});
