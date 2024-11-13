<?php
// Menghubungkan ke file koneksi database
include('db.php');

// Cek apakah ID siswa diterima dari URL
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];

    // Query untuk menghapus data siswa
    $sql = "DELETE FROM siswa WHERE id_siswa = $id_siswa";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman siswa.php setelah data berhasil dihapus
        header("Location: siswa.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID siswa tidak ditemukan!";
    exit();
}
?>