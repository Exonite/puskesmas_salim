<?php
    session_start(); // Start the session

    // Check if the user is not logged in
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        header('Location: login_p.php');
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
    function logout() {
      // Destroy the session data
      session_unset();
      session_destroy();
  
      // Redirect to the login page after logout
      header("Location: login_p.php");
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

    /* New Styles for New Page */
    .fitur {
      background-color: white;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column; /* Added to center align content vertically */
      margin-top: -170px; /* Adjust the margin-top value as per your preference */
    }

    .sub-container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .sub-container img {
      margin: 0 10px;
    }

    .highlight {
      border: 2px solid blue;
    }

    #message {
      color: red;
      font-weight: bold;
    }

    /* Added Style */
    .image-container {
      margin-bottom: 20px;
      text-align: center;
    }

    .image-container img {
      max-width: 100%;
      height: auto;
    }

    /* Added Style to center align image */
    .center-image {
      display: flex;
      justify-content: center;
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
  <div class="container-fluid align-items-center text-center">
  <a class="text-decoration-none" href="dashboard pasien.php">
    <div class="d-inline-block">
      <div class="card mb-3" style="max-width: 18rem; display: inline-block;">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">person</span> <!-- Added icon -->
          </div>
          <h5 class="card-title ">Periksa</h5>
        </div>
      </div>
    </div>
  </a>

  <a class="text-decoration-none" href="pasien_obat_ready.php">
    <div class="d-inline-block">
      <div class="card mb-3" style="max-width: 18rem; display: inline-block;">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">medical_services</span> <!-- Added icon -->
          </div>
          <h5 class="card-title">Obat</h5>
        </div>
      </div>
    </div>
  </a>


  <hr style="border-color: #96ff94; height: 2px" />

  <!-- New Page -->
  <div class="fitur">
    <div class="container">
      <div class="image-container">
        <img src="img/pilih dokter.jpeg" alt="Pilih Dokter" style="width: 500px; height: auto;">
      </div>
      <div class="sub-container">
        <img src="img/umum.jpeg" alt="Umum" width="200" height="auto" onclick="highlightImage('umum')">
        <img src="img/gigi.jpeg" alt="Gigi" width="200" height="auto" onclick="highlightImage('gigi')">
      </div>
      <div class="center-image"> <!-- Added container to center align image -->
        <img src="img/ambil no antrian.jpeg" alt="Pilih Ambil No Antrian" width="500" height="auto" onclick="validateSelection()">
      </div>
      <p id="message" style="text-align: center;"></p> <!-- Added style to center align text -->
      <p id="practice-hours" style="text-align: center;"></p> <!-- Added practice hours section -->
      <div class="center-image"> <!-- Added container to center align button -->
        <button onclick="saveSelection()" style="margin-top: 20px;">Simpan</button>
      </div>
    </div>
  </div>

  <script>
    let umumQueueNumber = 1; // Initialize the queue number for dokter umum to 1
    let gigiQueueNumber = 1; // Initialize the queue number for dokter gigi to 1
    let umumClicked = false;
    let gigiClicked = false;
    let noAntrianClicked = false;
    let selectedDoctor = '';
    let queueNumber = 0;
    let practiceHours = '';

    function highlightImage(type) {
      if (type === 'umum') {
        umumClicked = !umumClicked;
        gigiClicked = false; // Reset gigiClicked to false
        document.querySelector('img[alt="Umum"]').classList.toggle('highlight');
        document.querySelector('img[alt="Gigi"]').classList.remove('highlight');
      } else if (type === 'gigi') {
        gigiClicked = !gigiClicked;
        umumClicked = false; // Reset umumClicked to false
        document.querySelector('img[alt="Gigi"]').classList.toggle('highlight');
        document.querySelector('img[alt="Umum"]').classList.remove('highlight');
      }
    }

    function validateSelection() {
      if (umumClicked || gigiClicked) {
        noAntrianClicked = true;
        if (umumClicked && gigiClicked) {
          document.getElementById('message').textContent = 'Mohon maaf, hanya boleh memilih salah satu saja.';
          document.getElementById('practice-hours').textContent = '';
        } else {
          if (umumClicked) {
            selectedDoctor = 'Dokter Umum';
            queueNumber = umumQueueNumber++;
            practiceHours = 'Jam Praktek: 08:00 - 12:00';
          } else if (gigiClicked) {
            selectedDoctor = 'Dokter Gigi';
            queueNumber = gigiQueueNumber++;
            practiceHours = 'Jam Praktek: 13:00 - 15:00';
          }
          let queueNumberString = queueNumber.toString().padStart(3, '0');
          document.getElementById('message').textContent = selectedDoctor + ' dengan nomor antrian ' + queueNumberString + '.';
          document.getElementById('practice-hours').textContent = practiceHours;
        }
      } else {
        document.getElementById('message').textContent = 'Mohon maaf, pilih salah satu terlebih dahulu.';
        document.getElementById('practice-hours').textContent = '';
      }
    }
    
    function saveSelection() {
      if (noAntrianClicked) {
        if (selectedDoctor !== '' && queueNumber > 0) {
          // Perform your save operation here
          console.log('Selected Doctor:', selectedDoctor);
          console.log('Queue Number:', queueNumber);
          console.log('Practice Hours:', practiceHours);
        }
      }
    }
  </script>
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

  </body>
</html>