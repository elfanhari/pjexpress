<div class="row px-1 mt-3">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="name" class="form-label mb-1 fw-semibold">Nama Kendaraan</label>
          <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror"
              value="{{ old('name') }}" placeholder="Masukkan nama kendaraan" id="name"
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
          <label for="no_polisi" class="form-label mb-1 fw-semibold">Nomor Polisi</label>
          <input required type="text" name="no_polisi" class="form-control @error('no_polisi') is-invalid @enderror"
              value="{{ old('no_polisi') }}" placeholder="Masukkan nomor polisi" id="no_polisi"
              autocomplete="off">
          @error('no_polisi')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="no_mesin" class="form-label mb-1 fw-semibold">Nomor Mesin</label>
          <input required type="text" name="no_mesin" class="form-control @error('no_mesin') is-invalid @enderror"
              value="{{ old('no_mesin') }}" placeholder="Masukkan nomor mesin" id="no_mesin"
              autocomplete="off">
          @error('no_mesin')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="merk" class="form-label mb-1 fw-semibold">Merk</label>
          <input required type="text" name="merk" class="form-control @error('merk') is-invalid @enderror"
              value="{{ old('merk') }}" placeholder="Masukkan merk" id="merk"
              autocomplete="off">
          @error('merk')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="tahun" class="form-label mb-1 fw-semibold">Tahun</label>
          <input required type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror"
              value="{{ old('tahun') }}" placeholder="Masukkan tahun" id="tahun"
              autocomplete="off">
          @error('tahun')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>
<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
      <div class="form-group mb-3">
          <label for="warna" class="form-label mb-1 fw-semibold">Warna</label>
          <input required type="text" name="warna" class="form-control @error('warna') is-invalid @enderror"
              value="{{ old('warna') }}" placeholder="Masukkan warna" id="warna"
              autocomplete="off">
          @error('warna')
              <span class="invalid-feedback">{{ $message }}</span>
          @enderror
      </div>
  </div>
</div>

<div class="row px-1">
  <div class="col-md-6 pe-md-3 pe-lg-3">
    <div class="form-group mb-3">
      <label for="supir_id" class="form-label fw-semibold mb-1">Supir</label>
      <select name="supir_id" class="form-select @error('supir_id') is-invalid @enderror" id="supir_id" required>
          <option disabled selected>-- Pilih --</option>
          @foreach ($supirs as $item)
            <option value="{{ $item->id }}" {{ $item->id == old('supir_id') ? 'selected' : '' }}>{{ $item->user->name }} - {{ $item->telepon }}</option>
          @endforeach
      </select>
      @error('supir_id')
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
