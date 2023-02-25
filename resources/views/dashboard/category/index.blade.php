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
                                    <a class="nav-link active" href="#">All <span
                                            class="badge badge-white">10</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Draft <span class="badge badge-primary">2</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pending <span
                                            class="badge badge-primary">3</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
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
                            <h4>All Posts</h4>
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
                            <a href="/dashboard/category/create" class="btn btn-icon icon-left btn-primary"><i
                                    class="far fa-edit"></i> Create Category</a>
                            <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                            <th>Kategory</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($category as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    {{-- <a href="/frontend/home/blog/{{ $item->slug }}" class="btn bg-primary"><i
                                                          class="fas fa-external-link-alt"></i>
                                                  </a> --}}
                                                    <a href="/dashboard/blog/{{ $item->id }}/edit" class="btn bg-info"><i
                                                            class="far fa-edit"></i>
                                                    </a>
                                                    <form action="/dashboard/category/{{ $item->id }}" method="post" class="d-inline">
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
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                       {{$category->links()}}
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
