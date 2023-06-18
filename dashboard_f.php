<?Php

    session_start(); // Start the session

    // Check if the user is not logged in
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login_f.php');
        exit;
    }

    $conn = include "connect.php";

    // Retrieve the user ID from the database based on the logged-in user's credentials
    $userId = $_SESSION['user_id'];

    $query = "SELECT * FROM tb_apoteker WHERE id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // User found, continue with the rest of the code
    } else {
        // User not found, handle the error or redirect
        // For example, redirect to the login page
        header('Location: login_f.php');
        exit;
    }
    function logout() {
      // Destroy the session data
      session_unset();
      session_destroy();

      // Redirect to the login page after logout
      header("Location: login_f.php");
      exit();
    }

    if (isset($_POST['logout'])) {
      logout();
    }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Example</title>
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
    <style>
      * {
        padding: 0;
        margin: 0;
      }

      .material-symbols-outlined {
        font-family: 'Material Symbols Outlined', sans-serif;
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
      .menu-icon{
        height="50";
        width="50";
      }
    </style>
  </head>

  <body>
    <!-- Example Code -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/logo.jpeg" alt="Bootstrap" width="100" height="100" />
    </a>
    <div class="col col-1">
      <div class="d-flex align-items-center justify-content-end">
        <ul class="nav">
          <li class="nav-item dropstart">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="material-symbols-outlined">notifications</span>
              <span class="position-absolute top-1 start-120 translate-middle badge rounded-circle bg-danger">4</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <ul class="ml-2">
          <li class="nav-item dropstart">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://cdn.pixabay.com/photo/2023/04/13/07/48/multi-storey-car-park-7921955_1280.jpg" class="rounded-circle" alt="" height="50px" width="50px">
            </a>
            <form method="POST">
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><button type="submit" name="logout" class="dropdown-item">Logout</button></li>
            </ul>
            </form>
          </li>
        </ul>
      </div>
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
              <span><?php echo $row['nama'] ?></span>
              <div class="d-flex align-items-center">
                <span><?php echo $row['jabtan'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--menu-->
    <br />
    <div class="container text-center">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-2">
      <a href="dashboard_f.php" class="text-decoration-none">
        <div class="card mb-3">
          <div class="card-body d-flex flex-column align-items-center">
            <i class="material-symbols-outlined" style="max-height: 30px">person</i>
            <h5 class="card-title">Resep</h5>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-2">
      <a href="racik.php" class="text-decoration-none">
        <div class="card mb-3">
          <div class="card-body d-flex flex-column align-items-center">
          <span class="material-symbols-outlined">restaurant_menu</span>
            <h5 class="card-title">Racik</h5>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-2">
      <a href="obat_ready.php" class="text-decoration-none">
        <div class="card mb-3">
          <div class="card-body d-flex flex-column align-items-center">
          <span class="material-symbols-outlined">outpatient_med</span>
            <h5 class="card-title">Obat Ready</h5>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>






    <hr style="border-color: #57ec5d; height: 2px" />

    <!--Tabel-->
    <div class="container">
    <?php
// Koneksi ke database
$conn = include "connect.php";

// Query untuk mengambil data dari tabel tb_resep
$sql = "SELECT * FROM tb_resep Order by waktu asc";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result->num_rows > 0) {
    // Tampilkan data dalam tabel HTML
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered">';
    echo '<thead style="background-color: #57ec5d">';
    echo '<tr>';
    echo '<th>Doctor Name</th>';
    echo '<th>Resep</th>';
    echo '<th>Pasien</th>';
    echo '<th>Waktu</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['nama_dokter'] . '</td>';
        echo '<td>' . $row['obat'] . '</td>';
        echo '<td>' . $row['pasien'] . '</td>';
        echo '<td>' . $row['waktu'] . '</td>';
        echo '<td>';
        echo '<a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary" style= "margin-right:10px;">Edit</a>';
        echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger" style= "margin-right:10px;">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'No data found.';
}

$conn->close();
?>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  
  </body>
</html>