@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Data Supir</h5>
</div>
<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
      @if (session()->has('info'))
        <div class="alert text-primary border-light rounded-3 alert-primary alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span>{{ session('info') }}</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="card shadow-sm bg-white">
        <div class="card-body">
          <div class="row px-1 my-2 bg-light rounded">
            <div class="col-6 my-auto py-2 py-md-3">
              <a href="{{ route('supir.create') }}" class="btn btn-sm btn-outline-primary rounded-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah Data Supir"><span class="bi bi-plus-lg"></span> <span class="d-none d-md-inline d-lg-inline"></span> Supir</a>
            </div>
          </div>
          <div class="table-responsive mt-2 mt-md-2 mt-lg-2">

            @if ($supir->isEmpty())
              <div class="mt-3 mb-1">
                Data supir tidak ada, silahkan tambah data!
              </div>
            @else
              <table class="table table-sm table-striped table-hover" id="table1">
                <thead>
                  <tr class="bg-secondary text-white">
                    <th scope="col">#</th>
                    <th scope="col">Nama <span class="d-none d-md-inline d-lg-inline">Supir</span></th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                  @foreach ($supir as $item)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td style="min-width: 200px;">{{ $item->name }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td style="min-width: 200px;">{{ $item->alamat }}</td>
                    <td class="align-middle">
                      <a href="{{ route('supir.show', $item) }}" class="text-success pe-2" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail" style="width: 18px">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                      </a>
                      <a href="{{ route('supir.edit', $item) }}" class="text-primary pe-2" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                      </a>
                      <a href="#{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#hapus{{ $item->id }}" class="text-danger" >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </a>
                    </td>
                    <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Apakah anda yakin menghapus data berikut?<br> <br>
                            <b>{{ $item->name }}</b>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('supir.destroy', $item) }}" method="POST" class="m-0">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection
