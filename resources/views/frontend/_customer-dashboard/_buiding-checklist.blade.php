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
                <div class="col-lg-12 col-md-9 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header bg-white">

                                <h5> <i class="ti-list mr-3"></i>Building Checklist </h5>
                            </div>
                            <div class="card-body ">
                                <div class="col-12 ">
                                    <div class="d-flex justify-content-between">
                                        <div class="row p-0 m-0">
                                            <div class="d-flex align-items-center">
                                                <i class="ti-user mr-1 icon-user"></i>
                                                <div class="col-12">
                                                    <h6>{{ auth()->user()->name }}</h6> Properties
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  p-0 m-0">
                                            <div class="d-flex align-items-center">
                                                <i class="ti-home mr-1 icon-user"></i>
                                                <div class="col-12">
                                                    <h6>Lokasi Pembangunan</h6> Kelapa Gading
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <input type="checkbox" id="itemCheckbox">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="itemInput"
                                            placeholder="My item here...">
                                    </div>
                                    <input type="text" class="form-control" id="notesInput" placeholder="Notes...">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <input type="checkbox" id="itemCheckbox">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="itemInput"
                                            placeholder="My item here...">
                                    </div>
                                    <input type="text" class="form-control" id="notesInput" placeholder="Notes...">
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <input type="checkbox" id="itemCheckbox">
                                    <div class="col-6">
                                        <input type="text" class="form-control" id="itemInput"
                                            placeholder="My item here...">
                                    </div>
                                    <input type="text" class="form-control" id="notesInput" placeholder="Notes...">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button class="btn">Save Changes</button>
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

<style>
    .icon-user {
        font-size: 30px;
    }
</style>
