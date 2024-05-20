@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
                            <li><a href="{{ route('customer.cart') }}">Cart<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="blog-single.html">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('customer.checkout.submit') }}" method="post">
        @csrf
        <section class="shop checkout section p-0 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex justify-content-start">
                                <input type="hidden" class="" name="checkout_id" value="{{ $checkoutId }}">
                            </div>
                            <div class="card-body">
                                <div class="customer customer-info">
                                    @if ($cartItems)
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <strong><i class="fa fa-location-arrow mx-2"></i> Shipping to:
                                                </strong>
                                                <span>{{ $customer->name }}</span>
                                                <span>{{ $customer->phone }}</span>
                                                <span>{{ $customer->alamat }}, {{ $customer->kota }},
                                                    {{ $customer->kodepos }}</span>
                                                <a href="{{ route('customer.profile') }}" class="text-primary"><i
                                                        class="fa fa-pencil-square-o mx-2"></i>Change Address</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @foreach ($cartItems as $item)
            <section class="shop checkout section p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="checkout-form">
                                <h2 class="mb-3">Product Order</h2>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-none">
                                            <input type="text" class="" name="store_name"
                                                value="{{ $item->store_name }}">
                                            <input type="text" class="" name="total_price"
                                                value="{{ $item->item_price * $item->item_qty }}">
                                            <input type="text" class="" name="shipping_address"
                                                value="{{ $customer->alamat }}, {{ $customer->kota }}">
                                            <input type="text" name="item_qty" value="{{ $item->item_qty }}">
                                            <input type="text" name="product_id" value="{{ $item->product_id }}">
                                            <input type="text" name="item_price" value="{{ $item->item_price }}">
                                            <input type="text" name="item_name" value="{{ $item->item_name }}">
                                            <input type="text" name="item_image" value="{{ $item->item_image }}">
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="col-12">
                                                    <p class="m-0"><i
                                                            class="fa fa-home mr-2"></i>{{ $item->store_name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="col-2">
                                                        <img src="{{ $item->item_image }}" alt="">
                                                    </div>
                                                    <div class="col-3">
                                                        <p class="mb-2 text-muted">Product Name
                                                        </p>
                                                        <p>{{ $item->item_name }}</p>

                                                    </div>
                                                    <div class="col-2">
                                                        <p class="mb-2 text-muted">Item Qty
                                                        </p>
                                                        <p>{{ $item->item_qty }}</p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p class="mb-2 text-muted">Item Price
                                                        </p>
                                                        <p>Rp{{ number_format($item->item_price, 0, ',', '.') }}
                                                        </p>

                                                    </div>
                                                    <div class="col-2">
                                                        <p class="mb-2 text-muted">Subtotal Product
                                                        </p>
                                                        <p id="total-payment">
                                                            Rp{{ number_format($item->item_price * $item->item_qty, 0, ',', '.') }}
                                                        </p>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <div class="col-12 ">
                                                    <div class="d-flex align-items-center justify-content-end p-2">

                                                        <span class="mr-2">Total Payment ({{ $item->item_qty }}
                                                            Product):

                                                        </span>
                                                        <h5> Rp{{ number_format($item->item_price * $item->item_qty, 0, ',', '.') }}
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="shop checkout section p-0 mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-top-0 rounded-0">
                                <div class="card-body">
                                    <table class="table-payment table-responsive mb-0 d-flex justify-content-end">
                                        <tr>
                                            <td>
                                                Subtotal Product:
                                            </td>
                                            <td class="td-value">
                                                Rp{{ number_format($item->item_price * $item->item_qty, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Shipping Cost:
                                            </td>
                                            <td class="td-value">Rp0 </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Service Fee:
                                            </td>
                                            <td class="td-value">Rp0 </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Total Payment:
                                            </td>
                                            <td class="td-value">
                                                <h3 id="totalPayment">
                                                    Rp{{ number_format($item->item_price * $item->item_qty, 0, ',', '.') }}
                                                </h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer bg-white p-4">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn text-white" type="submit">Create
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endforeach
        {{--
        <section class="shop checkout section p-0 mb-5">
            <div class="container">
                <div class="row">
                    @foreach ($cartItems as $item)
                        <div class="col-12">
                            <div class="card border-top-0 rounded-0">
                                <div class="card-body">
                                    <table class="table-payment table-responsive mb-0 d-flex justify-content-end">
                                        <tr>
                                            <td>
                                                Subtotal Product:
                                            </td>
                                            <td class="td-value">
                                                Rp{{ number_format($item->item_price * $item->item_qty, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Shipping Cost:
                                            </td>
                                            <td class="td-value">Rp0 </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Service Fee:
                                            </td>
                                            <td class="td-value">Rp0 </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                Total Payment:
                                            </td>
                                            <td class="td-value">
                                                <h3 id="totalPayment">
                                                    Rp{{ number_format($item->item_price * $item->item_qty, 0, ',', '.') }}
                                                </h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer bg-white p-4">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn text-white" type="submit">Create
                                            Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section> --}}
    </form>
@endsection



<style>
    #total-payment {
        font-weight: 600;
    }

    .td-value {
        padding-left: 60px;
    }

    table.table-payment tr td {
        padding-bottom: 10px;
    }

    #totalPayment {
        color: #a3540e;
    }
</style>
