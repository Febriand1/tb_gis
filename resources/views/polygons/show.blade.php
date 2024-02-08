@extends('adminlte::page')

@section('title', 'Polygon Sekolah')

@section('content_header')
    <h1 class="m-0 text-dark">Polygon Sekolah</h1>

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
                                <td><input type="text" style="width: 550px;" id="InputNama" placeholder="" name="nama_sekolah" value="{{$sekolah->nama_sekolah}}" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="labelAlamat">Alamat</label></td>
                                <td><input type="text" style="width: 550px;" id="InputAlamat" placeholder="" name="alamat" value="{{ $sekolah->alamat }}" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="labelLatitude">Latitude</label></td>
                                <td><input type="text" style="width: 550px;" id="InputLatitude" placeholder="" name="latitude" value="{{ $sekolah->latitude }}" readonly></td>
                            </tr>
                            <tr>
                                <td><label for="labelLongitude">Longitude</label></td>
                                <td><input type="text" style="width: 550px;" id="InputLongitude" placeholder="" name="longitude" value="{{ $sekolah->longitude }}" readonly></td>                               
                            </tr>
                            <tr>
                                <td><label for="labelArray">Koordinat</label></td>
                                <td>
                                    <textarea type="text" style="width: 550px; height: 100px;" id="dataArray" placeholder="" name="dataArray" value="{{ $polygon }}" readonly></textarea>
                                </td>                               
                            </tr>
                        </table>
                        <br>
                        <div id="map"></div>
                    </div>

                    <div class="card-border">
                        <a href="{{route('polygons.index')}}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
@stop

@push('js')
<script>
    var coordinate = JSON.parse(document.getElementById('dataArray').value);

    var lineArray = [];
    coordinate.forEach(element => {
        lineArray.push([element.latitude, element.longitude]);
    });

    var latitude = document.querySelector('#InputLatitude').value;
    var longitude = document.querySelector('#InputLongitude').value;

    var map = L.map('map').setView([latitude,longitude], 17);

    L.polygon(lineArray, {
        color: 'red'
    }).addTo(map);

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