<?php
// Koneksi ke database
$conn = include "connect.php";


// Mendapatkan NIK dari permintaan POST
$nik = $_POST['nik'];

// Query untuk mendapatkan nama pasien berdasarkan NIK
$sql = "SELECT patient_name FROM patients WHERE nik = '$nik'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Jika data ditemukan, kirimkan nama pasien sebagai respons
    $row = $result->fetch_assoc();
    $patientName = $row['patient_name'];
    echo $patientName;
} else {
    // Jika data tidak ditemukan, kirimkan pesan kosong sebagai respons
    echo '';
}

$conn->close();
?>
