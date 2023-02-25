@extends('dashboard.app.main')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Write Your Post</h4>
                        </div>
                        <form action="/dashboard/blog" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control  @error('judul') is-invalid @enderror"
                                            name="judul" id="judul" required autofocus value="{{ old('judul') }}">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group
                                            row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control  @error('slug') is-invalid @enderror"
                                            id="slug" name="slug" value="{{ old('slug') }}">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="selectric-wrapper selectric-form-control selectric-selectric">
                                            <div class="selectric-hide-select">
                                                <select class="form-control selectric" name="category_id" tabindex="-1">
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                <div class="col-sm-12 col-md-7">
                                    @error('img')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="oldImage" value="{{ $item->img }}">
                                    <label for="img">Upload Gambar</label>
                                    @if ($item->img)
                                        <img src="{{ asset('storage/' . $item->img) }}"
                                            class="img-preview img-fluid col-sm-4 mb-3 d-block" alt="">
                                    @else
                                        <img class="img-preview img-fluid col-sm-4 mb-3" alt="">
                                    @endif
                                    <input type="file" class="img form-control-file @error('img') is-invalid @enderror"
                                        id="img" name="img" onchange="previewImage()">
                                </div>

                            </div>

                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                <div class="col-sm-12 col-md-7">
                                        <label for="tags">Tags</label>
                                        <select name="tags[]" class="form-control select2" multiple="multiple">
                                            @foreach($tag as $tag)
                                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                   
                                </div>
                            </div> --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="note-editor note-frame card">
                                        <input type="hidden" id="isi" name="isi" value="{{ old('isi') }}">
                                        @error('isi')
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>×</span>
                                                    </button>
                                                    {{ $message }}
                                                </div>
                                            </div>
                                        @enderror
                                        <trix-editor input="isi"></trix-editor>
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

    <script>
        const judul = document.querySelector('#judul');
        const slug = document.querySelector('#slug');

        judul.addEventListener('change', function() {
            fetch('/dashboard/blog/chekSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewImage() {
            const img = document.querySelector('#img');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(img.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
