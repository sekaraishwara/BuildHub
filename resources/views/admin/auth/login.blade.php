@extends('admin.auth.layouts.auth-master')
@section('contents')
    <div class="container">
        <div class="login-content">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="login-logo">
                <a href="{{ url('./') }}">
                    <img src="{{ asset('default-uploads/Logos.png') }}" class="mb-3" alt="">
                </a>
            </div>
            <div class="login-form border">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <h4 class="mb-4 font-weight-bold text-left">
                        ADMIN LOGIN
                    </h4>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-control" placeholder="Email">

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" required class="form-control"
                            placeholder="Password">

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="checkbox">
                        <label>
                            <input id="remember_me" name="remember" type="checkbox"> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="{{ route('admin.password.email') }}">Forgotten Password?</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30 mt-5">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@endsection
