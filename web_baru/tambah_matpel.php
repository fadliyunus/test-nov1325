<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nm_matapelajaran = $_POST['nm_matapelajaran'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mata_pelajaran (nm_matapelajaran, jurusan) VALUES (:nm_matapelajaran, :jurusan)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nm_matapelajaran' => $nm_matapelajaran, 'jurusan' => $jurusan]);

    echo "Mata pelajaran berhasil ditambahkan!";
}
?>

<form method="POST" action="">
    Nama Mata Pelajaran: <input type="text" name="nm_matapelajaran" required><br>
    Jurusan: <input type="text" name="jurusan" required><br>
    <button type="submit">Tambah</button>
</form>
