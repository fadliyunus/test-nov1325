<?php
$sql = "SELECT * FROM guru";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>NIP</th><th>Nama Guru</th><th>Jenis Kelamin</th><th>Mata Pelajaran</th><th>Usia</th><th>No. Telp</th><th>Alamat</th><th>Aksi</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nip"] . "</td><td>" . $row["nm_guru"] . "</td><td>" . $row["jns_kelamin"] . "</td><td>" . $row["mata_pelajaran"] . "</td><td>" . $row["usia"] . "</td><td>" . $row["no_telp"] . "</td><td>" . $row["alamat"] . "</td><td><a href='update.php?nip=" . $row["nip"] . "'>Edit</a> | <a href='delete.php?nip=" . $row["nip"] . "'>Hapus</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data guru.";
}
?>
