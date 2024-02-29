<div class="row px-1 mt-3">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="name" class="form-label mb-1 fw-semibold">Nama Perusahaan</label>
            <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="Masukkan nama perusahaan" id="name" autocomplete="off">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row px-1">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="kontak" class="form-label mb-1 fw-semibold">Kontak</label>
            <input required type="text" name="kontak" class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak') }}" placeholder="Masukkan kontak" id="kontak" autocomplete="off">
            @error('kontak')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row px-1">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="alamat" class="form-label mb-1 fw-semibold">Alamat</label>
            <textarea required name="alamat" id="" class="form-control" placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row px-1">
    <div class="col-md-12 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="tentang_kami" class="form-label mb-1 fw-semibold">Tentang Kami</label>
            <textarea required name="tentang_kami" id="" cols="10" rows="6" class="form-control" placeholder="Masukkan tentang perusahaan">{{ old('tentang_kami') }}</textarea>
            @error('tentang_kami')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
  <div class="text-end ">
    <button type="submit" class="btn btn-sm btn-primary py-2 px-3 mb-3 rounded-3 fw-bold">Simpan</button>
  </div>
</div>
