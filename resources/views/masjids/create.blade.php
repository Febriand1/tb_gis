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
    <form action="{{route('masjids.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <div class="row">
                            <div class="col-md-6">
                                <table style="width: 100%;">
                                    <tr>
                                        <td><label for="labelNama">Nama Masjid</label></td>
                                        <td><input type="text" size="70" id="InputNama" placeholder="Nama Masjid" name="namamasjid"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelProvinsi">Provinsi</label></td>
                                        <td><input type="text" size="70" id="InputProvinsi" placeholder="Provinsi" name="provinsi"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelKota">Kota</label></td>
                                        <td><input type="text" size="70" id="InputKota" placeholder="Kota" name="kota"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelKecamatan">Kecamatan</label></td>
                                        <td><input type="text" size="70" id="InputKecamatan" placeholder="Kecamatan" name="kecamatan"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelAlamat">Alamat</label></td>
                                        <td><input type="text" size="70" id="InputAlamat" placeholder="Alamat" name="alamat"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelLatitude">Latitude</label></td>
                                        <td><input type="text" size="70" id="InputLatitude" placeholder="Latidude" name="latitude"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="labelLongitude">Longitude</label></td>
                                        <td><input type="text" size="70" id="InputLongitude" placeholder="Longitude" name="longitude"></td>                               
                                    </tr>
                                </table>
                                <br>
                                <div class="card-border">
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
    var map = L.map('map').setView([-6.9000000000, 107.6222222222], 17);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

    //// -- google tiles ----

    // hybrid: s,h;
    // satellite: s;
    // streets: m;
    // terrain: p;
    // L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    //     maxZoom: 19,
    //     subdomains:['mt0','mt1','mt2','mt3']
    // }).addTo(map);

    //marker
    var marker;
    function onMapClick(e) {
        document.getElementById('InputLatitude').value = e.latlng.lat;
        document.getElementById('InputLongitude').value = e.latlng.lng;

        if(marker != null){
            map.removeLayer(marker);
        }

        marker = L.marker(e.latlng).addTo(map)
        .bindPopup("Koordinat : " + e.latlng.toString())
        .openPopup();
    }

    map.on('click', onMapClick);

</script>
@endpush