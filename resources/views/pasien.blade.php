@extends('components.layout')
@section('content')
    @include('components.navbar')
    <div>
        <h1>Data Pasien</h1>
        <div class="my-2 d-flex justify-content-between">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-pasien-modal">Tambah</button>
            <div style="min-width: min-content;">
                <x-rumah-sakit-select name="rumah-sakit-filter" selected=""></x-rumah-sakit-select>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Alamat</th>
                <th scope="col">Rumah Sakit</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="pasien-table">

        </tbody>
    </table>
    <x-create-pasien-modal title="Tambah Pasien"></x-create-pasien-modal>
    <x-update-pasien-modal title="Update Pasien"></x-update-pasien-modal>
    @include('scripts.pasien-script')
@endsection