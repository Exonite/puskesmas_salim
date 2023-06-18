<?php
// Assuming you have established a database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the medication data from the form
  $patientNames = $_POST['patient_name'];
  $medications = $_POST['medication'];
  $quantities = $_POST['quantity'];
  $unitPrices = $_POST['unit_price'];
  $totals = $_POST['total'];

  // Loop through the medication data and insert it into the database
  for ($i = 0; $i < count($medications); $i++) {
    $patientName = $patientNames[$i];
    $medication = $medications[$i];
    $quantity = $quantities[$i];
    $unitPrice = $unitPrices[$i];
    $total = $totals[$i];

    // Perform the database insert operation
    // Replace the placeholders below with your actual database table and column names
    $query = "INSERT INTO tb_obat (patient_name, medication, quantity, unit_price, total) VALUES ('$patientName', '$medication', $quantity, $unitPrice, $total)";
    // Execute the query
    if(mysqli_query($conn,$query)){
        // If the query was successful, redirect the user to another page
        echo "<script>
            alert('Berhasil menambahkan obat');
        </script>";
    }

    // Handle any further processing or error handling as needed
  }

  // Redirect to a success page or display a success message
  // header("Location: success.php");
  // exit();
}
?>
