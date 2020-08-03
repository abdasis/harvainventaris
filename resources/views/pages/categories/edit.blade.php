<form action="{{ route('kategori-barang.update', $category->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama-kategori">Nama Kategori</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Masukan Nama Kategori" id="nama-kategori">
    </div>

    <div class="form-group">
        <label for="status-kategori">Status Kategori</label>
        <select id="status-kategori" class="form-control" name="status">
            <option>Pilih Status</option>
            <option {{ $category->status == 'active' ? 'selected' : '' }} value="active">Aktif</option>
            <option {{ $category->status == 'inactive' ? 'selected' : '' }} value="inactive">Tidak Aktif</option>
        </select>
    </div>

    <div class="form-group">
        <button class="btn btn-blue float-right" type="submit" id="submit">Simpan Data</button>
    </div>
</form>
