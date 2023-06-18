<?php
// Koneksi ke database
$conn = include "connect.php";

// Periksa apakah parameter id ada dalam URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data resep berdasarkan ID
    $sql = "DELETE FROM tb_resep WHERE id = '$id'";
    $result = $conn->query($sql);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        echo 'Resep deleted successfully.';
    } else {
        echo 'Error deleting resep: ' . $conn->error;
    }
} else {
    echo 'Invalid request.';
}

$conn->close();

header("Location: dashboard_f.php");
exit();
?>
