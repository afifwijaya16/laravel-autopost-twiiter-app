<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center">Post</th>
                <th class="text-center">Day Upload</th>
                <th class="text-center">Time Upload</th>
                <th class="text-center">Url Image</th>
                <th class="text-center" width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-left">{{ $hasil->post }}</td>
                <td class="text-left">{{ $hasil->day_post }}</td>
                <td class="text-left">{{ $hasil->time_post }}</td>
                <td class="text-center">
                    <a href="{{ $hasil->url_image_post }}" title="Url Image" target="_blank" class="btn btn-xs btn-info">
                        <i class="fa fa-link" aria-hidden="true"></i>
                    </a>
                </td>
                <td class="text-center">
                    <div class="btn-group">
                        <form action="{{ route('post.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}"
                            role="form" method="POST" class="btn-group btn-group-justified">
                            @csrf
                            @method('delete')
                            <div class="btn-group">
                                <a href="{{ route('post.edit', $hasil->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i></a>
                                <button class="btn btn-xs btn-danger" name="delete" type="submit" title="Hapus Data"
                                    onclick="deleteFunction({{ $hasil->id }})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
