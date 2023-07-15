@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Data Guru</h5>
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
              <a href="" class="btn btn-sm btn-outline-primary rounded-2"><span class="bi bi-plus-lg"></span> <span class="d-none d-md-inline d-lg-inline">Tambah</span> Guru</a>
            </div>
          </div>
          <div class="table-responsive mt-2 mt-md-2 mt-lg-2">
            <table class="table table-sm table-striped table-hover" id="table1">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NIS</th>
                  <th scope="col">L/P</th>
                  <th scope="col">Nama <span class="d-none d-md-inline d-lg-inline">Guru</span></th>
                  <th scope="col">Email</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="align-middle">
                {{-- @foreach ($dataguru as $guru) --}}
                <tr>
                  <th scope="row">1</th>
                  <td>Laki-laki</td>
                  <td>cek</td>
                  <td style="min-width: 200px;">Elfan</td>
                  <td>elfan@gmail.com</td>
                  <td class="align-middle">
                    <a href="/guru/" class="text-secondary pe-2">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                      </svg>
                    </a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#dataguru" class="text-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:18px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                    </a>
                  </td>
                  <div class="modal fade" id="dataguru" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Hapus data guru dengan nama:<br>
                          <span class="text-violet fw-semibold fst-italic"> ?</span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <form action="/guru/ }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>
                {{-- @endforeach --}}
              </tbody>
            </table>
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
