@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Post Twitter')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="card-title"><i class="fa fa-hdd"></i> Data Post Twitter</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end my-2">
                    <button type="button" class="btn btn-xs bg-purple mr-2" data-toggle="modal" data-target="#modalImportPost">
                        <i class="fa fa-file"></i> Import Data
                    </button>
                    <a href="{{ route('post.create') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> Tambah post</a>
                </div>
                <div id="data-table">
                    @include('admin/post/table')
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalImportPost" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalImportPostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalImportPostLabel">Import Data Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Warning!</h4>
                        - Format Import Data Post <br>
                    </div>
                    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">no</th>
                                <th class="text-center">post</th>
                                <th class="text-center">url_image</th>
                                <th class="text-center">day</th>
                                <th class="text-center">time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-sm">
                                <td class="text-center">1</td>
                                <td class="text-center">a post </td>
                                <td class="text-center">url from pinterest</td>
                                <td class="text-center">wednesday</td>
                                <td class="text-center">13:30:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('importpost') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Import </label>
                                <input type="file" class="form-control" name="fileImport" placeholder="File Import"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Import </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
@if(session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status') }}',
    })
</script>
@endif
<script>
    function deleteFunction($id) {
        event.preventDefault();
        const form = 'form-delete-' + $id;
        Swal.fire({
            title: 'Apakah anda yakin menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(form).submit();
            }
        }).catch((error) => {
            console.log(error);
        })
    }
</script>
@endpush
@endsection
