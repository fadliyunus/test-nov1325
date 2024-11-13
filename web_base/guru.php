<?php
include('db.php');

$sql = "SELECT * FROM guru";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
</head>
<body>
    <h1>Data Guru</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Guru</th>
                <th>ID Mata Pelajaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id_guru']."</td>
                            <td>".$row['nama_guru']."</td>
                            <td>".$row['mata_pelajaran_id']."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data guru</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
