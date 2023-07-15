@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Data Perusahaan</h5>
</div>
<section class="section dashboard">
  <div class="row">

    @if ($perusahaan->count() < 1)
      <div class="card">
        <div class="card-body">
          <div class="row px-1 my-2 bg-light rounded">
            <div class="col-6 my-auto py-2 py-md-3">
              <a href="{{ route('tentangkami.create') }}" class="btn btn-sm btn-outline-primary rounded-2" data-bs-toggle="tooltip" data-bs-placement="right" title="Tambah Data Perusahaan"><span class="bi bi-plus-lg"></span> <span class="d-none d-md-inline d-lg-inline"></span> Perusahaan</a>
            </div>
          </div>
          <div class="my-3">
            Data Perusahaan belum ditambahkan, silahkan tambah data!
          </div>
        </div>
      </div>

    @else

    <div class="card">
      <div class="card-body">
        <div class="row px-1 my-2 bg-light rounded">
          <div class="col-6 my-auto py-2 py-md-3">
            <a href="{{ route('tentangkami.edit', $perusahaan) }}" class="btn btn-sm btn-outline-primary rounded-2"><span class="d-none ps-1 d-md-inline d-lg-inline"></span> Edit Perusahaan</a>
          </div>
        </div>
        <div class="tab-pane fade show active profile-overview" id="profile-overview">
          <h4 class="card-title fw-bold mb-0 text-primary">Tentang Kami</h4>
          <div style="text-align: justify">{{ $perusahaan->tentang_kami }}</div>

          <h4 class="card-title text-primary fw-bold mb-0 mt-3">Profil Perusahaan</h4>

          <div class="row mt-0">
            <div class="col-md-6">
              <div class="table-responsive pt-0">
                <table class="table table-borderless table-hover table-sm">
                  <tr>
                    <td class="fw-bold px-0">Nama Perusahaan</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $perusahaan->name }}</td>
                  </tr>
                  <tr>
                    <td class="fw-bold px-0">Alamat</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $perusahaan->alamat }}</td>
                  </tr>
                  <tr>
                    <td class="fw-bold px-0">Kontak</td>
                    <td style="width: 1px">:</td>
                    <td>{{ $perusahaan->kontak }}</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    @endif

  </div>
</section>
@endsection
@section('my-js')
  <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection
