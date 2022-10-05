@extends('templateAdminLTE/home')
@section('sub-breadcrumb', 'Halaman Tambah Post')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="card-title"><i class="fa fa-hdd"></i> Tambah Post</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="max-height: calc(100vh - 300px);  overflow-y: auto;">
                        @csrf
                        <div class="table-responsive">
                            <table width="100%" class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td valign="top" width="30%">Post</td>
                                    <td valign="top" width="2%">:</td>
                                    <td valign="top">
                                        <textarea name="post"
                                            class="form-control form-control-sm @error('post') is-invalid @enderror"
                                            cols="30" rows="3">{{ old('post') }}</textarea>
                                        @error('post')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </td>
                                </tr>    
                                <tr>
                                    <td valign="top" width="30%">Url Image <span class="text-danger">*</span></td>
                                    <td valign="top" width="2%">:</td>
                                    <td valign="top">
                                        <input type="text"
                                            class="form-control form-control-sm @error('url_image_post') is-invalid @enderror"
                                            name="url_image_post" value="{{ old('url_image_post') }}" placeholder="Url Post ">
                                        @error('url_image_post')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="30%">Day Post <span class="text-danger">*</span></td>
                                    <td valign="top" width="2%">:</td>
                                    <td valign="top">
                                        <select class="form-control form-control-sm @error('day_post') is-invalid @enderror"  name="day_post">
                                            <option disabled selected>--Select day--</option>
                                            <option value="all">All Day</option>
                                            <option value="monday">Monday</option>
                                            <option value="tuesday">Tuesday</option>
                                            <option value="wednesday">Wednesday</option>
                                            <option value="thursday">Thursday</option>
                                            <option value="friday">Friday</option>
                                            <option value="saturday">Saturday</option>
                                            <option value="sunday">Sunday</option>
                                        </select>
                                        @error('day_post')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" width="30%">Time Post <span class="text-danger">*</span></td>
                                    <td valign="top" width="2%">:</td>
                                    <td valign="top">
                                        <div class="col-2">
                                            <input type="time"
                                            class="form-control form-control-sm @error('time_post') is-invalid @enderror"
                                            name="time_post" value="{{ old('time_post') }}" placeholder="Time Post ">
                                        </div>
                                        @error('time_post')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Save </button>
                        <a href="{{ route('post.index') }}" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
