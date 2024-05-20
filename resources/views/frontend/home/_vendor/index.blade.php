@extends('frontend.layouts.master')
@section('contents')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Vendor</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Product Style -->
    <section class="product-area shop-sidebar shop section p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="shop-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">Categories</h3>
                            <ul class="categor-list">
                                <li><a href="{{ route('vendor') }}">All Category Services</a>
                                </li>
                                @foreach ($vendorCategory as $category)
                                    <li><a
                                            href="{{ route('vendor', ['category' => $category->name]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Shop By Price -->
                        <div class="single-widget range">
                            <h3 class="title">Service by Price</h3>
                            <ul class="categor-list">
                                <li><a href="{{ route('vendor') }}">All Price</a></li>

                                @foreach ($priceRanges as $item)
                                    <li><a href="{{ route('vendor', ['price' => $item->price_ranges]) }}">
                                            Rp{{ $item->price_ranges }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-widget range">
                            <h3 class="title">Service by Location</h3>
                            <ul class="categor-list">
                                <li><a href="{{ route('vendor') }}">All Price</a>
                                </li>

                                @foreach ($regencies as $item)
                                    <li><a href="{{ route('vendor', ['location' => $item->name]) }}">
                                            {{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-right">
                                <div class="single-shorter">
                                    <form class="search-form" action="{{ route('vendor') }}" method="GET">
                                        <div class="d-flex justify-content-start">
                                            <input type="text" class="form-control rounded-0"
                                                placeholder="Search vendor here..." name="search"
                                                value="{{ request('search') }}">
                                            <button class="btn-primary px-2 rounded-0" value="search" type="submit"><i
                                                    class="ti-search"></i></button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        @foreach ($vendorService as $item)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('serviceItemVendor', $item?->id) }}">
                                            <img class="default-img" src="{{ $item?->image }}" alt="product">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="product-details.html">{{ $item?->name }}</a></h3>
                                        <div class="product-price">
                                            <span>Rp{{ $item?->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->
@endsection
