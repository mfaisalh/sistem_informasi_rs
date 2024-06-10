@extends('layouts.default')
@section('content')
<!--start breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">OBAT</div>
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
                   <h5 class="mb-0">Data Obat</h5>
                    <form class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                      <input class="form-control ps-5" type="text" placeholder="search">
                    </form>
                </div>
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                  <p>{{ $message }}</p>
                  </div>
                @endif
                <div class="table-responsive mt-3">
                  <a class="btn btn-sm btn-success px-2" style="margin-bottom:10px" href="{{ route('obat.create') }}"><ion-icon name="add"></ion-icon> Tambah Data</a>
                  <table class="table align-middle mb-0">
                    <thead class="table-light">
                     <tr>
                      <th>ID</th>
                      <th>KODE OBAT</th>
                      <th>NAMA OBAT</th>
                      <th>BENTUK</th>
                      <th>BERAT</th>
                      <th>KEMASAN</th>
                      <th width="280px">Action</th>
                     </tr>
                     </thead>
                     <tbody>
                        @foreach ($obat as $obat)
                        <tr>
                        <td>{{ $obat->id }}</td>
                        <td>{{ $obat->kode_obat }}</td>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->bentuk }}</td>
                        <td>{{ $obat->berat }}</td>
                        <td>{{ $obat->kemasan }}</td>
                        <td>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="Post">
                
                                <a class="btn btn-primary" href="{{ route('obat.edit', $obat->id) }}"><ion-icon name="pencil-sharp"></ion-icon> Edit</a>
                
                                @csrf
                                @method('DELETE')
                  
                                <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon> Delete</button>
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