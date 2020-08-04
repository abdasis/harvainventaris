@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Supplier</a></li>
                    <li class="breadcrumb-item active">Tambah Supplier</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Supplier</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-blue text-white">
                Form Tambah Supplier
            </div>
            <div class="card-body">
                <form action="{{ route('suppliers.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Supplier</label>
                        <input type="text" class="form-control" name="name" placeholder="Masukan Nama Supplier">
                    </div>


                    <div class="form-group">
                        <label for="email">Masukan Email</label>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Masukan Email Supplier">
                    </div>

                    <div class="form-group">
                        <label for="telepon">Masukan Nomor telepon</label>
                        <input id="telepon" class="form-control" placeholder="Masukan Nomor telepon" type="text" name="nomor_telepon">
                    </div>

                    <div class="form-group">
                        <label for="alamat-supplier">Alamat Supplier</label>
                        <textarea id="alamat-supplier" class="form-control" rows="4" name="alamat" placeholder="Masukan Alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="status-supplier">Status</label>
                        <select id="status-supplier" class="form-control" name="status">
                            <option value="">Pilih Stats</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Avatar</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Pilih avatar</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-blue" type="submit"><i class="fa fa-save mr-1"></i>Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

@endsection
