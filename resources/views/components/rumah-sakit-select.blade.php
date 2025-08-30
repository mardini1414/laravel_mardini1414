<select name="{{ $name }}" id="{{ $name }}" class="form-control">
    <option value="">Loading...</option>
</select>

@push('scripts')
    <script>
        $(document).ready(function () {
            var select = $('#{{ $name }}');
            $.get("/rumah-sakit", function (data) {
                let options = '<option value="">-- Pilih --</option>';
                data.forEach(function (item) {
                    let selected = item.id == '{{ $selected }}' ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.nama}</option>`;
                });
                select.html(options);
            }).fail(function () {
                select.html('<option value="">Gagal memuat data</option>');
            });
        });
    </script>
@endpush