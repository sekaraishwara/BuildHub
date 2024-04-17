@extends('admin.layouts.master')
@section('contents')

    <head>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>


    <label> Provinsi </label>
    <select class="select2-data-array browser-default" id="select2-provinsi"></select>
    <br>
    <label> Kabupaten </label>
    <select class="select2-data-array browser-default" id="select2-kabupaten"></select>
    <br>
@endsection
