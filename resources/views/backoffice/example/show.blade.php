@extends('backoffice.layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <div class="d-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-3">{{ $title }}</h1>
            <span>
                <a href="{{route('example.edit', $example->id)}}" class="btn btn-success">Edit</a>
                <button onclick="deleteData('{{$example->id}}')" class="btn btn-danger">Hapus</button>
                <form id="delete_data" action="" method="post" class="d-none">
                    @method('DELETE')
                    @csrf
                </form>
            </span>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <span class="fs-6">Username</span>
                                    <p class="fs-4">
                                        {{ $example->name }}
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <span class="fs-6">Jabatan</span>
                                    <p class="fs-4">
                                        {{ $example->job }}
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <span class="fs-6">Umur</span>
                                    <p class="fs-4">
                                        {{ $example->age }} Tahun
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <span class="fs-6">Alamat</span>
                                    <p class="fs-4">
                                        {{ $example->address }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <img alt="image" src="{{ $example->image_post }}" class="rounded-circle img-responsive mt-2" width="128" height="128" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@section('javascript')
<script>
    function deleteData(id) {
        $('#delete_data').attr('action', '/backoffice/example/' + id);
        if (confirm('apakah anda yakin akan menghapus ini ?')) {
            $('#delete_data').submit();
        }
    }
</script>
@endsection