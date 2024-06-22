@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-2" style="margin-top: -15px;">
            <p>
                    <h3>Tambah Pinjaman</h3>    
                    Tambah daftar pinjam buku di Ark Librum, ikuti sesuai instruksi pengisian
            </p>
        </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <form action="pinjam-simpan" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="id">ID Pengguna</label>
                <input type="text" class="form-control" name="id" placeholder="Harus diisi sesuai ID pengguna">
            </div>
            <div class="form-group">
                <label for="bookID">ID Buku</label>
                <input type="text" class="form-control" name="bookID" placeholder="Harus diisi sesuai ID buku tersedia">
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Pinjam</button>
            </div>
        </form>
    </div>
  </main>

@endsection