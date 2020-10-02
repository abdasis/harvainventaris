@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Kategori</a></li>
                    <li class="breadcrumb-item active">Daftar Kategori</li>
                </ol>
            </div>
            <h4 class="page-title">Kategori</h4>
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
        <button class="btn btn-sm btn-blue btn-add">Tambah Kategori</button>
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
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if ($category->status == 'active')
                                        <div class="badge badge-soft-success">{{ $category->status }}</div>
                                    @else
                                        <div class="badge badge-soft-danger">{{ $category->status }}</div>
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($category->created_at)) }}</td>
                                <td>
                                    <button class="btn btn-sm btn-warning btn-edit mr-1" data-id="{{ $category->id }}"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="submit" class="btn btn-danger btn-sm waves-ripple mr-1 btn-hapus" data-id="{{ $category->id }}">
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
        $('.btn-add').on('click', function(){
            $.ajax({
                url: "/admin/kategori-barang/create",
                method: 'GET',
                success: function(data){
                    $('#standard-modal').find('.modal-body').html(data)
                    $('#standard-modalLabel').text('Tambah Kategori')
                    $('#standard-modal').modal('show')
                }
            })
        })

        $('.btn-edit').on('click', function(){
            var id = $(this).data('id');
            $.ajax({
                url: "/admin/kategori-barang/"+id+'/edit',
                method: 'GET',
                success: function(data){
                    console.log(data)
                    $('#standard-modal').find('.modal-body').html(data)
                    $('#standard-modalLabel').text('Sunting Kategori')
                    $('#standard-modal').modal('show')
                }
            })
        })

        $('.btn-hapus').on('click', function(e){
            e.preventDefault();
            let id =  $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "/admin/kategori-barang/" + id,
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
