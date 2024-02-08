<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Masjid</title>
        <!-- Favicon-->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>

        <style>
            #map { height: 560px; }
        </style>

    </head>
    
    <body id="page-top" class="antialiased">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#">Data Masjid</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">Map</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Masjid</a></li>
                        <li class="nav-item">|</li>

                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Home</a></li>
                        @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a></li>

                        @if (Route::has('register'))
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-12 align-self-end">
                        <h1 class="text-white font-weight-bold">
                        عَنْ عَبْدِ اللهِ بْنِ عُمَرَ أَنَّ رَسُولَ اللهِ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ قَالَ: صَلَاةُ الْجَمَاعَةِ تَفْضُلُ صَلَاةَ الْفَذِّ بِسَبْعٍ وَعِشْرِينَ دَرَجَةً [رواه البخاري ومسلم]
                        </h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-12 align-self-baseline">
                        <p class="text-white-75 mb-5">
                            Dari Abdullah ibn Umar (diriwayatkan), bahwa Rasulullah shallallahu ‘alaihi wasallam bersabda: “Shalat berjamaah lebih utama dibandingkan shalat sendirian dengan dua puluh tujuh derajat”.
                            <br>
                            (HR. al-Bukhari no. 609 dan 610, dan Muslim no. 1036 dan 1039).
                        </p>
                        <a class="btn btn-primary btn-xl" href="#about">Map</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h2 class="text-white mt-0">Map Lokasi Masjid di Indonesia</h2>
                        <hr class="divider divider-light" />
                        <div id="map"></div>                
                    </div>
                </div>
            </div>
        </section>

        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Masjid di Indonesia</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                        <img class="img-fluid" src="https://tunashijau.id/wp-content/uploads/2023/01/masjidaljabbar-800x445.jpg" alt="..." />
                            <h3 class="h4 mb-2">Masjid Raya Al-Jabbar</h3>
                            <p class="text-muted mb-0">-6.948041078823384, 107.70349060061169</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                        <img class="img-fluid" src="https://media-cdn.tripadvisor.com/media/photo-s/09/58/af/d5/p-20151027-091003-largejpg.jpg" alt="..." />
                            <h3 class="h4 mb-2">Masjid Agung Bandung</h3>
                            <p class="text-muted mb-0">-6.921785603921051, 107.60631769895556</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                        <img class="img-fluid" src="https://cdn-cms.pgimgs.com/areainsider/2023/02/Alt-Text-Masjid-Istiqlal-Mengenal-Kemegahan-dan-Sejarah-Masjid-Paling-Terkenal.png" alt="..." />
                            <h3 class="h4 mb-2">Masjid Istiqlal</h3>
                            <p class="text-muted mb-0">-6.169945993391495, 106.8314221826065</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                        <img class="img-fluid" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Masjid_Raya_Sumbar_3_MTQN_2020.jpg" alt="..." />
                            <h3 class="h4 mb-2">Masjid Raya Sumbar</h3>
                            <p class="text-muted mb-0">-0.9242001972195909, 100.36246273164164</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </section>

        <footer class="bg-primary py-5">
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-white">Copyright &copy; 2024 - Hehe</div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->

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

                marker.bindPopup("<br><b>Masjid:</b> " + masjid.namamasjid + "<br><b>Alamat:</b> " + masjid.alamat + ", " + masjid.kecamatan + ", " + masjid.kota + ", " + masjid.provinsi + "<br><b>Titik Lokasi:</b> " + masjid.latitude + ", " + masjid.longitude)
                .openPopup();
            });

            map.on('click', function onMapClick(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;

                document.getElementById('InputLatitude').value = lat;
                document.getElementById('InputLongitude').value = lng;
            });
        </script>

    </body>
</html>