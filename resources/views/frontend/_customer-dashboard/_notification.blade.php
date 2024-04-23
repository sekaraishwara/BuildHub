@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('customer.notification') }}">Notification</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">

                <div class="col-12  mb-5">
                    <div class="content-single">
                        <div class="card card-notification">
                            <div class="card-header border-0">
                                <div class="text-right">
                                    <p class="text-muted">Tandai semua sudah dibaca</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notification-short">
                                        <h6>Title</h6>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                                    </div>
                                    <div class="notification-date">
                                        <p>{{ date('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notification-short">
                                        <h6>Title</h6>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                                    </div>
                                    <div class="notification-date">
                                        <p>{{ date('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notification-short">
                                        <h6>Title</h6>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                                    </div>
                                    <div class="notification-date">
                                        <p>{{ date('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notification-short">
                                        <h6>Title</h6>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                                    </div>
                                    <div class="notification-date">
                                        <p>{{ date('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="notification-short">
                                        <h6>Title</h6>
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. </p>
                                    </div>
                                    <div class="notification-date">
                                        <p>{{ date('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-0 bg-light">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .card-notification .card-body:hover {
            background-color: #f0f0f0;
            /* Warna latar belakang ketika dihover */
            cursor: pointer;
            /* Mengubah kursor menjadi tanda tangan ketika dihover */
            transition: background-color 0.3s ease;
            /* Animasi transisi ketika dihover */
        }
    </style>
@endsection
