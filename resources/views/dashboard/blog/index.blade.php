@extends('dashboard.app.main')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Jumlah Artikel <span
                                            class="badge badge-white">{{$jumlah}}</span></a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Artikel</h4>
                        </div>

                        <div class="card-body">
                            @if (session()->has('ok'))
                                <div class="alert alert-primary alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                        </button>
                                        {{ session('ok') }}
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('del'))
                            <div class="alert alert-warning alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('del') }}
                                </div>
                            </div>
                        @endif
                            <a href="/dashboard/blog/create" class="btn btn-icon icon-left btn-primary"><i
                                    class="far fa-edit"></i> Create Post</a>
                            <div class="float-right">
                                <form action="/dashboard/blog">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" value="{{ request('search')}}" placeholder="Search">
                                        <div class="input-group-append">
                                            <button  type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>#</th>
                                            <th>Penulis</th>
                                            <th>Judul</th>
                                            <th>Kategory</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($blog as $item)
                                        @if ($item->count())
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->author->name }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->category->name ??''}}</td>
                                            <td>
                                                {{-- <a href="/frontend/home/blog/{{ $item->slug }}" class="btn bg-primary"><i
                                                      class="fas fa-external-link-alt"></i>
                                              </a> --}}
                                                <a href="/dashboard/blog/{{ $item->id }}/edit" class="btn bg-info"><i
                                                        class="far fa-edit"></i>
                                                </a>
                                                <form action="/dashboard/blog/{{ $item->id }}" method="post" class="d-inline">
                                                    @method('Delete')
                                                    @csrf
                                                    <button type="submit" value="delete" onclick="return confirm('Yakin !!!')"
                                                        class="btn bg-danger "><i
                                                            class="
                                                      fas fa-minus-circle"></i>
                                                    </button>
                                                    
                                                </form>
                                            </td>

                                        </tr>
                                        @else
                                        <div class="alert bg-danger">
                                            <div>
                                                <div>
                                                    <h3 class="font-bold">Info !</h3>
                                                    <div class="text-white">Artikel Yang anda cari tidak di temukan !!</div>
                                                </div>
                                            </div>
                                            <div class="flex-none">
                                                <a href="/">
                                                    <button class="btn btn-sm">Back</button>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        <nav>
                                            <ul class="pagination">
                                               {{$blog->links()}}
                                            </ul>
                                        </nav>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
