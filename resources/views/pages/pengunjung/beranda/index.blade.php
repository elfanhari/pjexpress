@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $perusahaan[0]->name ?? 'PT PANG JAYA EXPRESS' }}</title>


    {{-- <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="/productly/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/productly/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/productly/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="/productly/assets/img/favicons/favicon.png">
    <link rel="manifest" href="/productly/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="/productly/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff"> --}}


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="/productly/assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

  @if (request('track'))
  <script>
    window.onload = function() {
        if (window.location.hash !== '#track') {
            window.location.hash = 'track';
        }
    };
    </script>
  @endif

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="/logoperusahaan/pjexpress.jpeg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#track">Track</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#layanan">Layanan</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#tentangkami">Tentang Kami</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#kontak">Kontak</a></li>
            </ul>
            @auth
              <div class="d-flex ms-lg-4"><a href="{{ route('kelola.dashboard.index') }}" class="text-underline text-primary">Kelola Data</a></div>
            @else
              <div class="d-flex ms-lg-4"><a class="btn btn-primary btn-sm ms-3 px-3" href="{{ route('login') }}">Login</a></div>
            @endauth
          </div>
        </div>
      </nav>
      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Dikirim Oleh Kami, <br> Paket Anda Terlindungi</h1>
              <p class="mb-6 lead text-secondary">Pengen kirim paket tapi bingung takut rusak di pengiriman?<br class="d-none d-xl-block" />Tenang! <b> {{ $perusahaan[0]->name ?? 'PT PANG JAYA EXPRESS' }} </b> siap mengirim paket Anda<br class="d-none d-xl-block" />hingga ke tangan penerima dengan aman!</p>
              <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#track" role="button">Lacak Pengiriman</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="/productly/assets/img/hero/angkut-barang.jpg" alt="" /></div>
          </div>
        </div>
      </section>



      <!-- ============================================-->
      <!-- <section> begin ============================-->
        <section class="pb-md-11 pb-8 pt-md-6 pt-4" id="track">

          <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(/productly/assets/img/superhero/oval.png);opacity:.3; background-position: top !important ;">
          </div>
          <!--/.bg-holder-->

          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                <h1 class="fw-bold mb-4 fs-7">Lacak Pengiriman</h1>
                <p class="mb-5 text-info fw-medium">Masukkan Nomor Pengiriman untuk melacak pengiriman!</p>

                @if (request('track'))
                  @if ($pengiriman->count() < 1)
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Pengiriman yang Anda cari tidak ditemukan!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                @endif

                <div class="card bg-info">
                  <div class="card-body">
                    <form action="{{ route('home') }}" method="get">
                      <div class="input-group">
                        <input type="search" name="track" value="{{ request('track') }}" class="form-control" placeholder="No. Pengiriman" aria-label="No. Pengiriman" aria-describedby="button-addon2">
                        <button class="btn btn-warning" type="submit" id="button-addon2">Cek</button>
                      </div>
                    </form>
                  </div>
                </div>

                @if (request('track'))
                  @if ($pengiriman->count() > 0)
                <div class="card bg-info mt-3">
                  <div class="card-body">
                    <table class="table table-borderless table-sm text-white text-start">
                      <tr class="border-bottom">
                        <td class="fw-bold">No Pengiriman</td>
                        <td style="width: 1px;">:</td>
                        <td class="text-uppercase">{{ $pengiriman[0]->no_pengiriman }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold text-capitalize">Tanggal Pengiriman</td>
                        <td style="width: 1px;">:</td>
                        <td class="">{{ Carbon::parse($pengiriman[0]->tgl_pengiriman)->isoFormat('D MMMM Y'); }}</td>
                    </tr>
                    <tr class="border-bottom">
                      <td class="fw-bold text-capitalize">Kendaraan</td>
                      <td style="width: 1px;">:</td>
                      <td class="">Nama: {{ $pengiriman[0]->kendaraan->name }} - Nopol: {{ $pengiriman[0]->kendaraan->no_polisi }}</td>
                  </tr>
                  <tr class="border-bottom">
                      <td class="fw-bold text-capitalize">Supir</td>
                      <td style="width: 1px;">:</td>
                      <td class="">{{ $pengiriman[0]->kendaraan->supir->user->name }}</td>
                  </tr>
                  <tr class="border-bottom">
                    <td class="fw-bold text-capitalize">Nama Pengirim</td>
                    <td style="width: 1px;">:</td>
                    <td class="">{{ $pengiriman[0]->pelanggan->name }}</td>
                  </tr>
                  <tr class="border-bottom">
                    <td class="fw-bold text-capitalize">Telepon Pengirim</td>
                    <td style="width: 1px;">:</td>
                    <td class="">{{ $pengiriman[0]->pelanggan->telepon }}</td>
                  </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold text-capitalize">Nama Penerima</td>
                        <td style="width: 1px;">:</td>
                        <td class="">{{ $pengiriman[0]->nama_penerima }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold text-capitalize">Alamat Penerima</td>
                        <td style="width: 1px;">:</td>
                        <td class="">{{ $pengiriman[0]->alamat_penerima }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold text-capitalize">Nama Barang</td>
                        <td style="width: 1px;">:</td>
                        <td class="">{{ $pengiriman[0]->nama_barang }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold text-capitalize">Jumlah Barang</td>
                        <td style="width: 1px;">:</td>
                        <td class="">{{ $pengiriman[0]->jumlah_barang }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold text-capitalize">Biaya Kirim</td>
                        <td style="width: 1px;">:</td>
                        <td class="">Rp. {{ number_format($pengiriman[0]->biaya_kirim, 0, ',', '.') }}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td class="fw-bold">Status</td>
                        <td style="width: 1px;">:</td>
                        <td>
                            @if ($pengiriman[0]->status == 'diproses')
                              <span class="badge bg-warning">{{ $pengiriman[0]->status }}</span>
                            @else
                              <span class="badge bg-success">{{ $pengiriman[0]->status }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="border-bottom">
                      <td class="fw-bold text-capitalize">Keterangan</td>
                      <td style="width: 1px;">:</td>
                      <td class="">{{ $pengiriman[0]->keterangan ?? '-' }}</td>
                    </tr>
                    @if ($pengiriman[0]->foto)
                        <tr class="">
                          <td class="fw-bold">Bukti Pengiriman</td>
                        <td style="width: 1px;">:</td>
                        <td>
                          <img src="/fotopengiriman/{{ $pengiriman[0]->foto }}" class=" mb-0 img-fluid text-center"
                          alt="{{ $pengiriman[0]->foto }}"
                          style="max-width: 200px; max-height: auto; overflow: hidden;">
                        </td>
                        </tr>
                    @endif
                    </table>
                  </div>
                </div>
                @endif
                @endif


              </div>
            </div>
          </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="layanan">

        <div class="container">
          <div class="row">
            <div class="col-lg-6"><img class="img-fluid" src="/productly/assets/img/manager/manager.png" alt="" /></div>
            <div class="col-lg-6">
              <p class="fs-7 fw-bold mb-2">Layanan Kami</p>
              <p class="mb-4 fw-medium text-secondary">
                Apa aja sih yang bisa kami lakukan? <i>Check this out!</i>
              </p>
              @if ($layanan->isNotEmpty())
              @foreach ($layanan as $item)
                <h4 class="fw-bold">{{ $item->name }}</h4>
                <p class="mb-4 fw-medium text-secondary">{{ $item->deskripsi }}</p>
              @endforeach
            @else
              Belum Ada :(
            @endif
            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-5" id="tentangkami">

        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <p class="mb-2 fs-8 fw-bold">Tentang Kami</p>
              <p class="mb-4 fw-medium text-secondary pe-lg-4" style="text-align: justify">
                {{ $perusahaan[0]->tentang_kami ?? 'Belum ada :(' }}
              </p>

            </div>
            <div class="col-lg-6"><img class="img-fluid" src="/productly/assets/img/marketer/marketer.png" alt="" /></div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-2 pb-lg-5" id="kontak">

        <div class="container">
          <div class="row border-top border-top-secondary pt-7">
            <div class="col-lg-4 col-md-6 mb-4 mb-md-6 mb-lg-0 mb-sm-2 order-1 order-md-1 order-lg-1"><img class="mb-4" src="/logoperusahaan/pjexpress.jpeg" width="184" alt="" /></div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
              <p class="fs-2 mb-lg-4 fw-bold">Kontak</p>
              <ul class="list-unstyled mb-0">
                <p>{{ $perusahaan[0]->kontak ?? 'pjexpress@gmail.com' }}</p>
              </ul>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 order-4 order-md-4 order-lg-3">
              <p class="fs-2 mb-lg-4 fw-bold">Alamat</p>
              <ul class="list-unstyled mb-0">
                <p>{{ $perusahaan[0]->alamat ?? 'Jl Raya Indonesia No.17' }}</p>
              </ul>
            </div>

          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center py-0">

        <div class="container">
          <div class="container border-top py-3">
            <div class="row justify-content-between">
              <div class="col-12 col-md-auto mb-1 mb-md-0">
                <p class="mb-0">&copy; 2023 {{ $perusahaan[0]->name ?? 'PT PANG JAYA EXPRESS' }}</p>
              </div>

            </div>
          </div>
        </div><!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <iframe class="rounded" style="width:100%;height:500px;" src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="/productly/vendors/@popperjs/popper.min.js"></script>
    <script src="/productly/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/productly/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="/productly/vendors/fontawesome/all.min.js"></script>
    <script src="/productly/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>

</html>
