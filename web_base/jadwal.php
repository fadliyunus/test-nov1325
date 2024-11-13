<?php
include('db.php');

$sql = "SELECT jadwal.id_jadwal, kelas.nama_kelas, guru.nama_guru, mata_pelajaran.nama_mata_pelajaran, jadwal.hari, jadwal.jam_mulai, jadwal.jam_selesai
        FROM jadwal
        JOIN kelas ON jadwal.kelas_id = kelas.id_kelas
        JOIN guru ON jadwal.guru_id = guru.id_guru
        JOIN mata_pelajaran ON jadwal.mata_pelajaran_id = mata_pelajaran.id_mata_pelajaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
</head>
<body>
    <h1>Jadwal Pelajaran</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Jadwal</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id_jadwal']."</td>
                            <td>".$row['nama_kelas']."</td>
                            <td>".$row['nama_guru']."</td>
                            <td>".$row['nama_mata_pelajaran']."</td>
                            <td>".$row['hari']."</td>
                            <td>".$row['jam_mulai']."</td>
                            <td>".$row['jam_selesai']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada jadwal</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
