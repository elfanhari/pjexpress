<div class="row px-1 mt-3">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="name" class="form-label mb-1 fw-semibold">Nama Supir</label>
            <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $supir->user->name) }}" placeholder="Masukkan nama supir" id="name"
                autocomplete="off">
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row px-1">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="telepon" class="form-label mb-1 fw-semibold">Telepon</label>
            <input required type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                value="{{ old('telepon', $supir->telepon) }}" placeholder="Masukkan telepon" id="telepon"
                autocomplete="off">
            @error('telepon')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row px-1">
    <div class="col-md-6 pe-md-3 pe-lg-3">
        <div class="form-group mb-3">
            <label for="alamat" class="form-label mb-1 fw-semibold">Alamat</label>
            <textarea required name="alamat" id="" cols="10" rows="4" class="form-control"
                placeholder="Masukkan alamat">{{ old('alamat', $supir->alamat) }}</textarea>
            @error('alamat')
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
