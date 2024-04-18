<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>BUILDHUB.</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/images/favicon.png') }}">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">


    <!-- StyleSheet -->
    @notifyCss

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/niceselect.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/flex-slider.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- Jquery -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>

    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.4/css/dataTables.dataTables.min.css">

    {{-- <link rel="stylesheet" href="{{ asset('frontend/nice-select2/dist/css/nice-select2.css') }}"> --}}

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css">
</head>

<body class="js p-0 m-0">

    <!-- Preloader -->
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}
    <!-- End Preloader -->


    @include('auth.layouts.auth-navbar')

    @yield('contents')

    @include('auth.layouts.auth-footer')


    <!-- Popper JS -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

    <!-- Slicknav JS -->
    <script src="{{ asset('frontend/js/slicknav.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('frontend/js/owl-carousel.js') }}"></script>
    <!-- Magnific Popup JS -->
    <script src="{{ asset('frontend/js/magnific-popup.js') }}"></script>
    <!-- Waypoints JS -->
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('frontend/js/finalcountdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('frontend/js/nicesellect.js') }}"></script>
    <!-- Flex Slider JS -->
    <script src="{{ asset('frontend/js/flex-slider.js') }}"></script>
    <!-- ScrollUp JS -->
    <script src="{{ asset('frontend/js/scrollup.js') }}"></script>
    <!-- Onepage Nav JS -->
    <script src="{{ asset('frontend/js/onepage-nav.min.js') }}"></script>
    <!-- Easing JS -->
    <script src="{{ asset('frontend/js/easing.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ asset('frontend/js/active.js') }}"></script>

    <!-- DataTable JS -->
    <script src="https://cdn.datatables.net/2.0.4/js/dataTables.min.js"></script>

    {{-- <script src="{{ asset('frontend/nice-select2/dist/js/nice-select2.js') }}"></script> --}}

    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>


    <!-- Laravel Notify Plugin -->

    <x-notify::notify />
    @notifyJs


    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <script>
        var urlProvinsi = "https://ibnux.github.io/data-indonesia/provinsi.json";
        var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";

        function clearOptions(id) {
            $('#' + id).empty().trigger('change');
        }

        console.log('Load Provinsi...');
        $.getJSON(urlProvinsi, function(res) {

            res = $.map(res, function(obj) {
                obj.text = obj.nama
                return obj;
            });

            data = [{
                id: "",
                nama: "- Pilih Provinsi -",
                text: "- Pilih Provinsi -"
            }].concat(res);

            // Implement data ke select provinsi
            $("#select2-provinsi").select2({
                dropdownAutoWidth: true,
                width: '100%',
                data: data
            })
        });

        var selectProv = $('#select2-provinsi');
        $(selectProv).change(function() {
            var value = $(selectProv).val();
            clearOptions('select2-kabupaten');

            if (value) {
                console.log("on change selectProv");

                var text = $('#select2-provinsi :selected').text();
                console.log("value = " + value + " / " + "text = " + text);

                console.log('Load Kabupaten di ' + text + '...')
                $.getJSON(urlKabupaten + value + ".json", function(res) {

                    res = $.map(res, function(obj) {
                        obj.text = obj.nama
                        return obj;
                    });

                    data = [{
                        id: "",
                        nama: "- Pilih Kabupaten -",
                        text: "- Pilih Kabupaten -"
                    }].concat(res);

                    // Implement data ke select kabupaten
                    $("#select2-kabupaten").select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        data: data
                    });

                })
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".delete-item").on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href'); // Ubah let menjadi var
                Swal.fire({ // Ubah panggilan swal menjadi Swal.fire
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this data!',
                    icon: 'warning',
                    showCancelButton: true, // Menggunakan showCancelButton daripada buttons:true
                    confirmButtonColor: '#d33', // Ubah dangerMode menjadi confirmButtonColor
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => { // Mengubah willDelete menjadi result
                    if (result
                        .isConfirmed
                    ) { // Menggunakan isConfirmed untuk mengecek apakah tombol konfirmasi ditekan
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                Swal.fire(xhr.responseJSON
                                    .message, { // Ubah swal menjadi Swal.fire
                                        icon: 'error',
                                    });
                            }
                        });
                    }
                });
            });
        });
    </script>


</body>

</html>
