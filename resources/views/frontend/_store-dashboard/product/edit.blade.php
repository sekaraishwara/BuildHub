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

                        <form method="POST" action="{{ route('store.product.update', ['id' => $data->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <h5>Edit Product</h5>
                                </div>
                                <div class="col-12">
                                    <x-image-preview :height="200" :width="200" :source="$data?->image" />
                                    <div class="form-group">
                                        <label for="Name">Product Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Name">product Name</label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Category">Category</label>
                                        <input class="form-control" type="text" name="category" id="category"
                                            value="{{ $data->category }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Price">Price</label>
                                        <input class="form-control" id="price" name="price"
                                            value="{{ $data->price }}">

                                        <label for="Status">Status</label>
                                        <input class="form-control" id="status" name="status"
                                            value="{{ $data->status }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Desc">Desc</label>
                                        <textarea class="form-control" id="desc" name="desc">{{ $data->desc }}</textarea>
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
