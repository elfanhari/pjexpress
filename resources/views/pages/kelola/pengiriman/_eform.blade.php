<div class="col-md-6 ps-0">

    <div class="row px-1 mt-3">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="no_pengiriman" class="form-label mb-1 fw-semibold">No. Pengiriman</label>
                <input required type="text" name="no_pengiriman"
                    class="form-control @error('no_pengiriman') is-invalid @enderror"
                    value="{{ old('no_pengiriman', $pengiriman->no_pengiriman) }}"
                    placeholder="Masukkan nomor pengiriman" id="no_pengiriman" autocomplete="off">
                @error('no_pengiriman')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="tgl_pengiriman" class="form-label mb-1 fw-semibold">Tanggal Pengiriman</label>
                <input required type="date" name="tgl_pengiriman"
                    class="form-control @error('tgl_pengiriman') is-invalid @enderror"
                    value="{{ old('tgl_pengiriman', $pengiriman->tgl_pengiriman) }}"
                    placeholder="Masukkan nama pengguna" id="tgl_pengiriman" autocomplete="off">
                @error('tgl_pengiriman')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="kendaraan_id" class="form-label fw-semibold mb-1">Kendaraan</label>
                <select name="kendaraan_id" class="form-select @error('kendaraan_id') is-invalid @enderror"
                    id="kendaraan_id" required>
                    <option disabled selected>-- Pilih --</option>
                    @foreach ($kendaraans as $item)
                        <option value="{{ $item->id }}"
                            {{ $item->id == old('kendaraan_id', $pengiriman->kendaraan_id) ? 'selected' : '' }}>
                            Kendaraan: {{ $item->name }} | Supir: {{ $item->supir->user->name }}</option>
                    @endforeach
                </select>
                @error('kendaraan_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="pelanggan_id" class="form-label fw-semibold mb-1">Pengirim</label>
                <select name="pelanggan_id" class="form-select @error('pelanggan_id') is-invalid @enderror"
                    id="pelanggan_id" required>
                    <option disabled selected>-- Pilih --</option>
                    @foreach ($pengirims as $item)
                        <option value="{{ $item->id }}"
                            {{ $item->id == old('pelanggan_id', $pengiriman->pelanggan_id) ? 'selected' : '' }}>
                            {{ $item->name }} - {{ $item->telepon }}</option>
                    @endforeach
                </select>
                @error('pelanggan_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="nama_penerima" class="form-label mb-1 fw-semibold">Nama Penerima</label>
                <input required type="text" name="nama_penerima"
                    class="form-control @error('nama_penerima') is-invalid @enderror"
                    value="{{ old('nama_penerima', $pengiriman->nama_penerima) }}" placeholder="Masukkan nama penerima"
                    id="nama_penerima" autocomplete="off">
                @error('nama_penerima')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="alamat_penerima" class="form-label mb-1 fw-semibold">Alamat Penerima</label>
                <textarea required name="alamat_penerima" id="" class="form-control" placeholder="Masukkan alamat penerima">{{ old('alamat_penerima', $pengiriman->alamat_penerima) }}</textarea>
                @error('alamat_penerima')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="nama_barang" class="form-label mb-1 fw-semibold">Nama Barang</label>
                <input required type="text" name="nama_barang"
                    class="form-control @error('nama_barang') is-invalid @enderror"
                    value="{{ old('nama_barang', $pengiriman->nama_barang) }}" placeholder="Masukkan nama barang"
                    id="nama_barang" autocomplete="off">
                @error('nama_barang')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="jumlah_barang" class="form-label mb-1 fw-semibold">Jumlah Barang</label>
                <input required type="number" name="jumlah_barang"
                    class="form-control @error('jumlah_barang') is-invalid @enderror"
                    value="{{ old('jumlah_barang', $pengiriman->jumlah_barang) }}" placeholder="Masukkan jumlah barang"
                    id="jumlah_barang" autocomplete="off">
                @error('jumlah_barang')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row px-1">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="biaya_kirim" class="form-label mb-1 fw-semibold">Biaya Kirim</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp</span>
                    <input required type="number" name="biaya_kirim" class="form-control"
                        @error('biaya_kirim') is-invalid @enderror
                        value="{{ old('biaya_kirim', $pengiriman->biaya_kirim) }}" placeholder="Masukkan biaya kirim"
                        id="biaya_kirim" aria-label="Username" aria-describedby="basic-addon1">
                    @error('biaya_kirim')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row px-1">
      <div class="col pe-4">
          <div class="form-group mb-3">
              <label for="keterangan" class="form-label mb-1 fw-semibold">Keterangan</label>
              <textarea name="keterangan" id="" class="form-control" placeholder="Masukkan Keterangan">{{ old('keterangan', $pengiriman->keterangan) }}</textarea>
              @error('keterangan')
                  <span class="invalid-feedback">{{ $message }}</span>
              @enderror
          </div>
      </div>
    </div>
</div>
<div class="col-md-6 ps-0">
    <div class="row px-1 mt-md-3">
        <div class="col pe-4">
            <div class="form-group mb-3">
                <label for="status" class="form-label mb-1 fw-semibold">Status Pengiriman</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" id="status"
                    required>
                    <option disabled selected>-- Pilih --</option>
                    <option value="Proses Pengiriman"
                        {{ 'Proses Pengiriman' == old('status', $pengiriman->status) ? 'selected' : '' }}>Proses
                        Pengiriman</option>
                    <option value="Barang Terkirim"
                        {{ 'Barang Terkirim' == old('status', $pengiriman->status) ? 'selected' : '' }}>Barang Terkirim
                    </option>
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="col pe-4 mt-1">
        @if ($pengiriman->foto)
            <div class="table-responsive ps-1 pe-0">
                <table class="table table-border table-hover mt-xs-2">

                    <tr class="text-center table-secondary">
                        <td>Foto Pengiriman</td>
                    </tr>
                    <tr>
                        <td class="text-center"><img src="/fotopengiriman/{{ $pengiriman->foto }}" alt=""
                                style="width: 120px" class=""></td>
                    </tr>
                </table>

                <input type="hidden" name="old_foto" id="" value="{{ $pengiriman->foto }}" hidden>

            </div>
            <small class="fs-12 ps-2"> <i>Ganti Foto Pengiriman</i></small>
        @else
            <small class="fs-12 ps-2"> <i>Tambah Foto Pengiriman</i></small>
        @endif

        <div class="ps-2 pe-0">
            <div class="my-2">
                <img class="img-preview img-fluid mb-2 col-sm-6 oferflow-y-hidden" style="max-width: 300px;">
            </div>
            <div class="input-group mb-3">
                <input type="file" accept="image/*" class="form-control @error('foto') is-invalid @enderror"
                    name="foto" id="gambar" onchange="previewImage()">
                @error('foto')
                    <span class="invalid-feedback mt-1">{{ $message }}</span>
                @enderror
            </div>
        </div>

        </form>
    </div>

    <div class="row px-1">
        <div class="text-start col">
            <button type="submit" class="btn btn-sm btn-primary py-2 px-3 mb-2 rounded-3 fw-bold">Simpan</button>
        </div>
    </div>
</div>

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
