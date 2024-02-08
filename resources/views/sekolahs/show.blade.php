@extends('adminlte::page')

@section('title', 'Data Sekolah')

@section('content_header')
    <h1 class="m-0 text-dark">Data Sekolah</h1>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <style>
        #map { height: 560px; }
    </style>
@stop

@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <table style="width: 100%;">
                            <tr>
                                <td><label for="labelNama">Nama Sekolah</label></td>
                                <td><input type="text" size="70" id="InputNama" placeholder="" name="namasekolah" value="{{$sekolah->namasekolah}}" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="labelAlamat">Alamat</label></td>
                                <td><input type="text" size="70" id="InputAlamat" placeholder="" name="alamat" value="{{ $sekolah->alamat }}" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="labelLatitude">Latitude</label></td>
                                <td><input type="text" size="70" id="InputLatitude" placeholder="" name="latitude" value="{{ $sekolah->latitude }}" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="labelLongitude">Longitude</label></td>
                                <td><input type="text" size="70" id="InputLongitude" placeholder="" name="longitude" value="{{ $sekolah->longitude }}" readonly></td>                               
                            </tr>
                        </table>
                        <br>
                        <div id="map"></div>
                    </div>

                    <div class="card-border">
                        <a href="{{route('sekolahs.index')}}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
@stop

@push('js')
<script>
    var latitude = document.querySelector('#InputLatitude').value;
    var longitude = document.querySelector('#InputLongitude').value;

    var map = L.map('map').setView([latitude,longitude], 17);

    var marker = L.marker([latitude,longitude]).addTo(map);

    // hybrid: s,h;
    // satellite: s;
    // streets: m;
    // terrain: p;
    L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 19,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    }).addTo(map);
</script>
@endpush