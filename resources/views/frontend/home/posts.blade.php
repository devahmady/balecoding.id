@extends('frontend.app.main')
@section('content')
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
           <!-- Breaking News Start -->
    <div class="container-fluid bg-white py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking
                            News</div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            @foreach ($terbaru as $item)
                                <div class="text-truncate">
                                    <a class="text-white text-uppercase font-weight-semi-bold"
                                        href="/frontend/home/blog/{{ $item->slug }}">Lorem ipsum
                                        {{ $item->judul }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        @if ($data1->img)
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $data1->img) }}"
                                style="object-fit: cover;">
                        @else
                            <img class="img-fluid w-100"
                                src="https://source.unsplash.com/800x381?{{ $data1->category->name }}"
                                style="object-fit: cover;">
                        @endif
                        <div class="bg-white border border-top-0 p-4">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="/frontend/home/category/{{ $data1->category->slug }}">{{ $data1->category->name }}</a>
                                <a class="text-body" href="">{{ $data1->created_at }}</a>
                            </div>
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{ $data1->judul }}</h1>
                            <p>{!! $data1->isi !!}</p>

                            invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam
                            lorem sed. Magna amet sed rebum eos. Clita no magna no dolor erat diam tempor
                            rebum consetetur, sanctus labore sed nonumy diam lorem amet eirmod. No at tempor
                            sea diam kasd, takimata ea nonumy elitr sadipscing gubergren erat. Gubergren at
                            lorem invidunt sadipscing rebum sit amet ut ut, voluptua diam dolores at
                            sadipscing stet. Clita dolor amet dolor ipsum vero ea ea eos. Invidunt sed diam
                            dolores takimata dolor dolore dolore sit. Sit ipsum erat amet lorem et, magna
                            sea at sed et eos. Accusam eirmod kasd lorem clita sanctus ut consetetur et. Et
                            duo tempor sea kasd clita ipsum et. Takimata kasd diam justo est eos erat
                            aliquyam et ut.</p>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25"
                                    alt="">
                                <span>{{ $data1->author->name }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i>{{ $views }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <div class="media mb-4">
                                @foreach ($data1->komentar as $item)
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold"
                                                href="">{{ $item->username }}</a>
                                            <small><i>{{ $item->created_at }}</i></small>
                                        </h6>
                                        <p>{{ $item->comment }}</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-4">
                            <form action="/frontend/home/blog/store" method="post">
                                @csrf
                                <div class="form-row">
                                    <input type="hidden" name="id" value="{{ $data1->id }}" class="form-control">
                                    <input type="hidden" name="parent_id" id="parent_id" class="form-control">
                                    @auth
                                        <div class="col-12 col-lg-6">
                                            <input type="text" class="form-control" id="username"
                                                value="{{ Auth::user()->name }}" name="username" placeholder="Your Name*">
                                        </div>
                                    @else
                                        <a href="/frontend/auth/login" class="login-btn">
                                            <button class="btn vizew-btn mb-3 bg-primary ml-3" type="submit"> Login
                                                For Comment</button>
                                        </a>
                                    @endauth

                                </div>


                                <div class="form-group">
                                    <label for="comment">comment *</label>
                                    <textarea id="comment" name="comment" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Comment Form End -->
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
    <!-- News With Sidebar End -->
@endsection
