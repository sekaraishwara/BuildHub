@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home <i class="ti-arrow-right"></i></a></li>
                                <li><a href="{{ route('store.dashboard') }}">Dashboard <i class="ti-arrow-right"></i></a>
                                </li>
                                <li class="active"><a href="{{ route('store.product') }}">Transaction</a>
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
                @include('frontend._customer-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">

                        <div class="d-flex justify-content-between align-items-center">
                            <h3>My Order</h3>
                        </div>
                        @foreach ($getTransaction as $item)
                            <div class="my-4">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <div class="d-flex justify-content-between">
                                            <strong> <i class="fa fa-home mr-2"></i> {{ $item->store_name }}
                                                <a href="#" class="text-info mx-2">Chat Store</a>
                                            </strong>
                                            <h6 class="text-danger font-weight-bold">{{ strtoupper($item->payment_status) }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <img src="{{ $item->product_image }}" id="getOrderImg" alt="">
                                            <div class="col-6">
                                                <h6 class="mb-1">{{ $item->product_name }}</h6>
                                                <span>{{ $item->item_qty }} Item</span> <br>
                                                <span>{{ $item->transaction_date }} </span>
                                            </div>
                                            <div class="col-4 text-right">
                                                <h5 class="mb-1">Rp{{ number_format($item->total_price, 0, ',', '.') }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="alert alert-warning alert-sm p-1 small m-0">Complete the payment to
                                                continue order transaction <i class="fa fa-info-circle"></i></div>
                                            <a href="{{ route('customer.payment') }}"
                                                class="mx-2 text-decoration-underline">
                                                <span style="text-decoration: underline;">Payment Detail</span>
                                            </a>

                                        </div>
                                        <div class="d-flex justify-content-start">

                                            <button data-toggle="modal"
                                                data-target="#uploadPaymentModal{{ $item->transaction_id }}"
                                                class="btn mx-2">Upload Payment</button>
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

    <!-- Modal upload payment-proof-->
    @foreach ($getTransaction as $item)
        <div class="modal fade" id="uploadPaymentModal{{ $item->transaction_id }}" tabindex="-1" role="dialog"
            aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog  " role="document">
                <form method="POST" action="{{ route('customer.payment.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="d-none" name="transaction_id"
                                        value="{{ $item->transaction_id }}">
                                    <p class="modal-title">Transaction: {{ $item->invoice_no }}</p>
                                    <!-- Move the product name here -->
                                    <h6 class="mt-2">{{ $item->product_name }}</h6>
                                </div>
                                <!-- Remove the product name from the previous column -->
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Name">Upload Transaction</label>
                                        <input class="form-control" type="file" name="payment_proof">
                                    </div>
                                    <div class="alert alert-warning p-0">
                                        <p class="mx-auto p-2">Uploaded proof must be a clear image. Your
                                            transaction will be verified by admin maximum of <strong> 8 hours.</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

<style>
    #getOrderImg {
        width: 100px;
    }
</style>
