<?php
include('db.php');

// Cek apakah ID kelas diterima dari URL
if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];

    // Query untuk menghapus kelas
    $sql = "DELETE FROM kelas WHERE id_kelas = $id_kelas";

    if ($conn->query($sql) === TRUE) {
        header("Location: kelas.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
