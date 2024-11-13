<?php
include('db.php');

$sql = "SELECT * FROM kelas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
</head>
<body>
    <h1>Data Kelas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Tingkat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id_kelas']."</td>
                            <td>".$row['nama_kelas']."</td>
                            <td>".$row['tingkat']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data kelas</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
