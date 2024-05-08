@extends('auth.layouts.auth-master')
@section('contents')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-3 text-brand-1">Login</h2>
                            <p class="font-sm text-muted mb-30">Login to your account.</p>
                        </div>
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email *</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="email" type="text" required="" name="email" placeholder=""
                                            value="{{ old('email') }}" autofocus>

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="input-4">Password *</label>
                                            <a href="{{ route('password.request') }}"
                                                class="d-flex justify-content-end">forgot password?</a>
                                        </div>
                                        <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            id="password" type="password" required="" name="password"
                                            placeholder="************">

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Login</button>
                            </div>
                            <div class="text-muted text-center">Don't have an account?
                                <a href="{{ route('register.as') }}">Registration</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
