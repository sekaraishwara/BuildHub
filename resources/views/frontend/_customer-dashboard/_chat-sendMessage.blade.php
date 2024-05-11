@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('customer.chat') }}">Chat<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="">{{ session('store_name') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex align-items-center">
                                    <img src="{{ session('store_logo') }}" width="40" alt="">
                                    <h6 class="ml-3">{{ session('store_name') }}</h6>
                                    <small class="ml-2 text-muted">Active 5 min ago</small>
                                </div>
                            </div>
                            <div class="card-body pt-5">
                                <div class="alert alert-warning small" role="alert">
                                    Demi keamanan & kenyamanan Anda, mohon untuk tidak bertransaksi di luar platform
                                    BuildHub.
                                </div>
                                <div class="text-center pb-3 text-muted small">Today</div>
                                <!--  receiver sender -->
                                <div class="d-flex justify-content-start">
                                </div>
                                <div class="my-3"></div>
                                <!--  receiver sender -->
                                @foreach ($messages as $item)
                                    <div class="d-flex justify-content-end mb-3">
                                        <section class="col-8 border p-3">
                                            <p>{!! $item->message !!}</p>
                                            <small class="text-muted">{{ $item->created_at->format('l, h:m:s') }}</small>
                                        </section>
                                        <section class="col-1">
                                            <img id="avatarProfileImg" src="{{ asset('default-uploads/avatar.jpg') }}"
                                                alt="" width="50">
                                        </section>
                                    </div>
                                @endforeach
                                <div class="mb-5"></div>
                                <form action="{{ route('customer.send.sendMessage') }}" method="post">
                                    @csrf
                                    <input id="x" name="message" class="d-none">
                                    <trix-editor input="x" class="py-3"></trix-editor>
                                    <div class="text-right">
                                        <button class="btn my-3">Send Message</button>
                                    </div>
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
