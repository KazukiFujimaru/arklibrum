@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-200 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="container-fluid pb-2" style="margin-top: -15px;">
            <p>
                    <h3>Tambah Publisher</h3>    
                    Tambah daftar publisher buku di Ark Librum, ikuti sesuai instruksi pengisian
            </p>
        </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        <form action="simpan-publisher" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Nama Publisher</label>
                <input type="text" class="form-control" name="name" placeholder="Harus diisi">
            </div>
            <div class="form-group">
                <label for="address">Alamat Publisher</label>
                <textarea class="form-control" name="address" rows="3" placeholder="Alamat lengkap kecuali kota dan negara, bisa dikosongkan"></textarea>
            </div>
            <div class="form-group">
                <label for="city">Asal Kota Publisher</label>
                <input type="text" class="form-control" name="city" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="country">Asal Daerah / Negara Publisher</label>
                <input type="text" class="form-control" name="country" placeholder="Bisa dikosongkan">
            </div>
            <div class="form-group">
                <label for="contact">Kontak Publisher</label>
                <input type="text" class="form-control" name="contact" placeholder="Bisa dikosongkan">
            </div>
            <div>
                <button class="form-group btn btn-primary" type="submit">Simpan Publisher</button>
            </div>
        </form>
    </div>
  </main>

@endsection