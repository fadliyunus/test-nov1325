<?php
include('db.php');

// Cek apakah ID jadwal diterima dari URL
if (isset($_GET['id'])) {
    $id_jadwal = $_GET['id'];

    // Mengambil data jadwal berdasarkan ID
    $sql = "SELECT * FROM jadwal WHERE id_jadwal = $id_jadwal";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Jadwal tidak ditemukan!";
        exit();
    }
}

// Proses form ketika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $hari = $conn->real_escape_string($_POST['hari']);
    $nm_kelas = $conn->real_escape_string($_POST['nm_kelas']);
    $jam = $conn->real_escape_string($_POST['jam']);
    $mata_pelajaran = $conn->real_escape_string($_POST['mata_pelajaran']);

    // Query untuk memperbarui data jadwal
    $sql_update = "UPDATE jadwal SET hari='$hari', nm_kelas='$nm_kelas', jam='$jam', mata_pelajaran='$mata_pelajaran' WHERE id_jadwal = $id_jadwal";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: jadwal.php");
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
    <title>Edit Jadwal</title>
    <style>
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

        form {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2196F3;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Edit Jadwal</h1>

    <form action="edit_jadwal.php?id=<?php echo $id_jadwal; ?>" method="POST">
        <label for="hari">Hari:</label>
        <input type="text" id="hari" name="hari" value="<?php echo $row['hari']; ?>" required><br>

        <label for="nm_kelas">Kelas:</label>
        <input type="text" id="nm_kelas" name="nm_kelas" value="<?php echo $row['nm_kelas']; ?>" required><br>

        <label for="jam">Jam:</label>
        <input type="time" id="jam" name="jam" value="<?php echo $row['jam']; ?>" required><br>

        <label for="mata_pelajaran">Mata Pelajaran:</label>
        <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="<?php echo $row['mata_pelajaran']; ?>" required><br>

        <input type="submit" value="Perbarui Jadwal">
    </form>

</body>
</html>
