<?php
    require 'koneksi.php';

    $hasil = mysqli_query($koneksi, "SELECT * FROM data");

    $data = [];

    while($d = mysqli_fetch_assoc($hasil)){
        $data[] = $d;
    }

    if (isset($_GET['method'])) {
        $method = $_GET['method'];
        $id = $_GET['id'];

        if($method == 'hapus') {
            mysqli_query($koneksi, "DELETE FROM data where id=" . $id);
            if(mysqli_affected_rows($koneksi) > 0 ){
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
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DATA SIG MIF</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- link lealflet -->

        <style>
           .table {
                table-layout: fixed; 
                width: 100%; 
            }

            .table th,
            .table td {
                overflow: hidden; 
                text-overflow: ellipsis;
                white-space: normal; /* Ubah dari nowrap ke normal */
                max-width: 150px;
                word-wrap: break-word; 
                padding: 8px; /* Tambahkan padding untuk ruang */
            }

            .table td {
                max-height: 100px; /* Atur tinggi maksimum sel */
                overflow: auto; /* Menambahkan scroll jika konten terlalu banyak */
            }


        </style>
       

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Data SIG MIF </div>
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

                    <h1 class="mt-4">data lokasi</h1>
                    <a href="tambah.php" class="btn btn-primary mb-3" style="float: right;">Tambah</a>
                    <table class="table mt-4">
                    <thead class="table-primary">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Website</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $dt) : ?>
                        <tr>
                        <th scope="row"><?= $dt['id'] ?></th>
                        <td><?= $dt['nama']?></td>
                        <td><?= $dt['alamat']?></td>
                        <td><?= $dt['website']?></td>
                        <td><?= $dt['latitude']?></td>
                        <td><?= $dt['longitude']?></td>
                        <td>
                            <a href="?id=<?= $dt['id']?>&method=hapus" class="btn btn-danger">hapus</a>
                            <a href="update.php?id=<?= $dt['id']?>" class="btn btn-warning">edit</a>
                            
                        </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
