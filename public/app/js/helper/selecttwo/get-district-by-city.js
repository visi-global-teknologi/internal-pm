$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('#selectTwoIndonesiaCity').on('change', function() {
        var cityCode = $(this).val();
        $('#selectTwoIndonesiaDistrict').empty();
        let url = $("input[name=route_api_private_helper_selecttwo_get_indonesia_district_by_city]").val();
        let fullUrl = url.replace('xxx', cityCode);
        $.ajax({
            url: fullUrl,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let data = response.data
                $("#selectTwoIndonesiaDistrict").select2({
                    data: data.results
                })
            }
        });
    });
});
