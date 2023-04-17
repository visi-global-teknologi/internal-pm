$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let fullUrl = $("input[name=route_api_private_helper_selecttwo_country_without_indonesia]").val();
    $.ajax({
        url: fullUrl,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            let data = response.data
            $("#selectTwoOtherCountry").select2({
                data: data.results
            })
        }
    });
});
