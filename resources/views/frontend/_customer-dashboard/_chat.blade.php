@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home / </a></li>
                                <li><a href="{{ route('customer.dashboard') }}">Dashboard /</a>
                                </li>
                                <li class="active"><a href="{{ route('customer.profile') }}">Chat</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend._customer-dashboard.sidebar-chat')
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
                            <div class="card-body">

                                <div class="alert alert-warning small" role="alert">
                                    Demi keamanan & kenyamanan Anda, mohon untuk tidak bertransaksi di luar
                                    platform
                                    BuildHub.
                                </div>
                                <div class="text-center pb-3">Today</div>
                                <section class="border px-3">
                                    <p>Selamat Datang di BuildHub.com 👋</p>
                                    <p>Yuk kenalan dengan fitur-fitur yang bisa Anda nikmati untuk mewujudkan Rumah impian
                                        di Buildhub.com 😊 </p>
                                    <small class="text-muted">{{ date('l, h:m:s') }}</small>
                                </section>
                                <div class="mb-5"></div>
                                <form>
                                    <input id="x" value="Write a message..." type="hidden" name="content">
                                    <trix-editor input="x"></trix-editor>
                                </form>

                            </div>
                            <div class="card-footer border-0 bg-light">

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
