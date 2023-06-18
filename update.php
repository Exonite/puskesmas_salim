<?php
// Koneksi ke database
$conn = include "connect.php";

// Periksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama_dokter = $_POST['nama_dokter'];
    $obat = $_POST['obat'];
    $pasien = $_POST['pasien'];
    $waktu = $_POST['waktu'];

    // Query untuk mengupdate data resep berdasarkan ID
    $sql = "UPDATE tb_resep SET nama_dokter = '$nama_dokter', obat = '$obat', pasien = '$pasien', waktu = '$waktu' WHERE id = '$id'";
    $result = $conn->query($sql);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        echo 'Resep updated successfully.';
    } else {
        echo 'Error updating resep: ' . $conn->error;
    }
} else {
    echo 'Invalid request.';
}

$conn->close();

// Redirect ke dashboard_u.php setelah proses update selesai
header("Location: dashboard_f.php");
exit();
?>
