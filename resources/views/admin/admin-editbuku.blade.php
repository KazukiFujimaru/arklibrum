@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-0 d-flex justify-content-between align-items-center">
            <p>
                <div>
                    <h3>Edit Buku</h3>    
                    Edit data buku Ark Librum
                </div>
            </p>
            <a href="{{ route('admin.hapusbuku', ['id' => $databuku->bookID]) }}" class="btn btn-icon btn-3 btn-danger ms-auto" type="button">
                <span class="btn-inner--text">Hapus Buku</span>
            </a>
        </div>
        <br>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.updatebuku', ['id' => $databuku->bookID]) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Judul Buku</label>
                <input type="text" class="form-control" name="title" value="{{ $databuku->title }}" placeholder="Harus diisi">
            </div>
            <div class="form-group">
                <label for="authorID">Author ID</label>
                <input type="number" class="form-control" name="authorID" value="{{ $databuku->authorID }}" placeholder="Data Author (authorID) harus sudah ada">
            </div>
            <div class="form-group">
                <label for="publisherID">Publisher ID</label>
                <input type="number" class="form-control" name="publisherID" value="{{ $databuku->publisherID }}" placeholder="Data Publisher (publisherID) harus sudah ada">
            </div>
            <div class="form-group">
                <label for="ISBN">ISBN</label>
                <input type="text" class="form-control" name="ISBN" value="{{ $databuku->ISBN }}" placeholder="Nomor ISBN tidak boleh sama">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" class="form-control" name="genre" value="{{ $databuku->genre }}" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="language">Bahasa</label>
                <input type="text" class="form-control" name="language" value="{{ $databuku->language }}" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="year">Tahun Terbit</label>
                <input type="text" class="form-control" name="year" value="{{ $databuku->publicationYear }}" placeholder="Bisa dikosongkan, Tahun maksimal 4 digit">
            </div>
            <div class="form-group">
                <label for="edition">Edisi</label>
                <input type="text" class="form-control" name="edition" value="{{ $databuku->edition }}" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="pages">Halaman</label>
                <input type="number" class="form-control" name="pages" value="{{ $databuku->pages }}" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="copies">Jumlah Tersedia</label>
                <input type="number" class="form-control" name="copies" value="{{ $databuku->copiesAvailable }}" placeholder="Minimal tersedia 0">
            </div>
            <div class="form-group">
                <label for="syno">Sinopsis</label>
                <textarea class="form-control" name="syno" rows="3" placeholder="Bisa dikosongkan">{{ $databuku->syno }}</textarea>
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
  </main>

@endsection