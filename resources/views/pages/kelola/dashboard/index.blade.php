@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Dashboard</h5>
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
    </div>
    <div class="col">
      <div class="row">

        <div class="col-md-4 col-sm-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Data Pelanggan</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-primary small pt-1 fw-bold"><a href="#">Lihat detail</a> </span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Data Supir</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-video3"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-primary small pt-1 fw-bold"><a href="#">Lihat detail</a> </span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Data Kendaraan</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-car-front-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-primary small pt-1 fw-bold"><a href="#">Lihat detail</a> </span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Data Pengguna</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-fill-check"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-primary small pt-1 fw-bold"><a href="#">Lihat detail</a> </span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="card info-card customers-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Diproses</a></li>
                <li><a class="dropdown-item" href="#">Selesai</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Pengiriman <span>| Diproses</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-truck"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-primary small pt-1 fw-bold"><a href="#">Lihat detail</a> </span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Layanan</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-card-list"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-primary small pt-1 fw-bold"><a href="#">Lihat detail</a> </span> <span class="text-muted small pt-2 ps-1"></span>
                </div>
              </div>
            </div>
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
