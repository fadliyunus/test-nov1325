<?php
include('db.php');

// Mengambil data siswa
$sql = "SELECT * FROM siswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
        <h1>Data Siswa</h1>
        <a href="tambah_siswa.php">Tambah Siswa</a>
        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Nama Ayah</th>
                    <th>Nama Ibu</th>
                    <th>Usia</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['nis']."</td> 
                                <td>".$row['nm_siswa']."</td>
                                <td>".$row['jns_kelamin']."</td>
                                <td>".$row['tgl_lahir']."</td>
                                <td>".$row['agama']."</td>
                                <td>".$row['nm_ayah']."</td>
                                <td>".$row['nm_ibu']."</td>
                                <td>".$row['usia']."</td>
                                <td>".$row['alamat']."</td>
                                <td class='actions'>
                                    <a href='edit_siswa.php?id=".$row['id_siswa']."'>Edit</a> | 
                                    <a href='hapus_siswa.php?id=".$row['id_siswa']."' onclick='return confirm(\"Apakah Anda yakin ingin menghapus siswa ini?\")'>Hapus</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11' class='no-data'>Tidak ada data siswa</td></tr>";
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
