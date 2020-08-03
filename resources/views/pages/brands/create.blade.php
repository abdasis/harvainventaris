<form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="brand">Nama Brand</label>
        <input type="text" name="name" placeholder="Masukan Nama Brand" class="form-control">
    </div>

    <div class="form-group">
        <label for="status-kategori">Status Kategori</label>
        <select required id="status-kategori" class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="active">Aktif</option>
            <option value="inactive">Tidak Aktif</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Brand Logo</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" name="logo_brand" class="custom-file-input" id="inputGroupFile04">
                <label class="custom-file-label" for="inputGroupFile04">Pilih logo</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-blue float-right"><i class="fa fa-save mr-1"></i>Simpan Brand</button>
    </div>

</form>