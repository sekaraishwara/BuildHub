<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUILDHUB CMS - ADMIN</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/lib/datatable/dataTables.bootstrap.min.css') }}">

    @notifyCss
</head>

<body>
    @include('admin.layouts.sidebar')

    <!-- Right Panel -->
    {{-- <div id="right-panel" class="right-panel">
        <!-- Content -->
        <div class="container">
            @include('admin.layouts.navbar')
            @yield('contents')
            <!-- /.content -->
            <div class="clearfix"></div>
            @include('admin.layouts.footer')
        </div>
    </div> --}}

    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('admin.layouts.navbar')
        <!-- /#header -->


        @yield('contents')
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright © {{ date('Y') }} BUILDHUB CMS - Admin
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>

    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>

    <script src="{{ asset('admin/js/main.js') }}"></script>


    <!-- Data Table -->
    <script src="{{ asset('admin/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/js/init/datatables-init.js') }}"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script>
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
                    })
                })
            }
        });
    </script> --}}


    <x-notify::notify />
    @notifyJs

</body>

</html>
