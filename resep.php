<!DOCTYPE html>
<?php

$conn = include "connect.php";

$nama_dokter = "";
$resep = "";
$nama_pasien = "";

if(isset($_POST['submit'])) {
    $nama_dokter = $_POST['nama_dokter'];
    $resep = $_POST['resep'];
    $nama_pasien = $_POST['nama_pasien'];
    $waktu = $_POST['waktu'];

    $sql1 = "INSERT INTO tb_resep (nama_dokter, obat, pasien) values ('$nama_dokter', '$resep', '$nama_pasien')";
    $q1 = mysqli_query($conn, $sql1);
    
    if($q1) {
        $sukses = "Berhasil memasukkan data";
    } else {
        $error = "";
    }
}

?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Resep</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <link
        href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
        rel="stylesheet"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined1:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined', sans-serif;
            padding: 10px;
            height: 10px;
        }

        .material-symbols-outlined1 {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 48;
        }

        .profile {
            padding: 20px;
        }

        .section {
            width: 1000px;
            height: auto;
            background-color: #57ec5d;
        }

        .container1 {
            background-color: inherit;
            padding: 20px;
        }

        body {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Bootstrap" width="50px" height="50px" />
            </a>
            <div class="ml-auto d-flex">
                <span class="material-symbols-outlined">notifications</span>
                <img
                    src="https://cdn.pixabay.com/photo/2023/04/13/07/48/multi-storey-car-park-7921955_1280.jpg"
                    class="rounded-circle"
                    alt=""
                    height="50px"
                    width="50px"
                />
            </div>
        </div>
    </nav>
    <!-- End header Code -->

    <!-- Profile Code -->
    <div class="container-fluid" style="background-color: #57ec5d">
        <div class="section">
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center">
                    <div class="profile">
                        <img
                            src="https://cdn.pixabay.com/photo/2023/04/13/07/48/multi-storey-car-park-7921955_1280.jpg"
                            class="rounded-circle"
                            alt=""
                            height="50px"
                            width="50px"
                        />
                    </div>
                    <div class="ml-2">
                        <span>Welcome, Dr.Betha</span>
                        <div class="d-flex align-items-center">
                            <span>Dokter</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--menu-->
    <br />
    <div class="container-fluid align-items-center text-center">
        <div class="d-inline-block">
            <div class="card mb-3" style="max-width: 18rem">
                <div class="card-body">
                    <span class="material-symbols-outlined" style="max-height: 30px">person</span>
                    <h5 class="card-title"><a href="Dashboarddokter.php">Antrian</a></h5>
                </div>
            </div>
        </div>

        <div class="d-inline-block">
            <div class="card mb-3" style="max-width: 18rem">
                <div class="card-body">
                    <span class="material-symbols-outlined">file_open</span>
                    <h5 class="card-title"><a href="resep.php">Resep</a></h5>
                </div>
            </div>
        </div>
    </div>

    <hr style="border-color: #57ec5d; height: 2px" />

    <!--form-->
    <div class="container">
        <h1>Form Resep</h1>
        <div class="container">
            <form method="post" action="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="resep" class="form-label">Resep</label>
                            <input type="text" class="form-control" id="resep" name="resep">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="text" class="form-control" id="waktu" name="waktu">
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <!--endform-->

</body>
</html>
