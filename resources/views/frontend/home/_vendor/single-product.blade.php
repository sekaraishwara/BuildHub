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
                            <li><a href="{{ route('vendor') }}">Vendor<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">{{ $serviceVendor?->vendor->name }}</a></li>
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
                        <img id="uploadedImage" src="{{ $serviceVendor?->image }}" alt="">
                    </div>
                    <div class="col-md-8 product-text">
                        <h4>{{ $serviceVendor?->name }}
                        </h4>
                        <div class="product-price">
                            <div class="d-flex align-items-center">

                                <h3 class="normal-price">
                                    <span>Rp{{ $serviceVendor?->price }}</span>
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
                                        <td>{{ $serviceVendor?->category }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Location</td>
                                        <td>{{ $vendorRegency?->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
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
                                <span class="store-name">{{ $serviceVendor?->vendor->name }}</span> <br>
                                <span class="text-muted">Bergabung sejak
                                    {{ $serviceVendor?->vendor->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center">
                        <form action="{{ route('inbox.show', $vendorOwner->name) }}" method="get">
                            <button class="btn mx-2 chat-now" type="submit"><i class="fa fa-wechat mr-2"></i>Chat
                                now</button>
                        </form>
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
                            <hr>
                            <P>
                                {!! $serviceVendor?->desc !!}
                            </p>
                        </div>
                        <div class="my-5"></div>
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
                                            <h4>{{ $item->customer?->name }} <span>At
                                                    {{ $item->created_at->format('h:i A \O\n M d, Y') }}</span></h4>
                                            <div class="col-3">
                                                @php
                                                    $full_stars = $item?->rating;
                                                    $empty_stars = 5 - $item?->rating;
                                                @endphp

                                                @for ($i = 1; $i <= $full_stars; $i++)
                                                    <span class="rating-star">★</span>
                                                @endfor

                                                @for ($i = 1; $i <= $empty_stars; $i++)
                                                    <span class="rating-star">☆</span>
                                                @endfor
                                            </div>
                                        </div>
                                        <p>{{ $item?->comment }}</p>
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
                    <h1>VENDOR PORTFOLIO</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($portfolio as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single List  -->
                        <div class="single-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <a href="" data-toggle="modal"
                                        data-target="#showPortfolio{{ $item->id }}">
                                        <div class="list-image overlay">
                                            <img src="{{ $item->image }}" alt="#">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title">
                                            <a href="#">{{ $item->name }}</a>
                                        </h4>
                                        <p class="price with-discount">{{ $item->year }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="showPortfolio{{ $item->id }}" tabindex="-1"
                        aria-labelledby="showPortfolio" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body m-0 p-0">
                                    <div class="col-12 my-3 text-center">
                                        <x-image-preview :height="200" :width="200" :source="$item?->image" />
                                    </div>
                                    <div class="col-12 mb-3 text-center">
                                        <span>Project held by <strong>{{ $serviceVendor?->vendor->name }}</strong>
                                        </span>
                                        <hr>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <strong>Project Details</strong>
                                        <p> {{ $item->desc }}
                                        </p>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <strong>Release/Year</strong>
                                        <p>{{ $item->year }}
                                        </p>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="shop-home-list section">
        <div class="container">
            <div class="col-12">
                <div class="shop-section-title">
                    <h1>MORE SERVICE</h1>
                </div>
            </div>
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-list">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        <img src="{{ $item->image }}" width="115" alt="#">
                                        <a href="{{ route('serviceItemVendor', $item->id) }}" class="buy"><i
                                                class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title">
                                            <a href="#">{{ $item->name }}</a>
                                        </h4>
                                        @php
                                            $priceParts = explode('-', $item->price);
                                            $formattedPrice = trim($priceParts[0]);

                                            if (count($priceParts) > 1) {
                                                $formattedPrice .= '...';
                                            }
                                        @endphp

                                        <p class="price with-discount">Rp.{{ $formattedPrice }}</p>
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
