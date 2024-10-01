<?php
    require 'koneksi.php';

    if (isset($_POST['submit'])) {
        echo 'masuk';
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $website = $_POST['website'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        $hasil = mysqli_query($koneksi, "INSERT INTO data (nama,alamat,website,latitude,longitude)VALUES('$nama','$alamat','$website','$latitude','$longitude')");
        
        if (mysqli_affected_rows($koneksi) > 0) {
            header('Location: data.php');
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TAMBAH DATA SIG MIF</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- link lealflet -->
       

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Tambah Data SIG MIF </div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="data.php">Data</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
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
                <!-- Page content-->
                <div class="container-fluid">

                    <h1 class="mt-4">Tambah Data</h1>
                    <a href="data.php" class="btn btn-info mb-3" style="float: right;">Kembali</a>

                    <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="latitude" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="longitude" class="form-control" >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
