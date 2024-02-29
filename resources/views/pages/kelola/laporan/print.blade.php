@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LAPORAN PENGIRIMAN</title>
  {{-- <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
  {{-- <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> --}}

</head>
<body style="font-family: 'Mulish">

<div class="" style="margin-bottom: 20px; text-align: center">
  @if ($perusahaan->count() < 1)
  <h2 style="padding-bottom: 0px">LAPORAN PENGIRIMAN</h2>
  <h2>PANG JAYA EXPRESS</h2>
  <h5>Jl. Raya Indonesia</h5>
  <h5>pangjaya@gmail.com</h5>
  @else
  <h2 style="margin-bottom: 0px">LAPORAN PENGIRIMAN</h2>
  <h2 style="margin-top: 0px; margin-bottom: 0px;" >{{ $perusahaan[0]->name }}</h2>
  <h5 style="margin-bottom: 0px; margin-top: 8px" >{{ $perusahaan[0]->alamat }}</h5>
  <h5 style="margin-top: 0px">{{ $perusahaan[0]->kontak }}</h5>
  @endif
</div>

<hr style="margin-bottom: 20px">

<table>
  <tr>
    <td style="font-weight: bold">Status Pengiriman</td>
    <td>:</td>
    <td>{{ $status }}</td>
  </tr>
  <tr>
    <td style="font-weight: bold">Dari Tanggal</td>
    <td>:</td>
    <td>{{ Carbon::parse($dari_tanggal)->isoFormat('D MMMM Y'); }}</td>
  </tr>
  <tr>
    <td style="font-weight: bold">Sampai Tanggal</td>
    <td>:</td>
    <td>{{ Carbon::parse($sampai_tanggal)->isoFormat('D MMMM Y'); }}</td>
  </tr>
</table>

<hr style="margin-bottom: 20px; margin-top: 20px" >

<table class="table table-sm table-striped table-hover" border="0.1" cellspacing="0">
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

</body>
</html>
