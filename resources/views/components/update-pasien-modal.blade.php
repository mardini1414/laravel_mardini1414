<div class="modal fade" id="update-pasien-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger d-none" role="alert">
                    <ul id="error-update">

                    </ul>
                </div>
                <div id="success-update" class="alert alert-success d-none" role="alert">
                    Success mengubah pasien
                </div>
                <input type="hidden" class="form-control" id="id-update">
                <div class="mb-3">
                    <label for="nama-update" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama-update" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                    <label for="rumah-sakit-select-update" class="form-label">Rumah Sakit</label>
                    <x-rumah-sakit-select name="rumah-sakit-select-update" selected=""></x-rumah-sakit-select>
                </div>
                <div class="mb-3">
                    <label for="telepon-update" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon-update" placeholder="Masukkan nomor telepon">
                </div>
                <div class="mb-3">
                    <label for="alamat-update" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat-update" rows="3" placeholder="Masukkan alamat"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" id="update-pasien-button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>