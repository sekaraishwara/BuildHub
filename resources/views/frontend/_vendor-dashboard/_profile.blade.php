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
                                <li class="active"><a href="{{ route('vendor.profile') }}">Profile</a>
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
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home"
                                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                    Vendor Profile</button>
                                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile"
                                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Vendor
                                    Info</button>
                                <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact"
                                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Account
                                    Settings</button>
                            </div>
                        </nav>
                        <div class="tab-content shop checkout" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <form action="{{ route('vendor.vendor.profile') }}" method="POST" class="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <x-image-preview :height="200" :width="200" :source="$vendorInfo?->logo" />
                                            <div class="form-group">
                                                <label>Vendor Logo<span>*</span></label>
                                                <input type="file" class="form-control" name="logo" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <x-image-preview :height="200" :width="200" :source="$vendorInfo?->banner" />
                                            <div class="form-group">
                                                <label>Vendor Banner<span>*</span></label>
                                                <input type="file" class="form-control" name="banner" placeholder=""
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Vendor Name<span>*</span></label>
                                                <input type="text" class="form-control" name="name" placeholder=""
                                                    required="required"value="{{ $vendorInfo?->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Vendor Category<span>*</span></label>
                                                <select name="category_vendor_id" id="category_vendor_id">
                                                    <option class="text-muted">--Pilih Kategori Vendor--</option>
                                                    @foreach ($vendorCategory as $item)
                                                        <option @selected($item->id == $vendorInfo?->category_vendor_id) value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Vendor Desc<span>*</span></label>
                                                <input type="text" class="form-control" name="desc" placeholder=""
                                                    required="required" value="{{ $vendorInfo?->desc }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Instagram<span>*</span></label>
                                                <input type="text" class="form-control" name="instagram" placeholder=""
                                                    required="required" value="{{ $vendorInfo?->instagram }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Facebook<span>*</span></label>
                                                <input type="text" class="form-control" name="facebook"
                                                    placeholder="" required="required"
                                                    value="{{ $vendorInfo?->facebook }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn-save">Save Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <form action="{{ route('vendor.profile.vendor-info') }}" method="POST" class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email Store<span>*</span></label>
                                                <input type="text" class="form-control" name="email" placeholder=""
                                                    required="required" value="{{ $vendorInfo?->email }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Phone Store<span>*</span></label>
                                                <input type="text" class="form-control" name="phone" placeholder=""
                                                    required="required" value="{{ $vendorInfo?->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Alamat<span>*</span></label>
                                                <input type="text" class="form-control" name="alamat" placeholder=""
                                                    required="required" value="{{ $vendorInfo?->alamat }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Province<span>*</span></label>
                                                <select class="nice-select province" name="provinsi">
                                                    <option class="text-muted">--Select Province--</option>
                                                    @foreach ($provinces as $item)
                                                        <option @selected($item->id == $vendorInfo?->provinsi) value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Regency/City<span>*</span></label>
                                                <select class="nice-select regency" name="kota">
                                                    <option class="text-muted">--Select Regency/City--</option>
                                                    @foreach ($regencies as $item)
                                                        <option @selected($item->id == $vendorInfo?->kota) value="{{ $item->id }}">
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Kode Pos<span>*</span></label>
                                                <input type="number" class="form-control" name="kodepos" id="kodepos"
                                                    value="{{ $vendorInfo?->kodepos }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn-save">Save Changes</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <form action="{{ route('vendor.profile.account-info') }}" method="post"
                                    class="form mb-3">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" name="name" placeholder=""
                                                    required="required" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email" placeholder=""
                                                    required="required" value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-default">Save</button>
                                </form>
                                <form action="{{ route('vendor.profile.password-update') }}" method="POST"
                                    class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Change Password</label>
                                                <input type="text" class="form-control" name="password"
                                                    placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="text" class="form-control" name="password_confirmation"
                                                    placeholder="" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-default">Save</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
