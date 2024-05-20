@extends('frontend.layouts.master')
@section('contents')
    <!-- Start Small Banner  -->
    <section class="small-banner section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Deals Of The Week</h2>
                    </div>
                </div>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel" data-interval="2500"
                style="max-width: 850px;">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('promo/banner2.jpeg') }}" alt="First slide"
                            style="max-height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('promo/banner2.jpeg') }}" alt="Second slide"
                            style="max-height: 500px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('promo/banner3.jpeg') }}" alt="Third slide"
                            style="max-height: 500px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>



        </div>
    </section>
    <!-- End Small Banner -->

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Professional di Indonesia</h2>
                    </div>
                </div>
                <p>Lihat rekomendasi <span class="font-weight-bold mx-2">semua</span> budget</p>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        <!-- Start Single Product -->
                        @foreach ($serviceProfessional as $item)
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('serviceItemProfessional', $item?->slug) }}">
                                        <img class="default-img" src="{{ $item->image }}" alt="#">
                                        <span class="out-of-stock">Hot</span>
                                    </a>

                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">{{ $item->name }}</a></h3>
                                    <div class="product-price">
                                        <span>Rp.{{ $item->price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    {{-- Tagline Help Center --}}
    <section class="shop-services section tagline my-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-12">
                    <p class="text-help-center text-center" id="textHelpCenter">
                        Anda memiliki pertanyaan atau membutuhkan bantuan? Kunjungi <a href="{{ route('help-center') }}">
                            Help Center </a><i class="ti-headphone-alt mx-2"></i>
                    </p>
                    <style>
                        #textHelpCenter {
                            font-size: 18px;
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>
    {{-- Tagline Help Center --}}

    <!-- Start Most Popular -->
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2> Vendor terbaik dengan Deals menarik!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach ($serviceVendor as $item)
                            <!-- Start Single Product -->
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('serviceItemVendor', $item?->id) }}">
                                        <img class="default-img" src="{{ $item->image }}" alt="#">
                                    </a>

                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">{{ $item->name }}</a></h3>
                                    <div class="product-price">
                                        <span>Rp.{{ $item->price }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Most Popular Area -->

    <!-- Start Cowndown Area -->
    <section class="cown-down">
        <div class="section-inner ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-12 padding-right">
                        <div class="image">
                            <img src="{{ asset('admin/images/material_1.png') }}" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 padding-left">
                        <div class="content">
                            <div class="heading-block">

                                <h1 class="my-3">Ragam Produk <br> untuk Bangunan Anda</h1>
                                <p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet, frungilla
                                    placerat lorem. Cars fermentum, sapien. </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Cowndown Area -->
    <section class="shop-services section shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>Free shiping</h4>
                        <p>Orders over $100</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>Free Return</h4>
                        <p>Within 30 days returns</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>Sucure Payment</h4>
                        <p>100% secure payment</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>Best Peice</h4>
                        <p>Guaranteed price</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>


    <!-- Start Shop Home List  -->
    <section class="shop-home-list section">
        <div class="container">
            <h3 class="mt-5 p-0">Product Available</h3>
            <div class="row">
                @foreach ($storeProduct as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single List  -->
                        <div class="single-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        <img src="{{ $item->image }}" alt="#">
                                        <a href="{{ route('singleItem', $item?->slug) }}" class="buy"><i
                                                class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{ $item->name }}</a></h4>
                                        <p class="price with-discount">
                                            Rp{{ number_format($item?->display_price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Single List  -->
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End Shop Home List  -->


    <div class="container">
        <hr class="hr">
    </div>
    {{-- <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Latest From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July , 2020. Monday</p>
                            <a href="#" class="title">Sed adipiscing ornare.</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Man’s Fashion Winter Sale</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Women Fashion Festive</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->

    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Upcoming Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July , 2020. Monday</p>
                            <a href="#" class="title">Sed adipiscing ornare.</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Man’s Fashion Winter Sale</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Blog  -->
                    <div class="shop-single-blog">
                        <img src="https://via.placeholder.com/370x300" alt="#">
                        <div class="content">
                            <p class="date">22 July, 2020. Monday</p>
                            <a href="#" class="title">Women Fashion Festive</a>
                            <a href="#" class="more-btn">Continue Reading</a>
                        </div>
                    </div>
                    <!-- End Single Blog  -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Blog  --> --}}
@endsection
