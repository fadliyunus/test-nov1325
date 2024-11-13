<?php
include 'config.php';

// Fungsi Tambah Mata Pelajaran
if (isset($_POST['create'])) {
    $nm_matapelajaran = $_POST['nm_matapelajaran'];
    $jurusan = $_POST['jurusan'];

    $sql = "INSERT INTO mata_pelajaran (nm_matapelajaran, jurusan) VALUES (:nm_matapelajaran, :jurusan)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nm_matapelajaran' => $nm_matapelajaran, 'jurusan' => $jurusan]);

    echo "Mata pelajaran berhasil ditambahkan!";
}

// Fungsi Update Mata Pelajaran
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nm_matapelajaran = $_POST['nm_matapelajaran'];
    $jurusan = $_POST['jurusan'];

    $sql = "UPDATE mata_pelajaran SET nm_matapelajaran = :nm_matapelajaran, jurusan = :jurusan WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['nm_matapelajaran' => $nm_matapelajaran, 'jurusan' => $jurusan, 'id' => $id]);

    echo "Mata pelajaran berhasil diperbarui!";
}

// Fungsi Delete Mata Pelajaran
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM mata_pelajaran WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);

    echo "Mata pelajaran berhasil dihapus!";
}

// Ambil Semua Data Mata Pelajaran untuk Ditampilkan
$sql = "SELECT * FROM mata_pelajaran";
$stmt = $conn->query($sql);
$mata_pelajaran = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        h2 {
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

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table td {
            background-color: #f9f9f9;
        }

        table tr:hover td {
            background-color: #f1f1f1;
        }

        .actions a {
            text-decoration: none;
            color: #2196F3;
            margin: 0 10px;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2196F3;
            text-align: center;
        }

        .back-link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<h2>Tambah Mata Pelajaran</h2>
<form method="POST" action="">
    <label for="nm_matapelajaran">Nama Mata Pelajaran:</label>
    <input type="text" name="nm_matapelajaran" required><br>

    <label for="jurusan">Jurusan:</label>
    <input type="text" name="jurusan" required><br>

    <button type="submit" name="create">Tambah</button>
</form>

<h2>Daftar Mata Pelajaran</h2>
<table>
    <tr>
        <th>Nama Mata Pelajaran</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>
    <?php foreach ($mata_pelajaran as $row): ?>
        <tr>
            <td><?= $row['nm_matapelajaran']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td class="actions">
                <a href="?edit=<?= $row['id']; ?>">Edit</a>
                <a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
// Form Update Mata Pelajaran jika tombol Edit diklik
if (isset($_GET['edit'])):
    $id = $_GET['edit'];
    $sql = "SELECT * FROM mata_pelajaran WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $edit_mata_pelajaran = $stmt->fetch();
?>
<h2>Edit Mata Pelajaran</h2>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $edit_mata_pelajaran['id']; ?>">
    
    <label for="nm_matapelajaran">Nama Mata Pelajaran:</label>
    <input type="text" name="nm_matapelajaran" value="<?= $edit_mata_pelajaran['nm_matapelajaran']; ?>" required><br>

    <label for="jurusan">Jurusan:</label>
    <input type="text" name="jurusan" value="<?= $edit_mata_pelajaran['jurusan']; ?>" required><br>

    <button type="submit" name="update">Update</button>
</form>
<?php endif; ?>
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
