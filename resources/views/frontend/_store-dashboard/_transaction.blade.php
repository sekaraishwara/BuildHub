@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home <i class="ti-arrow-right"></i> </a></li>
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
                @include('frontend._store-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-5">
                    <div class="content-single">

                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Current Transaction</h3>
                        </div>

                        <div class="my-3">
                            <table class="table table-hover" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice ID</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Resi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($getTransaction as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->invoice_no }}</td>
                                            {{-- <td>{{ $item->transaction_date }}</td> --}}
                                            <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @foreach ($item->checkout->items as $co)
                                                    {{ $co->item_name }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($item->checkout->items as $co)
                                                    {{ $co->item_name }}
                                                @endforeach
                                            </td>
                                            <td>{{ number_format($item->total_price, 0, ',', '.') }}</td>
                                            <td>{{ $item->payment_status }}</td>
                                            @if (
                                                $transProofs &&
                                                    $transProofs->where('invoice_no', $item->invoice_no)->first() &&
                                                    $transProofs->where('invoice_no', $item->invoice_no)->first()->shipping_proof)
                                                <td><a href="#" class="text-success">Uploaded</a></td>
                                            @else
                                                <td><a href="#" data-toggle="modal"
                                                        data-target="#uploadResiModal{{ $item->id }}"
                                                        class="text-primary">Upload</a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Upload Resi Create-->
    @foreach ($getTransaction as $item)
        <div class="modal fade" id="uploadResiModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog  " role="document">
                <form method="POST" action="{{ route('store.resi.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="d-none" name="invoice_no" value="{{ $item->invoice_no }}">
                                    <p class="modal-title">Transaction: {{ $item->invoice_no }}</p>

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
                                        <label for="Name">Upload Transaction</label>
                                        <input class="form-control" type="file" name="shipping_proof">
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
