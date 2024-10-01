<?php
require 'koneksi.php';

$hasil = mysqli_query($koneksi, "SELECT * FROM data");

$data = [];
while ($d = mysqli_fetch_assoc($hasil)) {
    $data[] = $d;
}

if (isset($_GET['method'])) {
    $method = $_GET['method'];
    $id = $_GET['id'];

    if ($method == 'hapus') {
        mysqli_query($koneksi, "DELETE FROM data WHERE id=" . $id);
        if (mysqli_affected_rows($koneksi) > 0) {
            header('Location: data.php');
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIG - MIF</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <style>
        #map {
            height: 70vh; /* Adjust height as needed */
        }
        .leaflet-tooltip {
            max-width: 100px; 
            height: auto; 
            background: none; 
            border: none; 
            box-shadow: none; 
            color: #000; 
            font-size: 14px; 
            padding: 5px; 
            text-align: center; 
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">SIG - MIF</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php">Data</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <h1 class="mt-4">SISTEM INFORMASI GEOGRAFIS- MIF EL</h1>
                <div id="map"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize the map
        let map;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } 

        function showPosition(position) {
            let lat = position.coords.latitude;
            let long = position.coords.longitude;

            map = L.map('map', {
                center: [lat, long],
                zoom: 13
            });

            var myIcon = L.icon({
                iconUrl: 'p.png',
                iconSize: [50, 50],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });

            // Adding marker for the current location
            L.marker([lat, long]).addTo(map);

            let data = <?php echo json_encode($data);?>;

            data.map(function(d){
                L.marker([d.latitude, d.longitude], {
                    icon: myIcon,
                    title: d.nama
                }).addTo(map).bindPopup(`
                    <p>
                        <i class="fa-solid fa-school"></i>
                        <b>Nama Instansi</b>: ${d.nama}
                    </p>
                    <p>
                        <i class="fa-solid fa-location-dot"></i>
                        <b>Alamat</b>: ${d.alamat}
                    </p>
                    <p>
                        <i class="fa-solid fa-globe"></i>
                        <b>Website</b>: ${d.website}
                    </p>
                    <p>
                        <i class="fa-solid fa-location-crosshairs"></i>
                        <b>Garis Lintang</b>: ${d.latitude}
                    </p>
                    <p>
                        <i class="fa-solid fa-location-crosshairs"></i>
                        <b>Garis Bujur</b>: ${d.longitude}
                    </p>
                `).bindTooltip(d.nama, {permanent: true, direction: "top"});
            });

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);


        }
    </script>
</body>
</html>
