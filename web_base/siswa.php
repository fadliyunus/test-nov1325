<?php
include('db.php');

$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id_siswa']."</td>
                            <td>".$row['nama']."</td>
                            <td>".$row['alamat']."</td>
                            <td>".$row['tanggal_lahir']."</td>
                            <td>".$row['kelas_id']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data siswa</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
