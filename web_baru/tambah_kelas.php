<?php
include('db.php');

// Proses form tambah kelas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nm_kelas = $_POST['nm_kelas'];
    $nm_siswa = $_POST['nm_siswa'];
    $wali_kelas = $_POST['wali_kelas'];

    $sql = "INSERT INTO kelas (nm_kelas, nm_siswa, wali_kelas) VALUES ('$nm_kelas', '$nm_siswa', '$wali_kelas')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: kelas.php");
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
    <title>Tambah Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .form-footer a {
            text-decoration: none;
            color: #4CAF50;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Kelas</h1>
        <form action="tambah_kelas.php" method="POST">
            <label for="nm_kelas">Nama Kelas:</label>
            <input type="text" id="nm_kelas" name="nm_kelas" required>

            <label for="nm_siswa">Nama Siswa:</label>
            <input type="text" id="nm_siswa" name="nm_siswa" required>

            <label for="wali_kelas">Wali Kelas:</label>
            <input type="text" id="wali_kelas" name="wali_kelas" required>

            <input type="submit" value="Tambah Kelas">
        </form>
        <div class="form-footer">
            <p>Sudah memiliki kelas? <a href="kelas.php">Lihat </a></p>
        </div>
    </div>
</body>
</html>
