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
                                <li><a href="{{ route('vendor.dashboard') }}">Dashboard </a><i
                                        class="ti-arrow-right"></i></a>
                                </li>
                                <li><a href="{{ route('vendor.service') }}">Service <i class="ti-arrow-right"></i></a>
                                <li class="active"><a href="{{ route('vendor.service') }}">Create An Order</a>
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
                @include('frontend._vendor-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                    <div class="content-single pb-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('vendor.service.order') }}">
                                << Back to All Order</a>
                                    <h3>Create An Order</h3>
                        </div>
                        <form action="{{ route('vendor.service.order.store') }}" method="post">
                            @csrf
                            <div class="card mb-5">
                                <div class="card-header p-0 ">
                                    <div class="alert alert-warning">Order akan otomatis masuk ke sistem setelah invoice
                                        dibuat.
                                        Pastikan
                                        detail order dan alamat email client benar. </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="Name">Order Type</label>
                                                <input class="form-control text-muted" readonly type="text"
                                                    name="orderType" id="orderType" value="VENDOR SERVICE">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="Name">Client Email</label>
                                                <input class="form-control" type="email" name="client_email"
                                                    id="client_email">
                                                <small class="text-danger">*Untuk notifikasi
                                                    pembayaran client</small>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <label for="Name">Service Name</label>
                                            <div class="form-group">
                                                <select name="service_name" id="service_name">
                                                    @foreach ($getService as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-right">
                                        <button id="addItemBtn" type="button" class="btnn p-2">+ Add item</button>
                                    </div>
                                    <div id="itemsContainer">
                                        <div class="row item-row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="itemName">Item</label>
                                                    <input class="form-control" type="text" name="itemName[]"
                                                        id="itemName">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="itemQty">Qty <small class="text-danger">*Number
                                                            only</small></label>
                                                    <input class="form-control" type="number" name="itemQty[]"
                                                        id="itemQty">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="itemPrice">Price <small class="text-danger">*Price per
                                                            item</small></label>
                                                    <input class="form-control" type="number" name="itemPrice[]"
                                                        id="itemPrice">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-white">
                                    <div class="col-12 mb-3 p-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="col-6 p-0">
                                                <label for="totalAmount">Total Amount:</label>
                                                <h5 id="totalAmount" class="font-weight-bold">0</h5>
                                                <input type="number" class="d-none" name="total_price">
                                            </div>
                                            <div class="col-6 p-0 text-right">
                                                <button type="button" id="calculateBtn"
                                                    class="btn-primary p-2">Calculate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 p-0 py-2">
                                        <button type="submit" class="btn w-full">CREATE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('addItemBtn').addEventListener('click', function() {
            // Create a new row
            var newRow = document.createElement('div');
            newRow.classList.add('row', 'item-row');

            // Create the item name input
            var itemNameDiv = document.createElement('div');
            itemNameDiv.classList.add('col-4');
            var itemNameFormGroup = document.createElement('div');
            itemNameFormGroup.classList.add('form-group');
            var itemNameLabel = document.createElement('label');
            itemNameLabel.setAttribute('for', 'itemName');
            itemNameLabel.textContent = 'Item';
            var itemNameInput = document.createElement('input');
            itemNameInput.classList.add('form-control');
            itemNameInput.setAttribute('type', 'text');
            itemNameInput.setAttribute('name', 'itemName[]');
            itemNameInput.setAttribute('id', 'itemName');
            itemNameFormGroup.appendChild(itemNameLabel);
            itemNameFormGroup.appendChild(itemNameInput);
            itemNameDiv.appendChild(itemNameFormGroup);
            newRow.appendChild(itemNameDiv);

            // Create the quantity input
            var itemQtyDiv = document.createElement('div');
            itemQtyDiv.classList.add('col-4');
            var itemQtyFormGroup = document.createElement('div');
            itemQtyFormGroup.classList.add('form-group');
            var itemQtyLabel = document.createElement('label');
            itemQtyLabel.setAttribute('for', 'itemQty');
            itemQtyLabel.innerHTML = 'Qty <small class="text-danger">*Number only</small>';
            var itemQtyInput = document.createElement('input');
            itemQtyInput.classList.add('form-control');
            itemQtyInput.setAttribute('type', 'number');
            itemQtyInput.setAttribute('name', 'itemQty[]');
            itemQtyInput.setAttribute('id', 'itemQty');
            itemQtyFormGroup.appendChild(itemQtyLabel);
            itemQtyFormGroup.appendChild(itemQtyInput);
            itemQtyDiv.appendChild(itemQtyFormGroup);
            newRow.appendChild(itemQtyDiv);


            var itemPriceDiv = document.createElement('div');
            itemPriceDiv.classList.add('col-4');
            var itemPriceFormGroup = document.createElement('div');
            itemPriceFormGroup.classList.add('form-group');
            var itemPriceLabel = document.createElement('label');
            itemPriceLabel.setAttribute('for', 'itemPrice');
            itemPriceLabel.innerHTML = 'Price <small class="text-danger">*Price per item</small>';
            var itemPriceInput = document.createElement('input');
            itemPriceInput.classList.add('form-control');
            itemPriceInput.setAttribute('type', 'number');
            itemPriceInput.setAttribute('name', 'itemPrice[]');
            itemPriceInput.setAttribute('id', 'itemPrice');
            itemPriceFormGroup.appendChild(itemPriceLabel);
            itemPriceFormGroup.appendChild(itemPriceInput);
            itemPriceDiv.appendChild(itemPriceFormGroup);
            newRow.appendChild(itemPriceDiv);

            document.getElementById('itemsContainer').appendChild(newRow);
        });

        document.getElementById('calculateBtn').addEventListener('click', function() {
            var total = 0;
            var itemRows = document.getElementsByClassName('item-row');

            for (var i = 0; i < itemRows.length; i++) {
                var itemQty = itemRows[i].querySelector('input[name="itemQty[]"]').value;
                var itemPrice = itemRows[i].querySelector('input[name="itemPrice[]"]').value;

                if (itemQty && itemPrice) {
                    total += (parseFloat(itemQty) * parseFloat(itemPrice));
                }
            }

            // Format total as IDR
            var formattedTotal = total.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            document.getElementById('totalAmount').textContent = formattedTotal;

            document.querySelector('input[name="total_price"]').value = total.toFixed(2);
        });
    </script>
@endsection
