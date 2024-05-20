@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home </a><i class="ti-arrow-right"></i> </a></li>
                                <li class="active"><a href="{{ route('professional.dashboard') }}">Dashboard</a>
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
                @include('frontend._professional-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-5">
                    <div class="content-single">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">My Dashboard</h4>
                            <h5 class="mb-0 text-muted">Welcome Back, {{ auth()->user()->name }} 👋</h5>
                        </div>

                        <hr>
                        <div class="dashboard_overview">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="mr-3">
                                                    <i class="fa fa-files-o fa-4x"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block font-weight-bold text-uppercase">Invoice
                                                        Active</span>
                                                    <h2 class="mb-0">0</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="text-secondary text-muted">Invoice Order </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="mr-3">
                                                    <i class="fa fa-suitcase fa-4x"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block font-weight-bold text-uppercase">My Service</span>
                                                    <h2 class="mb-0">{{ $services }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="text-secondary text-muted">All Services </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="mr-3">
                                                    <i class="fa fa-bar-chart fa-4x"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block font-weight-bold text-uppercase">
                                                        Current Income
                                                        <span class="dot"></span>
                                                    </span>
                                                    <h2 class="mb-0">Rp. 10.450.089</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="text-secondary text-muted">All Transaction
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 pt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <div class="mr-3">
                                                    <i class="fa fa-weixin fa-4x"></i>
                                                </div>
                                                <div>
                                                    <span class="d-block font-weight-bold text-uppercase">Chat</span>
                                                    <h2 class="mb-0">{{ $inbox }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="#" class="text-secondary text-muted">All Inbox </a>
                                            </div>
                                        </div>
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

    <style>
        .card:hover {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            margin-left: 3px;
            background-color: rgb(109, 226, 109);
            border-radius: 50%;
        }
    </style>
@endsection
