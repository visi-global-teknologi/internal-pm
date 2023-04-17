$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('#selectTwoIndonesiaDistrict').on('change', function() {
        var cityCode = $(this).val();
        $('#selectTwoIndonesiaVillage').empty();
        let url = $("input[name=route_api_private_helper_selecttwo_get_indonesia_village_by_district]").val();
        let fullUrl = url.replace('xxx', cityCode);
        $.ajax({
            url: fullUrl,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                let data = response.data
                $("#selectTwoIndonesiaVillage").select2({
                    data: data.results
                })
            }
        });
    });
});
