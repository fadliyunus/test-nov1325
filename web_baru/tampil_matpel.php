<?php
include 'config.php';

$sql = "SELECT * FROM mata_pelajaran";
$stmt = $conn->query($sql);
$mata_pelajaran = $stmt->fetchAll();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama Mata Pelajaran</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mata_pelajaran as $row): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nm_matapelajaran']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td>
                <a href="update_mata_pelajaran.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="delete_mata_pelajaran.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
