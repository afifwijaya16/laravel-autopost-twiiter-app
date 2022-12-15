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
                        <button type="button" class="btn btn-xs bg-purple mr-2" data-toggle="modal"
                            data-target="#modalImportPost">
                            <i class="fa fa-file"></i> Import Data
                        </button>
                        <a href="{{ route('post.create') }}" class="btn btn-xs btn-success mr-2"><i class="fa fa-plus"></i>
                            Tambah post</a>
                    </div>
                    <div class="d-flex justify-content-start my-2">
                        <div class="input-group-prepend">
                            <button type="button" id="settingOptionButton"
                                class="btn btn-xs btn-default dropdown-toggle disabled" data-toggle="dropdown">
                                Setting Option
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item btn-submit-delete-checkbox" href="#">Hapus</a>
                            </div>
                        </div>
                    </div>
                    <div id="data-table">
                        @include('admin/post/table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin/post/modalImport')
    @include('admin/post/javascript')
@endsection
