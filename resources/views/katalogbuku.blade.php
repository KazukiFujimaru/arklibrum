@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <p>
            <h3>Katalog Buku Ark Librum</h3>
        </p>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class = "row-2">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Detail Katalog Buku</h6>
                </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Tersedia</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Terakhir Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($katalog as $katalog)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">
                                            <a href="{{ route('detail-buku', $katalog->bookID) }}">{{ $katalog->title }}</a>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                          {{ $katalog->author_name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $katalog->copiesAvailable }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="font-weight-bold mb-0">{{ $katalog->ISBN }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="font-weight-bold mb-0">{{ $katalog->dateAdded }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection