@extends('frontend.app.main')
@section('content')
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Category: {{ $category }}</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                        @foreach ($blog as $item)
                            <div class="col-lg-6">
                                <div class="position-relative mb-3">
                                    @if ($item->img)
                                        
                                    <img class="img-fluid w-100" src="{{ asset('storage/' . $item->img) }}" style="object-fit: cover;">
                                    @else
                                    <img class="img-fluid w-100" src="https://source.unsplash.com/600x381?{{ $item->category->name }}" style="object-fit: cover;">
                                        
                                    @endif
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="">{{ $item->category->name}}</a>
                                            <a class="text-body" href=""><small>Jan 01, 2045</small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="/blog/{{ $item->slug }}">{{$item->judul}}</a>
                                        <p class="m-0">{{$item->more}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25"
                                                height="25" alt="">
                                            <small> {{ $item->author->username }}</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i
                                                    class="far fa-eye mr-2"></i>{{ $jumlah }}</small>
                                            <small class="ml-3"><i
                                                    class="far fa-comment mr-2"></i>{{ count($item->komentar) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Contact</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">

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
                            <h4 class="m-0 text-uppercase font-weight-bold">Support</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <div class="owl-carousel main-carousel position-relative owl-loaded owl-drag">
                                @foreach ($support as $item)
                                    <div class="owl-item active center">
                                        <div class="position-relative overflow-hidden">
                                            <img class="img-fluid w-100 " src="{{ asset('storage/' . $item->img) }}"
                                                style="object-fit: cover;" >
                                                <div class="overlay">
                                                    <div class="mb-2">
                                                       
                                                        <a class="badge badge-info text-uppercase "><small>{{ $item->nama }}</small></a>
                                                    </div>
                                                    
                                                </div>

                                        </div>
                                    </div>
                                @endforeach



                            </div>


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
                                                href="category/{{ $item->category->slug }}">{{ $item->category->name }}</a>
                                            <a class="text-body"
                                                href=""><small>{{ $item->created_at->diffForHumans() }}</small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                            href="blog/{{ $item->slug }}">{{ $item->judul }}</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">category</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                @foreach ($kategori as $item)
                                    
                                <a href="category/{{ $item->slug }}" class="btn btn-sm btn-outline-secondary m-1">{{$item->name}}</a>
                                @endforeach
                               
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
