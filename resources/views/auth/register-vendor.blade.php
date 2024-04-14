@extends('auth.layouts.auth-master')

@section('contents')
    <section class="py-5">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-3 text-brand-1">Register as Vendor</h2>
                            <p class="font-sm text-muted mb-30">Dont have a account yet? Create one.</p>
                        </div>
                        <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Full Name *</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            id="name" type="text" required="" name="name"
                                            placeholder="Steven Job" value="{{ old('name') }}">

                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email *</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="email" type="email" required="" name="email"
                                            placeholder="stevenjob@gmail.com" value="{{ old('email') }}">

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Password *</label>
                                        <input class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="input-4" type="password" required="" name="password"
                                            placeholder="************">

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label class="form-label" for="input-5">Confirm Password *</label>
                                        <input
                                            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                            id="input-5" type="password" required="" name="password_confirmation"
                                            placeholder="************">

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <hr>
                                    <div class="d-none">
                                        <h6 for="" class="mb-2">Create Account For</h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                id="typeCustomer" value="customer">
                                            <label class="form-check-label" for="typeCustomer">Customer</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                id="typeProfessional" value="professional">
                                            <label class="form-check-label" for="typeProfessional">Professional</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                id="typeVendor" value="vendor" checked>
                                            <label class="form-check-label" for="typeVendor">Vendor</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="account_type"
                                                id="typeStore" value="store">
                                            <label class="form-check-label" for="typeStore">Store</label>
                                        </div>
                                    </div>
                                    <div class="form-group my-4">
                                        <button class="btn btn-default hover-up w-100" type="submit" name="login">Submit
                                            &amp;
                                            Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-muted text-center">Already have an account?
                        <a href="{{ route('login') }}">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
