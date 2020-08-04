@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Barang</a></li>
                    <li class="breadcrumb-item active">Daftar Barang</li>
                </ol>
            </div>
            <h4 class="page-title">Data Barang</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        @if (Session::has('status'))
            <div class="alert alert-success">{{ Session::get('status') }}</div>
        @endif
    </div>
    <div class="col-md-12 mb-2">
        <a href="{{ route('barang.create') }}">
            <button class="btn btn-sm btn-blue btn-add">Tambah Barang</button>
        </a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Semua Kategori</h4>
                <p class="text-muted font-13 mb-4">
                    Daftar kategori dibawah ini digunakan untuk kategori produk saat penambahan barang
                </p>

                <table id="basic-datatable" class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Brand</th>
                            <th>Suppliers</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $key => $barang)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $barang->nama }}</td>
                                <td>{{ $barang->kategori }}</td>
                                <td>{{ $barang->brand }}</td>
                                <td>{{ $barang->supplier }}</td>
                                <td class="font-weight-bolder text-success">Rp. {{ number_format($barang->harga_jual,2,',','.') }}</td>
                                <td>{{ $barang->stok }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $barang->id) }}">
                                        <button class="btn btn-sm btn-warning btn-edit mr-1" type="submit"><i class="fas fa-pencil-alt"></i></button>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm waves-ripple mr-1 btn-hapus" data-id="{{ $barang->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
@endsection

@section('js')
<!-- third party js -->
<script src="{{ url('/') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ url('/') }}/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="{{ url('/') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ url('/') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    $(window).on('load', function(){

        $('.btn-hapus').on('click', function(e){
            e.preventDefault();
            let id =  $(this).data('id');
            Swal.fire({
                title: 'Yakin hapus data ini?',
                text: "Data yang dihapus tidak dapat di kembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "/admin/suppliers/" + id,
                    type: 'POST',
                    data: {id:id, _token:"{{ csrf_token() }}", _method:"DELETE"},
                    success: function (data) {
                        Swal.fire(
                            'Berhasil!',
                            'Data Berhasil Dihapus!',
                            'success'
                        )
                        setTimeout(function(){
                            location.reload(true)
                        }, 1000)

                    }
                });
            }
        })
    });
    })
</script>
<!-- third party js ends -->
<!-- Datatables init -->
<script src="{{ url('/') }}/assets/js/pages/datatables.init.js"></script>
@endsection

@section('css')
 <!-- third party css -->
 <link href="{{ url('/') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="{{ url('/') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="{{ url('/') }}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="{{ url('/') }}/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
@endsection
