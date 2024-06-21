@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-2" style="margin-top: -15px;">
            <p>
                    <h3>Tambah Author</h3>    
                    Tambah daftar author buku di Ark Librum, ikuti sesuai instruksi pengisian
            </p>
        </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <form action="simpan-author" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nama Author</label>
                <input type="text" class="form-control" name="name" placeholder="Harus diisi">
            </div>
            <div class="form-group">
                <label for="desc">Detail & Deskripsi Author</label>
                <textarea class="form-control" name="desc" rows="3" placeholder="Harus diisi, silahkan isi dengan data-data yang berkaitan dengan Author"></textarea>
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Author</button>
            </div>
        </form>
    </div>
  </main>

@endsection