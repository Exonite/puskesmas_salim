<?php
    session_start(); // Start the session

    // Check if the user is not logged in
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login_d.php');
        exit;
    }

    $conn = include "connect.php";

    // Retrieve the user ID from the database based on the logged-in user's credentials
    $userId = $_SESSION['user_id'];

    $query = "SELECT * FROM tb_dokter WHERE id = '$userId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // User found, continue with the rest of the code
    } else {
        // User not found, handle the error or redirect
        // For example, redirect to the login page
        header('Location: login_d.php');
        exit;
    }
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
    <title>Dashboard Dokter</title>
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
        
        padding:10px;
        height:10px;
      }
      
      
      
    .material-symbols-outlined1{
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
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
      .search-container {
    display: flex;
    align-items: center;
  }

  .form-control {
    width: 300px; /* Atur lebar kolom pencarian sesuai kebutuhan */
    margin-right: 15px; /* Atur jarak antara input dan tombol */
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
        <a class="text-decoration-none" href="dashboard_d.php">
          <div class="card-body">
          <span class="material-symbols-outlined" style="max-height: 30px">person</span>
            <h5 class="card-title">Antrian</h5>
          </div>
        </div>
        </a>
      </div>

      <div class="d-inline-block">
        <div class="card mb-3" style="max-width: 18rem">
          <a class="text-decoration-none" href="resep.php">
          <div class="card-body">
          <span class="material-symbols-outlined">
            file_open
          </span>
            <h5 class="card-title">Resep</h5>
          </div>
        </div>
        </a>
      </div>      

      

    <hr style="border-color: #57ec5d; height: 2px" />

    <script>
      function(refresh){
        location.href = "dashboard_d.php";
      }
    </script>
    <form method="GET" action="">
  <div class="search-container">
    <input type="text" class="form-control" placeholder="Cari Nama Pasien" name="search">
    <button class="btn btn-primary" type="submit">Cari</button> <button class="btn btn-danger" style="margin-left: 10px;" type="submit" onclick="refresh()">Reset</button> 
  </div>
</form>





    <!--Tabel-->
<br>
    <table class="table table-bordered">
      <thead class="table-primary">
        <tr>
          <th scope = "col">No.Antrian</th>
          <th scope = "col">Nama Pasien</th>
          <th scope = "col">Ruangan</th>
          <th scope = "col">Waktu</th>
          
          <th scope= "col" >Action</th>
        </tr>
</br>
      
      <tbody>
      <?php
          $conn = include "connect.php";
          $query = "SELECT * FROM tb_antrian";
          $search = isset($_GET['search']) ? $_GET['search'] : '';

          if (!empty($search)) {
              $query .= " WHERE namaPasien LIKE '%$search%'";
          }

          $query .= " ORDER BY waktu DESC"; // Sort by waktu in descending order

          $result = mysqli_query($conn, $query);
          $urut = 1;

          while ($r2 = mysqli_fetch_assoc($result)) {
              $noAntrian = $r2['noAntrian'];
              $nama = $r2['namaPasien'];
              $ruangan = $r2['ruangan'];
              $waktu = $r2['waktu'];

              if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
                $deleteId = $_GET['id'];
                $deleteQuery = "DELETE FROM tb_antrian WHERE noAntrian = " . $deleteId;
                $deleteResult = mysqli_query($conn, $deleteQuery);
            
                if ($deleteResult) {
                    // Delete successful
                    echo '<script>location.href = "dashboard_d.php";</script>';
                } else {
                    // Delete failed
                    echo "<p>Failed to delete record with ID " . $deleteId . ".</p>";
                }
            }
            
            $query = "SELECT * FROM tb_antrian";
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            
            if (!empty($search)) {
                $query .= " WHERE namaPasien LIKE '%$search%'";
            }
            
            $query .= " ORDER BY waktu DESC"; // Sort by waktu in descending order
            
            $result = mysqli_query($conn, $query);
            $urut = 1;
            
            while ($r2 = mysqli_fetch_assoc($result)) {
                $noAntrian = $r2['noAntrian'];
                $nama = $r2['namaPasien'];
                $ruangan = $r2['ruangan'];
                $waktu = $r2['waktu'];
            
                ?>
                <tr>
                    <th scope="row"><?php echo $noAntrian ?></th>
                    <td><?= $nama ?></td>
                    <td><?= $ruangan ?></td>
                    <td><?= $waktu ?></td>
                    <td>
                        <a href="edit.php?id=<?= $noAntrian ?>" class="btn btn-primary">Edit</a>
                        <a href="?action=delete&id=<?= $noAntrian ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
          <?php
          }
          ?>
        <!-- Add more rows with data here -->
      </tbody>
    </thead>
    </table>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>



