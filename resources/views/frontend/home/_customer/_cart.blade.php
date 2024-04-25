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
                    <form action="{{ route('customer.sessionCheckout') }}" method="POST">
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>#</th>
                                    <th>STORE</th>
                                    <th class="w-50">PRODUCT</th>
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
                                @csrf
                                @foreach ($cartItem as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="cart_id[]" value="{{ $item->id }}">
                                        </td>
                                        <td>
                                            <p>
                                                {{ $item?->product->store->name }}</p>
                                        </td>
                                        <td class="image" data-title="No"><img src="{{ $item?->product->image }}"
                                                alt="#"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a href="#">{{ $item?->product->name }}</a></p>
                                            {{-- <p class="product-des">Maboriosam in a tonto nesciung eget distingy magndapibus.
                                            </p> --}}
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>{{ number_format($item?->product->price, 0, ',', '.') }} </span>
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
                                                    <button type="button" class="btn btn-primary btn-number"
                                                        data-type="plus" data-field="quant[1]">
                                                        <i class="ti-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td class="total-amount" data-title="Total">
                                            <span>{{ number_format($item->product->price * $item->item_qty, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="action" data-title="Remove"><a href="#"><i
                                                    class="ti-trash remove-icon"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn">Checkout</button>
                        </div>
                    </form>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
@endsection
