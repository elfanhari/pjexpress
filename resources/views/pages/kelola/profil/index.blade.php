@extends('layouts.kerangka')
@section('content')
<div class="pagetitle mb-3">
  <h5 class="fw-bold">Profil Saya</h5>
</div>
<section class="section profile">
  <div class="row">
    <div class="col">
      @if (session()->has('info'))
        <div class="alert text-primary border-light rounded-3 alert-primary alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle-fill ms-1 py-0 my-0 me-2"></i>
          <span> {{ session('info') }} </span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4">

      <div class="card">
        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

          <img src="/fotoprofil/{{ $user->foto_profil ?? 'profile.jpg' }}" alt="Profile" class="rounded-circle">
          <h2>{{ $user->name }}</h2>
          <h3 class="mt-2 text-capitalize">{{ $user->role }}</h3>
        </div>
      </div>

    </div>

    <div class="col-xl-8">

      <div class="card">
        <div class="card-body pt-3">
          <!-- Bordered Tabs -->
          <ul class="nav nav-tabs nav-tabs-bordered">

            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
            </li>

            <li class="nav-item">
              <button class="nav-link" data-bs-toggle="tab" data-bs-target="#photo-profile-settings">Edit Foto Profil</button>
            </li>

          </ul>
          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

              <!-- Profile Edit Form -->
              <form action="{{ route('profil.updateuser') }}" method="POST">
                @method('PUT')
                @csrf

                <div class="row mb-3">
                  <label for="name" class="col-md-4 col-lg-3 col-form-label @error('name') is-invalid @enderror">Nama</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="name" required type="text" class="form-control" id="name" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="username" class="col-md-4 col-lg-3 col-form-label @error('username') is-invalid @enderror">Username</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="username" required type="text" class="form-control" id="username" value="{{ old('username', $user->username) }}" placeholder="Masukkan username">
                    @error('username')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                @if (Auth::user()->role == 'supir')

                <div class="row mb-3">
                  <label for="telepon" class="col-md-4 col-lg-3 col-form-label @error('telepon') is-invalid @enderror">Telepon</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="telepon" required type="text" class="form-control" id="telepon" value="{{ old('telepon', $user->supir->telepon) }}" placeholder="Masukkan telepon">
                    @error('telepon')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="alamat" class="col-md-4 col-lg-3 col-form-label @error('alamat') is-invalid @enderror">Alamat</label>
                  <div class="col-md-8 col-lg-9">
                    <input name="alamat" required type="text" class="form-control" id="alamat" value="{{ old('alamat', $user->supir->alamat) }}" placeholder="Masukkan alamat">
                    @error('alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                @endif

                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-lg-3 col-form-label @error('password') is-invalid @enderror">Password Baru <small><i>(Opsional)</i></small></label>
                  <div class="col-md-8 col-lg-9">
                    <input name="password" type="password" class="form-control" id="password" value="{{ old('password') }}" placeholder="Masukkan password baru">
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="row-mb-3">
                  <div class="offset-lg-3 offset-md-4 ps-2">
                    <div class="text-start">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </form><!-- End Profile Edit Form -->

            </div>

            <div class="tab-pane fade pt-3" id="photo-profile-settings">



                <div class="row">
                  <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-borderless mt-xs-2">

                            <tr class="text-center text-bold">
                                <td>Foto</td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="/fotoprofil/{{ $user->foto_profil ?? 'profil.jpg' }}"
                                        alt=""
                                        class="rounded-circle img-profile" style="max-width: 100px;"></td>
                            </tr>
                        </table>
                    </div>
                    <small class="fs-12"> <i>Ganti foto profil</i></small>
                    <form action="{{ route('profil.updatefoto', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="old_foto" id=""
                            value="{{ $user->foto_profil }}" hidden>

                        <div class="">
                            <div class="my-2 position-relative">
                                <img class="img-preview img-fluid mb-2 col-sm-6 rounded-circle oferflow-y-hidden"
                                    style="max-width: 200px;">
                            </div>
                            <div class="input-group mb-3">
                                <input type="hidden" name="user_id"
                                    value="{{ $user->id }}">
                                <input type="file" accept="image/*"
                                    class="form-control @error('files') is-invalid @enderror"
                                    name="files" id="gambar" onchange="previewImage()" required>
                                <button type="submit" class="input-group-text btn-primary"
                                    for="inputGroupFile02">Update</button>
                                @error('files')
                                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
                </div>

            </div>

          </div><!-- End Bordered Tabs -->

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

<script>
  function previewImage() {
            const image = document.querySelector('#gambar');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(gambar.files[0]);


            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
  </script>
