<?php
// Menghubungkan ke file koneksi database
include('db.php');

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nis = $_POST['nis'];
    $nm_siswa = $_POST['nm_siswa'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $agama = $_POST['agama'];
    $nm_ayah = $_POST['nm_ayah'];
    $nm_ibu = $_POST['nm_ibu'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];

    // Query untuk memasukkan data siswa
    $sql = "INSERT INTO siswa (nis, nm_siswa, jns_kelamin, tgl_lahir, agama, nm_ayah, nm_ibu, usia, alamat) 
            VALUES ('$nis', '$nm_siswa', '$jns_kelamin', '$tgl_lahir', '$agama', '$nm_ayah', '$nm_ibu', '$usia', '$alamat')";

    // Mengeksekusi query
    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman siswa.php setelah data berhasil ditambahkan
        header("Location: siswa.php");
        exit();
    } else {
        // Menampilkan pesan error jika query gagal
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }
        input[type="text"], input[type="date"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        textarea {
            resize: vertical;
        }
        .form-group {
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .back-link {
            text-align: center;
            display: block;
            margin-top: 20px;
            font-size: 16px;
        }
        .back-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Siswa</h1>
        <form action="tambah_siswa.php" method="POST">
            <div class="form-group">
                <label for="nis">NIS:</label>
                <input type="text" id="nis" name="nis" required>
            </div>
            
            <div class="form-group">
                <label for="nm_siswa">Nama Siswa:</label>
                <input type="text" id="nm_siswa" name="nm_siswa" required>
            </div>
            
            <div class="form-group">
                <label for="jns_kelamin">Jenis Kelamin:</label><br>
                <input type="radio" id="laki-laki" name="jns_kelamin" value="Laki-laki" required> Laki-laki
                <input type="radio" id="perempuan" name="jns_kelamin" value="Perempuan" required> Perempuan
            </div>
            
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" required>
            </div>
            
            <div class="form-group">
                <label for="agama">Agama:</label>
                <input type="text" id="agama" name="agama">
            </div>
            
            <div class="form-group">
                <label for="nm_ayah">Nama Ayah:</label>
                <input type="text" id="nm_ayah" name="nm_ayah">
            </div>
            
            <div class="form-group">
                <label for="nm_ibu">Nama Ibu:</label>
                <input type="text" id="nm_ibu" name="nm_ibu">
            </div>
            
            <div class="form-group">
                <label for="usia">Usia:</label>
                <input type="number" id="usia" name="usia" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Tambah Siswa">
            </div>
        </form>

        <div class="form-footer">
            <p><center>Sudah didaftar? <a href="kelas.php">Lihat </a></p>
        </div>
    </div>
</body>
</html>
