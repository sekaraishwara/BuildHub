@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shopping-cart section pt-0">
        <div class="container mb-3">
            <h4>My Cart</h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>STORE</th>
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center">QUANTITY</th>
                                <th class="text-center">TOTAL</th>
                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartItem as $item)
                                <tr>
                                    <td>
                                        <p>
                                            {{ $item?->product->store->name }}</p>
                                    </td>
                                    <td class="image" data-title="No"><img src="{{ $item?->product->image }}"
                                            alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{ $item?->product->name }}</a></p>
                                        <p class="product-des">Maboriosam in a tonto nesciung eget distingy magndapibus.</p>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{ $item?->product->price }} </span>
                                    </td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" class="btn btn-primary btn-number"
                                                    disabled="disabled" data-type="minus" data-field="quant[1]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[1]" class="input-number" data-min="1"
                                                data-max="100" value="{{ $item?->item_qty }}">
                                            <div class="button plus">
                                                <button type="button" class="btn btn-primary btn-number" data-type="plus"
                                                    data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>$220.88</span></td>
                                    <td class="action" data-title="Remove"><a href="#"><i
                                                class="ti-trash remove-icon"></i></a></td>
                            @endforeach

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button class="btn">Apply</button>
                                        </form>
                                    </div>
                                    <div class="checkbox">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2"
                                                type="checkbox"> Shipping (+10$)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>$330.00</span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>You Save<span>$20.00</span></li>
                                        <li class="last">You Pay<span>$310.00</span></li>
                                    </ul>
                                    <div class="button5">
                                        <a href="{{ route('customer.checkout') }}" class="btn">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div> --}}
        </div>
    </div>
@endsection
