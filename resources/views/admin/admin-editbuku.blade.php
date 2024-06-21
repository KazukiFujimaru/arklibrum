@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-0 d-flex justify-content-between align-items-center">
            <p>
                <div>
                    <h3>Tambah Buku</h3>    
                    Tambah katalog buku Ark Librum
                </div>
            </p>
            <a href="tambah-buku" class="btn btn-icon btn-3 btn-danger ms-auto" type="button">
                <span class="btn-inner--text">Hapus Buku</span>
            </a>
        </div>
        <form>
            <div class="form-group">
                <label for="title">Judul Buku</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="authorID">Author ID</label>
                <input type="number" class="form-control" id="authorID">
            </div>
            <div class="form-group">
                <label for="publisherID">Publisher ID</label>
                <input type="number" class="form-control" id="publisherID">
            </div>
            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" id="ISBN">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" id="genre">
            </div>
            <div class="form-group">
                <label for="language">Bahasa</label>
                <input type="text" class="form-control" id="language">
            </div>
            <div class="form-group">
                <label for="year">Tahun Terbit</label>
                <input type="text" class="form-control" id="year">
            </div>
            <div class="form-group">
                <label for="edition">Edisi</label>
                <input type="text" class="form-control" id="Edisi">
            </div>
            <div class="form-group">
                <label for="pages">Halaman</label>
                <input type="number" class="form-control" id="pages">
            </div>
            <div class="form-group">
                <label for="copies">Jumlah Tersedia</label>
                <input type="number" class="form-control" id="copies">
            </div>
        </form>
    </div>
  </main>

@endsection