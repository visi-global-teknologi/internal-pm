$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#employee-level-datatable").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: $("input[name=route_api_private_datatable_employee_level]").val(),
            error: function (xhr, error, code) {
                var err = eval("(" + xhr.responseText + ")");
                Swal.fire({
                    html: "<strong>Oops!</strong> " + err.header.success_message,
                });
            },
        },
        columns: [
            { data: "name", name: "name" },
            { data: "active_status", name: "active_status" },
            {
                data: "column_action",
                orderable: false
            }
        ],
    });

    $("#employee-level-datatable tbody").on("click", ".btn-danger", function () {
        let url = $(this).data("url")
        softDelete(url)
    })

    function softDelete(url) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Menghapus Data ini',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            customClass: {
                cancelButton: 'btn btn-light waves-effect',
                confirmButton: 'btn btn-primary waves-effect waves-light'
            },
            preConfirm: (e) => {
                return new Promise((resolve) => {
                    setTimeout(() => {
                        resolve();
                    }, 50);
                });
            }
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    success: function (response) {
                        Swal.fire("Berhasil!", response.success_message, "success");
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        Swal.fire({
                            html: "<strong>Oops!</strong> " + err.error_message,
                        });
                    }
                })
            }
        })
    }
});
