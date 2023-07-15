<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item border-right">
    <a href="/dashboard" class="nav-link {{ Request::is('kelola/dashboard') ? '' : 'collapsed' }}">
      <i class="bi bi-bullseye"></i>
        <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-heading mt-3">Informasi</li>
  <li class="nav-item my-0">
    <a href="/siswa" class="nav-link {{ Request::is('kelola/tentangkami*') ? '' : 'collapsed' }}">
      <i class="bi bi-info-circle-fill"></i>
      <span>Tentang Kami</span>
    </a>
  </li>
  <li class="nav-item my-0">
    <a href="/guru" class="nav-link {{ Request::is('kelola/layanan*') ? '' : 'collapsed' }}">
      <i class="bi bi-card-list"></i>
      <span>Layanan</span>
    </a>
  </li>

  <li class="nav-heading mt-3">Master Data</li>
  <li class="nav-item my-0">
    <a href="/siswa" class="nav-link {{ Request::is('kelola/pelanggan*') ? '' : 'collapsed' }}">
      <i class="bi bi-people-fill"></i>
      <span>Data Pelanggan</span>
    </a>
  </li>
  <li class="nav-item my-0">
    <a href="/guru" class="nav-link {{ Request::is('kelola/supir*') ? '' : 'collapsed' }}">
      <i class="bi bi-person-video3"></i>
      <span>Data Supir</span>
    </a>
  </li>
  <li class="nav-item my-0">
    <a href="/kelas" class="nav-link {{ Request::is('kelola/kendaraan*') ? '' : 'collapsed' }}">
      <i class="bi bi-car-front-fill"></i>
      <span>Data Kendaraan</span>
    </a>
  </li>
  <li class="nav-item my-0">
    <a href="/guru" class="nav-link {{ Request::is('kelola/pengguna*') ? '' : 'collapsed' }}">
      <i class="bi bi-person-fill-check"></i>
      <span>Data Pengguna</span>
    </a>
  </li>

  <li class="nav-heading mt-3">DELIVERY</li>
  <li class="nav-item my-0">
    <a href="/kelas" class="nav-link {{ Request::is('kelola/pengiriman*') ? '' : 'collapsed' }}">
      <i class="bi bi-truck"></i>
      <span>Pengiriman</span>
    </a>
  </li>

  <li class="nav-heading mt-3">Laporan</li>
  <li class="nav-item my-0">
    <a href="/kelas" class="nav-link {{ Request::is('kelola/laporan*') ? '' : 'collapsed' }}">
      <i class="bi bi-file-earmark-text-fill"></i>
      <span>Cetak Laporan</span>
    </a>
  </li>
</ul>
