<?php
include('db.php');

// Mengambil data kelas dari database
$sql = "SELECT * FROM kelas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1000px;
            padding: 30px;
        }
        h1 {
            color: #4CAF50;
            text-align: center;
            font-size: 2.5em;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
            margin: 10px 0;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-size: 1.1em;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .actions a {
            color: #ffffff;
            background-color: #007bff;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
        }
        .actions a:hover {
            background-color: #0056b3;
        }
        .no-data {
            text-align: center;
            font-style: italic;
            color: #888;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 1em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Kelas</h1>
        <a href="tambah_kelas.php">Tambah Kelas</a>
        <table>
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Nama Siswa</th>
                    <th>Wali Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['nm_kelas']."</td>
                                <td>".$row['nm_siswa']."</td>
                                <td>".$row['wali_kelas']."</td>
                                <td class='actions'>
                                    <a href='edit_kelas.php?id=".$row['id_kelas']."'>Edit</a> | 
                                    <a href='hapus_kelas.php?id=".$row['id_kelas']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus kelas ini?\")'>Hapus</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-data'>Tidak ada data kelas</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.php" class="button">Kembali </a>

<style>
  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    border: none;
  }

  .button:hover {
    background-color: #45a049;
  }
</style>

    </div>
</body>
</html>
