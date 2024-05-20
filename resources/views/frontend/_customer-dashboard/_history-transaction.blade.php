@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('customer.dashboard') }}">Dashboard<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">History Order</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-box mt-5">
        <div class="container">
            <div class="row">
                @include('frontend._customer-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-5">
                    <h5 class="mb-3">History Order</h5>
                    <div class="row">
                        @if ($getTransaction->isEmpty())
                            <div class="card-body">
                                <div class="text-center py-3">
                                    <p>Tidak ada riwayat transaksi. </p>
                                </div>
                            </div>
                        @else
                            {{-- TRANSACTION STORE --}}
                            @foreach ($getTransaction as $item)
                                <div class="col-12 mb-3">
                                    <div class="card card-notification">
                                        <div class="card-header">
                                            <p class="modal-title">Transaction: {{ $item->invoice_no }}</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center">
                                                <img src="{{ $item->product_image }}" id="getOrderImg" alt=""
                                                    style="width: 100px;">
                                                <div class="col-6">
                                                    <h6 class="mb-1">{{ $item->product_name }}</h6>
                                                    <span>{{ $item->item_qty }} Item</span> <br>
                                                    <span>{{ $item->transaction_date }}</span>
                                                </div>
                                                <div class="col-4 text-right">
                                                    <h5 class="mb-1">
                                                        Rp{{ number_format($item->total_price, 0, ',', '.') }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>

                                        @if (!empty($item->star_rating))
                                            <div class="rated">
                                                @for ($i = 1; $i <= $item->star_rating; $i++)
                                                    <label class="star-rating-complete" title="text">{{ $i }}
                                                        stars</label>
                                                @endfor
                                            </div>
                                        @else
                                            @php
                                                // cek CustomerReview udh ada untuk invoice_no ini apa blm
                                                $existingReview = App\Models\CustomerReview::where(
                                                    'invoice_no',
                                                    $item->invoice_no,
                                                )->first();
                                                $hasReview = !is_null($existingReview);
                                            @endphp

                                            <!-- Form untuk mengirim feedback (show if belum ada ulasan) -->
                                            @if (!$hasReview)
                                                <div class="card-footer">
                                                    <form action="{{ route('customer.sessionRate') }}" method="POST"
                                                        autocomplete="off">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $item->product_id }}">
                                                        <input type="hidden" name="invoice_no"
                                                            value="{{ $item->invoice_no }}">
                                                        {{-- <input type="hidden" name="customer_id" value="{{ $item->customer_id }}"> --}}
                                                        <p class="font-weight-bold">Product Rate</p>
                                                        <div class="form-group row mb-0 pb-0">
                                                            <!-- Input untuk rating -->
                                                            <div class="rate">
                                                                <input type="radio" id="star5" class="rate"
                                                                    name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" checked id="star4" class="rate"
                                                                    name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" class="rate"
                                                                    name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" class="rate"
                                                                    name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" class="rate"
                                                                    name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <!-- Textarea untuk feedback -->
                                                            <div class="col">
                                                                <textarea class="form-control" name="comment" rows="4" placeholder="Give the store some feedback..."
                                                                    maxlength="200"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 text-right">
                                                            <!-- Tombol Submit -->
                                                            <button class="btn btn-sm btn-info w-100" type="submit">Send
                                                                Feedback</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- TRANSACTION VENDOR SERVICE --}}
                        @foreach ($getServiceOrder as $item)
                            <div class="col-12 mb-3">
                                <div class="card card-notification">
                                    <div class="card-header">
                                        <p class="modal-title">Transaction: {{ $item->invoice_no }}</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center">
                                            {{-- <img src="{{ $item->product_image }}" id="getOrderImg" alt=""
                                        style="width: 100px;"> --}}
                                            <div class="col-7 ">
                                                <h6 class="mb-1">{{ $item->service_name }}</h6>
                                                <span>{{ $item->orderType }}</span> <br>
                                                <span>{{ $item->transaction_date }}</span>
                                            </div>
                                            <div class="col-4 text-right">
                                                <h5 class="mb-1">Rp{{ number_format($item->total_price, 0, ',', '.') }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    @if (!empty($item->star_rating))
                                        <div class="rated">
                                            @for ($i = 1; $i <= $item->star_rating; $i++)
                                                <label class="star-rating-complete" title="text">{{ $i }}
                                                    stars</label>
                                            @endfor
                                        </div>
                                    @else
                                        @php
                                            // cek CustomerReview udh ada untuk invoice_no ini apa blm
                                            $existingReview = App\Models\CustomerReview::where(
                                                'invoice_no',
                                                $item->invoice_no,
                                            )->first();
                                            $hasReview = !is_null($existingReview);
                                        @endphp

                                        @php
                                            // cek CustomerReview udh ada untuk invoice_no ini apa blm
                                            $existingServiceReview = App\Models\CustomerServiceReview::where(
                                                'invoice_no',
                                                $item->invoice_no,
                                            )->first();
                                            $hasServiceReview = !is_null($existingServiceReview);
                                        @endphp
                                        <!-- Form untuk mengirim feedback (show if belum ada ulasan) -->
                                        @if (!$hasServiceReview)
                                            <div class="card-footer">
                                                <form action="{{ route('customer.serviceRate') }}" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <input type="hidden" name="service_name"
                                                        value="{{ $item->service_name }}">
                                                    <input type="hidden" name="invoice_no"
                                                        value="{{ $item->invoice_no }}">
                                                    {{-- <input type="hidden" name="customer_id" value="{{ $item->customer_id }}"> --}}
                                                    <p class="font-weight-bold">Product Rate</p>
                                                    <div class="form-group row mb-0 pb-0">
                                                        <!-- Input untuk rating -->
                                                        <div class="rate">
                                                            <input type="radio" id="star5" class="rate"
                                                                name="rating" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" checked id="star4" class="rate"
                                                                name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" class="rate"
                                                                name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" class="rate"
                                                                name="rating" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" class="rate"
                                                                name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <!-- Textarea untuk feedback -->
                                                        <div class="col">
                                                            <textarea class="form-control" name="comment" rows="4" placeholder="Give the store some feedback..."
                                                                maxlength="200"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 text-right">
                                                        <!-- Tombol Submit -->
                                                        <button class="btn btn-sm btn-info w-100" type="submit">Send
                                                            Feedback</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>
@endsection

<style>
    .star-icon {
        font-size: 32px;
        color: #ccc;
        cursor: pointer;
    }


    #getOrderImg {
        width: 100px;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>
