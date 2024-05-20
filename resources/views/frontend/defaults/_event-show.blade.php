@extends('frontend.layouts.master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('event') }}">Event</a></li>
                            <li class="active"><a href=""><i class="ti-arrow-right"></i>{{ $event->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-single section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="image">
                                    <img src="{{ $event->image }}" alt="#">
                                </div>
                                <div class="blog-detail">
                                    <h2 class="blog-title">{{ $event->title }}</h2>
                                    <div class="blog-meta">
                                        <span class="author"><a href="#"><i class="fa fa-user"></i>By
                                                BuildHub Admin</a><a href="#"><i class="fa fa-calendar"></i>Event at:
                                                {{ $event->date }}</a>
                                            <a href="#"><i class="fa fa-users"></i>Held By:
                                                <strong> {{ $event->event_by }}</strong></a></span>
                                    </div>
                                    <div class="content">
                                        <p>{!! $event->content !!}</p>
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-tags">
                                                <h4>Tags:</h4>
                                                <ul class="tag-inner">
                                                    <li><a href="#">{{ $event->event_category }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <div class="single-widget recent-post">
                            <h3 class="title">Recent Event</h3>
                            <!-- Single Post -->
                            @foreach ($latest as $item)
                                <div class="single-post">
                                    <a href="{{ route('event.show', $item->slug) }}">
                                        <div class="image">
                                            <img src="{{ $item->image }}" alt="#">
                                        </div>
                                        <div class="content">
                                            <h5><a href="{{ route('event.show', $item->slug) }}">{{ $item->title }}</a>
                                            </h5>
                                            <ul class="comment">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $item->date }}
                                                </li>
                                                {{-- <li><i class="fa fa-commenting-o" aria-hidden="true"></i>35</li> --}}
                                            </ul>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
