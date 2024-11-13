<?php
include('db.php');

// Mengambil data jadwal dari database
$sql = "SELECT * FROM jadwal";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jadwal</title>
    <style>
        /* Styling untuk body dan halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        /* Styling untuk tombol tambah jadwal */
        a {
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin: 10px auto;
            text-align: center;
        }

        a:hover {
            background-color: #45a049;
        }

        /* Styling tabel */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            font-size: 14px;
            color: #555;
        }

        /* Styling untuk link Edit dan Hapus */
        td a {
            color: #2196F3;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        /* Styling untuk aksi Hapus dengan konfirmasi */
        td a.delete {
            color: #e53935;
        }

        td a.delete:hover {
            text-decoration: underline;
        }

        /* Responsif untuk perangkat mobile */
        @media (max-width: 768px) {
            table {
                width: 100%;
                font-size: 12px;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>

    <h1>Daftar Jadwal</h1>
    <a href="tambah_jadwal.php">Tambah Jadwal</a>

    <table>
        <tr>
            <th>Hari</th>
            <th>Kelas</th>
            <th>Jam</th>
            <th>Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['hari']; ?></td>
            <td><?php echo $row['nm_kelas']; ?></td>
            <td><?php echo $row['jam']; ?></td>
            <td><?php echo $row['mata_pelajaran']; ?></td>
            <td>
                <a href="edit_jadwal.php?id=<?php echo $row['id_jadwal']; ?>">Edit</a> | 
                <a href="hapus_jadwal.php?id=<?php echo $row['id_jadwal']; ?>" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <div style="display: flex; justify-content: center; align-items: center; height: 10vh;">
  <a href="index.php" class="button">Kembali</a>
</div>

<style>
  .button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 5px;
    border: 30px;
  }

  .button:hover {
    background-color: #45a049;
  }
</style>


</div>
</body>
</html>
