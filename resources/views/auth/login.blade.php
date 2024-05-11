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
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            id="email" type="text" required="" name="email" placeholder=""
                                            value="{{ old('email') }}" autofocus>

                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="input-4">Password</label>
                                            <a href="{{ route('password.request') }}"
                                                class="d-flex justify-content-end">forgot password?</a>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group">
                                                <input
                                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    id="password" type="password" required="" name="password"
                                                    placeholder="************">
                                                <span class="input-group-append">
                                                    <button class=" btn-eye see-password" type="button">
                                                        <i class="ti-eye"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                </div>
                            </div>
                            <div class="py-4">
                                <div class="form-group">
                                    <button class="btn btn-default hover-up w-100" type="submit"
                                        name="login">Login</button>
                                </div>
                                <div class="text-muted text-center mt-5">Don't have an account?
                                    <a href="{{ route('register.as') }}" class="font-weight-bold">Register Here</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .btn-eye {
        border: none;
        background: none;
        cursor: pointer;
        position: absolute;
        /* Mengatur jarak dari sisi kanan */
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 999;
        /* Membuat tombol tetap berada di atas input */

        /* Mengatur ukuran tombol mata (eye) */
        padding: 6px;
        /* Atur padding tombol */
    }
</style>
