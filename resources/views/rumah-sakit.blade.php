@extends('components.layout')
@section('content')
    @include('components.navbar')
    <div>
        <h1>Data rumah sakit</h1>
        <button class="btn btn-primary my-2" data-bs-toggle="modal"
            data-bs-target="#create-rumah-sakit-modal">Tambah</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Rumah Sakit</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody id="rumah-sakit-table">

        </tbody>
    </table>
    <x-create-rumah-sakit-modal title="Tambah Rumah Sakit"></x-create-rumah-sakit-modal>
    <x-update-rumah-sakit-modal title="Update Rumah Sakit"></x-update-rumah-sakit-modal>
    @include('scripts.rumah-sakit-script')
@endsection