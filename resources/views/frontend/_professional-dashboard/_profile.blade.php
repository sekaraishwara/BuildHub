@extends('auth.layouts.auth-master')
@section('contents')
    <section class="section-box mt-75">
        <div class="breadcrumbs mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="bread-inner">
                            <ul class="bread-list">
                                <li><a href="{{ route('home') }}">Home / </a></li>
                                <li><a href="{{ route('professional.dashboard') }}">Dashboard /</a>
                                </li>
                                <li class="active"><a href="{{ route('professional.profile') }}">Profile</a>
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

                        <x-app-layout>
                            <div class="mb-5">
                                <div class="max-w-7xl mx-auto sm:p-6 lg:p-8 space-y-6">
                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <div class="max-w-xl">
                                            @include('frontend._professional-dashboard.partials.update-profile-information-form')
                                        </div>
                                    </div>

                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <div class="max-w-xl">
                                            @include('frontend._professional-dashboard.partials.update-password-form')
                                        </div>
                                    </div>

                                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                        <div class="max-w-xl">
                                            @include('frontend._professional-dashboard.partials.delete-user-form')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-app-layout>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mt-120"></div>
@endsection
