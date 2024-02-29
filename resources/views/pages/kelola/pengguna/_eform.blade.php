<div class="row px-1 mt-3">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="name" class="form-label mb-1 fw-semibold">Nama Pengguna</label>
          <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name', $pengguna->name) }}" placeholder="Masukkan nama pengguna" id="name" autocomplete="off">
          @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
    <div class="form-group mb-3">
      <label for="role" class="form-label mb-1 fw-semibold">Role/Hak Akses</label>
      <select name="role" class="form-select @error('role') is-invalid @enderror" id="role" required {{ $pengguna->supir ? 'disabled' : '' }}>
          <option disabled selected>-- Pilih --</option>
          <option value="admin" {{ 'admin' == old('role', $pengguna->role) ? 'selected' : '' }}>Admin</option>
          <option value="staff" {{ 'staff' == old('role', $pengguna->role) ? 'selected' : '' }}>Staff</option>
          <option value="pimpinan" {{ 'pimpinan' == old('role', $pengguna->role) ? 'selected' : '' }}>Pimpinan</option>
          @if ($pengguna->supir)
          <option value="supir" {{ 'supir' == old('role', $pengguna->role) ? 'selected' : '' }}>Supir</option>
          @endif
        </select>
        @error('role')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>
    </div>
  </div>
  <div class="row px-1">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="username" class="form-label mb-1 fw-semibold">Username</label>
            <input required type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                value="{{ old('username', $pengguna->username) }}" placeholder="Masukkan username" id="username" autocomplete="off">
            @error('username')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
  </div>
  <div class="row px-1">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="password" class="form-label mb-1 fw-semibold">Password <small>(Opsional)</small></label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                value="{{ old('password') }}" placeholder="Masukkan password" id="password" autocomplete="off">
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
  </div>
  <div class="row">
    <div class="text-end col-md-6 pe-md-3 pe-lg-3">
      <button type="submit" class="btn btn-sm btn-primary py-2 px-3 mb-2 rounded-3 fw-bold">Simpan</button>
  </div>
</div>
