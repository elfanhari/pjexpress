@php
use App\Models\Perusahaan;

$perusahaan = Perusahaan::get();

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $perusahaan[0]->name ?? 'PT PANG JAYA EXPRESS' }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="/img/favicon.png" rel="icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="/vendor/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/vendor/extensions/simple-datatables.css" rel="stylesheet">

  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    @include('partials.navbar')
  </header>

  <aside id="sidebar" class="sidebar">
    @include('partials.sidebar')
  </aside>

  <main id="main" class="main">

    <div class="modal modal-sm fade py-5" id="logout" tabindex="-1" data-bs-backdrop="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-4 shadow">
          <div class="modal-header border-bottom-0">
            <h1 class="modal-title fs-5">Logout</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body py-0 mb-1">
            Keluar dari Aplikasi PJ Express?
          </div>
          <div class="modal-footer border-top-0 ">
            <form action="/logout" method="POST" class="w-100">
              @csrf
              <button type="submit" class="button-9 w-100 mx-0 mb-2 roundedx">Ya, keluar!</button>
            </form>
            <button type="button" class="btn-y w-100 mx-1" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>

    @yield('content')

  </main>

  {{-- @yield('footer-me') --}}

  {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

  @yield('my-js')

  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/tinymce/tinymce.min.js"></script>

  <script src="/js/main.js"></script>
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  </script>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="modal"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>
  <script>

</body>

</html>
