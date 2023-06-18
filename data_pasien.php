<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Data Pasien</title>
</head>

<body>
  
  <div class="container">
    <h1>Data Pasien</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>no hp</th>
          <th>Alamat</th>

        </tr>
      </thead>
      <tbody>
      <?php
        // Establish a connection to the MySQL database
        $db = include "connect.php";

        // Fetch user data from the database
        $query = "SELECT * FROM tb_user";
        $result = mysqli_query($db, $query);

        // Check if any rows are returned
        if (mysqli_num_rows($result) > 0) {
            // Loop through each row and display the data
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nik'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['tanggal_lahir'] . "</td>";
                echo "<td>" . $row['jenis_kelamin'] . "</td>";
                echo "<td>" . $row['no_telp'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found.</td></tr>";
        }

        // Close the database connection
        mysqli_close($db);
        ?>
        <!-- Tambahkan data pasien lainnya di sini -->
      </tbody>
    </table>
  </div>
</body>

</html>