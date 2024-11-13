<?php
include('db.php');

// Proses form tambah jadwal
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hari = $_POST['hari'];
    $nm_kelas = $_POST['nm_kelas'];
    $jam = $_POST['jam'];
    $mata_pelajaran = $_POST['mata_pelajaran'];

    $sql = "INSERT INTO jadwal (hari, nm_kelas, jam, mata_pelajaran) 
            VALUES ('$hari', '$nm_kelas', '$jam', '$mata_pelajaran')";

    if ($conn->query($sql) === TRUE) {
        header("Location: jadwal.php"); // Setelah data berhasil ditambah, redirect ke halaman jadwal
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
        }

        label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .note {
            font-size: 14px;
            color: #888;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Jadwal</h1>
        <form action="tambah_jadwal.php" method="POST">
            <div class="form-group">
                <label for="hari">Hari:</label>
                <input type="text" id="hari" name="hari" required>
            </div>

            <div class="form-group">
                <label for="nm_kelas">Kelas:</label>
                <input type="text" id="nm_kelas" name="nm_kelas" required>
            </div>

            <div class="form-group">
                <label for="jam">Jam:</label>
                <input type="time" id="jam" name="jam" required>
            </div>

            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran:</label>
                <input type="text" id="mata_pelajaran" name="mata_pelajaran" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Tambah">
            </div>
        </form>
        <div class="form-footer">
            <p><center>Sudah didaftar? <a href="kelas.php">Lihat </a></p>
        </div>

      
</body>
</html>
