@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home <i class="ti-arrow-right"></i> </a></li>
                                <li><a href="{{ route('store.dashboard') }}">Dashboard <i class="ti-arrow-right"></i> </a>
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
                        <form method="POST" action="{{ route('store.product.update', ['id' => $data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row shop checkout p-0">
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
                                        <label for="Name">Product Name</label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Category">Category<span class="text-danger">*</span></label>
                                        <select name="category" class="form-select" id="category">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Price">Price</label>
                                        <input class="form-control" id="normal_price" name="normal_price"
                                            value="{{ $data->normal_price }}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="Price">Stock</label>
                                        <input class="form-control" id="stock" name="stock"
                                            value="{{ $data->stock }}">

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="Price">Discount</label>
                                        <input class="form-control" id="discount_price" name="discount_price"
                                            value="{{ $data->discount_price }}">
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="form-group">
                                        <label for="Desc">Product Description<span class="text-danger">*</span></label>
                                        <input id="desc" type="hidden" name="desc" value="{{ $data?->desc }}">
                                        <trix-editor input="desc" class="trix-content" id="desc"></trix-editor>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-save">Save Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
