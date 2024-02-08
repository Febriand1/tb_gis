@extends('adminlte::page')

@section('title', 'Data Sekolah')

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
    <h1 class="m-0 text-dark">Data Sekolah</h1>
@stop

@section('content')
    <form action="{{route('sekolahs.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <table style="width: 100%;">
                            <tr>
                                <td><label for="labelNama">Nama Sekolah</label></td>
                                <td><input type="text" size="70" id="InputNama" placeholder="Nama Sekolah" name="namasekolah"></td>
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
                        <div id="map"></div>
                    </div>

                    <div class="card-border">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('sekolahs.index')}}" class="btn btn-danger">Batal</a>
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
    L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
        maxZoom: 19,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);


    // var mapLink = '<a href="http://www.esri.com/">Esri</a>';
    // var wholink = 'i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community';

    // L.tileLayer(
    //     'http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    //     attribution: '&copy; '+mapLink+', '+wholink,
    //     maxZoom: 18,
    //     }).addTo(map);


    // marker
    // var marker;
    // function onMapClick(e) {
    //     document.getElementById('InputLatitude').value = e.latlng.lat;
    //     document.getElementById('InputLongitude').value = e.latlng.lng;

    //     if(marker != null){
    //         map.removeLayer(marker);
    //     }

    //     marker = L.marker(e.latlng).addTo(map)
    //     .bindPopup("Koordinat : " + e.latlng.toString())
    //     .openPopup();
    // }

    // map.on('click', onMapClick);
    

    // //polyline
    // var marker;
    // var linearray = [];
    // var polyline;

    // map.on('click', function onMapClick(e){
    //     latitude = e.latlng.lat;
    //     longitude = e.latlng.lng;
    //     document.getElementById('InputLatitude').value = latitude;
    //     document.getElementById('InputLongitude').value = longitude;
    //     linearray.push([latitude, longitude]);

    //     marker = L.marker([latitude, longitude]).addTo(map);
        
    //     marker.on('click', function(e) {
    //         map.removeLayer(marker);
    //         map.removeLayer(polyline);

    //         linearray.splice(linearray.indexOf([latitude, longitude]), 1);
    //     });

    //     // if(marker != null){
    //     //     map.removeLayer(marker);
    //     //     map.removeLayer(polyline);
    //     // }

    //     // marker = L.marker([latitude, longitude]).addTo(map);
        
    //     polyline = L.polyline(linearray, {color: 'red'}).addTo(map);
    // });


    // // polygon
    // var marker;
    // var linearray = [];
    // var polygon;

    // map.on('click', function onMapClick(e){
    //     var latitude = e.latlng.lat;
    //     var longitude = e.latlng.lng;

    //     document.getElementById('InputLatitude').value = latitude;
    //     document.getElementById('InputLongitude').value = longitude;

    //     marker = L.marker([latitude, longitude]).addTo(map);

    //     linearray.push([latitude, longitude]);

    //     if (linearray.length > 1) {
    //         if (polygon) {
    //             map.removeLayer(polygon);
    //         }
    //         polygon = L.polygon(linearray, {
    //             color: 'red'
    //         }).addTo(map);
    //     }

    //     marker.on('click', function(e) {
    //         map.removeLayer(marker);
    //         map.removeLayer(polygon);

    //         linearray.splice(linearray.indexOf([latitude, longitude]), 1);
    //     });

    //     // marker.on('click', function(e) {
    //     //     for (var i = linearray.length - 1; i >= 0; i--) {
    //     //         if (linearray[i][0] === latitude && linearray[i][1] === longitude) {
    //     //             map.removeLayer(L.marker([linearray[i][0], linearray[i][1]]));
    //     //             linearray.splice(i, 1);
    //     //         }
    //     //     }

    //     //     if (linearray.length > 1) {
    //     //         map.removeLayer(polygon);
    //     //         polygon = L.polygon(linearray, { color: 'red' }).addTo(map);
    //     //     } else {
    //     //         map.removeLayer(polygon);
    //     //         polygon = null;
    //     //     }
    //     // });

    // });

    
    //circle
    var marker;
    var circle;

    map.on('click', function onMapClick(e){
        latitude = e.latlng.lat;
        longitude = e.latlng.lng;
        document.getElementById('InputLatitude').value = latitude;
        document.getElementById('InputLongitude').value = longitude;

        // if(marker != null){
        //     map.removeLayer(marker);
        //     map.removeLayer(circle);
        // }

        marker = L.marker([latitude, longitude]).addTo(map);
        circle = L.circle([latitude, longitude], {color: 'red', radius: 50}).addTo(map);

    });

</script>
@endpush