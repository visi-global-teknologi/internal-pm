$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#employee-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_employee]").val(),
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.header.success_message,
                });
            },
        },
        columns: [
            { data: "photo_url", name: "photo_url" },
            { data: "employee_number", name: "employee_number" },
            { data: "user.name", name: "user.name" },
            { data: "employee_position.employee_division.name", name: "employee_position.employee_division.name" },
            { data: "employee_position.name", name: "employee_position.name" },
            { data: "employee_level.name", name: "employee_level.name" },
            { data: "join_date_formatted", name: "join_date" },
            { data: "phone_number", name: "phone_number" },
            { data: "user.email", name: "user.email" },
            {
                data: "column_action",
                orderable: false
            }
        ],
    });
});
