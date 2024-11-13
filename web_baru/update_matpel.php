<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM mata_pelajaran WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $mata_pelajaran = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nm_matapelajaran = $_POST['nm_matapelajaran'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mata_pelajaran SET nm_matapelajaran = :nm_matapelajaran, jurusan = :jurusan WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nm_matapelajaran' => $nm_matapelajaran, 'jurusan' => $jurusan, 'id' => $id]);

    echo "Mata pelajaran berhasil diperbarui!";
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $mata_pelajaran['id']; ?>">
    Nama Mata Pelajaran: <input type="text" name="nm_matapelajaran" value="<?= $mata_pelajaran['nm_matapelajaran']; ?>" required><br>
    Jurusan: <input type="text" name="jurusan" value="<?= $mata_pelajaran['jurusan']; ?>" required><br>
    <button type="submit">Update</button>
</form>
