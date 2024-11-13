<?php
$servername = "localhost";  // Host biasanya localhost
$username = "root";         // Username default di XAMPP
$password = "";             // Password default kosong di XAMPP
$dbname = "sekolah";        // Nama database yang akan digunakan

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
