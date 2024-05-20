@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section pt-0">
        <div class="container mb-3">
            <div class="d-flex justify-content-between">
                <h4>Payment</h4>
                <strong class="text-danger"> {{ $getTransaction?->payment_status }}
                    transaction</strong>
            </div>
            <div class="mt-3">
                <div class="alert alert-success">
                    <strong>Checkout Success, Transfer Required for Order Confirmation.</strong>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <div class="card">
                        <div class="card-header bg-white">
                            Transaction <h6 class="my-2"> {{ $getTransaction?->invoice_no }}</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-6 mx-auto mb-4">
                                <div class="d-flex justify-content-between">
                                    <span>Total Payment</span>
                                    <h6>Rp{{ number_format($getTransaction?->total_price, 0, ',', '.') }}
                                    </h6>
                                </div>
                                <hr>
                            </div>
                            <div class="col-6 mx-auto  mb-4">
                                <div class="d-flex justify-content-between">
                                    @php
                                        $transactionDate = $getTransaction->created_date;
                                        $payBefore = date('d-m-Y H:i:s', strtotime("$transactionDate +1 day"));
                                    @endphp
                                    <span>Pay Before</span>
                                    <h6>{{ $payBefore }}</h6>
                                </div>
                                <hr>
                            </div>
                            <div class="col-6 mx-auto  mb-4">
                                <div class="d-flex justify-content-start">
                                    <strong class="mr-5">Bank BCA</strong>
                                    <h4>12608953871</h4>
                                    <span class="ml-2"><a href="">COPY</a></span>
                                    <strong class="ml-2">A/N BUILDHUB STORE INC</strong>
                                </div>
                                <hr>
                            </div>
                            <div class="col-6 mx-auto">
                                <div class="alert alert-warning">
                                    <strong>Verification Process Takes a Hour <i class="fa fa-info-circle"></i> </strong>
                                    <br>
                                    Dear Customer,
                                    <br>
                                    We would like to inform you that the verification process may take up to one hour to
                                    complete. During this time, our team will carefully review the information provided and
                                    ensure its accuracy.
                                    <div class="my-3"></div>
                                    If you have any questions or concerns during this time, please feel free to reach out to
                                    our <a href="" class="text-primary"> support team.</a>
                                    <div class="my-3"></div>
                                    Thank you for choosing our service.
                                    <img src="{{ asset('default-uploads/Logos.png') }}" class="my-3" width="100px;"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 text-center mb-5">
                            <button class="btn col-3">OK</button>
                        </div>
                    </div>
                    <!--/ End Shopping Summery -->
                </div>
            </div>

        </div>
    </div>
@endsection
