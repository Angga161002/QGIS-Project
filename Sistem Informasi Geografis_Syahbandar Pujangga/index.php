<html>

<head>
    <title>Padang</title>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script type="text/javascript" src="padang.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #map {
            width: 600px;
            height: 400px;
        }
    </style>
    <style>
        #map {
            width: 800px;
            height: 500px;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            text-align: left;
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="L.Control.Zoominfo.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="L.Control.Zoominfo.js"></script>

    <body>
        <div class="row">
            <!-- class row digunakan sebelum membuat column  -->
            <div class="col -4">
                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <div class="jumbotron">
                    <!-- untuk membuat semacam container berwarna abu -->
                    <h1>Add Location</h1>
                    <hr>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Latitude, Longitude</label>
                            <input type="text" class="form-control" id="latlong" name="latlong">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Tempat</label>
                            <input type="text" class="form-control" name="nama_tempat">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori Tempat</label>
                            <select class="form-control" name="kategori" id="">
                                <option value="">--Kategori Tempat--</option>
                                <option value="rumah makan">Rumah Makan</option>
                                <option value="pom bensin">Pom Bensin</option>
                                <option value="Fasilitas Umum">Fasilitas Umum</option>
                                <option value="Pasar/Mall">Pasar/Mall</option>
                                <option value="rumah sakit">Rumah Sakit</option>
                                <option value="Sekolah">Sekolah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Keterangan</label>
                            <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <!-- ukuruan layar dengan bootstrap adalah 12 kolom, bagian kiri dibuat sebesar 4 kolom-->
                <!-- peta akan ditampilkan dengan id = mapid -->
                <div id="map"></div>
            </div>
        </div>
        <script>
            // Creating map options
            var mapOptions = {
                zoominfoControl: true,
                zoom: 12,
                center: [-0.8968201284737771, 100.37409037064864]
            }
            // Creating a map object
            var map = new L.map('map', mapOptions);

            var basemaps = {
            Topography: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'TOPO-WMS'
            }),

            Places: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'OSM-Overlay-WMS'
            }),

            Dark: L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'Dark'
            }),

            'Topography, then places': L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'TOPO-WMS,OSM-Overlay-WMS'
            }),

            'Places, then topography': L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
                layers: 'OSM-Overlay-WMS,TOPO-WMS'
            })
            };

        L.control.layers(basemaps).addTo(map);

        basemaps.Topography.addTo(map);

            // control that shows state info on hover
            var info = L.control();

            info.onAdd = function(map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };

            info.update = function(props) {
                this._div.innerHTML = '<h5>Kecamatan Padang</h5>' + (props ?
                    '<b>' + props.name + '</b><br />' :
                    'Hover over a state');
            };

            info.addTo(map);


            // get color depending on population density value
            function getColor(d) {
                return d == 16 ? '#E50F00' :
                    d == 15 ? '#00FF7F' :
                    d == 14 ? '#ffff00' :
                    d == 13 ? '#ff4500' :
                    d == 12 ? '#ff69b4' :
                    d == 10 ? '#FFFFE0' :
                    d == 9 ? '#FFA500' :
                    d == 8 ? '#A0522D' :
                    d == 7 ? '#ADD8E6' :
                    d == 6 ? '#2F4F4F' :
                    d == 5 ? '#556B2F' :
                    d == 4 ? '#8A2BE2' :
                    d == 3 ? '#0000FF' :
                    d == 2 ? '#7FFF00' :
                    d == 1 ? '#FED976' :
                    '#FFEDA0';
            }

            function style(feature) {
                return {
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 0.7,
                    fillColor: getColor(feature.properties.density)
                };
            }

            function highlightFeature(e) {
                var layer = e.target;

                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.7
                });

                if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                    layer.bringToFront();
                }

                info.update(layer.feature.properties);
            }

            var geojson;

            function resetHighlight(e) {
                geojson.resetStyle(e.target);
                info.update();
            }

            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: onMapClick
                });
            }

            geojson = L.geoJson(statesData, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);

            map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


            var legend = L.control({
                position: 'bottomright'
            });


            var popup = L.popup();

            // buat fungsi popup saat map diklik
            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent("koordinatnya adalah " + e.latlng
                        .toString()
                    ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                    .openOn(map);

                document.getElementById('latlong').value = e.latlng //value pada form latitde, longitude akan berganti secara otomatis
            }
            map.on('click', onMapClick); //jalankan fungsi




            <?php

            $mysqli = mysqli_connect('localhost', 'root', '', 'latihan');   //koneksi ke database
            $tampil = mysqli_query($mysqli, "select * from lokasi"); //ambil data dari tabel lokasi
            while ($hasil = mysqli_fetch_array($tampil)) { ?> //melooping data menggunakan while

                //menggunakan fungsi L.marker(lat, long) untuk menampilkan latitude dan longitude
                //menggunakan fungsi str_replace() untuk menghilankan karakter yang tidak dibutuhkan
                L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']); ?>]).addTo(map)

                    //data ditampilkan di dalam bindPopup( data ) dan dapat dikustomisasi dengan html
                    .bindPopup(`<?php echo
                                'Nama Tempat : ' . $hasil['nama_tempat'] .
                                    ',\n Kategori : ' . $hasil['kategori'] .
                                    ',\n Keteragan : ' . $hasil['keterangan'];
                                ?>`)

            <?php } ?>
            <?php  ?>

            let latLng1 = L.latLng(-0.96263, 100.44685);
            let latLng2 = L.latLng(-0.91114, 100.54573);
            let wp1 = new L.Routing.Waypoint(latLng1);
            let wp2 = new L.Routing.Waypoint(latLng2);

            // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            // }).addTo(map);

            L.Routing.control({
                waypoints: [latLng1, latLng2]
            }).addTo(map);

            let routeUs = L.Routing.osrmv1();
            routeUs.route([wp1, wp2], (err, routes) => {
                if (!err) {
                    let best = 100000000000000;
                    let bestRoute = 0;
                    for (i in routes) {
                        if (routes[i].summary.totalDistance < best) {
                            bestRoute = i;
                            best = routes[i].summary.totalDistance;
                        }
                    }
                    console.log('best route', routes[bestRoute]);
                    L.Routing.line(routes[bestRoute], {
                        styles: [{
                            color: 'red',
                            weight: '7'
                        }]
                    }).addTo(map);

                }


            })
        </script>
    </body>

</html>