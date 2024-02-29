@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold"><a type="button" onclick="history.back()" class="back-icon"><i class="bi bi-arrow-left back-icon"></i></a> <span class="ps-1">Data Pengiriman</span></h5>
</div>
<section class="section">
  <div class="row">
    <div class="col">
      <div class="card shadow-sm bg-white">
        <div class="card-body pe-0">
          <h5 class="card-title ms-2">Tambah Pengiriman</h5>
          <form class="row g-3 mx-0 mx-md-1 mx-lg-1 mb-3" action="{{ route('pengiriman.store') }}" method="POST">
            @csrf
            @include('pages.kelola.pengiriman._cform')
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
