@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Data Abc</h5>
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
              <a href="#" class="btn btn-sm btn-outline-primary rounded-2"><span class="bi bi-plus-lg"></span> <span class="d-none d-md-inline d-lg-inline">Tambah</span> Guru</a>
            </div>
          </div>

          <div class="row">

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
