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
                                <li><a href="{{ route('professional.service') }}">Service <i class="ti-arrow-right"></i></a>
                                <li class="active"><a href="{{ route('professional.service') }}">Create An Order</a>
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
                <div class="col-lg-9 col-md-8 col-sm-12 col-12">
                    <div class="content-single pb-5">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a href="{{ route('professional.service.order') }}"> Back to All Order</a>
                            <h3>Create An Order</h3>
                        </div>


                        <div class="card  mb-5">
                            <div class="card-header p-0 bg-white">
                                <div class="alert alert-warning">Order akan otomatis masuk ke sistem setelah invoice dibuat.
                                    Pastikan
                                    detail order dan alamat email client benar. </div>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="Name">Client Email <small class="text-danger">*Pengguna akan
                                                    mendapatkan notifikasi untuk
                                                    pembayaran</small></label>
                                            <input class="form-control" type="email" placeholder="joe@gmail.com"
                                                name="name" id="name">

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Name">Order Type</label>
                                            <input class="form-control text-muted" readonly type="text" name="order_type"
                                                id="order_type" value="VENDOR SERVICE">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Name">Invoice</label>
                                            <input class="form-control" type="text" readonly name="name"
                                                id="name">
                                            <small class="text-danger">*Otomatis terbuat setelah order
                                                dibuat</small>
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
                                </div>
                                <div class="row mt-3">

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Name">Detail Item</label>
                                            <input class="form-control" type="text" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Name">Kuantiti</label>
                                            <input class="form-control" type="text" name="name" id="name">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <button class="btn w-full">CREATE ORDER</button>
                        </div>
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
                        <div class="alert alert-danger">Order akan otomatis masuk ke sistem setelah invoice dibuat.
                            Pastikan
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
@endsection
