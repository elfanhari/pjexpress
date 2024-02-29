@php
    use Carbon\Carbon;

@endphp

@extends('layouts.kerangka')
@section('content')
    <div class="pagetitle mb-3">
        <h5 class="fw-bold">Laporan Pengiriman</h5>
    </div>
    <section class="section dashboard">
        <div class="row mb-0">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('laporan.index') }}" class="fs-14 float-end">Refresh halaman</a>
                    <p class="m-0 fw-bold text-dark">Generate Laporan</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.index') }}" method="GET">

                        <div class="row mt-3">

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label mb-1 fw-semibold">Status Pengiriman</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror"
                                        id="status" required>
                                        <option value="Semua Status Pengiriman"
                                            {{ 'Semua Status Pengiriman' == request('status') ? 'selected' : '' }}>
                                            Semua Status Pengiriman</option>
                                        <option value="Proses Pengiriman"
                                            {{ 'Proses Pengiriman' == request('status') ? 'selected' : '' }}>Diproses
                                        </option>
                                        <option value="Barang Terkirim"
                                            {{ 'Barang Terkirim' == request('status') ? 'selected' : '' }}>Barang Terkirim
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="dari_tanggal" class="form-label mb-1 fw-semibold">Dari Tanggal</label>
                                    <input required type="date" name="dari_tanggal"
                                        class="form-control @error('dari_tanggal') is-invalid @enderror"
                                        value="{{ request('dari_tanggal') }}" id="dari_tanggal" autocomplete="off">
                                    @error('dari_tanggal')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="sampai_tanggal" class="form-label mb-1 fw-semibold">Sampai Tanggal</label>
                                    <input required type="date" name="sampai_tanggal"
                                        class="form-control @error('sampai_tanggal') is-invalid @enderror"
                                        value="{{ request('sampai_tanggal') }}" id="sampai_tanggal" autocomplete="off">
                                    @error('sampai_tanggal')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary float-end">Generate</button>

                    </form>
                </div>
            </div>
        </div>

        @if (request('dari_tanggal'))

            <div class="row mt-0">
                <div class="card">
                  @if($pengiriman->count() > 0)
                  <div class="card-header">
                    <form action="{{ route('laporan.print') }}" method="post">
                      @csrf
                      <input type="hidden" name="status" value="{{ request('status') }}">
                      <input type="hidden" name="dari_tanggal" value="{{ request('dari_tanggal') }}">
                      <input type="hidden" name="sampai_tanggal" value="{{ request('sampai_tanggal') }}">
                      <button type="submit" class="btn btn-sm btn-success fs-14 float-end">Cetak Laporan</button>
                    </form>
                    <p class="m-0 fw-bold text-dark">Pratinjau Laporan</p>
                  </div>
                  @endif
                    <div class="card-body">

                        <div class="table-responsive">

                            @if ($pengiriman->count() < 1)
                                <div class="mt-4 mb-1">
                                    Data pengiriman tidak ada!
                                </div>
                            @else
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr class="bg-secondary text-white">
                                            <th scope="col">#</th>
                                            <th scope="col">No. Pengiriman</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Pengirim</th>
                                            <th scope="col">Penerima</th>
                                            <th scope="col">Kendaraan - Supir</th>
                                            <th scope="col">Barang</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Biaya</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        @foreach ($pengiriman as $item)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->no_pengiriman }}</td>
                                                <td>
                                                    {{ Carbon::parse($item->tgl_pengiriman)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ $item->pelanggan->name }}</td>
                                                <td>{{ $item->nama_penerima }}</td>
                                                <td> {{ $item->kendaraan->name }} - {{ $item->kendaraan->supir->user->name }}
                                                </td>
                                                <td> {{ Str::limit($item->nama_barang, 50, '...') }}</td>
                                                <td>{{ $item->jumlah_barang }}</td>
                                                <td>
                                                    Rp. {{ number_format($item->biaya_kirim, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    @if ($item->status == 'Proses Pengiriman')
                                                        <span class="badge bg-warning"><i
                                                                class="bi bi-truck me-1"></i>{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge bg-success"><i
                                                                class="bi bi-check-circle me-1"></i>{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endif

    </section>
@endsection
@section('my-js')
    <script src="/vendor/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/vendor/extensions/simple-datatables.js"></script>
@endsection
