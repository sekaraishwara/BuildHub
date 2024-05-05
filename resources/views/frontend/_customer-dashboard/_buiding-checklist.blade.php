@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ route('home') }}">Home </a><i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('customer.dashboard') }}">Dashboard </a><i class="ti-arrow-right"></i></a>
                            </li>
                            <li class="active"><a href="{{ route('customer.profile') }}">Building Checklist</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-8 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header">

                                <h5>My Building To-do List </h5>
                            </div>
                            <div class="card-body"></div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
