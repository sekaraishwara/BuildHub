@extends('auth.layouts.auth-master')

@section('contents')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-3 text-brand-1">Register As</h2>
                            <p class="font-sm text-muted mb-4">Choose account type</p>
                            <div class="row g-4 py-4">
                                <div class="col-md-6 mb-5">
                                    <a href="{{ route('register.customer') }}">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <h1>Customer</h1>
                                                <p>Akun ini cocok untuk individu yang ingin membeli produk atau menggunakan
                                                    layanan.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6  mb-5">
                                    <a href="{{ route('register.professional') }}">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <h1>Professional</h1>
                                                <p>Untuk individu yang menyediakan jasa atau layanan profesional, seperti
                                                    konsultan, desainer, atau pengembang.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('register.vendor') }}">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <h1>Vendor</h1>
                                                <p>Cocok untuk individu atau perusahaan yang ingin menjual produk anda</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('register.store') }}">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <h1>Store</h1>
                                                <P>Cocok untuk pemilik toko atau bisnis yang ingin menjual produk mereka
                                                    secara
                                                    online melalui platform Anda.</P>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-muted text-center py-4">
                        Already have an account? <a href="{{ route('login') }}" class="font-weight-bold">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
