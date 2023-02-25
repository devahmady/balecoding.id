@extends('frontend.app.main')
@section('content')
    <div class="container-fluid mt-5 pt-3">
        <div class="vizew-typography-area mt-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <!-- Typography Content -->
                        <div class="typography-content">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">File</th>
                                        <th scope="col">hits</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col">action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($downloads as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->count }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                @auth
                                                    <form action="{{ route('downloads.download', $item->id) }}" method="get">
                                                        @csrf
                                                        <button type="submit" class="border-0"
                                                           ><i
                                                                class="btn-sm btn-danger mdi mdi-download">Download</i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="/frontend/auth/login" class="login-btn">
                                                        <button type="submit" class="border-0"><i
                                                                class="btn-sm btn-danger mdi mdi-download">Login For
                                                                Download</i> </button>
                                                    </a>
                                                @endauth


                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <!-- Social Follow Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Info</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">
                                @auth
                                    <a href="/dashboard/home/index" class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #39569E;">
                                        <i class="fas fa-home text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">Dashboard</span>
                                    </a>
                                @else
                                    <a href="/frontend/auth/login" class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #39569E;">
                                        <i class="fas fa-sign-in-alt text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">Login</span>
                                    </a>
                                    <a href="/frontend/auth/daftar" class="d-block w-100 text-white text-decoration-none mb-3"
                                        style="background: #ee0047;">
                                        <i class="fas fa-users text-center py-4 mr-3"
                                            style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                        <span class="font-weight-medium">Daftar Member</span>
                                    </a>
                                @endauth

                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                                    style="background: #94042f;">
                                    <i class="fas fa-envelope text-center py-4 mr-3"
                                        style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">DEVAHMADY@GMAIL.COM</span>
                                </a>
                                <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                                    style="background: #05ff82;">
                                    <i class="fab fa-whatsapp text-center py-4 mr-3"
                                        style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                    <span class="font-weight-medium">WHAPSAPP</span>
                                </a>


                            </div>
                        </div>
                        <!-- Social Follow End -->

                        <!-- Ads Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                            </div>
                            <div class="bg-white text-center border border-top-0 p-3">
                                <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
                            </div>
                        </div>
                        <!-- Ads End -->

                        <!-- Popular News Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">
                                @foreach ($terbaru as $item)
                                    <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                        <img class="img-fluid" src="img/news-110x110-1.jpg" alt="">
                                        <div
                                            class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                            <div class="mb-2">
                                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                    href="/frontend/home/category/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                                <a class="text-body"
                                                    href=""><small>{{ $item->created_at->diffForHumans() }}</small></a>
                                            </div>
                                            <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                                href="/frontend/home/blog/{{ $item->slug }}">{{ $item->judul }}</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- Popular News End -->

                        <!-- Newsletter Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                            </div>
                            <div class="bg-white text-center border border-top-0 p-3">
                                <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                                <div class="input-group mb-2" style="width: 100%;">
                                    <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                    </div>
                                </div>
                                <small>Lorem ipsum dolor sit amet elit</small>
                            </div>
                        </div>
                        <!-- Newsletter End -->

                        <!-- Tags Start -->
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-3">
                                <div class="d-flex flex-wrap m-n1">
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                                </div>
                            </div>
                        </div>
                        <!-- Tags End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
