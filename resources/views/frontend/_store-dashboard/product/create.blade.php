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
                                <li><a href="{{ route('store.dashboard') }}">Dashboard /</a>
                                </li>
                                <li class="active"><a href="{{ route('store.product') }}">Product</a>
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
                @include('frontend._store-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single mb-5">

                        <form action="">

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h5>Create Product</h5>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Name">Product Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Name">Product Name</label>
                                        <input class="form-control" type="text" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Name">Product Name</label>
                                        <input class="form-control" type="text" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Name">Product Name</label>
                                        <input class="form-control" type="text" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Name">Product Name</label>
                                        <input class="form-control" type="text" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Name">Product Name</label>
                                        <textarea class="form-control" type="text" name="image" id="image"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-save">Save Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
