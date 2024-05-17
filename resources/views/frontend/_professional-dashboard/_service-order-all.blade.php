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
                                <li class="active"><a href="{{ route('professional.service') }}">Service</a>
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

                        <div class="d-flex justify-content-between align-items-center">
                            <h3>All Service Order</h3>
                            {{-- <a href="btn" class="btn">Create
                                An Order</a> --}}
                            <button class="btn"
                                onclick="window.location='{{ route('professional.service.order.create') }}'">Create
                                An Order</button>
                        </div>

                        <div class="my-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice No</th>
                                        <th scope="col">Service Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Client Email</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    {{-- @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->status ? 'Aktif' : 'Archive' }}</td>
                                            <td>

                                                <a href="#" data-toggle="modal"
                                                    data-target="#editModal{{ $item->id }}"><i
                                                        class="ti-pencil-alt mx-2 text-primary"></i>
                                                </a>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#deleteModal{{ $item->id }}">
                                                    <i class="ti-trash text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal Create-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form method="POST" action="{{ route('professional.service.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">Order akan otomatis masuk ke sistem setelah invoice dibuat. Pastikan
                            untuk memasukkan
                            detail order dan alamat email client dengan benar. </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Name">Order</label>
                                    <input class="form-control text-muted" readonly type="text" name="order_type"
                                        id="order_type" value="VENDOR SERVICE">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="Name">Service Name</label>
                                <div class="form-group">
                                    <select name="" id="">
                                        <option value="">LUMION 3D RENDERING</option>
                                        <option value="">SERVICE 2</option>
                                        <option value="">SERVICE 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Name">Qty</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Name">Client Email</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                    <small class="text-danger">*Pengguna akan mendapatkan notifikasi pembayaran</small>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Name">Total Price</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="Name">Cek total</label>
                                    <input class="form-control" type="text" name="name" id="name">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit&Delete-->
    {{-- @foreach ($data as $item)
        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('professional.service.update', ['id' => $item->id]) }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <x-image-preview :height="100" :width="200" :source="$item?->image" />
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Name">Service Name</label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            value="{{ $item->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Category">Service Category</label>
                                        <select name="category" id="category">
                                            <option value="{{ $item->category }}">{{ $item->category }}</option>
                                            @foreach ($category as $categoryItem)
                                                <option value="{{ $categoryItem->name }}">{{ $categoryItem->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Category">Price Range</label>
                                        <select name="price" id="price">
                                            <option value="{{ $item->price }}">{{ $item->price }}</option>
                                            @foreach ($price as $priceItem)
                                                <option value="{{ $priceItem->price_ranges }}">
                                                    {{ $priceItem->price_ranges }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Desc">Desc</label>
                                        <textarea class="form-control" id="desc" name="desc" rows="3">{{ $item->desc }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal Delete-->
        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="createModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST" action="{{ route('professional.service.delete', ['id' => $item->id]) }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete this data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Yes, Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach --}}
@endsection