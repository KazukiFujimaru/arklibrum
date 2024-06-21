@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
            <p>
                    <h3>Tambah Buku</h3>    
                    Tambah katalog buku Ark Librum, ikuti sesuai instruksi pengisian
            </p>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <form action="simpan-buku" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Judul Buku</label>
                <input type="text" class="form-control" name="title" placeholder="Harus diisi">
            </div>
            <div class="form-group">
                <label for="authorID">Author ID</label>
                <input type="number" class="form-control" name="authorID" placeholder="Data Author (authorID) harus sudah ada">
            </div>
            <div class="form-group">
                <label for="publisherID">Publisher ID</label>
                <input type="number" class="form-control" name="publisherID" placeholder="Data Publisher (publisherID) harus sudah ada">
            </div>
            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" name="ISBN" placeholder="Nomor ISBN tidak boleh sama">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" name="genre" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="language">Bahasa</label>
                <input type="text" class="form-control" name="language" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="year">Tahun Terbit</label>
                <input type="text" class="form-control" name="year" placeholder="Bisa dikosongkan" placeholder="Bisa dikosongkan, Tahun maksimal 4 digit">
            </div>
            <div class="form-group">
                <label for="edition">Edisi</label>
                <input type="text" class="form-control" name="edition" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="pages">Halaman</label>
                <input type="number" class="form-control" name="pages" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="copies">Jumlah Tersedia</label>
                <input type="number" class="form-control" name="copies" placeholder="Minimal tersedia 0">
            </div>
            <div class="form-group">
                <label for="syno">Sinopsis</label>
                <textarea class="form-control" name="syno" rows="3" placeholder="Bisa dikosongkan"></textarea>
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Buku</button>
            </div>
        </form>
    </div>
  </main>

@endsection