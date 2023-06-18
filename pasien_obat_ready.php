<?php
    session_start(); // Start the session

    // Check if the user is not logged in
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login.php');
        exit;
    }

    $conn = include "connect.php";

    // Retrieve the user ID from the database based on the logged-in user's credentials
    $userId = $_SESSION['user_id'];

    $query = "SELECT * FROM tb_pasien WHERE id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // User found, continue with the rest of the code
    } else {
        // User not found, handle the error or redirect
        // For example, redirect to the login page
        header('Location: login_p.php');
        exit;
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
    <script>
    function logout(event) {
      event.preventDefault(); // Prevent the default link behavior

      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          window.location.href = 'login.php'; // Redirect after successful logout
        }
      };
      xhttp.open('GET', 'logout.php', true);
      xhttp.send();
    }


  </script>
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
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="login_p.php" >Logout</a></li>
            </ul>
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
              <span><?php echo $row['nama']?></span>
              <div class="d-flex align-items-center">
                <span>Pasien</span>
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
        <a href="dashboard pasien.php" class="text-decoration-none">
            <div class="card mb-3">
            <div class="card-body d-flex flex-column align-items-center">
                <i class="material-symbols-outlined" style="max-height: 30px">person</i>
                <h5 class="card-title">Periksa</h5>
            </div>
            </div>
        </a>
        </div>

        <div class="col-md-2">
        <a href="pasien_obat_ready.php" class="text-decoration-none">
            <div class="card mb-3">
            <div class="card-body d-flex flex-column align-items-center">
                <span class="material-symbols-outlined">medical_services</span>
                <h5 class="card-title">Obat</h5>
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
    $conn = include "connect.php";
    $query = "SELECT * FROM obat_ready WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $json_data = $row['data_obat'];
      $data = json_decode($json_data, true);
      $pasien_id = $data['pasien'];
      $obat_ready_id = $row['id']; // Ambil ID dari obat_ready

      $sql = "SELECT * FROM tb_pasien WHERE id = $pasien_id";
      $result_pasien = mysqli_query($conn, $sql);

      if ($result_pasien && mysqli_num_rows($result_pasien) > 0) {
        $row_pasien = mysqli_fetch_assoc($result_pasien);
        $pasien = $row_pasien['nama'];
        $saldo = $row_pasien['saldo'];
      } else {
        $pasien = "Unknown";
        $saldo = 0;
      }

      echo '<h2>Data Obat - ' . $pasien . '</h2>';
      echo '<table class="table table-bordered">';
      echo '<thead class="table-success">';
      echo '<tr>
              <th>No.</th>
              <th>Nama Obat</th>
              <th>Quantity</th>
              <th>Harga</th>
          </tr>';
      echo '</thead>';
      echo '<tbody>';

      $obatList = $data['obat'];
      $no = 1;
      $totalharga = 0;

      foreach ($obatList as $key => $obat) {
        echo '<tr>';
        echo '<td>' . $no . '</td>';
        echo '<td>' . $obat['nama'] .  '</td>';
        echo '<td>' . $obat['quantity'] . " mg" . '</td>';
        echo '<td>'. "Rp.".$obat['harga'] . '</td>';
        echo '</tr>';
        $no++;
        $totalharga += $obat['harga'];
      }

      echo '<tr>
              <td colspan="3" class="text-end"><strong>Total Harga:</strong></td>
              <td colspan="2">' . "Rp." . $totalharga . '</td>
          </tr>';

      echo '</tbody>';
      echo '</table>';

      echo '<div class="alert alert-success" id="customAlert" style="display: none;"></div>';

      echo '<button onclick="showAlert(\'Terima Kasih, silahkan ambil obat anda di apoteker.\', \'success\')" type="button" class="btn btn-primary" id="liveAlertBtn">Konfirmasi</button>'; // Tambahkan tombol "Bayar"
    } else {
      echo 'No data found.';
    }
    
    // Tutup koneksi database
    mysqli_close($conn);
  ?>
</div>

<!-- Custom JavaScript -->
<script>
  function showAlert(message, type) {
    var alertElement = document.getElementById('customAlert');
    alertElement.textContent = message;
    alertElement.classList.add('alert-' + type);
    alertElement.style.display = 'block';

    setTimeout(function() {
      alertElement.style.display = 'none';
      alertElement.classList.remove('alert-' + type);
    }, 3000);
  }
</script>


<div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrisModalLabel">Bayar QRIS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="qrisImage" src="img/QR.png" alt="QRIS Image" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>