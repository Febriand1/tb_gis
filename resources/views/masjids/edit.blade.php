@extends('adminlte::page')

@section('title', 'Data Masjid')

@section('content_header')
    <h1 class="m-0 text-dark">Data Masjid</h1>

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
    <form action="{{ route('masjids.update', $masjid->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <div class="row">
                            <div class="col-md-6">
                                <table style="width: 100%;">
                                    <tr>
                                        <td><label for="labelNama">Nama Masjid</label></td>
                                        <td><input type="text" size="70" id="InputNama" placeholder="" name="namamasjid" value="{{$masjid->namamasjid}}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelProvinsi">Provinsi</label></td>
                                        <td><input type="text" size="70" id="InputProvinsi" placeholder="" name="provinsi" value="{{ $masjid->provinsi }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelKota">Kota</label></td>
                                        <td><input type="text" size="70" id="InputKota" placeholder="" name="kota" value="{{ $masjid->kota }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelKecamatan">Kecamatan</label></td>
                                        <td><input type="text" size="70" id="InputKecamatan" placeholder="" name="kecamatan" value="{{ $masjid->kecamatan }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelAlamat">Alamat</label></td>
                                        <td><input type="text" size="70" id="InputAlamat" placeholder="" name="alamat" value="{{ $masjid->alamat }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelLatitude">Latitude</label></td>
                                        <td><input type="text" size="70" id="InputLatitude" placeholder="" name="latitude" value="{{ $masjid->latitude }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelLongitude">Longitude</label></td>
                                        <td><input type="text" size="70" id="InputLongitude" placeholder="" name="longitude" value="{{ $masjid->longitude }}"></td>
                                    </tr>
                                </table>
                                <br>
                                <div class="card-border mt-3">
                                    <a href="{{route('masjids.index')}}" class="btn btn-danger mr-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="map"></div>                                
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    // L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    //     maxZoom: 19,
    //     subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    // }).addTo(map);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

    map.on('click', function(e) {
        var coord = e.latlng;
        var lat = coord.lat;
        var lng = coord.lng;

        document.querySelector('#InputLatitude').value = lat;
        document.querySelector('#InputLongitude').value = lng;

        marker.setLatLng([lat,lng]).addTo(map);
    });
</script>
@endpush