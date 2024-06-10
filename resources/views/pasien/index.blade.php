@extends('layouts.default')

@section('content')
    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">PASIEN</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item active" aria-current="page"></li>
                               </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Data Pasien</h5>
                <form class="ms-auto position-relative">
                    <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                        <ion-icon name="search-sharp"></ion-icon>
                    </div>
                    <input class="form-control ps-5" type="text" placeholder="search">
                               </form>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive mt-3">
                <a class="btn btn-sm btn-success px-2" style="margin-bottom:10px" href="{{ route('pasien.create') }}">
                    <ion-icon name="add"></ion-icon> Tambah Data
                </a>
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>NO REG</th>
                            <th>NAMA</th>
                            <th>JK</th>
                            <th>TANGGAL LAHIR</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $pasien)
                            <tr>
                                <td>{{ $pasien->id }}</td>
                                <td>{{ $pasien->noreg }}</td>
                                <td>{{ $pasien->nama }}</td>
                                <td>{{ $pasien->jk }}</td>
                                <td>{{ $pasien->tgl_lahir }}</td>
                                <td>
                                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('pasien.edit', $pasien->id) }}">
                                            <ion-icon name="pencil-sharp"></ion-icon> Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <ion-icon name="trash-outline"></ion-icon> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
