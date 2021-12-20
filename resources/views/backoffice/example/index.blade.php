@extends('backoffice.layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>{{ $title }}</strong></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Basic Crud</h5>
                        <span>
                            <a href="{{route('example.create')}}" class="btn btn-primary">
                                <i class="las la-plus"></i> Tambah
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama</th>
                                    <th>Pekerjaan</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>

<form id="delete_data" action="" method="post" class="d-none">
    @method('DELETE')
    @csrf
</form>
@endsection

@section('javascript')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    window.onload = function() {
        $('#datatables-reponsive').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/backoffice/example",
            "columns": [{
                    "data": "id",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "name"
                },
                {
                    "data": "job"
                },
                {
                    "data": "age"
                },
                {
                    "data": "address"
                },
                {
                    "data": "image",
                    "class": "text-center",
                    "render": function(data, type, row) {
                        return '<img src="' + row.image_post + '" class="rounded" width="50">';
                    }
                },
                {
                    "data": "id",
                    "class": "text-center",
                    "render": function(data, type, row) {
                        return '<div class="d-flex"><a title="Lihat" class="btn btn-info btn-sm" href="example/' + row.id + '"><i class="fs-4 las la-eye"></i></a>&nbsp;' +
                            '<a title="Edit" class="btn btn-success btn-sm" href="example/' + row.id + '/edit"><i class="fs-4 las la-edit"></i></a>&nbsp;' +
                            '<button title="Hapus" class="btn btn-danger btn-sm" onclick="deleteData(' + row.id + ')"><i class="fs-4 las la-trash"></i></button></div>';
                    }
                },
            ],
        });
    }

    function deleteData(id) {
        $('#delete_data').attr('action', '/backoffice/example/' + id);
        if (confirm('apakah anda yakin akan menghapus ini ?')) {
            $('#delete_data').submit();
        }
    }
</script>

@endsection