<?php
// Menghubungkan ke file koneksi database
include('db.php');

// Cek apakah ID siswa diterima dari URL
if (isset($_GET['id'])) {
    $id_siswa = $_GET['id'];

    // Mengambil data siswa berdasarkan ID
    $sql = "SELECT * FROM siswa WHERE id_siswa = $id_siswa";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Menyimpan data siswa yang diambil dari database
        $row = $result->fetch_assoc();
    } else {
        echo "Data siswa tidak ditemukan!";
        exit();
    }
} else {
    echo "ID siswa tidak ditemukan!";
    exit();
}

// Proses form ketika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data yang diinputkan pada form
    $nis = $_POST['nis'];
    $nm_siswa = $_POST['nm_siswa'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $agama = $_POST['agama'];
    $nm_ayah = $_POST['nm_ayah'];
    $nm_ibu = $_POST['nm_ibu'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];

    // Query untuk memperbarui data siswa
    $sql_update = "UPDATE siswa SET nis='$nis', nm_siswa='$nm_siswa', jns_kelamin='$jns_kelamin', tgl_lahir='$tgl_lahir', agama='$agama', nm_ayah='$nm_ayah', nm_ibu='$nm_ibu', usia='$usia', alamat='$alamat' WHERE id_siswa = $id_siswa";

    if ($conn->query($sql_update) === TRUE) {
        // Redirect ke halaman siswa.php setelah data berhasil diperbarui
        header("Location: siswa.php");
        exit();
    } else {
        echo "Error: " . $sql_update . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            font-size: 16px;
            margin-bottom: 5px;
        }
        input, textarea {
            padding: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        .radio-group input {
            margin-right: 10px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            text-align: center;
            display: block;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        
        <!-- Form untuk mengedit data siswa -->
        <form action="edit_siswa.php?id=<?php echo $id_siswa; ?>" method="POST">
            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis" value="<?php echo $row['nis']; ?>" required>

            <label for="nm_siswa">Nama Siswa:</label>
            <input type="text" id="nm_siswa" name="nm_siswa" value="<?php echo $row['nm_siswa']; ?>" required>

            <label for="jns_kelamin">Jenis Kelamin:</label>
            <div class="radio-group">
                <input type="radio" id="laki-laki" name="jns_kelamin" value="Laki-laki" <?php echo ($row['jns_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?> required> Laki-laki
                <input type="radio" id="perempuan" name="jns_kelamin" value="Perempuan" <?php echo ($row['jns_kelamin'] == 'Perempuan') ? 'checked' : ''; ?> required> Perempuan
            </div>

            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $row['tgl_lahir']; ?>" required>

            <label for="agama">Agama:</label>
            <input type="text" id="agama" name="agama" value="<?php echo $row['agama']; ?>">

            <label for="nm_ayah">Nama Ayah:</label>
            <input type="text" id="nm_ayah" name="nm_ayah" value="<?php echo $row['nm_ayah']; ?>">

            <label for="nm_ibu">Nama Ibu:</label>
            <input type="text" id="nm_ibu" name="nm_ibu" value="<?php echo $row['nm_ibu']; ?>">

            <label for="usia">Usia:</label>
            <input type="number" id="usia" name="usia" value="<?php echo $row['usia']; ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" required><?php echo $row['alamat']; ?></textarea>

            <input type="submit" class="submit-btn" value="Update Siswa">
        </form>
    </div>
</body>
</html>
