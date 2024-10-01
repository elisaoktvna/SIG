<?php
    require 'koneksi.php';

    $data;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $hasil = mysqli_query($koneksi, "SELECT * FROM data where id=" . $id);

        $data = mysqli_fetch_assoc($hasil);

    }
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $website = $_POST['website'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        $hasil = mysqli_query($koneksi, "UPDATE data SET nama='$nama',alamat='$alamat',website='$website',latitude='$latitude',longitude='$longitude' WHERE id=" . $id);
        
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
        <title>UPDATE DATA SIG MIF</title>
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
                <div class="sidebar-heading border-bottom bg-light">Update Data SIG MIF </div>
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
                        <input type="text" name="nama" value="<?= $data['nama']?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control"  name="alamat"  rows="3"><?= $data['alamat']?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" value="<?= $data['website']?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" name="latitude" value="<?= $data['latitude']?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" name="longitude" value="<?= $data['longitude']?>" class="form-control" >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
