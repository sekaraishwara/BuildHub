@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home </a><i class="ti-arrow-right"></i> </a></li>
                                <li><a href="{{ route('professional.dashboard') }}">Dashboard </a><i
                                        class="ti-arrow-right"></i></a>
                                </li>
                                <li><a href="{{ route('professional.service') }}">Service<i class="ti-arrow-right"></i></a>
                                <li class="active"><a href=""> {{ $data->invoice_no }}</a>
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
                @include('frontend._professional-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('professional.service.order') }}">
                                << Back to All Order</a>
                                    {{-- <p>Inv: {{ $data->invoice_no }} </p> --}}
                        </div>
                        <div class="my-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h6>Inv: {{ $data->invoice_no }} </h6>
                                        <h6
                                            class="{{ $data->isPayment ? 'text-success' : 'text-danger' }} font-weight-bold">
                                            {{ strtoupper($data->isPayment ? 'PAID' : 'PENDING') }}
                                        </h6>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="text-muted mb-3">{{ $data->orderType }}</h5>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <label for="order">Order Date:</label>
                                                    <p> {{ $data->created_at }}</p>
                                                </div>
                                                <div>
                                                    <label for="client">Client Email:</label>
                                                    <p>{{ $data->client_email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="text-muted mb-3">Service Detail</h6>
                                            <table class="text-center">
                                                <thead class="border">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Item</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($items as $item)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $item->itemName }}</td>
                                                            <td>{{ $item->itemQty }}</td>
                                                            <td>{{ $item->itemPrice }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="d-flex justify-content-between">
                                                        <strong class="text-muted">TOTAL PRICE</strong>
                                                        <h5>Rp{{ number_format($data->total_price, 0, ',', '.') }}</h5>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    @if ($data->isPayment === 1)
                                        Paid confirmed at : <strong> {{ $data->paid_at }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
