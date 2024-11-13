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
    <a href="tambah.php">Tambah Siswa</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Alamat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id_siswa']."</td>
                            <td>".$row['nis']."</td>
                            <td>".$row['nm_siswa']."</td>
                            <td>".$row['jns_kelamin']."</td>
                            <td>".$row['usia']."</td>
                            <td>".$row['alamat']."</td>
                            <td>
                                <a href='edit_siswa.php?id=".$row['id_siswa']."'>Edit</a> | 
                                <a href='hapus_siswa.php?id=".$row['id_siswa']."'>Hapus</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Tidak ada data siswa</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
