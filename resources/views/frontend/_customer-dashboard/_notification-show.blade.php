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
                                    <p class="text-muted">Mark as Read</p>
                                </div>
                            </div>
                            @foreach ($notify as $item)
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="notification-message col-9">
                                            <h6 class="mb-2">{{ $item->title }}</h6>
                                            <p>{{ substr($item->message, 0, 120) }}...</p>
                                        </div>
                                        <div class="notification-date col-3 text-right">
                                            <p>{{ $item->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .card-notification .card-body:hover {
            background-color: #f0f0f0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
    </style>
@endsection
