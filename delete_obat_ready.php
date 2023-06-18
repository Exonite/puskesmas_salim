<?php
$conn = include "connect.php"; // Menghubungkan ke database

if (isset($_POST['obat_ready_id'])) {
    $obatReadyId = $_POST['obat_ready_id'];

    // Hapus data obat_ready dari tabel
    $deleteQuery = "DELETE FROM obat_ready WHERE id = $obatReadyId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        echo "Data obat_ready berhasil dihapus";
    } else {
        echo "Gagal menghapus data obat_ready";
    }
} else {
    echo "ID obat_ready tidak ditemukan";
}

// Tutup koneksi database
mysqli_close($conn);
?>
