$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#user-activity-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_user_activity]").val(),
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.header.success_message,
                });
            },
        },
        columns: [
            { data: "date_time_formatted", name: "date_time_formatted" },
            { data: "ip_address", name: "ip_address" },
            { data: "user_agent", name: "user_agent" },
            { data: "module_name", name: "module_name" },
            { data: "activity", name: "activity" },
            { data: "user_name", name: "user_name" }
        ],
    });
});
