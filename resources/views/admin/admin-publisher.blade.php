@extends('layouts.user_type.admin')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
        <p>
            <h3>Publisher Ark Librum</h3>
            Kelola data Publisher pada buku Ark Librum
        </p>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class = "row-2">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Detail Publisher</h6>
                    <a href="tambah-publisher" class="btn btn-icon btn-3 btn-primary ms-auto" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                        <span class="btn-inner--text">Tambah Publisher</span>
                    </a>
                </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Publisher ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Publisher</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Daerah Asal</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak Publisher</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publisher as $publisher)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $publisher->publisherID }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $publisher->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $publisher->country }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $publisher->contact }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <a href="edit-publisher/{{$publisher->publisherID}}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <span class="badge bg-gradient-primary">Edit</span>
                                </a>
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