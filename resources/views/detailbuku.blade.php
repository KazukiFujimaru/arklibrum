@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <p>
            <h3>Detail Buku</h3>
        </p>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row-2">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>Informasi diantaranya :</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                @foreach($detailbuku as $book)
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Field</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Judul</td>
                                                <td class="text-sm">{{ $book->title }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Penulis</td>
                                                <td class="text-sm">{{ $book->author }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Penerbit</td>
                                                <td class="text-sm">{{ $book->publisher }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">ISBN</td>
                                                <td class="text-sm">{{ $book->ISBN }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Genre</td>
                                                <td class="text-sm">{{ $book->genre }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Bahasa</td>
                                                <td class="text-sm">{{ $book->language }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Tahun Publikasi</td>
                                                <td class="text-sm">{{ $book->publicationYear }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Edisi</td>
                                                <td class="text-sm">{{ $book->edition }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Halaman</td>
                                                <td class="text-sm">{{ $book->pages }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Jumlah Tersedia</td>
                                                <td class="text-sm">{{ $book->copiesAvailable }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0">Sinopsis</td>
                                                <td class="text-sm">{{ $book->syno }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
