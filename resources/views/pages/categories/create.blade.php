<form action="{{ route('kategori-barang.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="nama-kategori">Nama Kategori</label>
        <input type="text" name="name" class="form-control" placeholder="Masukan Nama Kategori" id="nama-kategori">
    </div>

    <div class="form-group">
        <label for="status-kategori">Status Kategori</label>
        <select required id="status-kategori" class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-blue float-right" type="submit" id="submit">Simpan Data</button>
    </div>
</form>
