@extends('adminlte::page')

@section('title', 'Polygon Sekolah')

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <style>
        #map { height: 560px; }
    </style>

@section('content_header')
    <h1 class="m-0 text-dark">Polygon Sekolah</h1>
@stop

@section('content')
    <form action="{{route('polygons.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <table style="width: 100%;">
                            <tr>
                                <td><label for="labelNama">Nama Sekolah</label></td>
                                <td><input type="text" style="width: 550px;" id="InputNama" placeholder="Nama Sekolah" name="nama_sekolah"></td>
                            </tr>
                            <tr>
                                <td><label for="labelAlamat">Alamat</label></td>
                                <td><input type="text" style="width: 550px;" id="InputAlamat" placeholder="Alamat" name="alamat"></td>
                            </tr>
                            <tr>
                                <td><label for="labelLatitude">Latitude</label></td>
                                <td><input type="text" style="width: 550px;" id="InputLatitude" placeholder="Latidude" name="latitude"></td>
                            </tr>
                            <tr>
                                <td><label for="labelLongitude">Longitude</label></td>
                                <td><input type="text" style="width: 550px;" id="InputLongitude" placeholder="Longitude" name="longitude"></td>                               
                            </tr>
                            <tr>
                                <td><label for="labelArray">Koordinat</label></td>
                                <td>
                                    <textarea type="text" style="width: 550px; height: 100px;" id="dataArray" placeholder="Koordinat" name="dataArray"></textarea>
                                </td>                               
                            </tr>
                            <!-- <input type="hidden" name="dataArray" id="dataArray"> -->

                        </table>
                        <br>
                        <div id="map"></div>
                    </div>

                    <div class="card-border">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('polygons.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('js')
<script>
    var map = L.map('map').setView([-6.9000000000, 107.6222222222], 17);
    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    // maxZoom: 19,
    // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

    //// -- google tiles ----

    // hybrid: s,h;
    // satellite: s;
    // streets: m;
    // terrain: p;
    L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 19,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    //polygon
    var marker;
    var linearray = [];
    var polygon;

    map.on('click', function(e){
        var latitude = e.latlng.lat;
        var longitude = e.latlng.lng;
        var coordinate = e.latlng.toString();

        marker = L.marker(e.latlng).addTo(map)
                .bindPopup("Koordinat: " + coordinate)
                .openPopup();

        linearray.push([latitude, longitude]);

            if (linearray.length > 1) {
                if (polygon) {
                    map.removeLayer(polygon);
                }
                polygon = L.polygon(linearray, {
                    color: 'red'
                }).addTo(map);
            }

        document.getElementById('InputLatitude').value = latitude;
        document.getElementById('InputLongitude').value = longitude;

        var jsonData = JSON.stringify(linearray, null);
        document.getElementById('dataArray').value = jsonData;
        console.log(document.getElementById('dataArray').value);
    });

</script>
@endpush