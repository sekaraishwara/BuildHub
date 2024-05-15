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
                            <!-- Shop Top -->
                            <div class="shop-top">
                                <div class="shop-shorter">
                                    <div class="single-shorter">
                                        <label>Show :</label>
                                        <select>
                                            <option selected="selected">09</option>
                                            <option>15</option>
                                            <option>25</option>
                                            <option>30</option>
                                        </select>
                                    </div>
                                    <div class="single-shorter">
                                        <label>Sort By :</label>
                                        <select>
                                            <option value="latest" selected="selected">Latest</option>
                                            <option value="low_price">Low Price</option>
                                            <option value="high_price">High Price</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Shop Top -->
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($vendorService as $item)
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('serviceItemVendor', $item?->id) }}">
                                            <img class="default-img" src="{{ $item?->image }}" alt="product">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                    href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                        Wishlist</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add
                                                        to Compare</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="#">Add to cart</a>
                                            </div>
                                        </div>
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
