<div class="row px-1 mt-3">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="name" class="form-label mb-1 fw-semibold">Nama Layanan</label>
          <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name', $layanan->name) }}" placeholder="Masukkan nama layanan" id="name" autocomplete="off">
          @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="deskripsi" class="form-label mb-1 fw-semibold">Dekripsi</label>
          <textarea required name="deskripsi" id="" cols="10" rows="6" class="form-control" placeholder="Masukkan deskirpsi layanan">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
          @error('deskripsi')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row">
<div class="text-end col-md-6 pe-md-3 pe-lg-3">
  <button type="submit" class="btn btn-sm btn-primary py-2 px-3 mb-3 rounded-3 fw-bold">Simpan</button>
</div>
</div>
