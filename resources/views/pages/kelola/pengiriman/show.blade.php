@php
    use Carbon\Carbon;
@endphp

@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold"><a type="button" onclick="history.back()" class="back-icon"><i class="bi bi-arrow-left back-icon"></i></a> <span class="ps-1">Data Pengiriman</span></h5>
</div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                @if (session()->has('info'))
                    <div class="alert text-primary border-light rounded-3 alert-primary alert-dismissible fade show"
                        role="alert">
                        <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
                        <span>{{ session('info') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                          <p class="m-0 d-inline fw-bold text-grey  ">Detail Pengiriman</p>
                          {{-- @can('admin') --}}
                            <a href="{{ route('pengiriman.edit', $pengiriman) }}" class="float-end text-decoration-underline">Edit Pengiriman</a>
                          {{-- @endcan --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-hover fs-14 c-black">

                                <a href="{{ route('pengiriman.printresi', $pengiriman) }}" target="_blank"
                                    class="my-3 btn btn-danger btn-sm btn-icon-split fs-14">
                                    <span class="icon text-white m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                        </svg>
                                    </span>
                                    <span class="text">Print Resi</span>
                                </a>

                                <tr class="border-bottom">
                                    <td class="fw-bold">No Pengiriman</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="text-uppercase">{{ $pengiriman->no_pengiriman }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold text-capitalize">Tanggal Pengiriman</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="">{{ Carbon::parse($pengiriman->tgl_pengiriman)->isoFormat('D MMMM Y'); }}</td>
                                </tr>
                                <tr class="border-bottom">
                                  <td class="fw-bold text-capitalize">Kendaraan</td>
                                  <td style="width: 1px;">:</td>
                                  <td class="">Nama: {{ $pengiriman->kendaraan->name }} - Nopol: {{ $pengiriman->kendaraan->no_polisi }}</td>
                              </tr>
                              <tr class="border-bottom">
                                  <td class="fw-bold text-capitalize">Supir</td>
                                  <td style="width: 1px;">:</td>
                                  <td class="">{{ $pengiriman->kendaraan->supir->user->name }}</td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="fw-bold text-capitalize">Nama Pengirim</td>
                                <td style="width: 1px;">:</td>
                                <td class="">{{ $pengiriman->pelanggan->name }}</td>
                              </tr>
                              <tr class="border-bottom">
                                <td class="fw-bold text-capitalize">Telepon Pengirim</td>
                                <td style="width: 1px;">:</td>
                                <td class="">{{ $pengiriman->pelanggan->telepon }}</td>
                              </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold text-capitalize">Nama Penerima</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="">{{ $pengiriman->nama_penerima }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold text-capitalize">Alamat Penerima</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="">{{ $pengiriman->alamat_penerima }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold text-capitalize">Nama Barang</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="">{{ $pengiriman->nama_barang }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold text-capitalize">Jumlah Barang</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="">{{ $pengiriman->jumlah_barang }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold text-capitalize">Biaya Kirim</td>
                                    <td style="width: 1px;">:</td>
                                    <td class="">Rp. {{ number_format($pengiriman->biaya_kirim, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="border-bottom">
                                  <td class="fw-bold text-capitalize">Keterangan</td>
                                  <td style="width: 1px;">:</td>
                                  <td class="">{{ $pengiriman->keterangan }}</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="fw-bold">Status</td>
                                    <td style="width: 1px;">:</td>
                                    <td>
                                        @if ($pengiriman->status == 'diproses')
                                          <span class="badge bg-warning"><i class="bi bi-truck me-1"></i>{{ $pengiriman->status }}</span>
                                        @else
                                          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>{{ $pengiriman->status }}</span>
                                        @endif
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                    <p class="m-0 d-inline fw-bold text-grey  ">Foto Pengiriman</p>
                </div>
                <div class="card-body pb-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover fs-14 c-black">
                            @if ($pengiriman->foto)
                                <tr class="border-bottom align-items-center">
                                  <div class="text-center mb-0">
                                    <img src="/fotopengiriman/{{ $pengiriman->foto }}" class="mt-3 mb-0 img-fluid text-center"
                                    alt="{{ $pengiriman->foto }}"
                                    style="max-width: 200px; max-height: auto; overflow: hidden;">
                                  </div>
                                </tr>
                            @else
                                <div class="mt-3">
                                  <i>
                                    Foto pengiriman belum ada!
                                  </i>
                                </div>
                            @endif
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
