@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('store.chat') }}">Chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                @include('frontend._store-dashboard.sidebar-chat')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('default-uploads/avatar.jpg') }}" width="40" alt="">
                                    <h6 class="ml-3">BuildHub CS</h6>
                                    <small class="ml-2 text-muted">Active 5 min ago</small>
                                </div>
                            </div>
                            <div class="card-body pt-5">
                                <div class="alert alert-warning small" role="alert">
                                    Demi keamanan & kenyamanan Anda, mohon untuk tidak bertransaksi di luar platform
                                    BuildHub.
                                </div>
                                <div class="text-center pb-3">Today</div>
                                <div class="d-flex justify-content-start">
                                    <!-- Bagian Gambar -->
                                    <section class="col-1">
                                        <img id="avatarProfileImg" src="{{ asset('default-uploads/avatar.jpg') }}"
                                            alt="" width="50">
                                    </section>
                                    <!-- Bagian Konten Pesan -->
                                    <section class="col-8 border p-3">
                                        <p>Selamat Datang di BuildHub.com 👋</p>
                                        <p>Yuk kenalan dengan fitur-fitur yang bisa Anda nikmati untuk mewujudkan Rumah
                                            impian di Buildhub.com 😊 </p>
                                        <small class="text-muted">{{ date('l, h:m:s') }}</small>
                                    </section>
                                </div>
                                <div class="mb-5"></div>
                                <form>
                                    <input id="x" name="content" class="d-none">
                                    <trix-editor input="x" class="py-3"></trix-editor>
                                </form>
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
