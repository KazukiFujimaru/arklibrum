@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-0 d-flex justify-content-between align-items-center">
            <p>
                <div>
                    <h3>Edit Author</h3>    
                    Edit data author Ark Librum
                </div>
            </p>
            <a href="{{ route('admin.hapusauthor', ['id' => $dataauthor->authorID]) }}" class="btn btn-icon btn-3 btn-danger ms-auto" type="button">
                <span class="btn-inner--text">Hapus Author</span>
            </a>
        </div>
        <br>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.updateauthor', ['id' => $dataauthor->authorID]) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nama Author</label>
                <input type="text" class="form-control" name="name" value="{{ $dataauthor->name }}" placeholder="Harus diisi">
            </div>
            <div class="form-group">
                <label for="desc">Detail & Deskripsi Author</label>
                <textarea class="form-control" name="desc" rows="3" placeholder="Bisa dikosongkan">{{ $dataauthor->description }}</textarea>
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
  </main>

@endsection