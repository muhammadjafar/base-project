@extends('backoffice.layouts.main')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">
            <strong>
                {{ $title }}
            </strong>
        </h1>
        <div class="row">
            <div class="col-12">
                @error('error')
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-message">
                        {{$message}}
                    </div>
                </div>
                @enderror
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('example.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" name="name" placeholder="Isikan Nama Anda" type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="job">Pekerjaan</label>
                                        <input id="job" name="job" placeholder="Isikan Pekerjaan Anda" type="text" value="{{old('job')}}" class="form-control @error('job') is-invalid @enderror">
                                        @error('job')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea id="address" name="address" placeholder="Isikan Alamat Lengkap Anda" class="form-control @error('address') is-invalid @enderror" cols="20" rows="5">{{old('address')}}</textarea>
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="age">Umur</label>
                                        <input id="age" name="age" placeholder="Isikan Umur Anda" type="number" value="{{old('age')}}" class="form-control @error('age') is-invalid @enderror">
                                        @error('age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <img src="" class="img-preview img-fluid mb-3 col-sm-5" style="display: none">
                                        <input id="image" name="image" value="{{old('image')}}" onchange="previewImage(this);" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('javascript')
<script>
    function previewImage(input) {
        const imgPreview = $('.img-preview');
        imgPreview.css('display', 'block');

        const fileReader = new FileReader();
        fileReader.readAsDataURL(input.files[0]);

        fileReader.onload = function(event) {
            imgPreview.prop('src', event.target.result);
        }
    }
</script>
@endsection