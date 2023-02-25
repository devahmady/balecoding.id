@extends('dashboard.app.main')
@section('content')
@can('admin')
    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Artikel</h5>
                                    <h2 class="mb-3 font-18">{{ $blogtotal }}</h2>
                                    <a href="">
                                        <p class="mb-0"><span class="col-green">Details</span></p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="banner-img">
                                    <img src="{{ asset('assets') }}/img/1.png" alt="" width="85">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">File</h5>
                                    <h2 class="mb-3 font-18">{{ $downloadtotal }}</h2>
                                    <a href="">
                                        <p class="mb-0"><span class="col-green">Details</span></p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="banner-img">
                                    <img src="{{ asset('assets') }}/img/3.png" alt="" width="85">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Member</h5>
                                    <h2 class="mb-3 font-18">{{ $usertotal }}</h2>
                                    <a href="">
                                        <p class="mb-0"><span class="col-green">Details</span></p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="banner-img">
                                    <img src="{{ asset('assets') }}/img/2.png" alt="" width="85">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">User Online</h5>
                                    <h2 class="mb-3 font-18">{{ $online }}</h2>
                                    <a href="">
                                        <p class="mb-0"><span class="col-green">Details</span></p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="banner-img">
                                    <img src="{{ asset('assets') }}/img/5.png" alt="" width="85">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card ">
        <div class="card-header">
            <h4>Pengujung</h4>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div id="chart">
                    </div>

                </div>
                <div class="col-lg-5">
                    <div class="card-header">
                        <h4>Blog Trending</h4>
                    </div>
                    @foreach ($terbaru as $item)
                        <li>{{ $item->judul }} <span class="text-danger">[{{ $item->views }}]</span></li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Advanced Table</h4>
                    <div class="card-header-form">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>Status User</th>
                                    <th>Status</th>

                                </tr>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->is_admin == 1)
                                                <i class="fas fa-shield-alt"
                                                    style="color: {{ $item->is_admin ? 'green' : 'gray' }}">
                                                    Administrator</i>
                                            @else
                                                <i class="fas fa-user"
                                                    style="color: {{ $item->is_admin ? 'gray' : 'green' }}"> Member</i>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->is_online == 1)
                                                <i class="fas fa-circle"
                                                    style="color: {{ $item->is_online ? 'green' : 'gray' }}"> Online</i>
                                            @else
                                                <i class="far fa-circle"
                                                    style="color: {{ $item->is_online ? 'green' : 'gray' }}"> Offline</i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <!-- Support tickets -->
        <div class="card">
            <div class="card-header">
                <h4>Komentar</h4>
                <form class="card-header-form">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </form>
            </div>
            <div class="card-body">
                @foreach ($komentar as $item)
                    <div class="support-ticket media pb-1 mb-3">
                        <img src="{{ asset('assets') }}/img/users/user-1.png" class="user-img mr-2" alt="">
                        <div class="media-body ml-3">
                            <div class="badge badge-pill badge-success mb-1 float-right">Show</div>
                            <span class="font-weight-bold">#{{ $item->blog_id }}</span>
                            <p class="my-1">{{ $item->comment }}</p>
                            <small class="text-muted">Created by <span
                                    class="font-weight-bold font-13">{{ $item->username }}</span>
                                &nbsp;&nbsp; {{ $item->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- Support tickets -->
    </div>
@endcan
   
@endsection
