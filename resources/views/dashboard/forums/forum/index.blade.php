@extends('dashboard.app.main')
@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        @if (session('ok'))
                            <div class="alert alert-primary alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ session('ok') }}
                                </div>
                            </div>
                        @endif
                        <div class="boxs mail_listing">
                            <div class="inbox-center table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="1">
                                                <div class="inbox-header">
                                                    From : {{ Auth::user()->username }}
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="/dashboard/forums/forum" method="POST" class="composeForm" enctype="multipart/form-data">
                                        @csrf
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
                                            <trix-editor input="isi" type="file"></trix-editor>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <button type="submit"
                                                    class="btn btn-info btn-border-radius waves-effect">Post</button>

                                            </div>
                                        </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-md-12">
                    <!-- Support tickets -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Support Ticket</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($diskus as $item)
                                <div class="support-ticket media pb-1 mb-3">
                                    <img src="{{ asset('assets') }}/img/users/user-1.png" class="user-img mr-2"
                                        alt="">
                                    <div class="media-body ml-3">
                                        <a href="/dashboard/forums/user/{{ $item->id }}">
                                            <div class="badge badge-pill badge-success mb-1 float-right">Komentar
                                                {{ count($item->comment) }}
                                            </div>
                                        </a>
                                        <span class="font-weight-bold">#{{ $item->user->id }}</span>
                                        <a class="status"><i class="material-icons online">fiber_manual_record</i>online </a>
                                        <p class="my-1 ">{!! $item->isi !!}</p>
                                        <small class="text-muted">Created by <span
                                                class="font-weight-bold font-13">{{ $item->user->username }}</span>
                                            &nbsp;&nbsp; - {{ $item->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <a href="javascript:void(0)" class="card-footer card-link text-center small "></a>
                    </div>
                    <!-- Support tickets -->
                </div>
            </div>
        </div>
    </section>
@endsection
