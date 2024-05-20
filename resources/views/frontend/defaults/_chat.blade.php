@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('inbox') }}">Chat<i class="ti-arrow-right"></a></i></li>
                            <li class="active"><a href="">{{ $sender->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                @include('frontend._customer-dashboard.sidebar-chat')
                <div class="col-lg-9 col-12 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header bg-white border-0 py-3">
                                {{-- <img src="{{ $sender->logo }}" width="40" alt=""> --}}
                                <div class="row">
                                    <h6 class="ml-3">{{ $sender->name }}</h6>
                                </div>
                                <div class="row pt-1">
                                    <p class="ml-3 text-muted">Talk with {{ Str::upper($sender->role) }}</p>
                                </div>


                                {{-- <small class="ml-2 text-muted">Active 5 min ago</small> --}}

                            </div>
                            <div class="card">
                                <div class="bg-white" style="position: relative;">
                                    <div class="alert alert-warning small m-3" role="alert">
                                        Demi keamanan & kenyamanan Anda, mohon untuk tidak bertransaksi di luar platform
                                        BuildHub.
                                    </div>
                                </div>
                                <div class="card-body pt-2" style="max-height: 400px; overflow-y: auto;">
                                    <div class="text-center pb-3">Today</div>
                                    @foreach ($messages as $item)
                                        @if ($item->sender_id == Auth::id())
                                            <div class="d-flex justify-content-end mb-2">
                                                <section class="col-6 p-2 text-right">
                                                    <p>{!! $item->message !!}</p>
                                                    <small
                                                        class="text-muted">{{ $item->updated_at->diffForHumans() }}</small>
                                                </section>
                                                <section class="col-1">
                                                    <img id="avatarProfileImg"
                                                        src="{{ asset('default-uploads/avatar.jpg') }}" alt=""
                                                        width="50">
                                                </section>
                                            </div>
                                        @else
                                            <!-- Bagian Gambar di sebelah kiri -->
                                            <div class="d-flex justify-content-start mb-2">
                                                <section class="col-1">
                                                    <img id="avatarProfileImg"
                                                        src="{{ asset('default-uploads/avatar.jpg') }}" alt=""
                                                        width="50">
                                                </section>
                                                <!-- Bagian Konten Pesan di sebelah kiri -->
                                                <section class="col-6 p-1">
                                                    <p>{!! $item->message !!}</p>
                                                    <small
                                                        class="text-muted">{{ $item->updated_at->diffForHumans() }}</small>

                                                </section>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="card-footer bg-white">
                                    <form class="py-2" action="{{ route('inbox.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="receiver_id" value="{{ $sender->id }}">
                                        <input id="x" name="message" class="d-none">
                                        <trix-editor input="x"></trix-editor>
                                        <div class="text-right">
                                            <button type="submit" class="btn mt-4">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
