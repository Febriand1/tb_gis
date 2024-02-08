@extends('adminlte::page')

@section('title', 'Map Masjid')

@section('content_header')
    <h1 class="m-0 text-dark">Map Masjid</h1>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

    <style>
        #map { height: 560; }
    </style>
@stop

@section('content')
    <form method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow:auto">
                        <div id="map" style="width:100%; height:700px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('js')
        <script>
            var dataMasjid = @json($masjids);

            var map = L.map('map').setView([-6.932553576646836, 107.6051998980798], 14);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'})
                .addTo(map);

            dataMasjid.forEach(function(masjid) {
                var marker = L.marker([masjid.latitude, masjid.longitude])
                .addTo(map);

                marker.bindPopup("<br>Masjid: " + masjid.namamasjid + "<br>Latitude: " + masjid.latitude + "<br>Longitude: " + masjid.longitude)
                .openPopup();
            });

            map.on('click', function onMapClick(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                document.getElementById('InputLatitude').value = lat;
                document.getElementById('InputLongitude').value = lng;
            });
        </script>

@endpush