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
                                <li class="active"><a href="{{ route('vendor.service') }}">Invoice</a>
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
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <div class="content-single">

                        <div class="d-flex justify-content-between align-items-center">
                            <h3>All Service Invoice</h3>
                            <button class="btn"
                                onclick="window.location='{{ route('vendor.service.order.create') }}'">Create
                                Invoice</button>
                        </div>

                        <div class="my-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Service</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Client Email</th>
                                        <th scope="col"> Date</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($allOrder as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->invoice_no }}</td>
                                            <td>{{ $item->service_name }}</td>
                                            <td>Rp{{ number_format($item->total_price, 0, ',', '.') }}</td>
                                            <td>{{ $item->client_email }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->isPayment ? 'Yes' : 'No' }}</td>
                                            <td>{{ $item->isActive ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <a href="{{ route('vendor.service.order.show', $item->invoice_no) }}"><i
                                                        class="ti-eye mx-2 text-primary"></i>
                                                </a>
                                                <form action="{{ route('vendor.service.order.delete', $item->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="border:none;background:none;">
                                                        <i class="ti-trash mx-2 text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
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
@endsection
