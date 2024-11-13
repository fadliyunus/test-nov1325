<?php
include('db.php');

if (isset($_GET['id'])) {
    $id_kelas = $_GET['id'];

    // Mengambil data kelas berdasarkan ID
    $sql = "SELECT * FROM kelas WHERE id_kelas = $id_kelas";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Kelas tidak ditemukan!";
        exit();
    }
}

// Proses form ketika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nm_kelas = $_POST['nm_kelas'];
    $nm_siswa = $_POST['nm_siswa'];
    $wali_kelas = $_POST['wali_kelas'];

    // Query untuk memperbarui data kelas
    $sql_update = "UPDATE kelas SET nm_kelas = '$nm_kelas', nm_siswa = '$nm_siswa', wali_kelas = '$wali_kelas' WHERE id_kelas = $id_kelas";

    if ($conn->query($sql_update) === TRUE) {
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
    <title>Edit Kelas</title>
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
            padding: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            border-top: 4px solid #4CAF50;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
        }

        input[type="text"], input[type="submit"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Kelas</h1>
        <form action="edit_kelas.php?id=<?php echo $id_kelas; ?>" method="POST">
            <div class="form-group">
                <label for="nm_kelas">Nama Kelas:</label>
                <input type="text" id="nm_kelas" name="nm_kelas" value="<?php echo $row['nm_kelas']; ?>" required>
            </div>

            <div class="form-group">
                <label for="nm_siswa">Nama Siswa:</label>
                <input type="text" id="nm_siswa" name="nm_siswa" value="<?php echo $row['nm_siswa']; ?>" required>
            </div>

            <div class="form-group">
                <label for="wali_kelas">Wali Kelas:</label>
                <input type="text" id="wali_kelas" name="wali_kelas" value="<?php echo $row['wali_kelas']; ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Update Kelas">
            </div>
        </form>

    </div>
</body>
</html>
