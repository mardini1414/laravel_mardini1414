<script>
    $(document).ready(function () {

        let baseUrl = "/pasien";

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        function loadPasien(rumahSakitId = "") {
            $.ajax({
                url: baseUrl,
                data: {
                    rumahSakit: rumahSakitId
                },
                success: function (data) {
                    $('#pasien-table').empty();
                    $.each(data, function (i, pasien) {
                        $('#pasien-table').append(`
         <tr>
            <th>${pasien.id}</th>
            <td>${pasien.nama}</td>
            <td>${pasien.alamat}</td>
            <td>${pasien.rumah_sakit.nama}</td>
            <td>${pasien.telepon}</td>
            <td>
             <button type="button" class="btn btn-sm btn-success edit-btn"
                data-id="${pasien.id}"
                data-nama="${pasien.nama}"
                data-alamat="${pasien.alamat}"
                data-rumah-sakit-id="${pasien.rumah_sakit.id}"
                data-telepon="${pasien.telepon}"
                data-bs-toggle="modal" data-bs-target="#update-pasien-modal">Edit</button>
            <button  data-id="${pasien.id}" type="button" class="btn btn-sm btn-danger delete-btn">Hapus</button>
            </td>
         </tr>
                `);
                    });
                }
            });
        }

        loadPasien()

        $("#rumah-sakit-filter").on('change', function () {
            let selectedId = $(this).val();
            loadPasien(selectedId)
        });

        function createPasien() {
            const payload = {
                nama: $('#nama').val(),
                rumah_sakit: $('#rumah-sakit-select-create').val(),
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
                    loadPasien()
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

        function updatePasien() {
            const id = $('#id-update').val()
            const payload = {
                nama: $('#nama-update').val(),
                rumah_sakit: $('#rumah-sakit-select-update').val(),
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

        function deletePasien(id) {
            $.ajax({
                url: `${baseUrl}/${id}`,
                method: 'DELETE',
                success: () => {
                    Swal.fire({
                        title: "Success menghapus pasien",
                        icon: "success"
                    });
                    loadPasien()
                },
                error: function (xhr) {
                    Swal.fire({
                        title: 'Gagal menghapus pasien',
                        icon: 'error'
                    })
                }
            })
        }

        function resetCreateForm() {
            $('#nama').val('')
            $('#rumah-sakit-select-create').val('')
            $('#telepon').val('')
            $('#alamat').val('')
        }

        function resetCreateModal() {
            $('#error-create').parent('div').addClass('d-none');
            $('#success-create').addClass('d-none')
            resetCreateForm()
        }

        $('#create-pasien-button').on('click', createPasien)
        $('#create-pasien-modal').on('hide.bs.modal', resetCreateModal)

        $(document).on('click', '.edit-btn', function () {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const alamat = $(this).data('alamat');
            const rumahSakit = $(this).data('rumah-sakit-id');
            const telepon = $(this).data('telepon');

            $('#id-update').val(id);
            $('#nama-update').val(nama);
            $('#alamat-update').val(alamat);
            $('#rumah-sakit-select-update').val(rumahSakit);
            $('#telepon-update').val(telepon);
        });

        function resetUpdateModal() {
            $('#error-update').parent('div').addClass('d-none');
            $('#success-update').addClass('d-none')
        }

        $('#update-pasien-button').on('click', updatePasien)
        $('#update-pasien-modal').on('hide.bs.modal', resetUpdateModal)

        $(document).on('click', '.delete-btn', function () {
            const id = $(this).data('id');
            deletePasien(id)
        });

    })
</script>