<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nik = $_POST['nik'];
    $namaLengkap = $_POST['namaLengkap'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $password = $_POST['password'];
    $noTelpon = $_POST['noTelpon'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $alamat = $_POST['alamat'];

    // Create a database connection
    $db = include "connect.php";

    // Prepare the SQL query
    $query = "INSERT INTO tb_pasien (nik, nama, tanggal_lahir, no_telp, jenis_kelamin, alamat, password) VALUES ('$nik', '$namaLengkap', '$tanggalLahir', '$noTelpon', '$jenisKelamin', '$alamat', '$password')";

    // Execute the query
    if (mysqli_query($db, $query)) {
        // Redirect to a success page
        header('Location: login_p.php');
        exit;
    } else {
        // Handle the error
        echo "Error: " . $query . "<br>" . mysqli_error($db);
    }

    // Close the database connection
    mysqli_close($db);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Registrasi</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text&family=Ysabeau:wght@100&display=swap" rel="stylesheet">
  <style>
    .newfont{
      font-family: 'Wix Madefor Text', sans-serif;
    }
    body{
        background: linear-gradient(to top,#FFAEBC,#A0E7E5);
        background-repeat: no-repeat;
        background-position: center bottom;
        background-attachment: fixed;
    }
    .container {
      margin-top: 10%;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      padding: 20px;
      border-radius: 5px;
      background-color: #fff;
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
    }
    label {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="newfont">Form Registrasi</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="nik">NIK:</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
      </div>
      <div class="form-group">
        <label for="namaLengkap">Nama Lengkap:</label>
        <input type="text" class="form-control" id="namaLengkap" name="namaLengkap" placeholder="Nama Lengkap" required>
      </div>
      <div class="form-group">
        <label for="tanggalLahir">Tanggal Lahir:</label>
        <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="noTelpon">No. Telpon:</label>
        <input type="tel" class="form-control" id="noTelpon" name="noTelpon" placeholder="No. Telpon" required>
      </div>
      <div class="form-group">
        <label for="jenisKelamin">Jenis Kelamin:</label>
        <select class="form-control" id="jenisKelamin" name="jenisKelamin" required>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Daftar</button>
    </form>
  </div>
</body>
</html>
