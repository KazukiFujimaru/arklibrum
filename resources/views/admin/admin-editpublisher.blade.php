@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-0 d-flex justify-content-between align-items-center">
            <p>
                <div>
                    <h3>Edit Publisher</h3>    
                    Edit data publisher Ark Librum
                </div>
            </p>
            <a href="{{ route('admin.hapuspublisher', ['id' => $datapublisher->publisherID]) }}" class="btn btn-icon btn-3 btn-danger ms-auto" type="button">
                <span class="btn-inner--text">Hapus Publisher</span>
            </a>
        </div>
        <br>
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.updatepublisher', ['id' => $datapublisher->publisherID]) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Nama Publisher</label>
                <input type="text" class="form-control" name="name" value="{{ $datapublisher->name }}" placeholder="Harus diisi">
            </div>
            <div class="form-group">
                <label for="address">Alamat Publisher</label>
                <textarea class="form-control" name="address" rows="3" placeholder="Alamat lengkap kecuali kota dan negara, bisa dikosongkan">{{ $datapublisher->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="city">Asal Kota Publisher</label>
                <input type="text" class="form-control" name="city" value="{{ $datapublisher->city }}" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="country">Asal Daerah / Negara Publisher</label>
                <input type="text" class="form-control" name="country" value="{{ $datapublisher->country }}" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="contact">Kontak Publisher</label>
                <input type="text" class="form-control" name="contact" value="{{ $datapublisher->contact }}" placeholder="Bisa dikosongkan">
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
  </main>

@endsection