@extends('frontend.layouts.master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shop-blog section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Article From Our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($blog as $item)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog  -->
                        <div class="shop-single-blog">
                            <img src="{{ $item->image }}" alt="#">
                            <div class="content">
                                <p class="date">{{ $item->publish_date }}</p>
                                <a href="{{ route('blog.show', $item->slug) }}" class="title">{{ $item->title }}</a>
                                <a href="{{ route('blog.show', $item->slug) }}" class="more-btn">Continue Reading</a>
                            </div>
                        </div>
                        <!-- End Single Blog  -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
