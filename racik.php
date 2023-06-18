<?Php
    $conn = include "connect.php";
    session_start(); // Start the session

    // Check if the user is not logged in
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login_f.php');
        exit;
    }

    $userId = $_SESSION['user_id'];

    $session_timeout = 1800;
    $_SESSION['expire_time'] = time() + $session_timeout;

    if (isset($_SESSION['expire_time']) && time() > $_SESSION['expire_time']) {
        // Session expired, destroy the session
        session_unset();
        session_destroy();
        header("Location: login_f.php");
        exit;
    }

    $_SESSION['expire_time'] = time() + $session_timeout;

    function logout() {
      // Destroy the session data
      session_unset();
      session_destroy();
  
      // Redirect to the login page after logout
      header("Location: login_d.php");
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
      .menu-icon {
        height: 50px;
        width: 50px;
      }
      .dropdown-menu-right {
        min-width: 500px;
      }
      .autocomplete-dropdown {
        position: absolute;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        max-height: 150px;
        overflow-y: auto;
      }
    </style>
  </head>

  <body>
    <!-- header Code -->
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
              <li><a class="dropdown-item" href="login_f.php" onclick="logout()">Logout</a></li> <!-- Menambahkan tautan logout dan onclick event -->
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
              <span>Juanda Gilang Purnomo</span>
              <div class="d-flex align-items-center">
                <span>Apoteker</span>
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

    <!--Form-->
    <div class="container">
  <form class="form-group" method="POST">
    <table class="table table-bordered" style="width: 100%">
      <thead class="table-success">
        <tr>
          <th>Patient</th>
          <th>Medication</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <select class="form-select" id="patient" name="patient">
              <option disabled selected>Patient</option>
              <?php
                $sql = "SELECT id, nik, nama FROM tb_pasien";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['nik'] . ' - ' . $row['nama'] . '</option>';
                }
              ?>
            </select>
          </td>
          <td>
            <input
              type="text"
              class="form-control"
              name="medication[]"
              placeholder="Medication name"
              required
            />
          </td>
          <td>
            <input
              type="number"
              class="form-control"
              name="quantity[]"
              placeholder="Quantity"
              required
            />
          </td>
          <td>
            <input
              type="number"
              class="form-control"
              name="unit_price[]"
              placeholder="Unit price"
              required
            />
          </td>
          <td>
            <button type="button" class="btn btn-danger btn-remove-row">Remove</button>
          </td>
        </tr>
        <!-- Add more rows for additional medications -->
      </tbody>
    </table>
    <button type="button" class="btn btn-primary" onclick="addRow()">Add Medication</button>
    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Mengumpulkan data dari form
  $patient = $_POST['patient'];
  $medications = $_POST['medication'];
  $quantities = $_POST['quantity'];
  $unitPrices = $_POST['unit_price'];

  // Menyusun data menjadi array
  $data = array(
      'pasien' => $patient,
      'obat' => array()
  );

  for ($i = 0; $i < count($medications); $i++) {
      $obat = array(
          'nama' => $medications[$i],
          'quantity' => $quantities[$i],
          'harga' => $unitPrices[$i]
      );
      $data['obat']['obat' . ($i+1)] = $obat;
  }

  // Mengonversi array menjadi JSON
  $jsonData = json_encode($data);

  // Menyimpan data JSON ke database
  $conn = include "connect.php";
  $sql = "INSERT INTO obat_ready (id,user_id, data_obat) VALUES ('','{$row['id']}', '$jsonData')";
  $result = mysqli_query($conn, $sql);

  // Periksa apakah operasi penulisan berhasil
  if ($result) {
      echo "<script>alert('Data inserted successfully.')</script>";
  } else {
      echo "Error: " . mysqli_error($conn);
  }

  // Tutup koneksi database
  mysqli_close($conn);
}

?>


<script>
  function addRow() {
    var tableBody = document.querySelector('tbody');
    var newRow = document.createElement('tr');
    newRow.innerHTML = `
      <td>
        <select class="form-select" name="patient" disabled>
          <option disabled selected>Patient</option>
          <?php
            $sql = "SELECT id, nik, nama FROM tb_pasien";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['nik'] . ' - ' . $row['nama'] . '</option>';
            }
          ?>
        </select>
      </td>
      <td>
        <input
          type="text"
          class="form-control"
          name="medication[]"
          placeholder="Medication name"
          required
        />
      </td>
      <td>
        <input
          type="number"
          class="form-control"
          name="quantity[]"
          placeholder="Quantity"
          required
        />
      </td>
      <td>
        <input
          type="number"
          class="form-control"
          name="unit_price[]"
          placeholder="Unit price"
          required
        />
      </td>
      <td>
        <button type="button" class="btn btn-danger btn-remove-row">Remove</button>
      </td>
    `;
    tableBody.appendChild(newRow);

    // Attach event listener to remove button
    var removeButton = newRow.querySelector('.btn-remove-row');
    removeButton.addEventListener('click', function() {
      newRow.remove();
    });
  }
</script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>
