<?php
include('config.php');

// Cek apakah ada ID jadwal yang diterima dari URL
if (isset($_GET['id'])) {
    $id_jadwal = $_GET['id'];

    // Query untuk menghapus jadwal berdasarkan ID
    $sql = "DELETE FROM jadwal WHERE id_jadwal = :id_jadwal";
    $stmt = $conn->prepare($sql);
    
    // Eksekusi query untuk menghapus data
    if ($stmt->execute(['id_jadwal' => $id_jadwal])) {
        echo "Jadwal berhasil dihapus!";
        header("Location: jadwal.php"); // Redirect setelah berhasil menghapus
        exit();
    } else {
        echo "Error: Tidak dapat menghapus jadwal!";
    }
} else {
    echo "ID jadwal tidak ditemukan!";
}
?>
