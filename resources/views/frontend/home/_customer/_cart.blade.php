@extends('auth.layouts.auth-master')
@section('contents')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
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
                    <form id="cart-form" action="{{ route('customer.checkout.store') }}" method="post">
                        @csrf
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
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItem as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="cart_id[]" value="{{ $item->id }}"
                                                class="cart-checkbox">
                                            <input type="hidden" name="store_id[]" value="{{ $item->product->store->id }}">
                                        </td>
                                        <td>
                                            <p>{{ $item?->product->store->name }}</p>
                                            <div class="d-none">
                                                <input type="number" name="product_id" value="{{ $item?->product->id }}">
                                                <input type="text" name="item_name" value="{{ $item?->product->name }}">
                                                <input type="text" name="store_name"
                                                    value="{{ $item?->product->store->name }}">
                                                <input type="text" name="item_qty" value="{{ $item?->item_qty }}">
                                                <input type="text" name="item_price" value="{{ $item?->item_price }}">
                                                <input type="text" name="item_image" value="{{ $item?->item_image }}">
                                            </div>
                                        </td>
                                        <td class="image" data-title="No"><img src="{{ $item?->product->image }}"
                                                alt="#"></td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a href="#">{{ $item?->product->name }}</a>
                                            </p>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <span>{{ number_format($item?->product->display_price, 0, ',', '.') }}
                                            </span>
                                        </td>
                                        <td class="qty" data-title="Qty">
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
                                        </td>
                                        <td class="total-amount" data-title="Total">
                                            <span>{{ number_format($item->product->display_price * $item->item_qty, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <button type="button" data-toggle="modal"
                                                data-target="#deleteModal{{ $item->id }}">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                        <div class="d-flex justify-content-end">
                            <button id="checkout-button" type="submit" class="btn w-full" disabled>Checkout</button>
                        </div>
                    </form>
                    <!--/ End Shopping Summery -->
                    @foreach ($cartItem as $item)
                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Delete Item
                                            Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this item?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('customer.cart.delete', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.cart-checkbox');
            const checkoutButton = document.getElementById('checkout-button');

            function toggleCheckoutButton() {
                const anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                checkoutButton.disabled = !anyChecked;
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', toggleCheckoutButton);
            });

            toggleCheckoutButton(); // Initial check
        });
    </script>
@endsection
