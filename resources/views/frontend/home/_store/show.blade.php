@extends('frontend.layouts.master')
@section('contents')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="index1.html">Store<i class="ti-arrow-right"></i></a></li>
                            <li><a href="blog-single.html">Luna Car Humidifier Diffuser Mobil Portable
                                    Aromatherapy Cute With LED Light Color Design 250 ml</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <section>
        <div class="container">
            <div class="shop product single-item">
                <div class="d-flex justify-content-between">
                    <div class="product-image">
                        <img id="uploadedImage" src="{{ asset('uploads/media_6626166640bdb.png') }}" alt="">
                    </div>
                    <div class="product-text">
                        <h4>Luna Car Humidifier Diffuser Mobil Portable Aromatherapy Cute With LED Light Color Design 250 ml
                        </h4>
                        <p>adipisicing elit. Debitis placeat laudantium, sint, earum voluptatem, explicabo nihil eos dolores
                            tempora soluta asperiores expedita quidem veritatis omnis provident. Aspernatur enim facilis
                            dicta.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Product Style 1  -->
@endsection

<style>
    .single-item {
        margin: 50px 0;
    }

    .product-image {
        width: 550px;
        /* Lebar kotak gambar */
        height: auto;
        /* Tinggi kotak gambar */
        overflow: hidden;
    }

    .product-text {
        margin-left: 60px;
    }

    .product-text h4 {
        line-height: 2rem;
        font-weight: 500;
    }

    #uploadedImage {
        width: 100%;
        /* Gambar akan mengisi lebar kotak */
        height: auto;
        /* Mengatur tinggi gambar agar tetap proporsional */
    }
</style>
