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
                            <li><a href="{{ route('store') }}">Store<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">{{ $storeProduct?->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section>
        <div class="container">
            <div class="shop product single-item">
                <div class="d-flex justify-content-between">
                    <div class="col-md-4 product-image">
                        <img id="uploadedImage" src="{{ $storeProduct?->image }}" alt="">
                    </div>
                    <div class="col-md-8 product-text">
                        <h4>{{ $storeProduct?->name }}
                        </h4>
                        <div class="product-price">
                            <div class="d-flex align-items-center">
                                <span class="promo-price mr-2">Rp. 28.900.000</span>

                                <h3 class="normal-price">
                                    <span>Rp{{ number_format($storeProduct?->price, 0, ',', '.') }}</span>
                                </h3>
                            </div>
                            <div class="d-flex">
                                <div class="product-ratings"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star-half-empty"></i> 4,7
                                </div>
                                <div class="product-review
                                        mx-4"><i
                                        class="fa fa-comment-o"></i> 102 Reviews </div>
                            </div>
                        </div>

                        <div class="product-info">
                            <table style="width:50%">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">Category</td>
                                        <td>{{ $storeProduct?->category }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Shipping From</td>
                                        <td>KOTA BEKASI</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Stock</td>
                                        <td>210</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <form action="{{ route('customer.cart.addToCart') }}" method="POST">
                                @csrf
                                <div class="d-none">
                                    <input name="product_id" value="{{ $storeProduct?->id }}">
                                    <input name="item_qty" value="1">
                                </div>
                                <button class="btn btn-cart mr-3"><i class="fa fa-shopping-cart mr-2"></i> Add to
                                    Cart</button>

                            </form>

                            {{-- <a class="btn text-white"><i class="fa fa-shopping-basket mr-2"></i>Buy Now
                            </a> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="shop store single-item">
                <div class="store-detail d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="col-md-3">
                            <img src="{{ asset('default-uploads/store-ava.png') }}" id="store-ava" alt="">
                        </div>
                        <div class="col-md-9">
                            <div class="store-info ml-2">
                                <span class="store-name">{{ $storeProduct?->store->name }}</span> <br>
                                <span class="text-muted">Bergabung sejak
                                    {{ $storeProduct?->store->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center">
                        <form action="{{ route('customer.send.sendMessage') }}" method="get">
                            <input type="hidden" name="store_id" value="{{ $storeProduct->store->id }}">
                            <button class="btn mx-2 chat-now" type="submit"><i class="fa fa-wechat mr-2"></i>Chat
                                now</button>
                        </form>
                        {{-- <button class="btn mx-2"><i class="fa fa-home mr-2"></i>Store</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-services section p-0">
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

    <section>
        <div class="container">
            <div class="shop product single-item">
                <div class="card">
                    <div class="card-body">
                        <div class="product-description">
                            <h6 class="mb-3">Product Description</h6>
                            <P>
                                Features:
                                <br>
                                1. Working quietly. It would not be disruptive while you nap and sleep <br>
                                2. 250ml large capacity <br>
                                3. Automatic power failure protection, anti-dry <br>
                                4. Mini size, easy to carry <br>
                                5. For home and car use
                            </P>
                            <br>
                            <P>
                                Cara Penggunaan :
                                <br>
                                1. Working quietly. It would not be disruptive while you nap and sleep <br>
                                2. 250ml large capacity <br>
                                3. Automatic power failure protection, anti-dry <br>
                                4. Mini size, easy to carry <br>
                                5. For home and car use
                            </P>
                        </div>
                        <div class="my-5"></div>
                        <div class="product-description">
                            <h6 class="mb-3">Product Details</h6>
                            <P>
                                Features:
                                <br>
                                1. Working quietly. It would not be disruptive while you nap and sleep <br>
                                2. 250ml large capacity <br>
                                3. Automatic power failure protection, anti-dry <br>
                                4. Mini size, easy to carry <br>
                                5. For home and car use
                            </P>
                            <br>
                            <P>
                                Cara Penggunaan :
                                <br>
                                1. Working quietly. It would not be disruptive while you nap and sleep <br>
                                2. 250ml large capacity <br>
                                3. Automatic power failure protection, anti-dry <br>
                                4. Mini size, easy to carry <br>
                                5. For home and car use
                            </P>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="blog-single section p-0 mb-5">
        <div class="container">
            <div class="blog-single-main">
                <div class="card">
                    <div class="col-12">
                        <div class="comments">
                            <h3 class="comment-title">Product Review ({{ $reviewCount }})</h3>
                            <!-- Single Comment -->
                            @foreach ($review as $item)
                                <div class="single-comment">
                                    <img src="{{ asset('default-uploads/avatar.jpg') }}" width="80" alt="#">
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-item-center">
                                            <h4>{{ $item->customer->name }} <span>At
                                                    {{ $item->created_at->format('h:i A \O\n M d, Y') }}</span></h4>
                                            <div class="col-3">
                                                @php
                                                    $full_stars = $item->rating;
                                                    $empty_stars = 5 - $item->rating;
                                                @endphp

                                                @for ($i = 1; $i <= $full_stars; $i++)
                                                    <span class="rating-star">★</span>
                                                @endfor

                                                @for ($i = 1; $i <= $empty_stars; $i++)
                                                    <span class="rating-star">☆</span>
                                                @endfor
                                            </div>
                                        </div>
                                        <p>{{ $item->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-home-list section">
        <div class="container">
            <div class="col-12">
                <div class="shop-section-title">
                    <h1>MORE PRODUCTS</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        <img src="{{ $item->image }}" alt="#">
                                        <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title">
                                            <a href="#">{{ $item->name }}</a>
                                        </h4>
                                        <p class="price with-discount">Rp.{{ $item->price }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!--/ End Product Style 1  -->
@endsection

<style>
    .single-item {
        margin: 50px 0;
    }

    .star-icon {
        font-size: 24px;
        color: #ea9103;
        cursor: pointer;
    }

    .product-image {
        width: 680px;
        height: auto;
        overflow: hidden;
    }

    .product-text {
        margin-left: 60px;
    }

    .rating-star {
        font-size: 25px;
        color: #ffc700;
    }

    .product-text h4 {
        line-height: 2rem;
        font-weight: 600;
        font-size: 22px;
    }

    .product-info td {
        padding-bottom: 15px;
    }

    .product-info {
        padding-top: 20px;
    }


    #uploadedImage {
        width: 100%;
        height: auto;
    }

    .product-ratings i {
        color: #e6a50f;
    }

    .product-price {
        background-color: #f8f9f8;
        margin: 15px 0;
        padding: 15px 20px;
    }

    .product-price .normal-price {
        font-size: 28px;
        font-weight: 600;
        margin: 10px 0;
        color: #996300;
    }

    .product-price .promo-price {
        font-size: 20px;
    }

    .promo-price {
        text-decoration: line-through;
    }

    .store-detail {
        background-color: #f8f9f8;
        padding: 20px 10px;
    }

    .store-name {
        font-size: 18px;
        font-weight: 500;
        margin: 5px 0;
    }

    #store-ava {
        width: 70px;
        margin-right: 10px;
    }

    .product-description p {
        width: 70%;
    }
</style>
