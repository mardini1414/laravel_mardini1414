<script>
    $(document).ready(function () {

        let baseUrl = "/rumah-sakit";

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        function loadRumahSakit() {
            $.get(baseUrl, function (data) {
                $('#rumah-sakit-table').empty();
                $.each(data, function (i, rumahSakit) {
                    $('#rumah-sakit-table').append(`
         <tr>
            <th>${rumahSakit.id}</th>
            <td>${rumahSakit.nama}</td>
            <td>${rumahSakit.alamat}</td>
            <td>${rumahSakit.email}</td>
            <td>${rumahSakit.telepon}</td>
            <td>
             <button type="button" class="btn btn-sm btn-success edit-btn"
                data-id="${rumahSakit.id}"
                data-nama="${rumahSakit.nama}"
                data-alamat="${rumahSakit.alamat}"
                data-email="${rumahSakit.email}"
                data-telepon="${rumahSakit.telepon}"
                data-bs-toggle="modal" data-bs-target="#update-rumah-sakit-modal">Edit</button>
            <button  data-id="${rumahSakit.id}" type="button" class="btn btn-sm btn-danger delete-btn">Hapus</button>
            </td>
         </tr>
                `);
                });
            });
        }

        loadRumahSakit()

        function createRumahSakit() {
            const payload = {
                nama: $('#nama').val(),
                email: $('#email').val(),
                telepon: $('#telepon').val(),
                alamat: $('#alamat').val()
            }
            $.ajax({
                url: baseUrl,
                method: 'POST',
                data: payload,
                success: () => {
                    $('#error-create').empty();
                    $('#error-create').parent('div').addClass('d-none');
                    $('#success-create').removeClass('d-none')
                    resetCreateForm()
                    loadRumahSakit()
                },
                error: function (xhr) {
                    $('#error-create').parent('div').removeClass('d-none')
                    $('#success-create').addClass('d-none')
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#error-create').empty();
                        $.each(errors, function (key, msgs) {
                            msgs.forEach(msg => {
                                $('#error-create').append(`<li>${msg}</li>`)
                            });
                        });
                    } else {
                        $('#error-create').append(`<li>Terjadi kesalahan</li>`)
                    }
                }
            })
        }

        function updateRumahSakit() {
            const id = $('#id-update').val()
            const payload = {
                nama: $('#nama-update').val(),
                email: $('#email-update').val(),
                telepon: $('#telepon-update').val(),
                alamat: $('#alamat-update').val()
            }

            $.ajax({
                url: `${baseUrl}/${id}`,
                method: 'PUT',
                data: payload,
                success: () => {
                    $('#error-update').empty();
                    $('#error-update').parent('div').addClass('d-none');
                    $('#success-update').removeClass('d-none')
                    loadRumahSakit()
                },
                error: function (xhr) {
                    $('#error-update').parent('div').removeClass('d-none')
                    $('#success-update').addClass('d-none')
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        $('#error-update').empty();
                        $.each(errors, function (key, msgs) {
                            msgs.forEach(msg => {
                                $('#error-update').append(`<li>${msg}</li>`)
                            });
                        });
                    } else {
                        $('#error-update').append(`<li>Terjadi kesalahan</li>`)
                    }
                }
            })
        }

        function deleteRumahSakit(id) {
            $.ajax({
                url: `${baseUrl}/${id}`,
                method: 'DELETE',
                success: () => {
                    Swal.fire({
                        title: "Success menghapus rumah sakit",
                        icon: "success"
                    });
                    loadRumahSakit()
                },
                error: function (xhr) {
                    Swal.fire({
                        title: 'Gagal menghapus rumah sakit',
                        icon: 'error'
                    })
                }
            })
        }

        function resetCreateForm() {
            $('#nama').val('')
            $('#email').val('')
            $('#telepon').val('')
            $('#alamat').val('')
        }

        function resetCreateModal() {
            $('#error-create').parent('div').addClass('d-none');
            $('#success-create').addClass('d-none')
            resetCreateForm()
        }

        $('#create-rumah-sakit-button').on('click', createRumahSakit)
        $('#create-rumah-sakit-modal').on('hide.bs.modal', resetCreateModal)

        $(document).on('click', '.edit-btn', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const alamat = $(this).data('alamat');
            const email = $(this).data('email');
            const telepon = $(this).data('telepon');

            $('#id-update').val(id);
            $('#nama-update').val(nama);
            $('#alamat-update').val(alamat);
            $('#email-update').val(email);
            $('#telepon-update').val(telepon);
        });

        function resetUpdateModal() {
            $('#error-update').parent('div').addClass('d-none');
            $('#success-update').addClass('d-none')
        }

        $('#update-rumah-sakit-button').on('click', updateRumahSakit)
        $('#update-rumah-sakit-modal').on('hide.bs.modal', resetUpdateModal)

        $(document).on('click', '.delete-btn', function () {
            const id = $(this).data('id');
            deleteRumahSakit(id)
        });
    })
</script>