@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="{{ route('store.chat') }}">Chat</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="content-single">
                        <div class="card">
                            <div class="card-header border-0 m-3">
                                <h5>Chat (100)</h5>
                            </div>
                            <div class="card-body">
                                @foreach ($getConversation as $item)
                                    <a href="{{ route('inbox.show', $senderItem[$loop->index]['name']) }}">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="col-4 d-flex align-items-center p-0">
                                                <img src="{{ $senderItem[$loop->index]['image'] }}" width="50px"
                                                    alt="">
                                                <p class="ml-3 mb-0">{{ $senderItem[$loop->index]['name'] }}</p>
                                            </div>
                                            <p>{{ $item->updated_at }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
