@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section pt-0">
        <div class="container mb-3">
            <h4>Payment</h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <div class="card">
                        <div class="card-header bg-white">
                            Transaction: <h6 class="my-2"> 00091/XYCTSH/00090</h6>
                        </div>
                        <div class="card-body">
                            <div class="col-6 mx-auto mb-4">
                                <div class="d-flex justify-content-between">
                                    <span>Total Payment</span>
                                    <h6>Rp49.350.000</h6>
                                </div>
                                <hr>
                            </div>
                            <div class="col-6 mx-auto  mb-4">
                                <div class="d-flex justify-content-between">
                                    <span>Pay Before</span>
                                    <p>23h 41m 14s</p>
                                </div>
                                <hr>
                            </div>
                            <div class="col-6 mx-auto  mb-4">
                                <div class="d-flex justify-content-start">
                                    <strong class="mr-5">Bank BCA</strong>
                                    <h5>12608953871</h5>
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
