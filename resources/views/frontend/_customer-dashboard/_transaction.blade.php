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
                                                <a href="{{ route('inbox.show', $item->store_owner_name) }}"
                                                    class="text-info mx-2">Chat
                                                    Store</a>
                                            </strong>
                                            <h6
                                                class="{{ $item->isApprove ? 'text-success' : 'text-danger' }} font-weight-bold">
                                                {{ strtoupper($item->isApprove ? 'PAID' : 'PENDING') }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <img src="{{ $item->item_image }}" id="getOrderImg" alt="">
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
                                        @if (!$item->paid_at)
                                            <div class="d-flex align-items-center">
                                                <div class="alert alert-warning alert-sm p-1 small m-0">Complete the
                                                    payment
                                                    to
                                                    continue order transaction <i class="fa fa-info-circle"></i></div>
                                                <a href="{{ route('customer.payment', $item->invoice_no) }}"
                                                    class="mx-2 text-decoration-underline">
                                                    <span style="text-decoration: underline;">Payment Detail</span>
                                                </a>

                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <button data-toggle="modal"
                                                    data-target="#uploadPaymentModal{{ $item->invoice_no }}"
                                                    class="btn mx-2">Upload Payment</button>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <div class="alert alert-success alert-sm p-1 small m-0">
                                                    Payment success on
                                                    {{ \Carbon\Carbon::parse($item->paid_at)->format('Y-m-d') }}. Payment
                                                    proof was successfully sent
                                                </div>

                                            </div>
                                        @endif
                                    </div>
                                </div>
                        @endforeach
                        @foreach ($getServiceOrder as $item)
                            <div class="my-4">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <div class="d-flex justify-content-between">
                                            <strong> <i class="fa fa-home mr-2"></i> {{ $item->serviceProvider_name }}
                                                <a href="{{ route('inbox.show', $item->owner_name) }}"
                                                    class="text-info mx-2">Chat Store</a>
                                            </strong>
                                            <h6
                                                class="{{ $item->isPayment ? 'text-success' : 'text-danger' }} font-weight-bold">
                                                {{ strtoupper($item->isPayment ? 'PAID' : 'PENDING') }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="col-6">
                                                {{-- <span>{{ $item->item_qty }} Item</span> <br> --}}
                                                <h6 class="mb-1">{{ $item->service_name }}</h6>
                                                <span>{{ $item->orderType }}</span> <br>
                                                <span>{{ $item->created_at }} </span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <h5 class="mb-1">Rp{{ number_format($item->total_price, 0, ',', '.') }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        @if ($item->isPayment === 0)
                                            <div class="d-flex align-items-center">
                                                <div class="alert alert-warning alert-sm p-1 small m-0">Complete the payment
                                                    to
                                                    continue order transaction <i class="fa fa-info-circle"></i></div>
                                                <a href="{{ route('customer.payment', $item->invoice_no) }}"
                                                    class="mx-2 text-decoration-underline">
                                                    <span style="text-decoration: underline;">Payment Detail</span>
                                                </a>

                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <button data-toggle="modal"
                                                    data-target="#uploadServicePayment{{ $item->invoice_no }}"
                                                    class="btn mx-2">Upload Payment</button>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <div class="alert alert-success alert-sm p-1 small m-0">Payment success
                                                    on {{ $item->paid_at }}. Payment proof was
                                                    successfully
                                                    sent
                                                </div>
                                        @endif

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
        <div class="modal fade" id="uploadPaymentModal{{ $item->invoice_no }}" tabindex="-1" role="dialog"
            aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog  " role="document">
                <form method="POST" action="{{ route('customer.payment.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="d-none" name="invoice_no" value="{{ $item->invoice_no }}">
                                    <p class="modal-title">{{ $item->invoice_no }}</p>
                                    <h6 class="mt-2">{{ $item->product_name }}</h6>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Name">Upload Payment Proof</label>
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

    <!-- Modal upload service-proof-->
    @foreach ($getServiceOrder as $item)
        <div class="modal fade" id="uploadServicePayment{{ $item->invoice_no }}" tabindex="-1" role="dialog"
            aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog  " role="document">
                <form method="POST" action="{{ route('customer.payment.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="d-none" name="invoice_no"
                                        value="{{ $item->invoice_no }}">
                                    <p class="modal-title">{{ $item->invoice_no }}</p>
                                    <h6 class="mt-2">{{ $item->service_name }}</h6>
                                    <span>{{ $item->orderType }}</span>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{-- @if ($item->isPayment === 1)
                            <div class="text-center py-5">
                                <h6 class="text-muted mb-3">You have finished order payment. <br> Proof that the
                                    transaction was
                                    successfully
                                    sent</h6>
                                <h6>Payment Date: {{ $item->paid_at }}</h6>
                            </div>
                        @else --}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Name">Upload Payment Proof</label>
                                        <input class="form-control" type="file" name="payment_proof">
                                    </div>
                                    <div class="alert alert-warning p-0">
                                        <p class="mx-auto p-2">Uploaded proof must be a clear image. Your
                                            transaction will be verified by admin maximum of <strong> 8 hours.</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        {{-- @endif --}}
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
