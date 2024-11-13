<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sekolah"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah Data Guru
if (isset($_POST['tambah'])) {
    $nip = $_POST['nip'];
    $nm_guru = $_POST['nm_guru'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $usia = $_POST['usia'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO guru (nip, nm_guru, jns_kelamin, mata_pelajaran, usia, no_telp, alamat)
            VALUES ('$nip', '$nm_guru', '$jns_kelamin', '$mata_pelajaran', '$usia', '$no_telp', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update Data Guru
if (isset($_POST['update'])) {
    $nip = $_POST['nip'];
    $nm_guru = $_POST['nm_guru'];
    $jns_kelamin = $_POST['jns_kelamin'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $usia = $_POST['usia'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE guru SET nm_guru='$nm_guru', jns_kelamin='$jns_kelamin', mata_pelajaran='$mata_pelajaran', usia='$usia', no_telp='$no_telp', alamat='$alamat' WHERE nip='$nip'";

    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil diperbarui.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Hapus Data Guru
if (isset($_GET['delete'])) {
    $nip = $_GET['delete'];
    $sql = "DELETE FROM guru WHERE nip='$nip'";

    if ($conn->query($sql) === TRUE) {
        echo "Data guru berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Ambil Data Guru
$sql = "SELECT * FROM guru";
$result = $conn->query($sql);

// Pastikan query berhasil dan data ada
if ($result === false) {
    echo "Error: " . $conn->error;
}

// Cek apakah user sedang mengedit
if (isset($_GET['edit'])) {
    $nip = $_GET['edit'];
    $sql = "SELECT * FROM guru WHERE nip='$nip'";
    $edit_result = $conn->query($sql);
    $edit_data = $edit_result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <style>
        /* CSS Styling untuk tampilan lebih menarik */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        form input[type="text"], form input[type="number"], form select, form textarea {
            width: calc(33.33% - 20px);
            padding: 10px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form textarea {
            width: calc(66.66% - 20px);
        }
        input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
        }
        td a {
            color: #2196F3;
            text-decoration: none;
        }
        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2><center>Tambah Guru<center></h2>
<form action="guru.php" method="POST">
    <label for="nip">NIP:</label>
    <input type="text" name="nip" value="<?= isset($edit_data) ? $edit_data['nip'] : '' ?>" required><br>

    <label for="nm_guru">Nama Guru:</label>
    <input type="text" name="nm_guru" value="<?= isset($edit_data) ? $edit_data['nm_guru'] : '' ?>" required><br>

    <label for="jns_kelamin">Jenis Kelamin:</label>
    <select name="jns_kelamin" required>
        <option value="Laki-laki" <?= isset($edit_data) && $edit_data['jns_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= isset($edit_data) && $edit_data['jns_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select><br>

    <label for="mata_pelajaran">Mata Pelajaran:</label>
    <input type="text" name="mata_pelajaran" value="<?= isset($edit_data) ? $edit_data['mata_pelajaran'] : '' ?>" required><br>

    <label for="usia">Usia:</label>
    <input type="number" name="usia" value="<?= isset($edit_data) ? $edit_data['usia'] : '' ?>" required><br>

    <label for="no_telp">No. Telp:</label>
    <input type="text" name="no_telp" value="<?= isset($edit_data) ? $edit_data['no_telp'] : '' ?>" required><br>

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" required><?= isset($edit_data) ? $edit_data['alamat'] : '' ?></textarea><br>

    <input type="submit" name="<?= isset($edit_data) ? 'update' : 'tambah' ?>" value="<?= isset($edit_data) ? 'Update Guru' : 'Tambah Guru' ?>">
</form>

<h2><center>Daftar Guru<center></h2>
<table>
    <tr>
        <th>NIP</th>
        <th>Nama Guru</th>
        <th>Jenis Kelamin</th>
        <th>Mata Pelajaran</th>
        <th>Usia</th>
        <th>No. Telp</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nm_guru'] ?></td>
                <td><?= $row['jns_kelamin'] ?></td>
                <td><?= $row['mata_pelajaran'] ?></td>
                <td><?= $row['usia'] ?></td>
                <td><?= $row['no_telp'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="guru.php?edit=<?= $row['nip'] ?>">Edit</a> | 
                    <a href="guru.php?delete=<?= $row['nip'] ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="8">Tidak ada data guru.</td></tr>
    <?php endif; ?>
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
</body>


</html>

<?php
// Tutup koneksi
$conn->close();
?>
