@extends('dashboard.app.main')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your category</h4>
                        </div>
                        <form action="/dashboard/support" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        Kategory</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                            name="nama" id="nama" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        @error('img')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input type="hidden" name="oldImage" value="{{ $support->img }}">
                                        <label for="img">Upload Gambar</label>
                                        @if ($support->img)
                                            <img src="{{ asset('storage/' . $support->img) }}"
                                                class="img-preview img-fluid col-sm-4 mb-3 d-block" alt="">
                                        @else
                                            <img class="img-preview img-fluid col-sm-4 mb-3" alt="">
                                        @endif
                                        <input type="file" class="img form-control-file @error('img') is-invalid @enderror"
                                            id="img" name="img" onchange="previewImage()">
                                    </div>
    
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
