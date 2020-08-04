@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Barang</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
                    </ol>
                </div>
                <h4 class="page-title">Catat Barang</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (Session::has('status'))
                <div class="alert alert-success">{{ Session::get('status') }}</div>
            @endif
        </div>
    </div>

    <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="card-box">
                    <h5 class="text-uppercase bg-soft-success text-success p-2 mt-0 mb-3">General</h5>

                    <div class="form-group mb-3">
                        <label for="product-name">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="product-name" class="form-control" placeholder="e.g : Apple iMac">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-reference">Reference <span class="text-danger">*</span></label>
                        <input type="text" name="reference" id="product-reference" class="form-control" placeholder="e.g : Apple iMac">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-description">Product Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="diskripsi" id="product-description" rows="5" placeholder="Please enter description"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-summary">Spesifikasi Produk</label>
                        <textarea class="form-control" name="spesifikasi" id="product-summary" rows="3" placeholder="Please enter summary"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-category">Kategori Produk <span class="text-danger">*</span></label>
                        <select class="form-control" name="kategori" data-toggle="select2">
                            <option>Pilih Kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-category">Brand <span class="text-danger">*</span></label>
                        <select name="brand" class="form-control" data-toggle="select2">
                            <option>Pilih Brand</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-category">Supplier <span class="text-danger">*</span></label>
                        <select name="supplier" class="form-control" data-toggle="select2">
                            <option>Pilih Supplier</option>
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-price">Harga Jual <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="product-price" placeholder="Masukan harga jual" name="harga_jual">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-price">Harga Beli <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="product-price" name="harga_beli" placeholder="Masukan harga beli">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-price">Stok <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="product-price" name="stok" placeholder="1">
                    </div>


                    <div class="form-group">
                        <button class="btn btn-blue" type="submit"><i class="fa fa-save mr-1"></i>Simpan Barang</button>
                    </div>



                </div> <!-- end card-box -->
            </div> <!-- end col -->

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-uppercase bg-soft-success text-success p-2 mt-0 mb-3">Upload foto produk</h5>
                        <input type="file" name="gambar_produk" data-plugins="dropify" data-height="300" />
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </form>
@endsection


@section('css')
<link href="{{ url('/') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link href="{{ url('/') }}/assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />
<style>
    .file-icon p{
        font-size: 20px !important;
    }
</style>
@endsection


@section('js')
<!-- Select2 js-->
<script src="{{ url('/') }}/assets/libs/select2/js/select2.min.js"></script>
<!-- Dropzone file uploads-->
<script src="{{ url('/') }}/assets/libs/dropzone/min/dropzone.min.js"></script>
<!-- Init js-->
<script src="{{ url('/') }}/assets/js/pages/form-fileuploads.init.js"></script>
<!-- Init js -->
<script src="{{ url('/') }}/assets/js/pages/add-product.init.js"></script>
<script src="{{ url('/') }}/assets/js/pages/form-advanced.init.js"></script>
<script src="{{ url('/') }}/assets/libs/dropify/js/dropify.min.js"></script>
<!-- Init js-->
<script src="{{ url('/') }}/assets/js/pages/form-fileuploads.init.js"></script>
<script src="https://cdn.tiny.cloud/1/3kubek8r1p1mz4kvit7hc1z2mxd8wgg551cbeu82qkmenprf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#product-summary',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        menubar: false,
        height: 300
    });
</script>
@endsection
