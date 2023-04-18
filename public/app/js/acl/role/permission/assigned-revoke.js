$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $('#permission-datatable tbody').on('change', 'input[type="checkbox"]', function() {
        if (this.checked) {
            let url = $(this).data("url")
            let dataKey = $(this).data("key")
            assignedRevoke(url, dataKey, 'unchecked')
        } else {
            let url = $(this).data("url")
            let dataKey = $(this).data("key")
            assignedRevoke(url, dataKey, 'checked')
        }
    })

    function assignedRevoke(url, dataKey, ev) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Melakukan proses ini',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Lanjutkan',
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
                    type: 'PUT',
                    url: url,
                    data: {
                        "uuid_user_encrypted": $("input[name=uuid_user_encrypted]").val()
                    },
                    success: function (response) {
                        Swal.fire("Berhasil!", response.success_message, "success");
                    },
                    error: function (xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        Swal.fire({
                            html: "<strong>Oops!</strong> " + err.error_message,
                        });
                    }
                })
            } else {
                var checkbox = $('input[type="checkbox"][data-key="' + dataKey + '"]');
                if ('checked' == ev) {
                    checkbox.prop('checked', true);
                } else {
                    checkbox.prop('checked', false);
                }
            }
        })
    }
});
