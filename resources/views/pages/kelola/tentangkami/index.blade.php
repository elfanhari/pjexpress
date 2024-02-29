@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Data Perusahaan</h5>
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
            @if ($perusahaan->count() < 1)
              <div class="col-6 my-auto py-2 py-md-3">
                <a href="{{ route('tentangkami.create') }}" class="btn btn-sm btn-outline-primary rounded-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah Data Perusahaan"><span class="bi bi-plus-lg"></span> <span class="d-none d-md-inline d-lg-inline"></span> Perusahaan</a>
              </div>
            @else
              <div class="col-6 my-auto py-2 py-md-3">
                <a href="{{ route('tentangkami.edit', ['tentangkami' => $perusahaan[0]]) }}" class="btn btn-sm btn-outline-primary rounded-2" data-bs-toggle="tooltip"><span class="d-none d-md-inline d-lg-inline"></span> Edit Perusahaan</a>
              </div>
            @endif
          </div>
          <div class="mt-2 mt-md-2 mt-lg-2">
            @if ($perusahaan->count() > 0)
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h4 class="card-title fw-bold mb-0 text-primary">Tentang Kami</h4>
                <div style="text-align: justify">{{ $perusahaan[0]->tentang_kami }}</div>

                <h4 class="card-title text-primary fw-bold mb-0 mt-3">Profil Perusahaan</h4>

                <div class="row mt-0">
                  <div class="col-md-6">
                    <div class="table-responsive pt-0">
                      <table class="table table-borderless table-hover table-sm">
                        <tr>
                          <td class="fw-bold px-0">Nama Perusahaan</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $perusahaan[0]->name }}</td>
                        </tr>
                        <tr>
                          <td class="fw-bold px-0">Alamat</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $perusahaan[0]->alamat }}</td>
                        </tr>
                        <tr>
                          <td class="fw-bold px-0">Kontak</td>
                          <td style="width: 1px">:</td>
                          <td>{{ $perusahaan[0]->kontak }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

              </div>
            @else
              <div class="mt-3">
                Data perusahaan belum ada, silahkan tambah data perusahaan!
              </div>
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
