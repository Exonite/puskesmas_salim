<?php
// Ambil data dari permintaan POST
$obatReadyId = $_POST['obat_ready_id'];
$userId = $_POST['user_id'];
$jsonData = $_POST['json_data'];

// Lakukan proses pemindahan data ke history_pembayaran di sini
// Misalnya, menyimpan data ke database atau melakukan tindakan lainnya

// Contoh tindakan: Simpan data ke tabel history_pembayaran
$conn = include "connect.php";

// Lakukan pengolahan data JSON dan lakukan penyimpanan ke tabel history_pembayaran
$jsonData = mysqli_real_escape_string($conn, $jsonData); // Hindari SQL injection
$query = "INSERT INTO history_pembayaran (id, user_id, data_obat) VALUES ($obatReadyId, $userId, '$jsonData')";
$result = mysqli_query($conn, $query);

if ($result) {
  // Tindakan berhasil dilakukan
  echo "Data obat berhasil dipindahkan ke history_pembayaran";
} else {
  // Tindakan gagal
  echo "Terjadi kesalahan dalam memindahkan data obat";
}

// Tutup koneksi database
mysqli_close($conn);
?>
