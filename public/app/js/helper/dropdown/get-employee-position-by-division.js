$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('#selectEmployeeDivision').on('change', function() {
        let selectedValue = $(this).val();
        let url = $("input[name=route_api_private_helper_dropdown_get_employee_position_by_division]").val();
        let fullUrl = url.replace("xxx", selectedValue);
        $.ajax({
            url: fullUrl,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Clear the options in dropdown2
                $('#selectEmployeePosition').empty();

                // Add the new options to dropdown2
                var data = response.data;
                $.each(data, function(key, value) {
                    $('#selectEmployeePosition').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    });
});
